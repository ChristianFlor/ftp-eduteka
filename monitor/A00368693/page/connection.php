<?php
$con = new mysqli('localhost', 'edutekal_mon1', 'Colombia+2023', 'edutekal_monitor');

if ($con === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "CREATE TABLE IF NOT EXISTS A00368693 (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    country VARCHAR(255) NOT NULL,
    area VARCHAR(255) NOT NULL,
    message VARCHAR(255) NOT NULL
)
";

if (mysqli_query($con, $sql)) {
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}

?>