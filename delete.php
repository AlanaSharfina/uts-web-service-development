<?php
require_once('koneksi.php');

if (isset($_GET['id'])) {
    $id  = $_GET['id'];
    $sql = $conn->prepare("DELETE FROM wisata WHERE id=?");
    $sql->bind_param('i', $id);
    $sql->execute();
    if ($sql) {
        $response = array(
            "status" => "success",
            "error" => false,
            "message" => "Success! data berhasil dihapus",
        );
    } else {
        $response = array(
            "status" => "error",
            "error" => true,
            "message" => "Error! ada data gagal dihapus!"
        );
    }
} else {
    $response = array(
        "status" => "error",
        "error" => true,
        "message" => "Error! ada data gagal dihapus!"
    );
}

echo json_encode($response);
