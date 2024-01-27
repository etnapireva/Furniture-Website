<?php

class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "limon";
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

        // Initialize the database (create necessary tables)
        $this->initDatabase();
    }

    private function initDatabase() {
        $sql = "CREATE TABLE IF NOT EXISTS form_submissions (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            numri VARCHAR(20),
            message TEXT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";

        if ($this->conn->query($sql) === TRUE) {
            echo "Table created successfully.";
        } else {
            echo "Error creating table: " . $this->conn->error;
        }
    }

    public function __destruct() {
        $this->conn->close();
    }
}

?>