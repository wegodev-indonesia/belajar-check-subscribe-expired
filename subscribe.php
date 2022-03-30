<?php
    include_once('connection.php');
    include_once('lib.php');

    session_start();

    //user wajib login
    if(!$_SESSION['user_id']){
        header('location: login.php');
        exit();
    }

    //insert data to database
    $user_id = $_SESSION['user_id'];
    $expired = nextMonth();
    $datetime = now();

    //pdo insert data
    $sql = "INSERT INTO subscribes (user_id, expired_at, created_at) VALUES (:user_id, :expired_at, :created_at)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':expired_at', $expired);
    $stmt->bindParam(':created_at', $datetime);
    $stmt->execute();

    header('Location: index.php');