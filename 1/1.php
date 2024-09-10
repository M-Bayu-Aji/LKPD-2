<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simbol checked</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"] {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .result {
            margin-top: 20px;
            text-align: center;
        }

        .result b {
            color: red;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Cek Karakter Simbol</h1>
        <form action="" method="POST">
            <label for="teks">Masukkan teks:</label>
            <input type="text" id="teks" name="teks" placeholder="Masukkan kalimat Anda di sini" required>
            <input type="submit" value="Cek Simbol">
        </form>
        <div class="result">
            <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $teks = $_POST['teks'];
                $simbolAda = '';

                if (preg_match_all('/[\'!^£$%&*()}{@#~?><>,|=_+¬-]/', $teks, $matches)){
                    $simbolAda = implode(', ', $matches[0]);
                    echo "Teks: " . $teks ."<br>";
                    echo "Karakter yang terdapat pada kalimat : <b>{$simbolAda}</b>";
                } else {
                    echo "Teks: ". $teks . "<br>";
                    echo "Tidak terdapat simbol pada kalimat";
                }
            }
            ?>
        </div>
    </div>

</body>

</html>