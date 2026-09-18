<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_sekolah"; 
$conn = mysqli_connect($host, $user, $pass, $db);

if (isset($_POST['kirim'])) {
    $nama   = $_POST['nama'];
    $nisn   = $_POST['nisn'];
    $asal   = $_POST['asal_sekolah'];
    $email  = $_POST['email'];
    $no_hp  = $_POST['no_hp'];
    $prestasi = $_POST['info_prestasi'];
    $jalur  = "Prestasi"; 

    $query = "INSERT INTO calon_siswa (nama_lengkap, nisn, asal_sekolah, email, no_hp, jalur_pendaftaran) 
              VALUES ('$nama', '$nisn', '$asal', '$email', '$no_hp', '$jalur')";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Pendaftaran Jalur Prestasi Berhasil Disimpan!');
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
    <title>Pendaftaran Jalur Prestasi - SMP Cempaka Putih</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .card-prestasi { border: none; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        /* Warna Merah untuk Prestasi */
        .header-prestasi { background: linear-gradient(145deg, #d02239, #d02239); color: white; border-radius: 20px 20px 0 0; padding: 30px; }
    </style>
</head>
<body class="py-5">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <!-- Menambahkan border-radius dan shadow agar serasi dengan kartu di luar -->
            <div class="card card-prestasi shadow border-0" style="border-radius: 20px; overflow: hidden;">
                
                <!-- HEADER FORM: Menggunakan gradasi Royal Blue dari Jalur Prestasi -->
                <div class="header-prestasi text-center py-4 text-white" style="background: linear-gradient(145deg, #0250c5, #3182ce);">
                    <h2 class="fw-bold mb-0 fs-3">PENDAFTARAN SISWA BARU</h2>
                    <p class="mb-0 small opacity-75">Kategori: Jalur Prestasi (Akademik/Non-Akademik)</p>
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
                            <div class="col-md-12 mb-3">
                                <label class="form-label fw-bold">Prestasi yang Dimiliki</label>
                                <textarea name="info_prestasi" class="form-control" rows="2" placeholder="Contoh: Juara 1 Lomba Matematika Tingkat Kota"></textarea>
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

                        <!-- ALERT: Diubah dari merah (danger) ke biru info agar tidak terlalu kontras/menakutkan -->
                        <div class="alert alert-info small py-2 border-0" style="background-color: #e3f2fd; color: #0d47a1;">
                            <strong>Penting:</strong> Siapkan sertifikat asli untuk diverifikasi saat pengumuman nanti.
                        </div>

                        <!-- TOMBOL AKSI: Menggunakan warna utama Royal Blue -->
                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" name="kirim" class="btn btn-lg fw-bold rounded-pill shadow text-white" style="background: linear-gradient(145deg, #0250c5, #3182ce); border: none;">
                                Kirim Pendaftaran Prestasi
                            </button>
                            <a href="index.html" class="btn btn-link text-muted text-decoration-none">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>