<?php
  require_once '../includes/dbconfig.php';


  if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare and execute the DELETE query
    $sql = "DELETE FROM lease WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        // Redirect to the tenant list page if the DELETE query was successful
        header('location: lease.php');
        exit;
    }
}
?>