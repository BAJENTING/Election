<?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'Election';

    $conn = new mysqli($host, $username, $password, $db);
    if ($conn->connect_error){
        die ("Connection Error: ".$conn->connect_error);
    }

    $sql = "SELECT * FROM voters";
    $result = $conn->query($sql);

    $conn->close();
?>
<!DOCTYPE html>
<html lang = 'en'>
    <head>
        <meta charset = 'UTF-8'>
        <meta name = "viewpoint" content = "width = device-width, initial-scale = 1.0">
        <title>View Voters</title>
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
    <h1>List of Voters</h1>
    <a href = 'addVoters.php'><button id = "addBtn">Add Voters</button></a>
    <table border = 1 cellpadding = 10 cellspacing = 0;>
        <tr>
            <th>Voter ID</th>
            <th>Voter Password</th>
            <th>Voter First Name</th>
            <th>Voter Middle Name</th>
            <th>Voter Last Name</th>
            <th>Voter Status</th>
            <th>Voted</th>
            <th>Actions</th>
        </tr>
        <?php
            if ($result ->num_rows > 0){
                while ($row = $result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$row['voterID']."</th>";
                    echo "<td>".$row['voterPass']."</th>";
                    echo "<td>".$row['voterFName']."</th>";
                    echo "<td>".$row['voterMName']."</th>";
                    echo "<td>".$row['voterLName']."</th>";
                    echo "<td>".$row['voterStat']."</th>";
                    echo "<td>".$row['voted']."</th>";
                    echo "<td><a href = 'editVoters.php?voterID=".$row['voterID']."'><button id='editBtn'>Edit</button></a>
                              <a href = 'deactVoters.php?voterID=".$row['voterID']."'><button id = 'deactBtn'>Deactivate</button></a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan = 3>No Records Found</td></tr>";
            }
        ?>
    </table>
</body>
</html>