<?php
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$people = $_POST['people'];
$date = $_POST['date'];
$time = $_POST['time'];
$note = $_POST['note'];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'restaurant');
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed : " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO booking(name, phone, email, people, date, time, note) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssisss", $name, $phone, $email, $people, $date, $time, $note);
    $execval = $stmt->execute();
    if ($execval) {
        include "booking_confirm.html";
    } else {
        echo "Error: " . $conn->error;
    }
    $stmt->close();
    $conn->close();
}
?>


