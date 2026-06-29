<?php
require 'db.php';
class student{
    private $db;
    public function __construct(){
        $this->db = (new Database())->connect();
    }
    public function store($studentname, $course){
        $stmt = $this->db->prepare("INSERT INTO student (studentname, course) VALUES (?,?)");
        $stmt->bind_param("ss", $studentname, $course);
         if ($stmt->execute()){
            echo 'saved';
        } else {
            echo "Execute Error:" . $stmt->error;
        }
    }
}
?>`