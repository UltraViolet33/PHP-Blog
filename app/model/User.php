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


    public function getAllDataUser($idUser)
    {
        $db = Database::getInstance();
        $data['id'] = $idUser;
        $sql = "SELECT * FROM user WHERE id = :id";
        $user =  $db->read($sql, $data);
        return $user;
    }

    public function checkEmailExist($email)
    {
        $db = Database::getInstance();
        $query = "SELECT COUNT(id) FROM user WHERE email = :email";
        $data['email'] = $email;
        $result = $db->read($query, $data, PDO::FETCH_NUM);
        return $result[0];
    }

    public function setResetPwd($token, $email)
    {
        $db = Database::getInstance();
        $query = "UPDATE user SET password_reset_date = NOW(), password_reset_token = :token WHERE email = :email";
        $data['token'] = $token;
        $data['email'] = $email;
        $check = $db->write($query, $data);
        var_dump($check);
    }

    public function updateResetPwd($password)
    {
        
    }

    public function getDateReset($token)
    {
        $db = Database::getInstance();
        $query = "SELECT password_reset_date FROM user WHERE password_reset_token = '$token'";
         $data['password_reset_token'] = $token;
        $result = $db->read($query);
        return $result[0]->password_reset_date;
    }


    public function updatePassword($password, $token)
    {
        $db = Database::getInstance();
        $password = hash('sha1', $password);
        $query = "UPDATE user SET password = :password, password_reset_token = '' WHERE password_reset_token = :password_reset_token";
        $data['password'] = $password;
        $data['password_reset_token'] = $token;
        $result = $db->write($query, $data);
        var_dump($result);
        return $result;
    }
}
