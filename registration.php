<?php
// Include the database connection file
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email_id'];
    $phone = $_POST['phone_number'];

    // Check if all fields are filled
    if (!empty($name) && !empty($password) && !empty($email) && !empty($phone)) {
        // Hash the password for security
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare the SQL query to insert data into the table
        $sql = "INSERT INTO student_details (name, password, email, phone_number) VALUES (?, ?, ?, ?)";

        // Prepare the statement
        if ($stmt = $conn->prepare($sql)) {
            // Bind parameters
            $stmt->bind_param("ssss", $name, $hashed_password, $email, $phone);

            // Execute the statement
            if ($stmt->execute()) {
                echo "Registration successful!";
            } else {
                echo "Error: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Please fill in all fields.";
    }
}


// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>
<body>
    <h2>Registration Form</h2>
    <form action="Registration.php" method="POST">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email_id" required><br><br>
        
        <label for="phone">Phone Number:</label><br>
        <input type="text" id="phone" name="phone_number" required><br><br>
        
        <input type="submit" value="Register">
    </form>
</body>
</html>


