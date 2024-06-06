<?php 
spl_autoload_register(function ($class) {
    require   $class .".php";
});

class Authenticator 
{
    public function attempt($email, $password){
        $db = new Database();
        $user = $db->query('select * from users where email = :email', [
            'email' => $email
        ])->fetch();

        if($user){
            if($password === $user['password']){
                $this->login([
                    'email' => $email,
                    'id' =>$user['id']
                ]);

                return true;
            }
        }
        return false;
    }

    public function checkEmail($email, $password){
        $db = new Database();
        $user = $db->query('select * from users where email = :email', [
            'email'=> $email
        ])->fetch();
        
        if($user){
            return true;
        }
        $db->query('INSERT INTO users(email, password) VALUES (:email, :password)', [
            'email'=> $email,
            'password'=> password_hash($password, PASSWORD_BCRYPT)
        ]);
        return false;
    }
    public function login($user)
    {
        $_SESSION['user'] = [
            'email' => $user['email'],
            'curUserId' => $user['id']
        ];

        session_regenerate_id(true);
    }

    public function logout(){
        Session::destroy();
    }
}