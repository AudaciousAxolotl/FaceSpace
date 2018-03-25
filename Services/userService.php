<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/FaceSpace/Repositories/UserRepository.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/FaceSpace/Models/User.php');

$repo = new UserRepository();

$user = new User();
$user->username = $_POST["username"];
$user->password = $_POST["password"];
$user->firstName = $_POST["firstName"];
$user->lastName = $_POST["lastName"];
$user->dateOfBirth = $_POST["dateOfBirth"];

if (!$repo->doesUserExist($user->username))
{
    $res = $repo->addUser($user);
    echo '{"created":true}';
}
else
{
    echo '{"created":false}';
}
?>
