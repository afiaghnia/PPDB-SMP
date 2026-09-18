<?php
// 1. KONEKSI KE DATABASE
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_sekolah"; 
$conn = mysqli_connect($host, $user, $pass, $db);

// 2. LOGIKA PENYIMPANAN DATA
if (isset($_POST['kirim'])) {
    $nama   = $_POST['nama'];
    $nisn   = $_POST['nisn'];
    $asal   = $_POST['asal_sekolah'];
    $email  = $_POST['email'];
    $no_hp  = $_POST['no_hp'];
    $jalur  = "Zonasi"; // Ini otomatis terisi 'Zonasi'

    // Pastikan nama kolom 'jalur_pendaftaran' sudah kamu buat di phpMyAdmin
    $query = "INSERT INTO calon_siswa (nama_lengkap, nisn, asal_sekolah, email, no_hp, jalur_pendaftaran) 
              VALUES ('$nama', '$nisn', '$asal', '$email', '$no_hp', '$jalur')";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Pendaftaran Jalur Zonasi Berhasil!');
                window.location='index.html';
              </script>";
    } else {
        echo "Gagal simpan data: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Jalur Zonasi - SMP Cempaka Putih</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .card-zonasi { border: none; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        .header-zonasi { background: linear-gradient(145deg, #0056b3, #007bff); color: white; border-radius: 20px 20px 0 0; padding: 30px; }
    </style>
</head>
<body class="py-5">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card card-zonasi">
                <div class="header-zonasi text-center">
                    <h2 class="fw-bold mb-0">PENDAFTARAN SISWA BARU</h2>
                    <p class="mb-0">Kategori: Jalur Zonasi</p>
                </div>
                <div class="card-body p-4">
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label fw-bold">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" placeholder="Sesuai Ijazah" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">NISN</label>
                                <input type="number" name="nisn" class="form-control" placeholder="10 Digit" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Asal Sekolah</label>
                                <input type="text" name="asal_sekolah" class="form-control" placeholder="SD Asal" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Email Aktif</label>
                                <input type="email" name="email" class="form-control" placeholder="email@gmail.com" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Nomor WhatsApp</label>
                                <input type="text" name="no_hp" class="form-control" placeholder="08xxxxxxxxxx" required>
                            </div>
                        </div>

                        <div class="alert alert-info small">
                            <strong>Info:</strong> Pastikan domisili sesuai dengan Kartu Keluarga untuk jalur Zonasi ini.
                        </div>

                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" name="kirim" class="btn btn-primary btn-lg fw-bold rounded-pill shadow">Kirim Pendaftaran</button>
                            <a href="index.html" class="btn btn-link text-muted">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>