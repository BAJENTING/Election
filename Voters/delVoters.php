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

    $sql = "DELETE FROM voters where voterID = '$voterID'";
    if ($conn->query($sql)){
        echo "<script>
            alert ('Deleted Successfully');
            window.location.href = '../Voters/viewVoters.php'; 
              </script>";
    } else {
        echo "Unable to delete: ".$conn->error;
    }
    $conn->close();
?>