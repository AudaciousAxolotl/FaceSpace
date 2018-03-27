<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/FaceSpace/Repositories/UserRepository.php');

$repo = new UserRepository();
$user = $repo->getUserByID($_GET["id"]);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Profile</title>
</head>

<body>
  <?php
  echo '<form action="../../Services/updateProfileService.php?id=' . $user->userId . '" method="post" id="updateProfileForm" name="updateProfileForm">';
  ?>
    Bio:<br>
    <textarea rows="4" cols="50" name="bio"><?php echo $user->bio; ?></textarea><br>
    Interests:<br>
    <textarea rows="4" cols="50" name="interests"><?php echo $user->interests; ?></textarea><br>
    Job:<br>
    <input type="text" name="job"><br>
    Employer:<br>
    <input type="text" name="employer"><br>
    <input type="submit" value="Save Changes">
  </form>
</body>
</html>
