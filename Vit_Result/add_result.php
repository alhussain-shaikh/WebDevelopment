<?php
include 'db.php'; // Include the database connection script (db.php)

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve input data from the form
    $student_id = $_POST["student_id"];
    $subject_name = $_POST["subject_name"];
    $mse_marks = $_POST["mse_marks"];
    $ese_marks = $_POST["ese_marks"];

    // Insert the data into the results table
    $sql = "INSERT INTO results (student_id, subject_name, mse_marks, ese_marks) VALUES (?, ?, ?, ?)";
    
    // Use prepared statements to prevent SQL injection
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("isdd", $student_id, $subject_name, $mse_marks, $ese_marks);
        
        if ($stmt->execute()) {
            // Insertion successful
            header("Location: index.html"); // Redirect back to the main page
            exit();
        } else {
            // Insertion failed
            echo "Error: " . $conn->error;
        }

        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close(); // Close the database connection
?>
