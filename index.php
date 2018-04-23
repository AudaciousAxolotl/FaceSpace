<!DOCTYPE html>
<html>
<head>
  <title>FaceSpace</title>
  <meta charset = "utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
</head>

<body>
<form action="./Views/SearchResults/index.php" method="get">
  <input type="text" placeholder="Search" id="search" name="search">
  <input type="submit" value="Go">
</form>
<div class = "jumbotron text-center">
  <h1>Welcome to FaceSpace!</h1>
</div>
<div class = "container" >
  <h3>Sign up</h3>
  <form class = "form-horizontal" action = "./Service/userService.php" method = "post" id = "signup" name="signup">
    <div class = "form-group">
      <label class="control-label col-sm-2" for="username">Username:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="username" placeholder="Username"><br>
      </div>
    </div>
    <div class = "form-group">
      <label class="control-label col-sm-2" for="Password">Password:</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" name="password" placeholder="Password"><br>
      </div>
    </div>
    <div class = "form-group">
      <label class="control-label col-sm-2" for="firstname">First Name:</label>
      <div class="col-sm-10">
      <input type="text" class="form-control" name="firstName" placeholder="First name"><br>
      </div>
    </div>
    <div class = "form-group">
      <label class="control-label col-sm-2" for="lastname">Last Name:</label>
      <div class="col-sm-10">
      <input type="text" class="form-control" name="lastName" placeholder="Last name"><br>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-offset-2 col-sm-10" for="dateofBirth">Birthday</label>
      <div class="col-sm-10">
        <input type="date" name="dateOfBirth"><br>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Create Account</button>
      </div>
    </div>
  </form>
</div>
</body>
</html>
