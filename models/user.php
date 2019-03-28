<?php

class User
{
    public $id;
    public $username;
    public $password;

    function __construct($id, $username, $password)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
    }

    static function login($username, $password)
    {
        $db = DB::getInstance();
        $sql = 'SELECT * FROM user where username = :username and password = :password';
        $sql = $db->prepare($sql);
        $sql->execute(
            [
                ':username' => $username,
                ':password' => $password,
            ]
        );
        $data = $sql->fetch(PDO::FETCH_ASSOC);
        if(!$data){
            $result = [
                'code' => 404,
                'message' => 'Username or Password is wrong',
            ];
        }else{
            $_SESSION['user'] = [
                'id' => $data['id'],
                'username' => $data['username']
            ];
            $result = [
                'code' => 200,
                'message' => 'Login successful',
            ];
        }
        return $result;
    }
}