<?php
class User extends DB
{
    public function GetAllUser()
    {
        $sql = "SELECT * FROM user Where deleted_at is null";
        return $this->executeSelectQuery($sql);
    }

    public function GetCartDetailByUserID($id)
    {
        $sql = "SELECT p.name,p.id as product_id,p.image_url, p.sale_price, c.quantity, c.id as cart_id, u.full_name FROM cart c JOIN product p ON c.product_id = p.id JOIN user u on c.user_id =u.id WHERE c.user_id = ? and u.deleted_at is null";
        return $this->executeSelectQuery($sql, [$id]);
    }

    public function GetUserByEmail($email)
    {
        $sql = "SELECT * FROM user WHERE deleted_at IS NULL AND email = ?";
        $result = $this->executeSelectQuery($sql, [$email]);
        $data = $result->fetch_all(MYSQLI_ASSOC);

        if (!empty($data)) {
            return $data[0];
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

    public function GetAllRole()
    {
        $sql = "SELECT * FROM role";
        return $this->executeQuery($sql);
    }

    public function SetRole($userID, $roleID)
    {
        $sql = "INSERT INTO user_role(user_id, role_id) values (?,?)";
        return $this->executeQuery($sql, [$userID, $roleID]);
    }

}
?>