<?php
// Include the connection file
require_once('connect.php');

// Get form data
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$message = $_POST['message'];

// Insert data into the database
$sql = "INSERT INTO messages (firstname, lastname, email, message) VALUES (:firstname, :lastname, :email, :message)";
$stmt = $connection->prepare($sql);
$stmt->bindParam(':firstname', $firstname, PDO::PARAM_STR);
$stmt->bindParam(':lastname', $lastname, PDO::PARAM_STR);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->bindParam(':message', $message, PDO::PARAM_STR);

try {
    $stmt->execute();
    echo "New record created successfully";
    header('Location: ../index.php');

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the PDO connection (this line is optional as PHP automatically closes the connection at the end of the script)
$connection = null;
?>
