<?php

namespace Controllers;

use Database\Database;
use Interfaces\Crud;
use PDO;
class Department implements Crud
{
    private PDO $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function create($data): bool
    {
        $name = trim($data['department_name'] ?? '');
        $description = trim($data['department_description'] ?? '');

        if ($name === '') {
            $_SESSION['errors']['department_name'] = 'Department name is required.';
            $_SESSION['old'] = $data;
            return false;
        }

        $stmt = $this->conn->prepare("INSERT INTO departments (department_name, description) VALUES (?, ?)");

        if ($stmt->execute([$name, $description])) {
            return true;
        } else {
            $_SESSION['errors']['general'] = 'Failed to add department. Please try again.';
            $_SESSION['old'] = $data;
            return false;
        }
    }

    public function read($id = null)
    {
        $stmt = $this->conn->prepare("SELECT d.department_id, d.department_name,  
    COUNT(e.employee_id) AS items_count
    FROM departments d
    LEFT JOIN employees e ON d.department_id = e.department_id
    GROUP BY d.department_id, d.department_name");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($data)
    {
        // Update department logic
    }

    public function delete($id)
    {
        // Delete department logic
    }
}
