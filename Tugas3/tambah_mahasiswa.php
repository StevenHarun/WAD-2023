<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    $conn = new mysqli("localhost", "root", "", "mahasiswa_db");
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $query = "INSERT INTO mahasiswa (nim, nama, kelas, jurusan) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss", $nim, $nama, $kelas, $jurusan);

    if ($stmt->execute()) {
        echo "Data berhasil ditambahkan ke database.";
    } else {
        echo "Gagal menambahkan data: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>