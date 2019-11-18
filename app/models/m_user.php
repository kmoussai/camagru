<?php
    class m_user
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }
        
        public function findUserByEmail($email)
        {
            $this->db->query("SELECT * from users where email = :email");
            $this->db->bind(":email", $email);
            $result =  $this->db->signle();
            return ($this->db->rowCount() > 0 ? $result : false);
        }

        public function insertUser($data)
        {
            $this->db->query("INSERT INTO `users` (`email`, `username`, `password`) VALUES (:email, :username, :pass)");
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':username', $data['username']);
            $this->db->bind(':pass', $data['password']);
            $this->db->execute();
        }

        public function checkUser($email, $password)
        {
            $this->db->query("SELECT * from users where email = :email and `password` = :pass");
            $this->db->bind(':email', $email);
            $this->db->bind(':pass', $password);
            $this->db->execute();
            if ($this->db->rowCount() >= 1)
                return true;
            else
                return false;
        }
    }