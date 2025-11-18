<?php
if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'Election';

    $conn = new mysqli($host, $username, $password, $db);
    if ($conn->connect_error){
        die ("Connection Error: ".$conn->connect_error);
    }

    $candFName = $_POST['candFName'];
    $candMName = $_POST['candMName'];
    $candLName = $_POST['candLName'];
    $posID = $_POST['posID'];

    $sql = "INSERT INTO candidates (candFName, candMName, candLName, posID) VALUES ('$candFName','$candMName','$candLName','$posID')";
    if ($conn->query($sql)){
        echo "<script>
                alert ('Added Successfully');
                windows.location.href = ('viewCandidate.php');
              </script>";
    } else {
        echo "Unable to add: ".$conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewpoint" content = "width = device-width, initial-scale = 1.0">
        <title>Add Candidates</title>
        <link rel = "stylesheet" href = "../CSS/styles.css">
    </head>
<body>
    <ul>
        <li><a href="dashboard.php">Home</a></li>
        <li><a href="../POSITIONS/viewPosition.php">Position</a></li>
        <li><a href="../Voters/viewVoters.php">Voters</a></li>
        <li><a href="../Candidates/viewCandidates.php">Candidates</a></li>
        <li><a href="../Votes/viewVotes.php">Votes</a></li>
    </ul>
    <form action = "" method = "post">
    <h1>Add Candidate</h1>
        <label for = "candFName">Candidate First Name: </label>
        <input type = "text" id = "candFName" name = "candFName" required><br><br>

        <label for = "candMName">Candidate Middle Name: </label>
        <input type = "text" id = "candMName" name = "candMName" required><br><br>

        <label for = "candLName">Candidate Last Name: </label>
        <input type = "text" id = "candLName" name = "candLName" required><br><br>

        <label for = "posID">Position ID: </label>
        <input type = "number" id = "posID" name = "posID" required><br><br>

        <button type = "submit" id = "addBtn">Add Candidate</button>
        <button type = "reset">Cancel</button>
    </form>
</body>
</html>