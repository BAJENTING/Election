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
    $candStat = $_GET['candStat'];
    if ($candStat === 'open'){
        $sql = "UPDATE candidates SET candStat = 'closed' WHERE candID = '$candID'";
    } else {
        $sql = "UPDATE candidates SET candStat = 'open' WHERE candID = '$candID'";
    }
    if ($conn->query($sql)){
        echo "<script>
                alert ('Status Changed Successfully');
                window.location.href = 'viewCandidates.php';
              </script>";
    } else {
        echo "Unable to deactivate: ".$conn->error;
    }

    $conn->close();
?>