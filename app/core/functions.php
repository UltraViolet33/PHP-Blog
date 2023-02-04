<?php


function show(mixed $data): void
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}


function checkError(): void
{
    $msgError = "";
    if (isset($_SESSION['error']) && $_SESSION['error'] != "") {
        $msgError .= '<div class="bg-danger p-3">
                            <span style="font-size:24px" >' . $_SESSION['error'] . '</span>
                    </div>';
    }
    unset($_SESSION['error']);
    echo $msgError;
}


function validateData(mixed $data): mixed
{
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    return $data;
}
