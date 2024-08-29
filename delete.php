<?php include('db.php'); ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM product WHERE ID = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
