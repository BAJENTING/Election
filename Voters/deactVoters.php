<?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'Election';

    $conn = new mysqli($host, $username, $password, $db);
    if ($conn->connect_error){
        die ("Connection Error: ".$conn->connect_error);
    }
    $voterID = $_GET['voterID'];

    $sql = "UPDATE voters SET voterStat = 'closed' WHERE voterID = '$voterID'";
    if ($conn->query($sql)){
        echo "<script>
            alert('Deactivated Successfully');
            window.location.href = '../Voters/viewVoters.php';
            </script>";
    } else {
        echo "Unable to deactivate: ".$conn->error;
    }
    $conn->close();
?>
