<?php
function hitungDiskon($harga, $persen){
    $potongan = $harga * ($persen / 100);
    return $harga - $potongan;
}
function hitungLuasPersegiPanjang($panjang, $lebar) {
    return $panjang * $lebar;
}

function tentukanKelulusan($nilai) {
    if ($nilai >= 70) {
        return "Lulus";
    }
    return "Tidak Lulus";
}
$hargaAkhir = hitungDiskon(150000, 10);
echo "Harga setelah diskon: Rp" . number_format($hargaAkhir, 0, ",", ".");
echo "<br>Luas persegi panjang: " . hitungLuasPersegiPanjang(76, 23);
echo "<br>Status kelulusan: " . tentukanKelulusan(60);
?>