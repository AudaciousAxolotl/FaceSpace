<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/FaceSpace/Repositories/UserRepository.php');

$repo = new UserRepository();
$user = $repo->getUserByID($_GET["id"]);
?>

<!DOCTYPE html>
<html>
<head>
  <title><?php echo $user->firstName . " " . $user->lastName; ?></title>
</head>

<body>
  Name: <?php echo $user->firstName . " " . $user->lastName; ?><br>
  Birthday: <?php echo $user->dateOfBirth; ?><br>
  Bio: <?php echo $user->bio; ?><br>
  Interests: <?php echo $user->interests; ?><br>
  Job: <?php echo $user->job; ?><br>
  Employer: <?php echo $user->employer; ?><br>
  <button type="button">Edit Profile</button><br><br>

  New Post<br>
  <form action="../../Services/postService.php?id=3" method="post" id="makePostForm" name="makePostForm">
    <textarea rows="4" cols="50" name="msg">Enter text here</textarea><br>
    <input type="submit" value="Post">
  </form>
</body>

</html>
