<?php
include 'koneksi.php'; 
$hasil = null;
if (isset($_POST['cek'])) {
    $nisn = $_POST['nisn'];
    $query = mysqli_query($conn, "SELECT * FROM calon_siswa WHERE nisn = '$nisn'");
    $hasil = mysqli_fetch_assoc($query);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cek Hasil Seleksi - SMP Cempaka Putih</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <h2 class="fw-bold mb-4">Cek Status Kelulusan</h2>
                <div class="card shadow border-0 p-4 rounded-4">
                    <form action="" method="POST">
                        <label class="form-label">Masukkan NISN Kamu</label>
                        <input type="number" name="nisn" class="form-control mb-3 text-center" placeholder="Contoh: 0012345678" required>
                        <button type="submit" name="cek" class="btn btn-primary w-100 rounded-pill">Cek Hasil</button>
                    </form>
                    <?php if ($hasil): ?>
                        <div class="mt-4 p-3 border-top">
                            <h5>Halo, <strong><?php echo $hasil['nama_lengkap']; ?></strong>!</h5>
                            <p>Jalur: <?php echo $hasil['jalur_pendaftaran']; ?></p>
                            
                            <?php if ($hasil['status'] == 'Diterima'): ?>
                                <div class="alert alert-success fw-bold">SELAMAT! ANDA DINYATAKAN DITERIMA.</div>
                            <?php elseif ($hasil['status'] == 'Ditolak'): ?>
                                <div class="alert alert-danger fw-bold">MOHON MAAF, ANDA BELUM LOLOS.</div>
                            <?php else: ?>
                                <div class="alert alert-warning fw-bold">STATUS: MASIH DALAM PROSES (PENDING)</div>
                            <?php endif; ?>
                        </div>
                    <?php elseif (isset($_POST['cek'])): ?>
                        <div class="alert alert-secondary mt-4">Data NISN tidak ditemukan. Pastikan nomor sudah benar.</div>
                    <?php endif; ?>
                </div>
                <a href="index.html" class="btn btn-link mt-3 text-decoration-none text-muted">← Kembali ke Beranda</a>
            </div>
        </div>
    </div>
</body>
</html>