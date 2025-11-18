<?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'Election';

    $conn = new mysqli($host, $username, $password, $db);
    if ($conn->connect_error){
        die ("Connection Error: ".$conn->connect_error);
    }

    $candID = $_GET['candID'];

    $sql = "UPDATE candidates SET candStat = 'closed' WHERE candID = '$candID'";
    if ($conn->query($sql)){
        echo "<script>
                alert ('Deactivated Successfully');
                window.location.href = 'viewCandidates.php';
              </script>";
    } else {
        echo "Unable to deactivate: ".$conn->error;
    }

    $conn->close();
?>