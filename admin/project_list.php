<!DOCTYPE html>
<html lang="en">

<?php
session_start();

if(!$_SESSION['username']) {
    header( 'Location: login_form.php');
  }
require_once('../includes/connect.php');
$stmt = $connection->prepare('SELECT id,title,image_url FROM projects ORDER BY title ASC');
$stmt->execute();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS Main Page</title>
    <link rel="stylesheet" href="../css/main.css" type="text/css">

</head>
<body>

<div class="adminWrapper">
<ul class="adminMenu">
<li><a href="messages.php">Messages</a></li>
<li><a href="profile.php">Profile</a></li>
<li><a href="project_list.php">Projects</a></li>
<li><a href="logout.php">Logout</a></li>

</ul>
<?php

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

  echo  '<div class="project-item">'.
  '<img class="project-image" src="../images/'.$row['image_url'].'" alt="project image">'.
  $row['title'].
  '<a href="edit_project_form.php?id='.$row['id'].'">edit</a>'.
  '<a href="delete_project.php?id='.$row['id'].'">delete</a>
  </div>';



}

$stmt = null;

?>
<form action="upload.php" method="post" enctype="multipart/form-data">
<h3>Upload Project Image</h3>

<label for="uploaded">Select an Image</label>
<input type="file" name="uploaded" id="uploaded"><br>
<input type="submit" value="upload">
</form>
<br>
<form action="add_project.php" method="post">
<h3>Add a New Project</h3>

    <label for="title">project title: </label>
    <input name="title" type="text" required><br><br>
    <label for="thumb">Project Thumbnail: </label>
    <input name="thumb" type="text" value="<?php echo isset($_SESSION['thumb']) ? $_SESSION['thumb'] : ''; ?>" required><br><br>
    <label for="desc">project description: </label>
    <textarea name="desc" required></textarea><br><br>
    <input name="submit" type="submit" value="Add">
</form>
</div>
</body>
</html>

<style>
.adminWrapper{
    height:100vh;
    width:100vw;
    display:flex;
    margin:0px;
    padding:0px;

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
  body{
    background-color:white;
  }
  *{
    color:black;
  }
  input{
    color:black;
  }

  .adminContainer{
    display:flex;
    flex-flow:row;
  }
  .project-item{
    display:flex;
    flex-flow:column;
    margin:20px;
  }
.project-image{
  object-fit: contain;
width: 100%;
height: 250px;

}

form{
  display:flex;
  flex-flow:column;
  width:50vw;
  margin:20px;
}

form input, textarea{
  border:2px solid black;
}

input[type=submit]{
  padding:10px;
}
  </style>
