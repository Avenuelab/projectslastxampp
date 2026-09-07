<?php

include("includes/config.php");
$ex_sql= "SELECT * FROM exam";
$ex_Query=mysqli_query($conn,$ex_sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 50px;
        }
        .table-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .btn-action {
            width: 80px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="table-container">
        <h2 class="text-center">Exam Details</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Exam Name</th>
                    <th>Class</th>
                    <th>Student Admin Number</th>
                    <th>Subject ID</th>
                    <th>Term ID</th>
                    <th>Opening Marks</th>
                    <th>Midterm Marks</th>
                    <th>CAT 1 Marks</th>
                    <th>CAT 2 Marks</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php   
                    while ($ex_row=mysqli_fetch_array($ex_Query)) {
                        $name=$ex_row["name"];
                        $class=$ex_row["class"];
                        $admin_no=$ex_row["admin_no"];
                        $sbj_id=$ex_row["sbj_id"];
                        $term_id=$ex_row["term_id"];
                        $openmark=$ex_row["openmark"];
                        $midterm=$ex_row["midterm"];
                        $cat1=$ex_row["cat1"];
                        $cat2=$ex_row["cat2"];
                        $id=$ex_row["id"];
                    
                 ?>
                <tr>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $class; ?></td>
                    <td><?php echo $admin_no; ?></td>
                    <td><?php echo $sbj_id; ?></td>
                    <td><?php echo $term_id; ?></td>
                    <td><?php echo $openmark; ?></td>
                    <td><?php echo $midterm; ?></td>
                    <td><?php echo $cat1; ?></td>
                    <td><?php echo $cat2; ?></td>
                    <td>
                        <a href="editexam.php?id=<?php echo $id ?>" class="btn btn-warning btn-action" >Edit</a>
                        <a href="proc/deleteexam.php?id=<?php echo $id ?>" class="btn btn-danger btn-action" >Delete</a>
                    </td>
                </tr>
                <?php } ?>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
</div>

<script>
    function editExam(examName, className, adminNo, subjectId, termId, openingMarks, midterm, cat1, cat2, endTerm) {
        // Logic to edit the exam details
        alert('Edit function for:\nExam: ' + examName + '\nClass: ' + className + '\nAdmin No: ' + adminNo + '\nSubject ID: ' + subjectId + '\nTerm ID: ' + termId + '\nOpening Marks: ' + openingMarks + '\nMidterm Marks: ' + midterm + '\nCAT 1 Marks: ' + cat1 + '\nCAT 2 Marks: ' + cat2 + '\nEnd Term Marks: ' + endTerm);
    }

    function deleteExam(adminNo) {
        // Logic to delete the exam entry
        if (confirm('Are you sure you want to delete the exam record for Admin No ' + adminNo + '?')) {
            alert('Deleted exam record for Admin No: ' + adminNo);
            // Add logic to remove the exam record from the database
        }
    }
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>