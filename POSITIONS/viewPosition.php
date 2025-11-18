<?php 
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'Election';

    $conn = new mysqli($host, $username, $password, $db);
    if ($conn->connect_error){
        die ("Connection Error: ".$conn->connect_error);
    }

    $sql = "SELECT * FROM position";
    $result = $conn->query($sql);

    $conn->close();
?>
<!DOCTYPE html>
<html lang = 'en'>
    <head>
        <meta charset = 'UTF-8'>
        <meta name = "viewpoint" content = "width = device-width, initial-scale = 1.0">
        <title>View Position</title>
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
    <h1>List of Positions</h1>
    <a href = 'addPosition.php'><button id = "addBtn">Add Position</button></a>
    <table border = 1 cellpadding = 10 cellspacing = 0>
    <tr>
        <th>Position ID</th>
        <th>Position Name</th>
        <th>Number Of Positions</th>
        <th>Position Status</th>
        <th>Action</th>
    </tr>
    <?php
        if ($result -> num_rows > 0){
            while ($row = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td>".$row['posID']."</td>";
                echo "<td>".$row['posName']."</td>";
                echo "<td>".$row['numOfPositions']."</td>";
                echo "<td>".$row['posStat']."</td>";
                echo "<td>
                    <a href='editPosition.php?posID=".$row['posID']."'><button id = 'editBtn'>Edit</button></a>
                    <a href ='deactPosition.php?posID=".$row['posID']."&posStat=".$row['posStat']."'><button id = 'deactBtn'>Activate/Deactivate</button></a>
                    <a href = 'delPosition.php?posID=".$row['posID']."'><button id='delBtn'>Del</button></a>
                    </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan ='3'>No records found </td></th>";
        }
    ?>
    </table>
</body>
</html>