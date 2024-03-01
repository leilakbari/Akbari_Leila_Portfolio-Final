<?php
// Include the connection file
session_start();

if(!$_SESSION['username']) {
    header( 'Location: login_form.php');
  }
require '../includes/connect.php';

// Check if the ID parameter is set
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the record with the specified ID
    $sql = "DELETE FROM messages WHERE id = :id";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    try {
        $stmt->execute();
        echo "Record with ID $id has been deleted successfully.";
        header('Location: ../admin/messages.php');

    } catch (PDOException $e) {
        echo "Error deleting record: " . $e->getMessage();
    }
} else {
    echo "Invalid ID parameter.";
}

// Close the PDO connection
$connection = null;
?>
