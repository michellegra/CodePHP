<?php
require("koneksi.php");

$response = array();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nama = $_POST["nama"];
    $rasa = $_POST["rasa"];
    $rating = $_POST["rating"];
    $harga = $_POST["harga"];
    $deskripsi_singkat = $_POST["deskripsi_singkat"];
    $gambar = $_POST["gambar"];

   
    $perintah = "INSERT INTO tbl_jajanankuu(nama,rasa,rating,harga,deskripsi_singkat,gambar) VALUES('$nama', '$rasa','$rating','$harga','$deskripsi_singkat','$gambar')";
    $eksekusi = mysqli_query($connect, $perintah);
    $cek = mysqli_affected_rows($connect);
   
    if($cek>0){
        $response["kode"] = 1;
        $response["pesan"] = "Sukses Menyimpan Data";
    }
    else{
        $response["kode"] = 0;
        $response["pesan"] = "Ada Kesalahan Menyimpan Data";
    }
}
else{
    $response["kode"] = 0 ;
    $response["pesan"] = "Tidak Ada Post Data";
}
echo json_encode($response);
mysqli_close($connect);