<?php
    include_once('connection.php');
    include_once('lib.php');

    //check required fields
    if(empty($_POST['fullname']) || empty($_POST['email']) || empty($_POST['password'])){
        header('Location: register.php?error=field_required&fullname='.$_POST['fullname'].'&email='.$_POST['email']);
        exit();
    }

    //check if password and repassword match
    if($_POST['password'] != $_POST['repassword']){
        header('Location: register.php?error=password_not_match&fullname='.$_POST['fullname'].'&email='.$_POST['email']);
        exit();
    }

    //check email exist
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if($row){
        header('Location: register.php?error=email_exist&fullname='.$_POST['fullname'].'&email='.$_POST['email']);
        exit();
    }

    //insert data to database
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $created_at = now();

    //pdo insert data
    $sql = "INSERT INTO users (fullname, email, password, created_at) VALUES (:fullname, :email, :password, :created_at)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':fullname', $fullname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':created_at', $created_at);
    $stmt->execute();

    header('Location: login.php?success=register_success');