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
                <div class="card-header">Jenis Barang Yang Ingin Dibeli</div>
                <?php
                if(isset($_POST['simpan'])){
                    $nama = $_POST['nama'];
                    $alamat = $_POST['alamat'];
                    $tgl = $_POST['tgl'];
                    $jk = $_POST['jk'];
                    $jumlah = $_POST['jumlah'];
                    $o = 0;    
                    for ($i=0; $i < $jumlah ; $i++) {
                    $g = $o+=1;
                    ?>
                
                <div class="row justify-content-center" style="padding:20px;">
                    <div class="col-md-11">
                        <div class="card">
                            <div class="card-header"><?php echo "Pembelian $g"; ?></div>
                            <div class="card-body">
                                <form action="input2.php" method="post">

                                <input type="hidden" name="nama" value="<?= $nama; ?>">
                                <input type="hidden" name="alamat" value="<?= $alamat; ?>">
                                <input type="hidden" name="tgl" value="<?= $tgl; ?>">
                                <input type="hidden" name="jumlah" value="<?= $jumlah; ?>">
                                <input type="hidden" name="jk" value="<?= $jk; ?>">

                                <div class="form-group">
                                    <label for="">Nama Barang</label>
                                    <input type="text" name="nabar[]" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Kode Barang</label>
                                    <input type="text" name="kobar[]" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Jenis Barang</label>
                                        <select class="form-control" name="jb[]" required>
                                            <option value="Makanan">Makanan</option>
                                            <option value="Handphone">Handphone</option>
                                            <option value="Pakaian">Pakaian</option>
                                            <option value="Earphone">Earphone</option>
                                            <option value="Buku">Buku</option>
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label>Harga Satuan</label><br>
                                    <input type="number" name="hasa[]" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Jumlah Barang</label>
                                    <input type="number" name="jubar[]" class="form-control" required>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
                    <?php
                        }
                    }
                    ?>
                <div class="row justify-content-center" style="padding:20px;"> 
                    <div class="form-group">
                        <button type="submit" name="smp" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </div>
                    
            </form>
            </div>
        </div>
    </div>
</div>
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/bootstrap.bundle.js"></script>
<script src="/assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
