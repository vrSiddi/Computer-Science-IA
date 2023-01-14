<?php
    include_once 'header.php';

    if(!isset($_SESSION["useruid"])){
        header("location: SignIn.php");
    }
?>


  <main>
    <div class = "container mt-3 ">
      <h2>My Profile</h2>
      <div class = "card mt-2 mx-auto w-50 p-3">
        <h4>User Name: <span id = "userN">Pereson</span></h4>
        
        <h4>Total Colleges: <span id = "totalC">4</span></h4>
        <h4>Total Essays: <span id = "totalE">5</span></h4>
        <h4>Total Completed Essays: <span id = "totalcE">3</span></h4>
        
        
      </div>
    </div>

    <?php 
    
    

        $uid = $_SESSION["userid"];
        $uName = $_SESSION["useruid"];
        $sql = "SELECT * FROM colleges WHERE userId = $uid;";
        $result = mysqli_query($conn, $sql);
        $numCol = mysqli_num_rows($result);

        $sqlE = "SELECT * FROM essays WHERE userId = $uid;";
        $resultE = mysqli_query($conn, $sqlE);
        $numEss = mysqli_num_rows($resultE);

        $sqlEC = "SELECT * FROM essays WHERE userId = $uid AND completed = 'Yes';";
        $resultEC = mysqli_query($conn, $sqlEC);
        $numEssC = mysqli_num_rows($resultEC);
        echo "<script>
          var un = document.getElementById('userN');      
          un.innerText = '$uName';
          var cn = document.getElementById('totalC');      
          cn.innerText = '$numCol';
          var en = document.getElementById('totalE');      
          en.innerText = '$numEss';
          var enc = document.getElementById('totalcE');      
          enc.innerText = '$numEssC';
        </script>";
        
        ?>
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