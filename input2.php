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
    <title>Pembayaran</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Alfi's Store</a>
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
    <div class="page-header"><h1 align="center">Hasil Akhir</h1></div>
    <div class="row" style="padding:20px;">
      <div class="col-md-12">
        <div class="card">
            <div class="card-header">Output</div>
            <?php
            if(isset($_POST['smp'])){
                $nama = $_POST['nama'];
                $alamat = $_POST['alamat'];
                $tgl = $_POST['tgl'];
                $jk = $_POST['jk'];
                $jumlah = $_POST['jumlah'];

                $nabar = $_POST['nabar'];
                $kobar = $_POST['kobar'];
                $jb = $_POST['jb'];
                $hasa = $_POST['hasa'];
                $jubar = $_POST['jubar'];
            }
            ?>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Pembelian</th>
                            <th>Jumlah</th>
                        </tr>
                        <tr>
                            <td><?= $nama; ?></td>
                            <td><?= $alamat; ?></td>
                            <td><?= $jk; ?></td>
                            <td><?= $tgl; ?></td>
                            <td><?= $jumlah; ?></td>
                        </tr>
                    </table>
                    <div class="form-control"><center>Jumlah Buku</center></div>
                    <table class="table">
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Kode Barang</th>
                            <th>Jenis Barang</th>
                            <th>Harga Satuan</th>
                            <th>Jumlah Barang</th>
                            <th>Total Harga</th>
                        </tr>
                        
                        <?php foreach($nabar as $key => $value) { ?>
                        <tr>
                            <td><?= $key+1; ?></td>
                            <td><?= $nabar[$key]; ?></td>
                            <td><?= $kobar[$key]; ?></td>
                            <td><?= $jb[$key]; ?></td>
                            <td><?= "Rp. $hasa[$key]"; ?></td>
                            <td><?= $jubar[$key]; ?></td>
                            <?php $tohar = $hasa[$key]*$jubar[$key]; ?>
                            <td><?= $tohar; ?></td>
                            <?php $total += $hasa[$key]*$jubar[$key]; ?>
                        </tr>
                        <?php } ?>
                    </table>
                    <div class="form-control"><center>Pembayaran</center></div>
                    <table class="table">
                        <?php
                        $a = $total;
                        if($total >= 500000){
                            $b = $a * 0.2;
                            $e = "(20%)";
                            $c = $a - $b;
                        }
                        else if($total >= 250000){
                            $b = $a * 0.1;
                            $e = "(10%)";
                            $c = $a - $b;
                        }
                        else if($total >= 150000){
                            $b = $a * 0.05;
                            $e = "(5%)";
                            $c = $a - $b;
                        }
                        else{
                            $b = 0;
                            $e = "(0%)";
                            $c = $a - $b;
                        }
                        ?>
                        <tr>
                            <th>Sub Harga</th>
                            <td align="right"><?= "Rp .$a"; ?></td>
                        </tr>
                        <tr>
                            <th>Diskon<?= $e; ?></th>
                            <td align="right"><?= "Rp. $b"; ?></td>
                        </tr>
                        <tr>
                            <th>Total Harga</th>
                            <td align="right"><?= "Rp. $c"; ?></td>                        
                        </tr>

                    </table>
                    
                    <table class="table">
                    <form action="input3.php" method="post">
                        <input type="hidden" name="total" value="<?= $c; ?>">
                        <input type="hidden" name="hasa[]" value="<?= $hasa[$key]; ?>">
                        <input type="hidden" name="jubar[]" value="<?= $jubar[$key]; ?>">

                        <tr>
                            <th>Masukan Pembayaran</th>
                            <th><input type="number" min="<?= $c; ?>" name="num" id="" placeholder="Masukan Pembayaran">
                                <button type="submit" name="byr" class="btn btn-primary">Bayar</button>
                            </th>
                        </tr>    
                    </form>
                    </table>
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