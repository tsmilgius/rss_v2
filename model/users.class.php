<?php
require __DIR__.'../../model/db.class.php';


class Users
{

    public function allUsers()
    {
        try {
            $stmt = Db::getInstance()->prepare("SELECT * FROM users");
            $stmt->execute();

            //   $userRow=$stmt->fetchAll(PDO::FETCH_OBJ);
            $userRow = $stmt->fetchAll();

            return $userRow;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function login($name, $password)
    {
        try {
            $stmt = Db::getInstance()->prepare("SELECT * FROM users WHERE username=:username AND password=:password");
            $stmt->execute(array(':username' => $name, ':password' => $password));
            $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() == 1) {
                $_SESSION['user_session'] = $userRow['id'];
                $_SESSION['username'] = $userRow['username'];
                return true;
            } else {

                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public function register($name, $email, $password)
    {
        try {
            $stmt = Db::getInstance()->prepare("INSERT INTO users(username, email, password) VALUES(:username, :mail, :pass)");
            $stmt->bindparam(":username", $name);
            $stmt->bindparam(":mail", $email);
            $stmt->bindparam(":pass", $password);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public function isUserExists($username, $email)
    {
        try {
            $stmt = Db::getInstance()->prepare("SELECT * FROM users WHERE username=:username OR email=:email");
            $stmt->execute(array(':username' => $username, ':email' => $email));
            $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() != 0) {
                return true;
            } else {

                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

}

