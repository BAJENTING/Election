<?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'election';

    $conn = new mysqli($host, $username, $password, $db);
    if ($conn->connect_error){
        die ("Connection Error: ").$conn->connect_error;
    }

    $posID = $_GET['posID'];

    $sql = "UPDATE position set posStat = 'closed' where posID = '$posID'";
    if ($conn->query($sql) === TRUE ){
        echo "<script>
            alert('Deactivated Successfully');
            window.location.href = 'viewPosition.php';
              </script>";
    } else {
        echo "Unable to deactivate: ".$conn->error;
    }
?>