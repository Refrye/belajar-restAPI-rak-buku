<?php
// Atur header respons sebagai JSON
header("Content-Type: application/json; charset=UTF-8");
// Tangani permintaan HTTP berdasarkan metode
$method = $_SERVER['REQUEST_METHOD'];
$request_url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// Tangani permintaan GET
if ($method === 'GET') {
    // Periksa apakah 'url' ada dalam permintaan GET
    if (isset($_GET['url'])) {
        // Tangani permintaan untuk daftar buku
        if ($_GET['url'] === 'books') {
            include_once '../buku-get.php';
        } else {
            // Tangani permintaan lainnya (jika ada)
            http_response_code(404); // Not Found
            echo json_encode(array("message" => "Endpoint tidak ditemukan."));
        }
    } else {
        // Tangani permintaan lainnya jika 'url' tidak ada dalam GET
        http_response_code(400); // Bad Request
        echo json_encode(array("message" => "Permintaan tidak valid. Parameter 'url' diperlukan."));
    }
}
elseif ($method === 'POST') {
    // Tangani permintaan POST
    include_once '../buku-post.php';
} elseif ($method === 'PUT') {
    if (isset($_GET['url']) && $_GET['url'] === 'books') {
        include_once '../buku-put.php';
    } else {
        http_response_code(404); // Not Found
        echo json_encode(array("message" => "Endpoint tidak ditemukan."));
    }
}elseif ($method === 'DELETE') {
    if (isset($_GET['url']) && $_GET['url'] === 'books') {
        include_once '../buku-del.php';
    } else {
        http_response_code(404); // Not Found
        echo json_encode(array("message" => "Endpoint tidak ditemukan."));
    }
}
else {
    // Tangani metode HTTP lainnya (jika ada)
    http_response_code(405); // Method Not Allowed
    echo json_encode(array("message" => "Metode HTTP tidak diizinkan."));
}