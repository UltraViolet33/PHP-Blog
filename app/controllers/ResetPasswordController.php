<?php

namespace App\controllers;

use App\core\Controller;
use App\models\User;
use App\helpers\Session;

class ResetPasswordController extends Controller
{
    protected User $model;


    public function __construct()
    {
        $this->model = new User();
    }


    public function index(): void
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if ($this->checkUserEmail()) {
                $token = $this->generateToken();
                $data = ["token" => $token, "email" => $_POST["email"]];
                $this->model->setResetPasswordToken($data);
                $this->sendEmailToResetPassword($token, $_POST["email"]);
                header("Location: /user/login");
                return;
            }
        }

        $this->view("user/resetPassword");
    }


    private function sendEmailToResetPassword(string $token, string $email): void
    {
        $link = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'] . '/resetpassword/update?token=' . $token;
        $to = $email;
        $subject = "Réinitialiser mot de passe";
        $message = '<h1>Réinitialisation de votre mot de passe</h1> <p>veuillez suivre ce lien : <a href="' . $link . '">Reset Password</a></p>';

        $headers = [];
        $headers[] = "MIME-Vsersion: 1.0";
        $headers[] = "Content-type: text/html; charset-iso-8859-1";
        $headers[] = 'To' . $to . '<' . $to . '>';
        $headers[] = "blog.test";

        mail($to, $subject, $message, implode("\r\n", $headers));
    }


    private function generateToken(): string
    {
        $string = implode('', array_merge(range('A', 'Z'), range('a', 'z'), range('0', '9')));
        return substr(str_shuffle($string), 0, 20);
    }


    private function checkUserEmail(): bool
    {
        if (!$this->checkDataForm(["email"])) {
            Session::set("error", "We need your email !");
            return false;
        }

        if (!$this->model->checkIfEmailExists($_POST["email"])) {
            Session::set("error", "No account with this email address");
            return false;
        }

        return true;
    }


    public function update(): void
    {
        $this->checkTokenInUrl();
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if ($this->checkFormResetPassword()) {
                $data = ["token" => $_GET["token"], "password" => hash('sha1', $_POST["password"])];
                $this->model->updatePasswordFromToken($data);
                header("Location: /user/login");
                return;
            }
        }

        $this->view('user/formResetPwd');
    }


    private function checkFormResetPassword(): bool
    {
        $data = ["password", "confirmationPassword"];
        if (!$this->checkDataForm($data)) {
            Session::set("error", "Please fill all inputs");
            return false;
        }


        if ($_POST["password"] !== $_POST["confirmationPassword"]) {
            Session::set("error", "Password don't match");
            return false;
        }

        return true;
    }


    private function checkTokenInUrl(): void
    {
        if (empty($_GET['token'])) {
            header("Location: user/login");
            return;
        }

        $token = $_GET['token'];
        $token = (string) $token;
        $dateEmailWasSent = $this->model->getDateReset($token);
        $dateEmailWasSent = $dateEmailWasSent["password_reset_date"];

        $limitTime = strtotime("+ 3 hours", strtotime(($dateEmailWasSent)));
        $dateToday = time();

        if ($limitTime < $dateToday) {
            header("Location: /user/login");
            return;
        }
    }
}
