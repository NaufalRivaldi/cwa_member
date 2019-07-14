<!doctype html>
<html lang="en">
    <head>
        <!-- head -->
        <?php require "head.php"; ?>
    </head>
    <body>
        <!-- konten -->
        <div class="wreaper">
            <div class="konten">
                <img src="../img/logo.png" alt="logo-member" width="100%"><br>
                <div class="group">
                    <form method="POST" action="login.php" id="form-member">
                        <center>
                            <h4>Login</h4>
                        </center>
                        <div class="form-group">
                            <input type="text" name="username" class="form-custom2" id="kdmember"  placeholder="Username">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-custom2" id="kdmember"  placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-warning btn-block btn-lg view-btn">Login</button>
                    </form>
                    <p class="copy-right">&copy; Copyright 2019 - Citra Warna. Design by Naufal Rivaldi</p>
                </div>
            </div>
        </div>
        
        <!-- JS -->
        <?php require "js.php" ?>
        <?php require "../modal.php" ?>
    </body>
</html>