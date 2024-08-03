<?php
class User extends DB
{
    public function GetAllUser()
    {
        $sql = "SELECT * FROM user Where deleted_at is null";
        return $this->executeQuery($sql);
    }

    public function GetUserByID($id)
    {
        $sql = "SELECT * FROM user where deleted_at is null and id = ?";
        return $this->executeQuery($sql, [$id]);
    }

    public function GetUserByEmail($email)
    {
        $sql = "SELECT * FROM user WHERE deleted_at IS NULL AND email = ?";
        $result = $this->executeSelectQuery($sql, [$email]);

        if (!empty($result)) {
            return $result[0];
        }

        return null;
    }
    public function UpdateLoginAttempts($email)
    {
        $sql = "UPDATE user SET login_attempts = login_attempts + 1 WHERE email = ?";
        return $this->executeQuery($sql, [$email]);
    }
    public function ResetLoginAttempts($email)
    {
        $sql = "UPDATE user SET login_attempts = 0 WHERE email = ?";
        return $this->executeQuery($sql, [$email]);
    }
    public function UpdateLocked($email)
    {
        $sql = "UPDATE user SET locked = 1 WHERE email = ?";
        return $this->executeQuery($sql, [$email]);
    }
    public function ResetLocked($email)
    {
        $sql = "UPDATE user SET locked = 0 WHERE email = ?";
        return $this->executeQuery($sql, [$email]);
    }
    public function UpdatePassword($email, $password)
    {
        $sql = "UPDATE user SET password = ? WHERE email = ?";
        return $this->executeQuery($sql, [$password, $email]);
    }

    public function CreateUser($name, $phone, $email, $password)
    {
        $sql = "INSERT INTO user(full_name, phone_number, email, password) values (?,?,?,?)";
        return $this->executeQuery($sql, [$name, $phone, $email, $password]);
    }

}
?>