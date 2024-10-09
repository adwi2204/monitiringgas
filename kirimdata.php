<?php
 $servername = "sql204.infinityfree.com";
 $username = "if0_37465440";
 $password = "adwialastuwo";
 $dbname = "if0_37465440_dbsensorga";

// Token yang digunakan untuk verifikasi
$apiToken = "22042004"; // Ganti dengan token yang Anda pilih

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Cek apakah parameter Gas dan token ada
    if (isset($_GET['Gas']) && isset($_GET['token']) && $_GET['token'] === $apiToken) {
        $Gas = floatval($_GET['Gas']);
        
        // Simpan data ke file atau database
        $logData = date("Y-m-d H:i:s") . " - Gas Level: " . $Gas . "\n";
        file_put_contents("gas_log.txt", $logData, FILE_APPEND);
        
        // Kirim respons balik ke ESP32
        echo "Data received: Gas level = " . $Gas;
    } else {
        echo "Error: Gas value not provided or invalid token.";
    }
} else {
    echo "Error: Only GET method is allowed.";
}


// Tutup koneksi
mysqli_close($konek);
?>