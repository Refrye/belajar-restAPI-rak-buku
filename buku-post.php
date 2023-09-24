<?php
// Atur header respons sebagai JSON
header("Content-Type: application/json; charset=UTF-8");
// Tangani permintaan HTTP berdasarkan metode
$method = $_SERVER['REQUEST_METHOD'];
if ($method === 'POST') {
    // Menerima data POST dari permintaan
    $data = json_decode(file_get_contents("php://input"));
    // Validasi data yang diterima (sesuaikan dengan kebutuhan Anda)
    if (!empty($data->judul) && !empty($data->pengarang)) {
        // Koneksi ke database MySQL
        $mysqli = new mysqli('localhost', 'root', '', 'rak-buku');
        // Periksa koneksi
        if ($mysqli->connect_error) {
            http_response_code(500); // Internal Server Error
            echo json_encode(array("message" => "Gagal terhubung ke database: " . $mysqli->connect_error));
        } else {
            // Persiapkan data
            $judul = $mysqli->real_escape_string($data->judul);
            $pengarang = $mysqli->real_escape_string($data->pengarang);
            $sampul = $mysqli->real_escape_string($data->sampul);
            $tahun = $mysqli->real_escape_string($data->tahun);
            $harga = $mysqli->real_escape_string($data->harga);
            // Eksekusi query INSERT
            $query = "INSERT INTO buku (judul, pengarang, tahun, sampul, harga) VALUES ('$judul', '$pengarang', $tahun, '$sampul', '$harga')";
            if ($mysqli->query($query)) {
                http_response_code(201); // Created
                echo json_encode(array("message" => "Buku berhasil ditambahkan."));
            } else {
                http_response_code(500); // Internal Server Error
                echo json_encode(array("message" => "Gagal menambahkan buku: " . $mysqli->error));
            }
            // Tutup koneksi
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