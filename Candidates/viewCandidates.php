<?php
    $host = 'localhost';
    $username = 'root';
    $password ='';
    $db = 'Election';

    $conn = new mysqli($host, $username,$password, $db);
    if ($conn->connect_error){
        die ("Connection Error: ".$conn->connect_error);
    }

    $sql = "SELECT * FROM candidates";
    $result = $conn->query($sql);

    $conn->close();
?>
<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewpoint" content = "width = device-width, initial-scale = 1.0">
        <title>View Candidates</title>
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
    <h1>List of Candidates</h1>
    <a href = 'addCandidates.php'><button id = "addBtn">Add Candidate</button></a>
    <table border = 1 cellpadding = 10 cellspacing = 0>
        <tr>
            <th>Candidate ID</th>
            <th>Candidate First Name</th>
            <th>Candidate Middle Name</th>
            <th>Candidate Last Name</th>
            <th>Position ID</th>
            <th>Candidate Status</th>
            <th>Actions</th>
        </tr>
        <?php
            if ($result->num_rows > 0){
                while ($row = $result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$row['candID']."</td>";
                    echo "<td>".$row['candFName']."</td>";
                    echo "<td>".$row['candMName']."</td>";
                    echo "<td>".$row['candLName']."</td>";
                    echo "<td>".$row['posID']."</td>";
                    echo "<td>".$row['candStat']."</td>";
                    echo "<td>
                            <a href = 'editCandidates.php?candID=".$row['candID']."'><button id ='editBtn'>Edit</button></a>
                            <a href = 'deactCandidates.php?candID=".$row['candID']."&candStat=".$row['candStat']."'><button id = 'deactBtn'>Activate/Deactivate</button></a>
                            <a href = 'delCandidates.php?candID=".$row['candID']."'><button id = 'delBtn'>Delete</button></a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan = '7'>No records found</td></tr>";
            }
        ?>
    </table>
</body>
</html>