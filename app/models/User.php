<?php

namespace App\models;

use App\models\Table;

class User extends Table
{

    protected string $table = "users";
    protected string $id = "id_user";


    public function selectUser(array $data): array
    {
        $sql = "SELECT id_user, username, email, is_admin FROM users WHERE email = :email AND password = :password limit 1";
        return $this->db->readSingleRow($sql, $data);
    }


    public function find(int $id_user): array
    {
        $sql = "SELECT $this->id, username, email, is_admin FROM $this->table WHERE id_user = :id_user limit 1";
        return $this->db->readSingleRow($sql, ["id_user" => $id_user]);
    }


    public function checkIfEmailExists(string $email): bool
    {
        $query = "SELECT id FROM user WHERE email = :email";
        $result = $this->db->readSingleRow($query, ["email" => $email]);
        return count($result) > 0;
    }


    public function checkIfEmailAlreadyExists(array $data)
    {
        $query = "SELECT * FROM user WHERE email = :email AND id != :id";
        return $this->db->read($query, $data);
    }


    public function selectPasswordById(int $id): array
    {
        $query = "SELECT password FROM user WHERE id = :id";
        return $this->db->readSingleRow($query, ["id" => $id]);
    }


    public function setResetPasswordToken(array $data): bool
    {
        $query = "UPDATE user SET password_reset_date = NOW(), password_reset_token = :token WHERE email = :email";
        return $this->db->write($query, $data);
    }


    public function getDateReset(string $token): array
    {
        $query = "SELECT password_reset_date FROM user WHERE password_reset_token = :token";
        $result =  $this->db->readSingleRow($query, ["token" => $token]);
        return $result;
    }


    public function updatePasswordFromToken(array $data): bool
    {
        $query = "UPDATE user SET password = :password, password_reset_token = '' WHERE password_reset_token = :token";
        return $this->db->write($query, $data);
    }


    public function updatePassword(array $data): bool
    {
        $query = "UPDATE user SET password = :password WHERE id = :id";
        return $this->db->write($query, $data);
    }


    public function update(array $data): bool
    {
        $query = "UPDATE user SET username = :username, email = :email WHERE id = :id";
        return $this->db->write($query, $data);
    }
}
