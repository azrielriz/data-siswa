<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="all">
        <h1>Masukan Data Siswa</h1>
        <form action="" method = "post">
            <label for="nama">NAMA : </label>
            <input type="text" id="nama" name="nama">
            <br>
            <label for="nis">NIS : </label>
            <input type="number" id="nis" name="nis">
            <br>
            <label for="rayon">RAYON : </label>
            <input type="text" id ="rayon" name="rayon">
            <br>
            <button type="submit" value="kirim">SUBMIT</button>
            <button type="submit" value="cetak"><a href="stage2.php">CETAK</a></button>
            <button type="submit" value="cetak"><a href="stage3.php">HAPUS DATA</a></button>
        </form>
<?php
// Memulai sesi 
session_start();

if(!isset($_SESSION['dataSiswa'])){
    $_SESSION['dataSiswa']= array(); 
}

if(isset($_POST['nama']) && isset($_POST['nis']) && isset($_POST['rayon'])){
    $data = array (
        'nama' => $_POST['nama'],
        'nis' => $_POST['nis'],
        'rayon' => $_POST['rayon']
        );
        array_push($_SESSION['dataSiswa'], $data);
    };

    // Proses penghapusan data siswa
if (isset($_GET['hapus'])) {
    $index = $_GET['hapus'];
    unset($_SESSION['dataSiswa'][$index]);
    // redirect kembali ke halaman ini setelah penghapusan
    header('Location: http://localhost/datasiswa/stage1.php');
    exit;
}
// var_dump($_SESSION['dataSiswa']);

echo '<table border="1">';
echo '<tr>';
echo '<th>NAMA</th>';
echo '<th>NIS</th>';
echo '<th>RAYON</th>';
echo '<th>AKSI</th>';
echo '<tr>';

foreach ($_SESSION['dataSiswa'] as $index => $value) {
    echo '<tr>';
    echo '<td>'. $value['nama'] .'</td>';
    echo '<td>'. $value['nis'].'</td>';
    echo '<td>'. $value['rayon'].'</td>';
    echo '<td> <a href="?hapus='.$index.'">Hapus</a></td>';
    echo '</tr>';
}

echo '</table>'
?>
    </div>
</body>
</html>