<!DOCTYPE html>
<html lang="en">
<?php
session_start();

if(!$_SESSION['username']) {
    header( 'Location: login_form.php');
  }
require_once('../includes/connect.php');
$query = 'SELECT * FROM projects WHERE projects.id = :projectId';
$stmt = $connection->prepare($query);
$projectId = $_GET['id'];
$stmt->bindParam(':projectId', $projectId, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Page</title>
    <link rel="stylesheet" href="../css/main.css" type="text/css">

</head>
<body>
    <div class="adminContainer">

<img class="project-image" src='../images/<?php echo $row['image_url']?>' alt="project image" />

 
<form action="edit_project.php" method="POST">
<input name="pk" type="hidden" value="<?php echo $row['id']; ?>">
    <label for="title">project title: </label>
    <input name="title" type="text" value="<?php echo $row['title']; ?>" required><br><br>
    <label for="thumb">project thumbnail: </label>
    <input name="thumb" type="text" required value="<?php echo $row['image_url']; ?>"><br><br>
    <label for="desc">project description: </label>
    <textarea name="desc" required><?php echo $row['description']; ?></textarea><br><br>
    <input name="submit" type="submit" value="Edit">
</form>
<?php
$stmt = null;
?>

</body>
</body>
</html>


<style>

  .adminContainer{
    display:flex;
    flex-flow:column;
    width:100vw;
    align-items:center;
    justify-content:center;
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
