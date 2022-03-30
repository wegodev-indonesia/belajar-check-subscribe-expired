<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap-5.1.3-dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/style.css" />
        <title>Register</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="mt-3 p-5 col-6 offset-3">
                    <?php if(isset($_GET['error'])): ?>
                        <?php if($_GET['error'] == 'field_required'): ?>
                            <div class="alert alert-danger" role="alert">
                                Seluruh field harus di isi !
                            </div>
                        <?php elseif($_GET['error'] == 'password_not_match'): ?>
                            <div class="alert alert-danger" role="alert">
                                Password dan Re-Password tidak sama !
                            </div>
                        <?php elseif($_GET['error'] == 'email_exist'): ?>
                            <div class="alert alert-danger" role="alert">
                                Email sudah terdaftar !
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <div class="card shadow">
                        <h5 class="card-header">Register</h5>
                        <div class="card-body">
                            <form action="proses_register.php" method="post">
                                <div class="mb-3">
                                    <label for="fullname" class="form-label">Full name</label>
                                    <input type="text" name="fullname" class="form-control" id="fullname" value="<?php echo isset($_GET['fullname']) ? $_GET['fullname'] : '';  ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" value="<?php echo isset($_GET['email']) ? $_GET['email'] : '';  ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="password">
                                </div>
                                <div class="mb-3">
                                    <label for="repassword" class="form-label">Re-Password</label>
                                    <input type="password" name="repassword" class="form-control" id="repassword">
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-sm btn-primary">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <p class="mt-2 text-center text-muted">Sudah punya akun ? <a href="login.php">masuk</a></p>
                </div>
            </div>
        </div>
    </body>
</html>