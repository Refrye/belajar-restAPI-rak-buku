<?php
require_once "config/koneksi.php";

header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (isset($_GET['id'])) {
        // Jika ID disediakan, ambil satu buku berdasarkan ID
        $id = $_GET['id'];
        $query = "SELECT * FROM buku WHERE id = $id";
    } else {
        // jika id tidak disediakan, ambil semua data buku
        $query = "SELECT * FROM buku";
    }
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $books = array();
        while ($row = $result->fetch_assoc()) {
            $books[] = $row;
        }
        echo json_encode($books);
    } else {
        echo json_encode(array("message" => "Tidak ada buku yang ditemukan."));
    }
} else {
    http_response_code(405); // Method Not Allowed
    echo json_encode(array("message" => "Metode HTTP tidak diizinkan."));
}
?>