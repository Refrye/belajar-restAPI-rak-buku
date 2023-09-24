<?php
header("Content-Type: application/json; charset=UTF-8");
$method = $_SERVER['REQUEST_METHOD'];
if ($method === 'DELETE') {
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    if ($id === null) {
        http_response_code(400); // Bad Request
        echo json_encode(array("message" => "Permintaan tidak valid. Parameter 'id' diperlukan."));
    } else {
        $mysqli = new mysqli('localhost', 'root', '', 'rak-buku');
        if ($mysqli->connect_error) {
            http_response_code(500); // Internal Server Error
            echo json_encode(array("message" => "Gagal terhubung ke database: " . $mysqli->connect_error));
        } else {
            $query = "DELETE FROM buku WHERE id = $id";
            if ($mysqli->query($query)) {
                http_response_code(200); // OK
                echo json_encode(array("message" => "Buku berhasil dihapus."));
            } else {
                http_response_code(500); // Internal Server Error
                echo json_encode(array("message" => "Gagal menghapus buku: " . $mysqli->error));
            }
            $mysqli->close();
        }
    }
} else {
    http_response_code(405); // Method Not Allowed
    echo json_encode(array("message" => "Metode HTTP tidak diizinkan."));
}
