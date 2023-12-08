<?php
// Establish database connection
$servername = "localhost:3306"; // Change to your database server name
$username = "root"; // Change to your database username
$password = ""; // Change to your database password
$dbname = "registration_form"; // Change to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["mail"];
    $phone = $_POST["phone_number"];
    $birth = $_POST["date"];
    $address = $_POST["address"];
    $pass = $_POST["pass"];
    





    // Insert data into the database
    $sql = "INSERT INTO registration (name, email, phone, birth_day, address, pass) VALUES ('$name', '$email', '$phone', '$birth', '$address', '$pass')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("Location: index.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>