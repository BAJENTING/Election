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

    $voterPass = $_POST['voterPass'];
    $voterFName = $_POST['voterFName'];
    $voterMName = $_POST['voterMName'];
    $voterLName = $_POST['voterLName'];

    $sql = "UPDATE voters SET voterPass = '$voterPass', voterFName = '$voterFName', voterMName = '$voterMName', voterLName = '$voterLName' where voterID = '$voterID'";
    if ($conn->query($sql)){
        echo "<script>
            alert('Updated Successfully');
            window.location.href = '../Voters/viewVoters.php';
            </script>";
    } else {
        echo "Unable to update: ".$conn->error;
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewpoint" content = "width = device-width, initial-scale = 1.0">
        <title>Edit Voters</title>
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
    <h1>Edit Voters</h1>
        <label for = "voterPass">New Voter Password: </label>
        <input type = "password" id = "voterPass" name = "voterPass" required><br><br>

        <label for = "voterFName">New First Name</label>
        <input type = "text" id = "voterFName" name = "voterFName" required><br><br>

        <label for = "voterMName">New Middle Name</label>
        <input type = "text" id = "voterMName" name = "voterMName" required><br><br> 

        <label for = "voterLName">New Last Name</label>
        <input type = "text" id = "voterLName" name = "voterLName" required><br><br> 

        <button type = "submit" id = "addBtn">Update Voter</button>
        <button type = "reset">Cancel</button>
    </form>
</body>
</html>