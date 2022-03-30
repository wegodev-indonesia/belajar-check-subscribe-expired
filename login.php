<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap-5.1.3-dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/style.css" />
        <title>Login</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="mt-3 p-5 col-6 offset-3">
                    <?php if(isset($_GET['success'])): ?>
                        <div class="alert alert-success" role="alert">
                            Register berhasil !
                        </div>
                    <?php elseif(isset($_GET['error'])): ?>
                        <?php if($_GET['error'] == 'field_required'): ?>
                            <div class="alert alert-danger" role="alert">
                                Seluruh field harus di isi !
                            </div>
                        <?php elseif($_GET['error'] == 'email_not_found'): ?>
                            <div class="alert alert-danger" role="alert">
                                Email tidak ditemukan !
                            </div>
                        <?php elseif($_GET['error'] == 'wrong_password'): ?>
                            <div class="alert alert-danger" role="alert">
                                Password salah !
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <div class="card shadow">
                        <h5 class="card-header">Login</h5>
                        <div class="card-body">
                            <form action="proses_login.php" method="post">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input name="email" type="email" class="form-control" id="email">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input name="password" type="password" class="form-control" id="password">
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-sm btn-primary">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <p class="mt-2 text-center text-muted">Belum punya akun ? <a href="register.php">buat akun</a></p>
                </div>
            </div>
        </div>
    </body>
</html>