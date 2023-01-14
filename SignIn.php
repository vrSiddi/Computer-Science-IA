<?php
    include_once 'header.php';
?>
  <main>
    <div class="container mt-2">
    <h2>Sign In</h2>
    <!--Sign In Form-->
    <form action="includes/signin.inc.php" method = "post">
        <div class="mb-3 mt-3">
          <label for="username" class="form-label">Username:</label>
          <input type="text" class="form-control" id="uName" placeholder="Enter username" name="username">
        </div>
        <div class="mb-3">
          <label for="pwd" class="form-label">Password:</label>
          <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
        </div>
        <button type="submit" class="btn btn-primary" name = "sub">Log In</button>
      </form>
      <?php 
            if(isset($_GET["error"])){
              if($_GET["error"] == "emptyinput"){
                echo "<p>Fill in all fields!</p>";
              }
              else if($_GET["error"] == "wronglogin"){
                echo "<p>Incorrect login information</p>";
              }
              
            }
  
          ?>
    </div>

    <!--Create Account Link-->
    <p class="mt-2 ms-5 ps-4">Don't have an account? <a href = "SignUp.php">Create one now.</a></p>


  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>