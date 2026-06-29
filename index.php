 <?php

 error_reporting(E_ALL);
 ini_set('display_errors', 1);

require 'student.php';

$student = new student();
    if(isset($_POST['action'])){
        if($_POST['action'] == 'store') {
    }
        $studentname= $_POST['student'];
        $course = $_POST['course'];
        $student->store($studentname, $course);
        exit;
    }

?>

<html>
    <head>
        <title>student</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
     <body>
        
        <div class="container">
            <h3>Student</h3>
        
            <form id="studentForm">
                <input type="text" placeholder="student Name" class="form-control mb-2" id="studentname">
                <input type="text" placeholder="course"  class="form-control mb-2" id="course">


                <button class="btn btn-primary w-100">Save</button>
            </form>
        </div>

    </body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>

$("#studentForm").on("submit", function(e) {
    e.preventDefault();

    var studentname = $("#studentname").val();
    var course = $("#course").val();
    $.ajax({
        url: "index.php",
        type: "POST",
        data: {
            action: 'store',
            student: studentname,
            course: course,
        },
        success: function(response) {
            
            if (response == "saved") {
                alert("saved successfully!");
            } else {
                alert(response);
            }
            
        },
        error: function (xhr) {
            alert('Server Error' + xhr.responseText);
        }
    })

})

</script>