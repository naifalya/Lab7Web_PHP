<?php
$data = null;
$error = [];
$nama = $nim = $prodi = $email = $semesterInput = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = trim($_POST["nama"] ?? "");
    $nim = trim($_POST["nim"] ?? "");
    $prodi = trim($_POST["prodi"] ?? "");
    $semesterInput = $_POST["semester"] ?? "";
    $email = trim($_POST["email"] ?? "");

    if ($nama === "") $error[] = "Nama wajib diisi.";
    if ($nim === "") {
        $error[] = "NIM wajib diisi.";
    } elseif (!ctype_digit($nim) || strlen($nim) !== 9) {
        $error[] = "NIM harus berupa 9 digit angka.";
    }
    if ($prodi === "") $error[] = "Program studi wajib diisi.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "Format email tidak valid.";
    }
    if (!ctype_digit((string)$semesterInput) ||
        (int)$semesterInput < 1 || (int)$semesterInput > 14) {
        $error[] = "Semester harus berupa angka 1–14.";
    }

    if (!$error) {
        $data = compact("nama", "nim", "prodi", "email");
        $data["semester"] = (int)$semesterInput;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Data Mahasiswa</title>
</head>
<body>
    <h1>Form Data Mahasiswa</h1>

    <?php if ($error): ?>
        <div style="color: red;">
            <p>Terdapat kesalahan:</p>
            <ul>
                <?php foreach ($error as $pesan): ?>
                    <li><?= htmlspecialchars($pesan, ENT_QUOTES, "UTF-8") ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" action="">
        <p>
            <label for="nama">Nama:</label><br>
            <input id="nama" name="nama" type="text"
                   value="<?= htmlspecialchars($nama, ENT_QUOTES, "UTF-8") ?>">
        </p>
        <p>
            <label for="nim">NIM:</label><br>
            <input id="nim" name="nim" type="text"
                   value="<?= htmlspecialchars($nim, ENT_QUOTES, "UTF-8") ?>">
        </p>
        <p>
            <label for="prodi">Program Studi:</label><br>
            <input id="prodi" name="prodi" type="text"
                   value="<?= htmlspecialchars($prodi, ENT_QUOTES, "UTF-8") ?>">
        </p>
        <p>
            <label for="semester">Semester:</label><br>
            <input id="semester" name="semester" type="text"
                   value="<?= htmlspecialchars((string)$semesterInput, ENT_QUOTES, "UTF-8") ?>">
        </p>
        <p>
            <label for="email">Email:</label><br>
            <input id="email" name="email" type="text"
                   value="<?= htmlspecialchars($email, ENT_QUOTES, "UTF-8") ?>">
        </p>
        <button type="submit">Kirim</button>
        <button type="reset">Reset</button>
    </form>

    <?php if ($data): ?>
        <h2>Ringkasan Data Mahasiswa</h2>
        <table border="1" cellpadding="6">
            <tr><td>Nama</td><td><?= htmlspecialchars($data["nama"], ENT_QUOTES, "UTF-8") ?></td></tr>
            <tr><td>NIM</td><td><?= htmlspecialchars($data["nim"], ENT_QUOTES, "UTF-8") ?></td></tr>
            <tr><td>Program Studi</td><td><?= htmlspecialchars($data["prodi"], ENT_QUOTES, "UTF-8") ?></td></tr>
            <tr><td>Semester</td><td><?= $data["semester"] ?></td></tr>
            <tr><td>Email</td><td><?= htmlspecialchars($data["email"], ENT_QUOTES, "UTF-8") ?></td></tr>
        </table>
    <?php endif; ?>
</body>
</html>