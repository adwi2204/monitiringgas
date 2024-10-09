<?php
 $servername = "sql204.infinityfree.com";
 $username = "if0_37465440";
 $password = "adwialastuwo";
 $dbname = "if0_37465440_dbsensorga";

$apiToken = "22042004"; // Token yang digunakan untuk verifikasi

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['Gas']) && isset($_GET['token']) && $_GET['token'] === $apiToken) {
        $Gas = floatval($_GET['Gas']);
        
        // Buat koneksi ke database
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Cek koneksi
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Siapkan dan eksekusi query 
        $stmt = $conn->prepare("INSERT INTO Gas (level, timestamp) VALUES (?, NOW())");
        $stmt->bind_param("d", $Gas);
        $stmt->execute();

        // Kirim respons balik
        echo "Data received: Gas level = " . $Gas;

        $stmt->close();
        $conn->close();
    } else {
        echo "Error: Gas value not provided or invalid token.";
    }
} else {
    echo "Error: Only GET method is allowed.";
}
?>
