<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "complaints_db";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $client_name = $_POST['client_name'];
    $issue_type = $_POST['issue_type'];
    $severity = $_POST['severity'];
    $description = $_POST['description'];

    $sql = "INSERT INTO complaints (client_name, issue_type, severity, description) 
            VALUES ('$client_name', '$issue_type', '$severity', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "Complaint submitted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
