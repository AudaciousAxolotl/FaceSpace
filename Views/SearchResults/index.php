<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/FaceSpace/Repositories/UserRepository.php');

$repo = new UserRepository();

$name = $_GET["search"];
$res = $repo->getUsersByFirstName($name);
$n = count($res);
if ($n > 0)
{
    for ($i = 0; $i < $n; $i++)
    {
        echo '<a href="../UserProfile/index.php?id=' . $res[$i]->userId . '">' . $res[$i]->firstName . " " . $res[$i]->lastName . '</a>';
        echo '<br>';
    }
}
else
{
    echo 'No results found';
}
?>
