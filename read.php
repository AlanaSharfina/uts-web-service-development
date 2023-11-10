<?php
require_once('koneksi.php');
$myArray = array();
if ($result = mysqli_query($conn, "SELECT * FROM wisata ORDER BY id ASC")) {
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $myArray[] = $row;
    }
    mysqli_close($conn);
    $response = array(
        "status" => "success",
        "error" => false,
        "message" => "List Data Pariwisata",
        "data" => $myArray
    );
}

echo json_encode($response);
