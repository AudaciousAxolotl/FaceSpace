<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/FaceSpace/Repositories/UserRepository.php');

$repo = new UserRepository();

$res = $repo->addFriend($_GET["userId"], $_GET["friendId"]);
if ($res)
{
    echo '{"added":true}';
}
else
{
    echo '{"added":false}';
}
?>
