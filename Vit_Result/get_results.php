<?php
include 'db.php';

$sql = "SELECT students.first_name, students.last_name, students.registration_number, results.subject_name, results.mse_marks, results.ese_marks, results.total_marks FROM students INNER JOIN results ON students.student_id = results.student_id";
$result = $conn->query($sql);

$data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

echo json_encode($data);

$conn->close();
?>
