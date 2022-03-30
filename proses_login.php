<?php
    include_once('connection.php');

    //check required fields
    if(empty($_POST['email']) || empty($_POST['password'])){
        header('Location: login.php?error=field_required&email='.$_POST['email']);
        exit();
    }

    //login email password
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if($row){
        if(password_verify($_POST['password'], $row['password'])){
            session_start();
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['fullname'] = $row['fullname'];
            header('Location: index.php');
            exit();
        }else{
            header('Location: login.php?error=wrong_password&email='.$_POST['email']);
            exit();
        }
    }

    header('Location: login.php?error=email_not_found&email='.$_POST['email']);