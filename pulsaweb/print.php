<?php
    session_start();
    include 'koneksi.php';

    $id = $_POST['id_transaksi'];
    $bayar = $_POST['bayar'];
    $total = $_POST['total'];
    $kembali = $bayar - $total;

    if($bayar < $total){
        $_SESSION['save']="warning";
        $_SESSION['savenotif']="Silahkan masukkan nominal pembayaran dengan benar";
        header("location: beli.php");
    }else {
        unset($_SESSION['status']);

        $save = mysqli_query($conn, "UPDATE tm_transaksi SET bayar='$bayar',kembali='$kembali' WHERE id_transaksi = '$id'");

        $_SESSION['save']="success";
        $_SESSION['savenotif']="Kembali Rp. ".$kembali;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Pulsa</h2>
    <br>
    <p>
        <?php if(isset($_SESSION['status'])) : ?>
            <?php echo "Pulsa telah ".$_SESSION['status']." diisikan."; ?>
        <?php endif ?>
    </p>
    <?php if(isset($_SESSION['transaksi'])) : ?>
        <?php   $id = $_SESSION['transaksi']['id_transaksi'];
            $total = mysqli_query($conn, "SELECT total FROM tm_transaksi WHERE id_transaksi = '$id'");
            $trans = mysqli_fetch_array($total); ?>
        <table>
            <tr>
                <td>Kode Transaksi</td>
                <td>:</td>
                <td>
                    <?php echo $_SESSION['transaksi']['id_transaksi']; ?>
                </td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td>
                    <?php echo $tgl = date('Y-m-d'); ?>
                </td>
            </tr>
        </table>
        <h4>Add Pulsa</h4>
        
        <table border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Operator</th>
                    <th>Nominal</th>
                    <th>Biaya Admin</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php if(isset($_SESSION['detail_transaksi'])) : ?>
                    <?php for($i=0; $i < count($_SESSION['detail_transaksi']); $i++) : ?>
                        <tr>
                            <td><?php echo $i+1; ?></td>
                            <td><?php echo $_SESSION['detail_transaksi'][$i]['operator'] ?></td>
                            <td><?php echo $_SESSION['detail_transaksi'][$i]['nominal'] ?></td>
                            <td>Rp. <?php echo $_SESSION['detail_transaksi'][$i]['biaya_admin'] ?></td>
                            <td>Rp. <?php echo $_SESSION['detail_transaksi'][$i]['subtotal'] ?></td>
                        </tr>
                    <?php endfor ?>
                    <tr>
                        <td colspan="4">Total</td>
                        <td>
                            Rp. <?php echo $trans[0]; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">Bayar</td>
                        <td>
                            Rp. <?php echo $bayar; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">Kembali</td>
                        <td>
                            Rp. <?php echo $kembali; ?>
                        </td>
                    </tr>
                <?php else : ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="4">Total</td>
                        <td>0</td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
        <table>
            <tr>
                <td>
                    <a href="newtrans.php">Selesai</a>
                </td>
            </tr>
        </table>
    <?php endif ?>

    <script>
		window.print();
    </script>
    
</body>
</html>