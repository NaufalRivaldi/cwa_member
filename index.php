<!doctype html>
<html lang="en">
    <head>
        <!-- head -->
        <?php require "head.php"; ?>
    </head>
    <body>
        <!-- konten -->
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="konten-new">
                        <center>
                            <img src="img/logo.png" alt="logo-member" width="80%">
                        </center>
                        <div class="group">
                            <form method="POST" id="form-member">
                                <div class="form-group">
                                    <input type="text" name="kdmember" class="form-custom" id="kdmember"  placeholder="No Member : xxx-xxxx" onkeyup="convertToMin(this);" onkeypress="return hanyaAngka(event)" maxlength="8">
                                </div>
                            </form>
                            <button class="btn btn-warning btn-block btn-lg view-btn" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-coins"></i> Cek Poin</button>
                            <p class="copy-right">&copy; Copyright 2019 - Citra Warna. Design by Naufal Rivaldi</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
        
        <!-- JS -->
        <?php require "js.php" ?>
        <?php require "modal.php" ?>
    </body>
</html>