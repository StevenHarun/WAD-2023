<!DOCTYPE html>
<html>
<head>
    <title>Cek Hasil Inputan</title>
</head>
<body>
    <h1>Data</h1>
    <table border="1">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Jurusan</th>
        </tr>
        <?php
        $conn = new mysqli("localhost", "root", "", "mahasiswa_db");
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        $query = "SELECT * FROM mahasiswa";
        $result = $conn->query($query);

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['nim'] . "</td>";
            echo "<td>" . $row['nama'] . "</td>";
            echo "<td>" . $row['kelas'] . "</td>";
            echo "<td>" . $row['jurusan'] . "</td>";
            echo "</tr>";
        }

        $conn->close();
        ?>
    </table>
</body>
</html>
