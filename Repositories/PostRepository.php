<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/FaceSpace/Repositories/Repository.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/FaceSpace/Repositories/UserRepository.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/FaceSpace/Models/Post.php');

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

    function getNewsFeedByUserID($id)
    {
        $repo = new UserRepository();
        $arr = $repo->getFriends($id);
        $sql = "SELECT *
            FROM `posts`
            WHERE `userId` = $id
            OR `userId`
            IN (" . implode(', ', $arr) . ")
            ORDER BY `datePosted` DESC
            LIMIT 10";
        $res = $this->conn->query($sql);
        $resultsArray = [];
        if ($res->num_rows > 0)
        {
            while ($row = $res->fetch_assoc())
            {
                $post = new Post();
                $post->userId = $row["userId"];
                $post->msg = $row["msg"];
                $post->datePosted = $row["datePosted"];
                array_push($resultsArray, $post);
            }
        }
        return $resultsArray;
    }
}
?>
