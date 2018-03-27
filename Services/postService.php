<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/FaceSpace/Repositories/PostRepository.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/FaceSpace/Models/Post.php');

$repo = new PostRepository();

$post = new Post();
$post->userId = $_GET["id"];
$post->msg = $_POST["msg"];

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
