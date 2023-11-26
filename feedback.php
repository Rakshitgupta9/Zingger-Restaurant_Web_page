<?php
$conn = mysqli_connect("localhost", "root", "", "restaurant");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $name = $_POST["name"];
    $email = $_POST["email"];
    $feedback = $_POST["feedback"];

    // Insert feedback into the database
    $sql = "INSERT INTO feedback(name, email, feedback, timestamp) VALUES (?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $feedback);

    if ($stmt->execute()) {
        echo '<script>alert("Feed back form submitted successfully !! \nThankyou")</script>';
        include "index.html";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Feedback Form</title>
    <style>
        .submit {
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-size: 20px;
        }

        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            width: 400px;
        }

        h1 {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 90%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        textarea {
            resize: vertical;
            height: 100px;
        }

        button {
            margin-left: 150px;
            font-size: 22px;
            background-color: #7374D3;
            border-radius: 15px;
            padding: 10px;
            border: none;
            cursor: pointer;
        }
        button:hover{
            background-color: #AD29AE;
        }
    </style>
</head>

<body>
    <h1>Feedback Form</h1>
    <div class="submit">
        <form method="POST" action="feedback.php">
            <label for="name">Name:</label>
            <input type="text" name="name" required><br><br>

            <label for="email">Email:</label>
            <input type="email" name="email" required><br><br>

            <label for="feedback">Feedback:</label>
            <textarea name="feedback" required></textarea><br><br>

            <button>Submit</button>
        </form>
    </div>
</body>

</html>