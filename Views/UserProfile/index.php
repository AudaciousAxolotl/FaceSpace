<?php
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
  echo '<form action="../../Views/UpdateProfile/index.php">';
  echo '<input type="hidden" value="' . $user->userId . '" name="id">';
  ?>
    <input type="submit" value="Edit Profile">
  </form>
  <?php
  echo '<form action="../../Services/friendService.php">';
  echo '<input type="hidden" value="' . $user->userId . '" name="id">';
  ?>
    <input type="submit" value="Add Friend">
  </form><br>

  New Post<br>
  <?php
  echo '<form action="../../Services/postService.php" method="post" id="makePostForm" name="makePostForm">';
  echo '<input type="hidden" value="' . $user->userId . '" name="id">';
  ?>
    <textarea rows="4" cols="50" name="msg">Enter text here</textarea><br>
    <input type="submit" value="Post">
  </form><br>

  News Feed<br>
  <?php
  $postRepo = new PostRepository();
  $res = $postRepo->getNewsFeedByUserID($user->userId);
  $n = count($res);
  for ($i = 0; $i < $n; $i++)
  {
    echo $res[$i]->msg;
    echo "<br>";
  }
  ?>
</body>

</html>
