<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/FaceSpace/Repositories/UserRepository.php');

$repo = new UserRepository();

// FIXME: Remove hard-coded user ID once login is implemented
// Use another GET variable (Note: only use session variables in Views)
$res = $repo->addFriend(1, $_GET["id"]);
if ($res)
{
    echo '{"added":true}';
}
else
{
    echo '{"added":false}';
}
?>
