<?php
session_start();
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/FaceSpace/Repositories/UserRepository.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/FaceSpace/Repositories/PostRepository.php');

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
  <?php
  if ($user->userId == $_SESSION["id"])
  {
    echo '<form action="../../Views/UpdateProfile/index.php">';
    echo '<input type="hidden" value="' . $user->userId . '" name="id">';
    echo '<input type="submit" value="Edit Profile">';
    echo '</form>';
    echo 'New Post<br>';
    echo '<form action="../../Services/postService.php" method="post" id="makePostForm" name="makePostForm">';
    echo '<input type="hidden" value="' . $user->userId . '" name="id">';
    echo '<textarea rows="4" cols="50" name="msg">Enter text here</textarea><br>';
    echo '<input type="submit" value="Post">';
    echo '</form><br>';
  }
  else
  {
    echo '<form action="../../Services/friendService.php">';
    echo '<input type="hidden" value="' . $_SESSION["id"] . '" name="userId">';
    echo '<input type="hidden" value="' . $user->userId . '" name="friendId">';
    echo '<input type="submit" value="Add Friend">';
    echo '</form><br>';
  }
  ?>

  <h3>News Feed</h3>
  <?php
  $postRepo = new PostRepository();
  $res = $postRepo->getNewsFeedByUserID($user->userId);
  $n = count($res);
  for ($i = 0; $i < $n; $i++)
  {
    $id = $res[$i]->userId;
    $user = $repo->getUserByID($id);
    echo "Posted by " . $user->firstName . " " . $user->lastName . " on " . $res[$i]->datePosted . "<br>";
    echo '"' . $res[$i]->msg . '"';
    echo "<br><br>";
  }
  ?>
</body>

</html>
