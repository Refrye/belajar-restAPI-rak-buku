<?php
header("Content-Type: application/json; charset=UTF-8");
$method = $_SERVER['REQUEST_METHOD'];
if ($method === 'PUT') {
    $data = json_decode(file_get_contents("php://input"));
    if (!empty($data->id) && !empty($data->judul) && !empty($data->pengarang)) {
        $mysqli = new mysqli('localhost', 'root', '', 'rak-buku');
        if ($mysqli->connect_error) {
            http_response_code(500); // Internal Server Error
            echo json_encode(array("message" => "Gagal terhubung ke database: " . $mysqli->connect_error));
        } else {
            $id = $mysqli->real_escape_string($data->id);
            $judul = $mysqli->real_escape_string($data->judul);
            $pengarang = $mysqli->real_escape_string($data->pengarang);
            $sampul = $mysqli->real_escape_string($data->sampul);
            $tahun = $mysqli->real_escape_string($data->tahun);
            $harga = $mysqli->real_escape_string($data->harga);
            $query = "UPDATE buku SET judul='$judul', pengarang='$pengarang', tahun=$tahun, sampul='$sampul', harga='$harga' WHERE id=$id";
            if ($mysqli->query($query)) {
                http_response_code(200); // OK
                echo json_encode(array("message" => "Buku berhasil diperbarui."));
            } else {
                http_response_code(500); // Internal Server Error
                echo json_encode(array("message" => "Gagal memperbarui buku: " . $mysqli->error));
            }
            $mysqli->close();
        }
    } else {
        http_response_code(400); // Bad Request
        echo json_encode(array("message" => "Data tidak lengkap."));
    }
} else {
    http_response_code(405); // Method Not Allowed
    echo json_encode(array("message" => "Metode HTTP tidak diizinkan."));
}
?>