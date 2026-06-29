<?php
class database{

public function connect() {
    return new mysqli("localhost","root","", "student_db");
}
}
?>