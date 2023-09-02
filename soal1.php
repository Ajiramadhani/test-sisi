<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 1</title>
</head>
<body>
	<form method="POST">
        <label for="angka">Masukkan jumlah baris : </label>    
        <input type="number" name="angka" id="angka">
        <input type="submit" value="Generate">
    </form>
		<?php
		if(isset($_POST['angka'])){
			$star = $_POST['angka'];
			for($a = $star; $a > 0; $a--){
				for($i = 1; $i <= $a; $i++){
					echo "&nbsp;";
				}
				for($b = $star; $b >= $a; $b--){
					echo "*";
				}
				echo "<br>";
			}
		}
		?>
</body>
</html>