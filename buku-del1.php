<?php
require_once "config/koneksi.php";
header("Content-Type: application/json");
if($_SERVER['REQUEST_METHOD'] === 'DELETE'){
    parse_str(file_get_contents("php://input"), $delete_data);
    if(isset($delete_data['id'])) {
        $id = $delete_data['id'];
        $query = "DELETE FROM buku WHERE id = $id";
        if ($conn->query($query) === TRUE) {
            $response = [
                'status' => 'success',
                'message' => 'Data buku berhasil dihapus'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Gagal menghapus data buku: ' . $conn->error
            ];
        }
    } else {
        $response = [
            'status' => 'error',
            'message' => 'Parameter ID yang diperlukan tidak ditemukan'
        ];
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}
