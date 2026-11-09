<?php
// Poin 3: function format Rupiah
function formatRupiah($angka) {
    return "Rp" . number_format($angka, 0, ",", ".");
}

// Poin 1: rata-rata tiga komponen nilai
$tugas = 85;
$uts = 78;
$uas = 90;
$rata = ($tugas + $uts + $uas) / 3;

// Poin 2: cari nama dari array
$daftar = ["Alya", "Bima", "Citra", "Doni", "Deya", "Rachma", "Prince"];
$kata = trim($_GET["kata"] ?? "");
$hasil = [];
if ($kata !== "") {
    foreach ($daftar as $n) {
        if (stripos($n, $kata) !== false) {
            $hasil[] = $n;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Eksperimen Mandiri</title>
</head>
<body>
    <h2>1. Rata-rata Nilai</h2>
    <p>Tugas <?= $tugas ?>, UTS <?= $uts ?>, UAS <?= $uas ?></p>
    <p>Rata-rata: <?= number_format($rata, 2) ?></p>

    <h2>2. Cari Nama</h2>
    <form method="GET" action="">
        <label for="kata">Nama:</label>
        <input id="kata" name="kata" type="text"
               value="<?= htmlspecialchars($kata, ENT_QUOTES, "UTF-8") ?>">
        <button type="submit">Cari</button>
    </form>
    <?php if ($kata !== ""): ?>
        <?php if ($hasil): ?>
            <p>Ditemukan <?= count($hasil) ?> nama:</p>
            <ul>
                <?php foreach ($hasil as $n): ?>
                    <li><?= htmlspecialchars($n, ENT_QUOTES, "UTF-8") ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Tidak ada nama yang cocok.</p>
        <?php endif; ?>
    <?php endif; ?>

    <h2>3. Format Rupiah</h2>
    <p><?= formatRupiah(150000) ?></p>
    <p><?= formatRupiah(2500000) ?></p>
    <p><?= formatRupiah(75500) ?></p>
</body>
</html>