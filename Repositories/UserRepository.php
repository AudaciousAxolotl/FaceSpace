<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/FaceSpace/Repositories/Repository.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/FaceSpace/Models/User.php');

class UserRepository extends Repository
{
    function addUser($newUser)
    {
        $sql = "INSERT INTO `users` (
            `username`,
            `password`,
            `firstName`,
            `lastName`,
            `dateOfBirth`,
            `bio`,
            `interests`,
            `job`,
            `employer`,
            `isSuspended`,
            `isPublic`,
            `profilePicture`) VALUES (
            '$newUser->username',
            '$newUser->password',
            '$newUser->firstName',
            '$newUser->lastName',
            '$newUser->dateOfBirth',
            '$newUser->bio',
            '$newUser->interests',
            '$newUser->job',
            '$newUser->employer',
            '" . ($newUser->isSuspended ? "1" : "0") . "',
            '" . ($newUser->isPublic ? "1" : "0") . "',
            '$newUser->profilePicture')";
        return $this->conn->query($sql) === TRUE;
    }

    function addFriend($userId, $friendId)
    {
        $sql = "INSERT INTO `friends` VALUES ('$userId', '$friendId')";
        return $this->conn->query($sql) === TRUE;
    }

    function updateUserProfile($id, $bio, $interests, $job, $employer)
    {
        $sql = "UPDATE `users` SET
            `bio` = '" . $bio . "',
            `interests` = '" . $interests . "',
            `job` = '" . $job . "',
            `employer` = '" . $employer . "'
            WHERE `userId` = '" . $id . "'";
        return $this->conn->query($sql) === TRUE;
    }

    function doesUserExist($username)
    {
        $sql = "SELECT `username` FROM `users` WHERE `username` LIKE '" . $username . "'";
        $res = $this->conn->query($sql);
        return $res->num_rows > 0;
    }

    function getUsersByFirstName($name)
    {
        $sql = "SELECT * FROM `users` WHERE `firstName` LIKE '%" . $name . "%'";
        $res = $this->conn->query($sql);
        $resultsArray = [];
        if ($res->num_rows > 0)
        {
            while ($row = $res->fetch_assoc())
            {
                $user = new User();
                $user->userId = $row["userId"];
                $user->username = $row["username"];
                $user->password = $row["password"];
                $user->firstName = $row["firstName"];
                $user->lastName = $row["lastName"];
                $user->dateOfBirth = $row["dateOfBirth"];
                array_push($resultsArray, $user);
            }
        }
        return $resultsArray;
    }

    function getUserByID($id)
    {
        $sql = "SELECT * FROM `users` WHERE `userId` = '" . $id . "'";
        $res = $this->conn->query($sql);
        $row = $res->fetch_assoc();
        $user = new User();
        $user->userId = $row["userId"];
        $user->username = $row["username"];
        $user->password = $row["password"];
        $user->firstName = $row["firstName"];
        $user->lastName = $row["lastName"];
        $user->dateOfBirth = $row["dateOfBirth"];
        $user->bio = $row["bio"];
        $user->interests = $row["interests"];
        $user->job = $row["job"];
        $user->employer = $row["employer"];
        return $user;
    }
}
?>
