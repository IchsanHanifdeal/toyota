<?php
require '../backend/koneksi.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id_mobil']) && is_numeric($_GET['id_mobil'])) {
    $id_mobil = $_GET['id_mobil'];

    $sql = "DELETE FROM mobil WHERE id_mobil = $id_mobil";

    if ($conn->query($sql) === true) {
        header("Location: mobil.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid mobil ID.";
}

$conn->close();
