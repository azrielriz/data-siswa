<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Data Siswa</h1>
<button type="submit" value="kembali"><a href="stage1.php">Kembali</a></button>
<?php
session_start();

echo '<table border="1">';
echo '<tr>';
echo '<th>NAMA</th>';
echo '<th>NIS</th>';
echo '<th>RAYON</th>';
echo '<tr>';

foreach ($_SESSION['dataSiswa'] as $index => $value) {
    echo '<tr>';
    echo '<td>'. $value['nama'] .'</td>';
    echo '<td>'. $value['nis'].'</td>';
    echo '<td>'. $value['rayon'].'</td>';
    echo '</tr>';
}

echo '</table>'



?>
</body>
</html>