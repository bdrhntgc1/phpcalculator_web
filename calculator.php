<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hesap Makinesi V1.0</title>
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

        
        
    </style>
</head>
<body>

    <h1>Hesap Makinesine Hoş Geldiniz...</h1>

    
    <form method="post">
        <label for="sayi1">Birinci Sayı:</label>
        <input type="number" name="sayi1" id="sayi1"><br><br>
        
        <label for="sayi2">İkinci Sayı:</label>
        <input type="number" name="sayi2" id="sayi2"><br><br>

        <button type="submit" name="topla">Toplama</button>
        <button type="submit" name="cikar">Çıkarma</button>
        <button type="submit" name="carp">Çarpma</button>
        <button type="submit" name="bol">Bölme</button>
        <button type="submit" name="karekok">Karekök</button>
        <button type="submit" name="karesi">Karesini Alma</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $sayi1 = $_POST['sayi1'];
        $sayi2 = $_POST['sayi2'];

        if (isset($_POST['topla'])) {
            $sonuc = $sayi1 + $sayi2;
            echo "Girmiş olduğunuz sayıların toplamı: $sonuc";
        }

        if (isset($_POST['cikar'])) {
            $sonuc = $sayi1 - $sayi2;
            echo "Girmiş olduğunuz sayıların farkı: $sonuc";
        }

        if (isset($_POST['carp'])) {
            $sonuc = $sayi1 * $sayi2;
            echo "Girmiş olduğunuz sayıların çarpımı: $sonuc";
        }

        if (isset($_POST['bol'])) {
            if ($sayi2 != 0) {
                $sonuc = $sayi1 / $sayi2;
                echo "Girmiş olduğunuz sayıların bölümü: $sonuc";
            } else {
                echo "Herhangi bir sayıyı 0'a bölemezsiniz!!!!";
            }
        }

        if (isset($_POST['karekok'])) {
            if ($sayi1 >= 0 && $sayi2 >= 0) {
                $sonuc = sqrt($sayi1);
                $sonuc2 = sqrt($sayi2);
                echo "Birinci sayının karekökü: $sonuc";
                echo "İkinci sayının karekökü: $sonuc2";
            }
         
            else {
                echo "Negatif sayının karekökü alınamaz!!!";
            }
        }

        if (isset($_POST['karesi'])) {
            $sonuc = $sayi1 * $sayi1;
            $sonuc2 = $sayi2 * $sayi2;
            echo "Birinci sayının karesi: $sonuc";
            echo "İkinci sayının karesi: $sonuc2";
        }
    }
    ?>

</body>
</html>
