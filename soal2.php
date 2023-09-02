<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bilangan Prima</title>
</head>
<body>
    <form method="POST">
        <label for="inputNumber">Masukkan angka: </label>
        <input type="number" name="inputNumber" id="inputNumber">
        <input type="submit" value="Cari Bilangan Prima">
    </form>

    <?php
    // Fungsi untuk mengecek apakah suatu angka adalah bilangan prima
    function isPrime($number) {
        if ($number <= 1) {
            return false;
        }
        if ($number <= 3) {
            return true;
        }
        if ($number % 2 == 0 || $number % 3 == 0) {
            return false;
        }
        $i = 5;
        while ($i * $i <= $number) {
            if ($number % $i == 0 || $number % ($i + 2) == 0) {
                return false;
            }
            $i += 6;
        }
        return true;
    }

    if (isset($_POST['inputNumber'])) {
        $inputNumber = $_POST['inputNumber'];
        echo "<h2>Bilangan Prima dari 1 sampai $inputNumber:</h2>";

        $count = 0;
        $i = 2;
        while ($count < $inputNumber) {
            if (isPrime($i)) {
                echo "$i ";
                $count++;
            }
            $i++;
        }
    }
    ?>
</body>
</html>
