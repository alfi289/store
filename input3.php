<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Alfi</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="input.php">Store<span class="sr-only">(current)</span></a>
            </li>
        </ul>   
        <form class="form-inline my-2 my-lg-0">
            <a class="nav-link" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                Alfi
            </a>
            <a class="btn btn-outline-success" href="logout.php" onclick="myFunction()">Log Out</a>
        </form>
    </div>
</nav>

    <div class="container" style="padding:20px;">
    <div class="row" style="padding:20px;">
      <div class="col-md-12">
        <div class="card">
            <?php
            if(isset($_POST['byr'])){
                $hasa = $_POST['hasa'];
                $jubar = $_POST['jubar'];

                $num = $_POST['num'];
                $total = $_POST['total'];
                $kem = $num - $total;


            }
            ?>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>Kembalian</th>
                            <td align="right"><?= "Rp. $kem"; ?></td>
                        </tr>
                    </table>
                    
                    <div class="form-control"><center>Lanjut?</center></div>
                    <form action="" method="post">
                    <table class="table">
                        <tr>
                            <td align="center">Mau Lanjut?</td>
                            <td><a href="input.php"><input type="button" class="btn btn-success" value="Ya"></a>
                            <td><input type="submit" name="n" class="btn btn-danger" value="Tidak">
                            </td>
                        </tr>
                    </form>
                    </table>
                    <?php
                    if(isset($_POST['n'])){?>
                    <div class="form-group">
                        <div class="page-header"><h2 align="center">Terima Kasih Telah Berkunjung Ke Toko Kami!</h2><br>
                        <h2 align="center">See You Next Again!!!</h2>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        
      </div>
    </div>
</div>

<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/bootstrap.bundle.js"></script>
<script src="/assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>