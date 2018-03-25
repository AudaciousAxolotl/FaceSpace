<!DOCTYPE html>
<html>
<head>
  <title>FaceSpace</title>
</head>

<body>
  Welcome to FaceSpace!<br>
  <form action="./Views/SearchResults/index.php" method="get">
    <input type="text" placeholder="Search" id="search" name="search">
    <input type="submit" value="Go">
  </form>
  <br>
  Sign Up<br>
  <form action="./Services/userService.php" method="post" id="signup" name="signup">
    <input type="text" name="username" placeholder="Username"><br>
    <input type="password" name="password" placeholder="Password"><br>
    <input type="text" name="firstName" placeholder="First name"><br>
    <input type="text" name="lastName" placeholder="Last name"><br>
    Birthday:<br>
    <input type="date" name="dateOfBirth"><br>
    <input type="submit" value="Create Account">
  </form>
</body>
</html>
