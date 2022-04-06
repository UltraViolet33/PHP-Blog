<?php

require_once('../app/core/Controller.php');

class ResetPassword extends Controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = $this->loadModel('user');
    }

    public function index()
    {
        $_SESSION['error'] = "";

        if (isset($_POST['user-reset'])) {
            var_dump($_POST);
            if (empty($_POST['user-resetEmail'])) {
                $_SESSION['error'] .= "Email manquant";
            } else {
                $emailExist = $this->userModel->checkEmailExist($_POST['user-resetEmail']);
                var_dump($emailExist[0]);
                if ($emailExist[0] == "1") {
                    $string = implode('', array_merge(range('A', 'Z'), range('a', 'z'), range('0', '9')));
                    $token = substr(str_shuffle($string), 0, 20);
                    $email = $_POST['user-resetEmail'];
                    $this->userModel->setResetPwd($token, $email);
                    $this->sendEmail($token, $email);
                } else {
                    $_SESSION['error'] .= "Email inconnu";
                }
            }
        }

        $this->view("resetPassword");
    }

    private function sendEmail($token, $email)
    {
        $link = 'test?token?' . $token;
        $to = $email;
        $subject = "Réinitialiser mot de passe";
        $message = '<h1>Réinitialisation de votre mot de passe</h1> <p>veuillez suivre ce lien : <a href="' . $link . '">Reset Password</a></p>';

        $headers = [];
        $headers[] = "MIME-Vsersion: 1.0";
        $headers[] = "Content-type: text/html; charset-iso-8859-1";
        $headers[] = 'To' . $to . '<' . $to . '>';
        $headers[] = "Mon site web <blog.test>";

        mail($to, $subject, $message, implode("\r\n", $headers));

        $result = "Mail envoyé";
        return $result;
    }


    public function update()
    {
     
        $this->checkToken();

        if(isset($_POST['user-resetPwd']))
        {
            $_SESSION['error'] = "";
            var_dump($_POST);
            if(empty($_POST['user-resetPwd2']) || empty($_POST['user-resetPwd1']))
            {
                $_SESSION['error'] .= "Veuillez remplir tous les champs";
            }else
            {
                if($_POST['user-resetPwd1'] === $_POST['user-resetPwd2'])
                {
                    $this->userModel->updatePassword($_POST['user-resetPwd1'], $_GET['token']);
                    header("Location:".ROOT."login");
                }
                else
                {
                    $_SESSION['error'] .= "Les mots de passe ne correspondent pas </br>";
                }
            }
        }

        $this->view('formResetPwd');
    }


    private function checkToken()
    {
        if (empty($_GET['token'])) {
            header("Location:" . ROOT . " login");
            die;
        }
        $token = $_GET['token'];
        $token = (string) $token;
        $dateReset = $this->userModel->getDateReset($token);
        $dateReset = strtotime("+ 3 hours", strtotime(($dateReset)));
        $dateToday = time();

        // if ($dateReset < $dateToday) {
        //     header("Location:" . ROOT . "resetpassword");
        //     die;
        // }
    }
}
