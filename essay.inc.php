<?php
session_start();
   $servername = "localhost";
   $dBUsername = "root";
   $dBPassword = "";
   $dBName= "Login System";
   
   $conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);
   
   if(!$conn){
       die("Connection failed: " . mysqli_connect_error());
   }

//Add New Essay Information
   if(isset($_POST["add"])){
    $ep = $_POST["newPrompt"];
    $wl = $_POST["newWord"];
    $uid = $_SESSION["userid"];
    $cid = $_SESSION['cCollege'];
    $com = 'No';
    echo $ep . "<br>";
    echo $wl . "<br>";
    echo $uid . "<br>";
    echo $cid ."<br>";
    echo $com;

    $sql = "INSERT INTO essays (essayPrompt, wordLimit, completed, collegeId, userId) VALUES ('$ep', '$wl', '$com', '$cid', '$uid');";
     mysqli_query($conn, $sql);
     header("location: ../essay.php");
    
   }

//Update Essay Info
   if(isset($_POST["updateEssay"])){
    $nEP = $_POST["updateEP"];
    $nWL = $_POST["updateWL"];
    $hidden = $_POST["getEID"];
    $eId = $_SESSION['eID'.$hidden];
    $cid = $_SESSION['cCollege'];
    echo $nEP . "<br>";
    echo $nWL . "<br>";
    echo $eId . "<br>";

    $sql = "UPDATE essays SET essayPrompt = '$nEP', wordLimit = '$nWL'
    WHERE essayId = '$eId' AND collegeId = '$cid'";
    $run = mysqli_query($conn, $sql);
    if($run){
    header("location: ../essay.php");
    } 
    else{
      die(mysqli_error($conn));
    }

   }

//Delete Essay
if(isset($_POST["deleteE"])){
    $del = $_POST["delEID"];
    $eLoc = $_SESSION['eID'.$del];
    echo $eLoc;
    $sql = "DELETE FROM essays WHERE essayId = '$eLoc'";
    $run = mysqli_query($conn, $sql);
    if($run){
    header("location: ../essay.php");
    } 
    else{
      die(mysqli_error($conn));
    }
}

//Update Responses
if(isset($_POST["save"])){
    $loc = $_POST['save'];
    $index = $_SESSION['eID'.$loc];
    $rsp =  $_POST["rsp".$loc];
    
    $nt = $_POST["nt".$loc];
    
    $comp;
    if(isset($_POST["complete".$loc])){
        $comp = "Yes";
    }else{
        $comp = "No";
    }
    echo $rsp . "<br>";
    echo $nt . "<br>";
    echo $comp . "<br>";
    echo $index;
    
    /*$sql = "UPDATE essays SET response = '$rsp', notes = '$nt', completed = '$comp'
    WHERE essayId = '$index'";
    $run = mysqli_query($conn, $sql);*/

    $sql = "UPDATE essays SET response = ?, notes = ?, completed = ?
    WHERE essayId = ?";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
      die(mysqli_error($conn));
    }else{
      mysqli_stmt_bind_param($stmt, "sssi", $rsp, $nt, $comp, $index);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);
      header("location: ../essay.php");
    }

    /*if($run){
    header("location: ../essay.php");
    } 
    else{
      die(mysqli_error($conn));
    }*/
    
}