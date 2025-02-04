<?php
include_once 'config/Database.php';

 class User {
    protected $db;
    protected $id;
    protected $username;
    protected $email;
    protected $role;
    protected $password;
    protected $status;
    
    public function __construct($db, $userData = null) {
        $this->db = Database::getInstance();
                if ($userData) {
            $this->id = $userData['id'];
            $this->username = $userData['username'];
            $this->email = $userData['email'];
        }
    }
    public function create($data){
        echo "<pre>";
        var_dump($data);
        var_dump($this->db);
        echo "</pre>";
        echo $this->status;
        $sql = "INSERT INTO public.users(
	     username, email, password, role, status)
	    VALUES (:username, :email, :password, :role,:status)";
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':username', $data['username']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':status', $data['status']);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':role', $data['role']);
        echo $password;
        try {
            $stmt->execute();
            echo "executed";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }   
    }

    public function read($id) {
        if (is_numeric($id)) {
        $sql = "SELECT * FROM users WHERE id_user = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
        }else {
            return false;
        }
    }

    public function delete($id) {
        $sql = "DELETE FROM users WHERE id_user = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
   
    public function getUserbyId($id) {
        $sql = "SELECT * FROM users where id_user = :id_user";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id_user', $this->role);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    
    public function getStatus() {
        return $this->status;
    }

    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getEmail() {
        return $this->email;
    }
   
    public function setEmail($email) {
        $this->email =$email;
    }
    public function setPassword() {
        $this->email =$email;
    }
    public function setUsername() {
        $this->usename =$username;
    }

}

