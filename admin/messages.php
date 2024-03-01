<?php
// Include the connection file
session_start();

if(!$_SESSION['username']) {
    header( 'Location: login_form.php');
  }
require '../includes/connect.php';

// Function to safely generate a delete link with a record ID
function generateDeleteLink($recordId) {
    return '<a href="delete_message.php?id=' . $recordId . '">Delete</a>';
}

// Fetch data from the messages table
$sql = "SELECT * FROM messages";
$result = $connection->query($sql);

echo '<div class="adminWrapper">
<div class="main-container">
<ul class="adminMenu">
<li><a href="messages.php">Messages</a></li>
<li><a href="profile.php">Profile</a></li>
<li><a href="project_list.php">Projects</a></li>
<li><a href="logout.php">Logout</a></li>

</ul>
';

// Check if there are any records
if ($result->rowCount() > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        // Output HTML content with data and a delete button for each record
        echo '<div class="message-container">';
        echo '<h2>' . htmlspecialchars($row['firstname'] . ' ' . $row['lastname']) . '</h2>';
        echo '<p>Email: ' . htmlspecialchars($row['email']) . '</p>';
        echo '<p>Message: ' . htmlspecialchars($row['message']) . '</p>';
        
        // Generate a delete button with a link to delete.php passing the record ID
        echo generateDeleteLink($row['id']);
        
        echo '</div>';
    }
} else {
    echo '<p>No messages found.</p>';
}
echo '</div></div>';
// Close the PDO connection
$connection = null;
?>


<style>

* {
    margin: 0;
    padding: 0;
    border: 0;
    outline: 0;
    list-style: none;
    text-decoration: none;
    box-sizing: border-box;
}

.adminMenu{
    font-family:montserrat;

    display:flex;
    position:fixed;
    bottom:20px;
    right:20px;
    width:auto;    
    justify-content:space-between;
    list-style:none;
    padding:20px;
    margin-top:20px;
    margin-bottom:20px;
}

.adminMenu li a{
    color:white;
    font-size:20px;
    background-color:black;
    border-radius:10px;
    padding:20px;
    margin-left:10px;

}
    .main-container{
        display: flex;
        flex-flow:column;
        flex:1 0 60%;
        max-width:60%;
        overflow:scroll;
        position: relative;
    }
.message-container{
    display: flex;
    flex-flow:column;
    width:100%;
    background-color:#ae67ff;
    padding:20px;
    padding-left:40px;
    font-family:montserrat;
}

.main-container > .message-container:nth-child(even){
    background-color:#703bad;
}

.adminWrapper{
    height:100vh;
    width:100vw;
    display:flex;
    margin:0px;
    padding:0px;

}
</style>