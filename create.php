<?php
require_once('koneksi.php');
if (isset($_POST['nama']) && isset($_POST['alamat']) && isset($_POST['deskripsi']) && isset($_POST['tiket'])) {
    $nama       = $_POST['nama'];
    $alamat     = $_POST['alamat'];
    $deskripsi  = $_POST['deskripsi'];
    $tiket      = $_POST['tiket'];
    $sql = $conn->prepare("INSERT INTO wisata (nama, alamat, deskripsi, tiket) VALUES (?, ?, ?, ?)");
    $sql->bind_param('ssss', $nama, $alamat, $deskripsi, $tiket);
    $sql->execute();

    $data = [
        'nama' => $nama,
        'alamat' => $alamat,
        'deskripsi' => $deskripsi,
        'tiket' => $tiket,
    ];

    $response = array(
        "status" => "success",
        "error" => false,
        "message" => "Success! data berhasil ditambah",
        'data' => $data
    );
} else {
    $response = array(
        "status" => "error",
        "error" => true,
        "message" => "Error! ada data gagal ditambah!"
    );
}

echo json_encode($response);
