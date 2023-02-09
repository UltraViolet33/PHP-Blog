<?php

namespace App\core;

use App\helpers\Session;
use Valitron\Validator;

abstract class Controller
{
    const VIEW_PATH  = ROOT_PATH . "app" . DIRECTORY_SEPARATOR . "views";

    protected Validator $v; 


    protected function checkDataForm(array $data): bool
    {
        $this->v = new Validator($_POST);
        $this->v->rule("required", $data);
        return $this->v->validate();
    }


    public function view(string $path, array $data = []): void
    {
        extract($data);

        if (file_exists(Controller::VIEW_PATH . DIRECTORY_SEPARATOR . $path . ".php")) {

            include Controller::VIEW_PATH . DIRECTORY_SEPARATOR . $path . ".php";
        } else {
            include Controller::VIEW_PATH . DIRECTORY_SEPARATOR . "404.php";
        }
    }


    protected function checkError(string $key = "error"): void
    {
        $errors = "";
        $htmlError = "";

        $errors = Session::get($key);

        if (!$errors) {
            return;
        }

        if (is_array($errors)) {
            foreach ($errors as $error) {
                $htmlError .= "$error[0]<br>";
            }
        } else {
            $htmlError = $errors;
        }

        echo  '<div class="bg-danger p-3">
                    <span style="font-size:24px" >' . $htmlError . '</span>
                </div>';

        Session::unsetKey("error");
    }


    protected function validateData(mixed $data): mixed
    {
        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = stripslashes($data);
        return $data;
    }
}