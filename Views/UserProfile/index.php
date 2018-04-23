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
  <meta charset = "utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
</head>
<style>
body {
  background-color: #e3d4f7;
  font-family: 'Raleway', sans-serif;
}
</style>
<body>
  <h3>Name: <?php echo $user->firstName . " " . $user->lastName; ?></h3>
  <h3>Birthday: <?php echo $user->dateOfBirth; ?></h3>
  <h3>Bio: <?php echo $user->bio; ?></h3>
  <h3>Interests: <?php echo $user->interests; ?></h3>
  <h3>Job: <?php echo $user->job; ?></h3>
  <h3>Employer: <?php echo $user->employer; ?></h3>
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
<div class="container">
  <h3>New Post</h3>
  <?php
  echo '<form action="../../Services/postService.php" method="post" id="makePostForm" name="makePostForm">';
  echo '<input type="hidden" value="' . $user->userId . '" name="id">';
  ?>
    <textarea class="form-control" rows="4" cols="50" name="msg">Enter text here</textarea><br>
    <button type="submit" class="btn btn-default">Post</button>
  </form>
</div>

<div class="container">
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
</div>
</body>

</html>
