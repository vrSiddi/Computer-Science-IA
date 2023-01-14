<?php
    include_once 'header.php';
   
?>

  <main>
    <div class="container mt-2">
        <h2>Create an Account</h2>
        <!--Sign In Form-->
        <form action="includes/signup.inc.php" method = "post">
            <div class="mb-3 mt-3">
              <label for="Enter username" class="form-label">Username:</label>
              <input type="text" class="form-control" id="uName" placeholder="Enter username" name="username">
            </div>
            <div class="mb-3">
              <label for="pwd" class="form-label">Enter Password:</label>
              <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
            </div>
            <div class="mb-3">
                <label for="pwd2" class="form-label">Re-enter Password:</label>
                <input type="password" class="form-control" id="pwd2" placeholder="Re-enter password" name="pswd2">
              </div>
            <button type="submit" class="btn btn-primary" name = "sub">Create Account</button>
          </form>
          <?php 
            if(isset($_GET["error"])){
              if($_GET["error"] == "emptyinput"){
                echo "<p>Fill in all fields!</p>";
              }
              else if($_GET["error"] == "invaliduid"){
                echo "<p>Choose a proper username!</p>";
              }
              else if($_GET["error"] == "passwordsdontmatch"){
                echo "<p>Passwords don't match</p>";
              }
              else if($_GET["error"] == "stmtfailed"){
                echo "<p>Something went wrong, try again!</p>";
              }
              else if($_GET["error"] == "usernametaken"){
                echo "<p>Username already taken!</p>";
              } 
              else if($_GET["error"] == "none"){
                echo "<p>You have signed up! Go to the Login Page to access your account.</p>";
              }
            }
  
          ?>
          
        </div>
        
        <!--Create Account Link-->
        <p class="mt-2 ms-5 ps-4"> <a href = "signIn.php">I already have an account.</a></p>
 
        
 
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