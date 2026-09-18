<?php
// Koneksi ke Database
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_sekolah";

$conn = mysqli_connect($host, $user, $pass, $db);

// Logika Simpan Data
if (isset($_POST['daftar'])) {
    // 1. Tambahkan variabel baru sesuai input form
    $nama  = $_POST['nama'];
    $nisn  = $_POST['nisn']; // Baru
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp']; // Baru
    $asal  = $_POST['asal_sekolah'];

    // 2. Sesuaikan Query INSERT dengan kolom di database
    $query = "INSERT INTO calon_siswa (nama_lengkap, nisn, asal_sekolah, email, no_hp) 
              VALUES ('$nama', '$nisn', '$asal', '$email', '$no_hp')";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Pendaftaran Berhasil!'); window.location='index.html';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Pendaftaran - SMP Cendekia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f0f2f5; padding-top: 50px; padding-bottom: 50px; }
        .form-card { max-width: 500px; margin: auto; background: white; padding: 30px; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
    </style>
</head>
<body>

<div class="container">
    <div class="form-card">
        <h3 class="fw-bold text-center mb-4">Formulir Pendaftaran Siswa Baru</h3>
        <form action="" method="POST">
            <!-- Nama Lengkap -->
            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama sesuai ijazah" required>
            </div>

            <!-- NISN (Baru) -->
            <div class="mb-3">
                <label class="form-label">NISN</label>
                <input type="number" name="nisn" class="form-control" placeholder="10 Digit NISN" required>
            </div>

            <!-- Asal Sekolah -->
            <div class="mb-3">
                <label class="form-label">Asal Sekolah</label>
                <input type="text" name="asal_sekolah" class="form-control" placeholder="Contoh: SDN 01 Jakarta" required>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label class="form-label">Email Aktif</label>
                <input type="email" name="email" class="form-control" placeholder="nama@email.com" required>
            </div>

            <!-- No HP/WA (Baru) -->
            <div class="mb-4">
                <label class="form-label">Nomor WhatsApp</label>
                <input type="text" name="no_hp" class="form-control" placeholder="08xxxxxxxxxx" required>
            </div>

            <button type="submit" name="daftar" class="btn btn-primary w-100 py-2 fw-bold">Kirim Pendaftaran</button>
            <a href="index.html" class="btn btn-light w-100 mt-2 text-muted">Batal</a>
        </form>
    </div>
</div>

</body>
</html>