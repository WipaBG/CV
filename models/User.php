<?php


class User{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function login($data){
        $sql = $this->conn->prepare("INSERT INTO users(username, password ) VALUES(?,?)");
        $password = $data['password'];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql->bind_param("ss", $data['username'], $hashedPassword);

        return $sql->execute();

    }
}



?>