<?php
// Basit installer scripti
action_install();

function action_install() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $host = $_POST['db_host'];
        $name = $_POST['db_name'];
        $user = $_POST['db_user'];
        $pass = $_POST['db_pass'];
        try {
            $pdo = new PDO("mysql:host=$host;charset=utf8", $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Veritabanı oluştur
            $pdo->exec("CREATE DATABASE IF NOT EXISTS `$name` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
            $pdo->exec("USE `$name`");
            // Tablo oluştur
            $pdo->exec("CREATE TABLE IF NOT EXISTS jobs (
                id INT AUTO_INCREMENT PRIMARY KEY,
                description VARCHAR(255) NOT NULL,
                start_date DATE,
                end_date DATE,
                status VARCHAR(20) DEFAULT 'beklemede',
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
            // config.php oluştur
            $config = "<?php\n"
                . "$db_host = '$host';\n"
                . "$db_name = '$name';\n"
                . "$db_user = '$user';\n"
                . "$db_pass = '$pass';\n"
                . "try {\n"
                . "    $pdo = new PDO(\"mysql:host=$host;dbname=$name;charset=utf8\", $db_user, $db_pass);\n"
                . "    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);\n"
                . "} catch (PDOException $e) {\n"
                . "    die('Veritabanı bağlantı hatası: ' . $e->getMessage());\n"
                . "}\n";
            file_put_contents('config.php', $config);
            echo '<p>Kurulum tamamlandı. <a href="index.php">Siteye git</a></p>';
            return;
        } catch (PDOException $e) {
            echo '<p>Hata: ' . $e->getMessage() . '</p>';
        }
    }
    installer_form();
}

function installer_form() {
    echo '<!doctype html><html lang="tr"><head><meta charset="utf-8"><title>Kurulum</title></head><body>';
    echo '<h1>BilCELL İş Planı Kurulumu</h1>';
    echo '<form method="post">';
    echo 'Veritabanı Sunucusu: <input type="text" name="db_host" value="localhost"><br>';
    echo 'Veritabanı Adı: <input type="text" name="db_name" value="bilcell"><br>';
    echo 'Kullanıcı Adı: <input type="text" name="db_user"><br>';
    echo 'Şifre: <input type="password" name="db_pass"><br>';
    echo '<button type="submit">Kur</button>';
    echo '</form></body></html>';
}
?>
