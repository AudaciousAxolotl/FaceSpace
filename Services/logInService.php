<?php
session_start();
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/FaceSpace/Repositories/UserRepository.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/FaceSpace/Models/User.php');

$repo = new UserRepository();

$username = $_POST["username"];
$password = $_POST["password"];
if ($repo->doesUserExist($username))
{
    $user = $repo->getUserByUsername($username);
    if ($password == $user->password)
    {
        $_SESSION["id"] = $user->userId;
        ob_start();
        header("Location: ../Views/UserProfile/index.php?id=" . $user->userId);
        ob_end_flush();
        die();
    }
    else
    {
        echo "Incorrect password";
    }
}
else
{
    echo "Invalid username";
}
?>
