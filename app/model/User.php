<?php

require_once('../app/model/model.php');

class User extends Model
{
    protected $table = "user";

    /**
     * get the user data to check the login from
     */
    public function getUser($email, $password)
    {
        $data['email'] = $email;
        $data['password'] = hash('sha1', $password);
        $sql = "SELECT * FROM user WHERE email = :email AND password = :password limit 1";
        $user =  $this->db->read($sql, $data);
        return $user;
    }

    /**
     * find a user in  the bdd
     */
    public function getAllDataUser($idUser)
    {
        return $this->find($idUser);
    }

    /**
     * check if a email exists in the bdd
     */
    public function checkEmailExist($email)
    {
        $query = "SELECT COUNT(id) FROM user WHERE email = :email";
        $data['email'] = $email;
        $result =  $this->db->read($query, $data, PDO::FETCH_NUM);
        return $result[0];
    }

    /**
     * update password token and date token to reset pwd
     */
    public function setResetPwd($token, $email)
    {
        $query = "UPDATE user SET password_reset_date = NOW(), password_reset_token = :token WHERE email = :email";
        $data['token'] = $token;
        $data['email'] = $email;
        $check =  $this->db->write($query, $data);
    }

    /**
     * get the date reset token
     */
    public function getDateReset($token)
    {
        $query = "SELECT password_reset_date FROM user WHERE password_reset_token = '$token'";
        $data['password_reset_token'] = $token;
        $result =  $this->db->read($query);
        return $result[0]->password_reset_date;
    }


    /**
     * update the password in the bdd
     */
    public function updatePassword($password, $token)
    {
        $password = hash('sha1', $password);
        $query = "UPDATE user SET password = :password, password_reset_token = '' WHERE password_reset_token = :password_reset_token";
        $data['password'] = $password;
        $data['password_reset_token'] = $token;
        $result =  $this->db->write($query, $data);
        return $result;
    }

    public function updateUser($username, $email, $id)
    {
        $query = "UPDATE user SET username = :username, email = :email WHERE id = :id";
        $data['username'] = $username;
        $data['email'] = $email;
        $data['id'] = $id;
        $check = $this->db->write($query, $data);
    }
}
