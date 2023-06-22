<?php
require("koneksi.php");

$response = array();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST ["id"];
    $nama = $_POST["nama"];
    $rasa = $_POST["rasa"];
    $rating = $_POST["rating"];
    $harga = $_POST["harga"];
    $deskripsi_singkat = $_POST["deskripsi_singkat"];
    $gambar = $_POST["gambar"];
   
    $perintah = "UPDATE tbl_jajanankuu SET nama = '$nama', rasa = '$rasa', rating = '$rating', harga = '$harga' ,deskripsi_singkat = '$deskripsi_singkat', gambar = '$gambar' WHERE id = '$id'";
    $eksekusi = mysqli_query($connect, $perintah);
    $cek = mysqli_affected_rows($connect);
   
    if($cek>0){
        $response["kode"] = 1;
        $response["pesan"] = "Sukses Mengubah Data";
    }
    else{
        $response["kode"] = 0;
        $response["pesan"] = "Ada Kesalahan Mengubah Data";
    }
}
else{
    $response["kode"] = 0 ;
    $response["pesan"] = "Tidak Ada Post Data";
}
echo json_encode($response);
mysqli_close($connect);
