<?php

function emptyInputSignup($username, $pswd, $pswd2){
    $result;
    if(empty($username) || empty($pswd) || empty($pswd2)){
        $return = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidUid($username){
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $return = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function pwdMatch($pswd, $pswd2){
    $result;
    if($pswd !== $pswd2){
        $return = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function uidExists($conn, $username){
    $sql = "SELECT * FROM users WHERE usersUid = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../SignUp.php?error=usernametaken");
        exit();       
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    } 
    else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $username, $pswd){
    $sql = "INSERT INTO users (usersUid, usersPwd) VALUES (?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../SignUp.php?error=stmtfailed");
        exit();       
    }

    $hashedPwd = password_hash($pswd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ss", $username, $hashedPwd);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    header("location: ../SignUp.php?error=none");
    exit();
     
}

function emptyInputLogin($username, $pswd){
    $result;
    if(empty($username) || empty($pswd)){
        $return = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $pswd){
    $uidExists = uidExists($conn, $username);

    if($uidExists === false){
        header("location: ../SignIn.php?error=wronglogin");
        exit();
    }

    $pswdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pswd, $pswdHashed);

    if($checkPwd === false){
        header("location: ../SignIn.php?error=wronglogin");
        exit();
    }
    else if($checkPwd === true){
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        header("location: ../index.php");
        exit();
    }
}
