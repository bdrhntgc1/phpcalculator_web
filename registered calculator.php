<?php
session_start(); // Oturum başlat

// Hesaplama işlemi yapılacak
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['topla']) || isset($_POST['cikarma']) || isset($_POST['carpma']) || isset($_POST['bolme']) || isset($_POST['karekok']) || isset($_POST['karesi'])) {
        $sayi1 = $_POST['sayi1'];
        $sayi2 = $_POST['sayi2'];
        $islem = "";
        $sonuc = 0;

        // İşlem türüne göre hesaplama
        if (isset($_POST['topla'])) {
            $sonuc = $sayi1 + $sayi2;
            $islem = "Toplama";
        }
        if (isset($_POST['cikarma'])) {
            $sonuc = $sayi1 - $sayi2;
            $islem = "Çıkarma";
        }
        if (isset($_POST['carpma'])) {
            $sonuc = $sayi1 * $sayi2;
            $islem = "Çarpma";
        }
        if (isset($_POST['bolme'])) {
            if ($sayi2 != 0) {
                $sonuc = $sayi1 / $sayi2;
                $islem = "Bölme";
            } else {
                $sonuc = "Bölme hatası: Sıfıra bölme!";
            }
        }
        if (isset($_POST['karekok'])) {
            if ($sayi1 >= 0) {
                $sonuc = sqrt($sayi1);
                $islem = "Karekök";
            } else {
                $sonuc = "Karekök hatası: Negatif sayının karekökü alınamaz!";
            }
        }
        if (isset($_POST['karesi'])) {
            $sonuc = $sayi1 * $sayi1;
            $islem = "Karesini Alma";
        }

        // Hesaplama geçmişini sakla
        if (!isset($_SESSION['hesaplama_gecmisi'])) {
            $_SESSION['hesaplama_gecmisi'] = [];
        }

        // Hesaplama verisini oturumda sakla
        $_SESSION['hesaplama_gecmisi'][] = [
            'islem' => $islem,
            'sayi1' => $sayi1,
            'sayi2' => $sayi2,
            'sonuc' => $sonuc
        ];

        // Sonucu ekrana yazdır
        echo "<p><strong>Sonuç: </strong>" . $sonuc . "</p>";
    }

    // Geçmiş hesaplamaları ekrana yazdırılacak mı?
    if (isset($_POST['gecmis'])) {
        echo "<h2>Hesaplama Geçmişi</h2>";
        if (isset($_SESSION['hesaplama_gecmisi']) && count($_SESSION['hesaplama_gecmisi']) > 0) {
            echo "<ul>";
            foreach ($_SESSION['hesaplama_gecmisi'] as $hesaplama) {
                echo "<li>{$hesaplama['islem']} - {$hesaplama['sayi1']} ve {$hesaplama['sayi2']} => Sonuç: {$hesaplama['sonuc']}</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>Henüz herhangi bir işlem yapılmadı.</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hesaplama İşlemleri</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        input[type="number"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            width: 100%;
            padding: 15px;
            margin: 5px 0;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        p {
            font-size: 18px;
            color: #333;
        }

        .history {
            margin-top: 20px;
            padding: 10px;
            background-color: #e9f7e9;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
    </style>
</head>
<body>

    <h1>Hesaplama İşlemleri</h1>

    <form method="post">
        <label for="sayi1">Birinci Sayı:</label>
        <input type="number" name="sayi1" id="sayi1" value="<?php echo isset($_POST['sayi1']) ? $_POST['sayi1'] : ''; ?>" required><br><br>
        
        <label for="sayi2">İkinci Sayı:</label>
        <input type="number" name="sayi2" id="sayi2" value="<?php echo isset($_POST['sayi2']) ? $_POST['sayi2'] : ''; ?>" required><br><br>

        <button type="submit" name="topla">Toplama</button>
        <button type="submit" name="cikarma">Çıkarma</button>
        <button type="submit" name="carpma">Çarpma</button>
        <button type="submit" name="bolme">Bölme</button>
        <button type="submit" name="karekok">Karekök</button>
        <button type="submit" name="karesi">Karesini Alma</button>
        <br><br>
        <button type="submit" name="gecmis">Hesaplama Geçmişini Görüntüle</button>
    </form>

</body>
</html>
