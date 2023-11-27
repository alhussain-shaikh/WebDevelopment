<!DOCTYPE html>
<html>
<head>
    <title>Client IP Address and Subnet Mask</title>
</head>
<body>
    <h1>Client IP Address and Subnet Mask</h1>
    <?php
        // Get client's IP address
        $clientIP = $_SERVER['REMOTE_ADDR'];

        // Get client's subnet mask
        // Note: Subnet mask may not be directly available in PHP,
        // so we will use a predefined subnet mask here for demonstration purposes.
        $subnetMask = "255.255.255.0";

        // Display the client's IP address and subnet mask
        echo "<p>Client IP Address: " . $clientIP . "</p>";
        echo "<p>Subnet Mask: " . $subnetMask . "</p>";
    ?>
</body>
</html>
