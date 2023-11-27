<?php
include 'db.php'; // Include the database connection script (db.php)

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve input data from the form
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $registration_number = $_POST["registration_number"];
    $email = $_POST["email"];

    // Insert the data into the students table
    $sql = "INSERT INTO students (first_name, last_name, registration_number, email) VALUES (?, ?, ?, ?)";
    
    // Use prepared statements to prevent SQL injection
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssss", $first_name, $last_name, $registration_number, $email);
        
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
