<?php
$servername = "localhost"; // Change if your database is hosted elsewhere
$username = "root"; // Change to your MySQL username
$password = ""; // Change to your MySQL password
$dbname = "cart"; // Change to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $checkbox = isset($_POST['checkbox']) ? 'Yes' : 'No';

    // Insert user data into the table
    $sql = "INSERT INTO users (email, password, phone, checkbox) VALUES ('$email', '$password', '$phone', '$checkbox')";

    if ($conn->query($sql) === TRUE) {
        echo     "New record created successfully";
        // Add a button to open a new page
        echo '<button onclick="window.open(\'displaty.php\', \'_blank\')">Open New Page</button>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>