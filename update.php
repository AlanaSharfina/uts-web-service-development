<?php
require_once('koneksi.php');

if (isset($_POST['id'])) {
    $id       = $_POST['id'];
    $nama       = $_POST['nama'];
    $alamat     = $_POST['alamat'];
    $deskripsi  = $_POST['deskripsi'];
    $tiket      = $_POST['tiket'];
    $sql = $conn->prepare("UPDATE wisata SET nama=?, alamat=?, deskripsi=?, tiket=? WHERE id=?");
    $sql->bind_param('sssss', $nama, $alamat, $deskripsi, $tiket, $id);
    $sql->execute();
    if ($sql) {
        $data = [
            'nama' => $nama,
            'alamat' => $alamat,
            'deskripsi' => $deskripsi,
            'tiket' => $tiket,
        ];
        $response = array(
            "status" => "success",
            "error" => false,
            "message" => "Success! data berhasil diubah",
            'data' => $data
        );
    } else {
        $response = array(
            "status" => "error",
            "error" => true,
            "message" => "Error! ada data gagal diubah!"
        );
    }
} else {
    $response = array(
        "status" => "error",
        "error" => true,
        "message" => "Error! ada data gagal diubah!"
    );
}

echo json_encode($response);
