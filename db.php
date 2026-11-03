<?php
// Reusable database connection class
class Database
{
    private string $host = 'localhost';
    private string $user = 'root';
    private string $pass = '';            // change to your MySQL password
    private string $name = 'student_records';
    public mysqli $conn;

    public function __construct()
    {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        try {
            $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->name);
            $this->conn->set_charset('utf8mb4');
        } catch (mysqli_sql_exception $e) {
            die('Connection failed: ' . htmlspecialchars($e->getMessage()));
        }
    }
}
