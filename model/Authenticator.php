<?php 
spl_autoload_register(function ($class) {
    require   $class .".php";
});

class Authenticator 
{
    public function attempt($email, $password, $role){
        $db = new Database();
        $user = $db->query('select * from users where email = :email and role_id = :role', [
            'email' => $email,
            'role' => $role
        ])->fetch();

        if($user){
            if(password_verify($password, $user['password'])){
                $this->login([
                    'email' => $email,
                    'id' =>$user['id'],
                    'role_id' => $user['role_id'],
                    'name' => $user['name']
                ]);

                return true;
            }
        }
        return false;
    }

    public function checkEmail($name, $email, $date, $role, $city,  $password){
        $db = new Database();
        $user = $db->query('select * from users where email = :email', [
            'email'=> $email
        ])->fetch();
        
        if($user){
            return true;
        }
        $db->query('INSERT INTO users(name, email, password, DOB, role_id, city_id) VALUES (:name, :email, :password, :date, :role, :city)', [
            'name' => $name,
            'email'=> $email,
            'password'=> password_hash($password, PASSWORD_BCRYPT),
            'date' => $date,
            'role' => $role,
            'city' => $city
        ]);
        $stmt = $db->query("SELECT LAST_INSERT_ID()");
        $user_id = $stmt->fetchColumn();
        if ($role == 3) {
         //Insert into patients table
        $db->query('INSERT INTO patients (userId) VALUES (:user_id)',[
            'user_id' => $user_id
        ]);
        } elseif ($role == 2) {
        // Insert into health_worker table
         $db->query('INSERT INTO health_worker (userId) VALUES (:user_id)', [
            'user_id' => $user_id
         ]);
        }
        return false;
    }
    public function createVaccination($date, $status, $patient){
        $db = new Database();
        $stmt = $db->query("SELECT * FROM patients WHERE userId = :patient", [
        'patient' => $patient
            ]);
        $patient_id = $stmt->fetchColumn();
        $db->query('INSERT INTO vaccinations(patient_id, vax_Date, vax_Status) VALUES (:patient, :date, :status)',[
            'patient'=> $patient_id,
            'date' => $date,
            'status'=> $status
        ]);
        return true;
    }

    public function createAppointment($user_id, $date, $health_worker, $status){
        $db = new Database();
        $stmt = $db->query("SELECT * FROM health_workers WHERE userId = :health_worker", [
            'health_worker' => $health_worker
        ]);
        $health_workerId = $stmt->fetchColumn();
        $stmt = $db->query("SELECT * FROM patients WHERE userId = :patient", [
            'patient' => $user_id
        ]);
        $patient_id = $stmt->fetchColumn();
        $db->query('INSERT INTO appointments(patient_id, hw_id, apt_Date, apt_Status) VALUES (:patient, :health_worker, :date, :status)',[
            'patient' => $patient_id,
            'health_worker' => $health_workerId,
            'date' => $date,
            'status' => $status
        ]);
        return true;
    }
    public function login($user)
    {
        $_SESSION['user'] = [
            'email' => $user['email'],
            'curUserId' => $user['id'],
            'userRole'=> $user['role_id'],
            'userName' => $user['name'],
        ];

        session_regenerate_id(true);
    }

    public function logout(){
        Session::destroy();
    }
}