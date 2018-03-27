<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/FaceSpace/Repositories/Repository.php');

class PostRepository extends Repository
{
    function addPost($newPost)
    {
        $sql = "INSERT INTO `posts` (
            `userId`,
            `msg`,
            `datePosted`) VALUES (
            '$newPost->userId',
            '$newPost->msg',
            NOW())";
        return $this->conn->query($sql) === TRUE;
    }
}
?>
