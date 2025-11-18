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
    $voterStat = $_GET['voterStat'];
    if ($voterStat === 'open'){
    $sql = "UPDATE voters SET voterStat = 'closed' WHERE voterID = '$voterID'";
    } else {
        $sql = "UPDATE voters SET voterStat = 'open' where voterID ='$voterID'";
    }

    if ($conn->query($sql)){
        echo "<script>
            alert('Status Changed Successfully');
            window.location.href = '../Voters/viewVoters.php';
            </script>";
    } else {
        echo "Unable to deactivate: ".$conn->error;
    }
    $conn->close();
?>
