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

    $candID = $_GET['candID'];
    $candFName = $_POST['candFName'];
    $candMName = $_POST['candMName'];
    $candLName = $_POST['candLName'];
    $posID = $_POST['posID'];

    $sql = "UPDATE candidates SET candFName = '$candFName', candMName = '$candMName', candLName = '$candLName', posID = '$posID' WHERE candID = '$candID'";
    if ($conn->query($sql)){
        echo "<script>
                alert ('Updated Successfully');
                window.location.href = 'viewCandidates.php';
              </script>";
    } else {
        echo "Unable to Update: ".$conn->error;
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewpoint" content = "width = device-width, initial-scale = 1.0">
        <title>Edit Candidates</title>
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
    <h1>Edit Candidate</h1>
        <label for = "candFName">New Candidate First Name: </label>
        <input type = "text" id = "candFName" name = "candFName" required><br><br>

        <label for = "candMName">New Candidate Middle Name: </label>
        <input type = "text" id = "candMName" name = "candMName" required> <br><br>

        <label for = "candLName">New Last Name: </label>
        <input type = "text" id = "candLName" name = "candLName"required><br><br>

        <label for = "posID">New Position ID: </label>
        <input type = "number" id = "posID" name = "posID" required><br><br>

        <button type = "submit" id = "addBtn">Update Candidate</button>
        <button type = "reset">Cancel</button>
    </form>
</body>
</html>