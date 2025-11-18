<?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'Election';

    $conn = new mysqli($host, $username, $password,$db);
    if ($conn->connect_error){
        die ("Connection Error: ".$conn->connect_error);
    }

    $candID = $_GET['candID'];
    
    $sql = "DELETE FROM candidates WHERE candID = '$candID'";
    if ($conn->query($sql)){
        echo "<script>
            alert ('Deleted Successfully');
            window.location.href = '../Candidates/viewCandidates.php';
              </script>";
    }
?>