<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/FaceSpace/Repositories/PostRepository.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/FaceSpace/Models/Post.php');

echo $_POST["msg"];

$repo = new PostRepository();

$post = new Post();
$post->userId = $_GET["id"];
$post->msg = $_POST["msg"];
$post->datePosted = "0000-00-00";

$res = $repo->addPost($post);
if ($res)
{
    echo '{"added":true}';
}
else
{
    echo '{"added":false}';
}
?>
