<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

$databasePath = "config/database.php";

echo "--- Duke nisur kontrollin ---<br>";

if (file_exists($databasePath)) {
    require_once $databasePath;
    echo "✅ Skedari 'database.php' u gjet!<br>";
} else {
    die("❌ GABIM: Nuk po e gjej dot skedarin në: " . realpath($databasePath));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    try {
        $db = new Database();
        $conn = $db->connect();
        
        if ($conn) {
            echo "✅ Lidhja me DB u krye me sukses!<br>";
        } else {
            die("❌ GABIM: Metoda connect() nuk ktheu lidhje valide.");
        }

        $username = $_POST['username'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        echo "Të dhënat e pranuara: $username | $email<br>";

        if (empty($username) || empty($email) || empty($password)) {
            die("❌ STOP: PHP po i sheh fushat si bosh. Kontrollo 'name' në HTML.");
        }

        $sql = "INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, 'user')";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([$username, $email, $password]);

        if ($result) {
            echo "<h2>🎉 SUKSES! Përdoruesi u shtua në databazë.</h2>";
            echo "<a href='login.php'>Kliko këtu për Login</a>";
        }

    } catch (Exception $e) {
        die("❌ GABIM KATASTROFIK: " . $e->getMessage());
    }

} else {
    echo "⚠️ Nuk u dërgua asgjë me POST. Hap 'register.php' dhe kliko butonin.";
}
?>