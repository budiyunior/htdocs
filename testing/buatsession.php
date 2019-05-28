<?php
    session_start();

    $_SESSION['item'] = "id_item,id_pengguna,nama_item,id_jenis_item,harga_satuan,berat_satuan,deskripsi";
    $_SESSION['gambar_item'] = "id_gambar,id_item,nama_gambar,gambar";

    $profile = array('id' => 'superuser123',
    'nama' => 'gagas','adi',
    'alamat' => 'Jawa Timur','Bondowoso');

    $_SESSION['profile'] = $profile;
    var_dump($_SESSION);
    
    echo "<br>";
    echo "<a href='hapussession.php'><button>Hapus</button></a>";