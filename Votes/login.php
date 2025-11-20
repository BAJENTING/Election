<?php

session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'Election';

    $conn = new mysqli($host, $username, $password, $db);
    if ($conn->connect_error){
        die ("Connection Error: ".$conn->connect_error);
    }
    $voterID = $_POST['voterID'];
    $voterPass = $_POST['voterPass'];

    $sql = "SELECT * FROM voters WHERE voterID = '$voterID' AND voterPass = '$voterPass'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1){
        $row = $result->fetch_assoc();
        if ($row['voterStat'] !== 'open'){
            echo "<script>
            alert ('Your Account is closed');
            window.location.href = '../Votes/login.php';
            </script>";
            exit;
        }
        if ($row['voted'] === 'y'){
            echo "<script>
            alert ('You already voted!');
            window.location.href = '../Votes/login.php';
            </script>";
            exit;
        }
        $_SESSION['voterID'] = $row['voterID'];

        header("Location: voting.php");
        exit;

    } else {
        echo "<script>
        alert('Invalid ID or Password');
        window.location.href = '../Votes/login.php';
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang = 'en';>
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewpoint" content = "width = device-width, initial-scale = 1.0">
        <title>Log In</title>
        <link rel = "stylesheet" href = "../CSS/styles.css">
    </head>
<body>
    <form action = "" method = "post">
        <h1>Log In</h1>
        <label for = "voterID">Enter Voter ID: </label>
        <input type = "number" id = "voterID" name = "voterID" required><br><br>

        <label for = "voterPass">Enter password: </label>
        <input type = "password" id = "voterPass" name = "voterPass" required> <br><br>

        <button type = "submit" id = "addBtn">Login</button>
    </form>
</body>
</html>