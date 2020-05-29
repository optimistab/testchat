<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Register Page</title>
  </head>
  <body>


<div class="col-lg-5 col-lg-offset-2">
      <h1>Register Page:</h1>
      <p>Fill in the details to Register on our website</p>
      <?php if(isset($_SESSION['success'])){?>
        <div class ="alert alert success"> <?php echo $_SESSION['success'];?></div>
        <?php
      } ?>

      <?php echo validation_errors('<div class="alert alert danger">','</div>'); ?>

      <form action="" method="POST">

      <div class="form-group">
        <label for="username">Username:</label>
        <input class="form-control" name="username" id="username" type="text">
      </div>

      <div class="form-group">
        <label for="email">Email:</label>
        <input class="form-control" name="email" id="email" type="text">
      </div>

      <div class="form-group">
        <label for="password">Password:</label>
        <input class="form-control" name="password" id="password" type="password">
      </div>

      <div class="form-group">
        <label for="password">Confirm Password:</label>
        <input class="form-control" name="password2" id="password" type="password">
      </div>

      <div class="form-group">
        <label for="gender">Gender:</label>
        <select class="form-control" id="gender" name="gender">
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
      </div>

      <div class="form-group">
        <label for="phone">Phone:</label>
        <input class="form-control" name="phone" id="phone" type="number">
      </div>

      <div>
        <button class="btn btn-primary" name="register">Register</button>
      </div>
      </form>

</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  </body>
</html>
