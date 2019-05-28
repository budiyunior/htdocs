<?php
    session_start();
    include 'koneksi.php';

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
    <h2>Transaksi Pulsa</h2>
    <form action="newtrans.php">
        <button type="submit" name="new">NEW</button>
    </form>
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
    <form action="addpulsa.php" method="post">
        <input type="hidden" name="id_transaksi" value="<?php echo $_SESSION['transaksi']['id_transaksi']; ?>">
        <table>
            <tr>
                <td>
                    <label for="operator">Operator</label>
                </td>
                <td>:</td>
                <td>
                    <select name="operator" id="operator">
                        <option>--pilih operator--</option>
                        <option value="Telkomsel">Telkomsel</option>
                        <option value="XL Axiata">XL Axiata</option>
                        <option value="Indosat ooredoo">Indosat ooredoo</option>
                        <option value="Smartfren">Smartfren</option>
                        <option value="Three">Three</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="nominal">Nominal</label>
                </td>
                <td>:</td>
                <td>
                    <select name="nominal" id="nominal">
                        <option>--pilih nominal--</option>
                        <option value="5000">Rp. 5000</option>
                        <option value="10000">Rp. 10000</option>
                        <option value="20000">Rp. 20000</option>
                        <option value="25000">Rp. 25000</option>
                        <option value="50000">Rp. 50000</option>
                        <option value="100000">Rp. 100000</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="nomor">Nomor Tujuan</label>
                </td>
                <td>:</td>
                <td>
                    <input type="text" name="nomor" id="nomor" maxlength="13">
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <button type="submit" name="tambah">Tambah</button> 
                </td>
            </tr>
        </table>
        
    </form>
    <br>
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
                        <td><?php echo $_SESSION['detail_transaksi'][$i]['biaya_admin'] ?></td>
                        <td><?php echo $_SESSION['detail_transaksi'][$i]['subtotal'] ?></td>
                    </tr>
                <?php endfor ?>
                <tr>
                    <td colspan="4">Total</td>
                    <td>
                        <?php echo $trans[0]; ?>
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
    <form action="save.php" method="post">
        <table>
            <input type="hidden" name="id_transaksi" value="<?php echo $_SESSION['transaksi']['id_transaksi']; ?>">
            <input type="hidden" name="total" value="<?php echo $trans[0]; ?>">
            <tr>
                <td>Bayar</td>
                <td>:</td>
                <td>
                    <input type="number" name="bayar"> 
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <button type="submit" name="save">save</button> 
                </td>
            </tr>
        </table>
    </form>
    <?php endif ?>   
</body>
</html>