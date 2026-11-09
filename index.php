<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum PHP</title>
</head>
<body>
    <h1>Belajar PHP</h1>
    <?php
    date_default_timezone_set("Asia/Jakarta");
     echo "<p>PHP berhasil dijalankan.</p>";
     echo "<p>Waktu server: " . date("d-m-Y H:i:s") . "</p>";
    ?> 
</body>
</html>