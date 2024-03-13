<?php
    require_once('server.php');

    class users {
        private $db_conn;

        public function __construct()
        {
            $this->db_conn = new mysqli('localhost', 'root', '', 'gc_festival');
        }
    
        public function getAllUsers()
        {
            $query = "SELECT * FROM users;";
            $result = $this->db_conn->query($query);
            $users = array();
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
            return $users;
        }
    
        function deleteUser($id)
        {

            return $this->db_conn->query("DELETE FROM users WHERE Id = '$id'");
        }
    
        function updateUser($firstName, $lastName, $email, $id)
        {
            return $this->db_conn->query("UPDATE users SET Naam = '$firstName', Achternaam = '$lastName', Email = '$email', Password = '$password' WHERE Id = $id");
        }
        public function getUserById($id) {
            $query = "SELECT * FROM users WHERE id = $id";
            $result = $this->db_conn->query($query);
            if ($result->num_rows > 0) {
                return $result->fetch_assoc();
            }
            else {
                return null;
            }
        }
    }
?>