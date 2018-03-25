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
  <textarea rows="4" cols="50" name="msg" form="makePostForm">Enter text here</textarea>
  <form action="../../Services/postService.php" method="post" id="makePostForm" name="makePostForm">
    <input type="submit" value="Post">
  </form>
</body>
</html>
