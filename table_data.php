<!DOCTYPE html>
<html>
<head>
    <title>Table with database</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            color: #588c7e;
            font-family: monospace;
            font-size: 25px;
            text-align: left;
        }

        th {
            background-color: #588c7e;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>People</th>
        <th>Date</th>
        <th>Time</th>
        <th>Note</th>
    </tr>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "restaurant");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT id, name, phone, email, people, date, time, note FROM booking";
    $result = $conn->query($sql);
    if ($result) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>"
                . $row["phone"] . "</td><td>" . $row["email"] . "</td><td>"
                . $row["people"] . "</td><td>" . $row["date"] . "</td><td>"
                . $row["time"] . "</td><td>" . $row["note"] . "</td></tr>";
        }
    } else {
        echo "Error: " . $conn->error;
    }
    $conn->close();
    ?>
</table>
</body>
</html>
