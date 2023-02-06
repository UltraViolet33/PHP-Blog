<?php

namespace App\models;

use App\models\Table;

class User extends Table
{

    protected string $table = "user";
    protected string $id = "id";


    public function selectUser(array $data): array
    {
        $sql = "SELECT id, username, email, isAdmin FROM user WHERE email = :email AND password = :password limit 1";
        $user =  $this->db->readSingleRow($sql, $data);
        return $user;
    }


    public function find(int $id): array
    {
        $sql = "SELECT id, username, email, isAdmin FROM user WHERE id = :id limit 1";
        $user =  $this->db->readSingleRow($sql, ["id" => $id]);
        return $user;
    }


    public function checkIfEmailExists(array $data)
    {
        $query = "SELECT * FROM user WHERE email = :email AND id != :id";
        return $this->db->read($query, $data);
    }


    public function setResetPwd($token, $email)
    {
        $query = "UPDATE user SET password_reset_date = NOW(), password_reset_token = :token WHERE email = :email";
        $data['token'] = $token;
        $data['email'] = $email;
        $this->db->write($query, $data);
    }


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

    public function update(array $data): bool
    {
        $query = "UPDATE user SET username = :username, email = :email WHERE id = :id";
        return $this->db->write($query, $data);
    }
}
