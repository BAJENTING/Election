<?php
if ($_SERVER["REQUEST_METHOD"] === 'POST'){
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'Election';

    $conn = new mysqli($host, $username, $password, $db);
    if ($conn->connect_error){
        die ("Connection Error: ".$conn->connect_error);
    }
    $posID = $_GET['posID'];

    $posName = $_POST['posName'];
    $numOfPositions = $_POST['numOfPosition'];

    $sql = "UPDATE position set posName = '$posName', numOfPositions = '$numOfPositions' WHERE posID = '$posID'";
    if ($conn->query($sql) === TRUE ){
        echo "<script>
            alert('Updated Successfully');
            window.location.href = 'viewPosition.php';
            </script>";
    } else {
        echo "Unable to update: ".$conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang = 'en'>
    <head>
        <meta charset = 'UTF-8'>
        <meta name = "viewpoint" content = "width = device-width, initial-scale = 1.0">
        <title>Edit Position</title>
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
    <form action = "" method='post'>
            <h1>Edit Position</h1>
        <label for = "posName" >New Position Name:</label>
        <input type = "text" id = "posName" name = "posName" required><br><br>

        <label for = "numOfPositions">New Number of Positions:</label>
        <input type = "num" id = "numOfPosition" name = "numOfPosition" required><br><br>
        
        <button type = "submit" id = "addBtn">Update Position</button>
        <button type = "reset">Cancel</button>
    </form>
</body>
</html>