<?php
    session_start();
    include_once('lib.php');
    include_once('connection.php');

    //user wajib login
    if(!$_SESSION['user_id']){
        header('location: login.php');
        exit();
    }

    //get subscibe
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM users u JOIN subscribes s ON u.id=s.user_id WHERE u.id = :id AND s.status = 'active'";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $user_id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if($row){
        //if now more then expired_at
        if(checkIsExpired($row['expired_at'])){
            //set status to expired
            setExpired($pdo, $user_id);
            header('Location: index.php?error=subscribe_expired');
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap-5.1.3-dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/style.css" />
        <title>Dashboard</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="mt-3 p-5 col-6 offset-3">
                    <?php if(isset($_GET['error'])): ?>
                        <div class="alert alert-danger" role="alert">
                            Waktu subsribe kamu berakhir !
                        </div>
                    <?php endif; ?>
                    <div class="card shadow">
                        <h5 class="card-header">Dashboard</h5>
                        <div class="card-body">
                            <p>Selamat datang, <strong><?php echo $_SESSION['fullname']; ?></strong></p>
                            <?php if($row): ?>
                                <p>Subscribe kamu berlaku sampai <strong><?php echo $row['expired_at'] ?></strong></p>
                            <?php else: ?>
                                <p>Kamu belum melakukan subscribe, <a href="subscribe.php">subscribe sekarang</a></p>
                            <?php endif; ?>
                            <a href="logout.php" class="btn btn-sm btn-danger">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>