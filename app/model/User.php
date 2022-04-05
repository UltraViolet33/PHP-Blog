<?php

class User
{

    public function getUser($email, $password)
    {
        $db = Database::getInstance();
        $data['email'] = $email;
        $data['password'] = hash('sha1', $password);
        $sql = "SELECT * FROM user WHERE email = :email AND password = :password limit 1";
        $user =  $db->read($sql, $data);
        return $user;
    }
}
