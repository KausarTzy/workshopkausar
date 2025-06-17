<?php include 'includes/header.php'; ?>
<?php include 'includes/db.php'; ?>

<h2>Kontak Saya</h2>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pesan = $_POST['pesan'];

    $stmt = $conn->prepare("INSERT INTO kontak (nama, email, pesan) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nama, $email, $pesan);
    if ($stmt->execute()) {
        echo '<div class="alert alert-success">Pesan berhasil dikirim!</div>';
    } else {
        echo '<div class="alert alert-danger">Gagal mengirim pesan.</div>';
    }
}
?>

<form method="post" class="mt-4">
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Pesan</label>
        <textarea name="pesan" class="form-control" rows="4" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Kirim</button>
</form>

<?php include 'includes/footer.php'; ?>
