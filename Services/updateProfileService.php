<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/FaceSpace/Repositories/UserRepository.php');

$repo = new UserRepository();

$res = $repo->updateUserProfile($_GET["id"], $_POST["bio"], $_POST["interests"], $_POST["job"], $_POST["employer"]);
if ($res)
{
    echo '{"updated":true}';
}
else
{
    echo '{"updated":false}';
}
?>
