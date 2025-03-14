<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMS PPOB-Muhammad Risyad Rahmadi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .saldo-box {
            background: #d32f2f;
            color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            font-size: 1.2rem;
            font-weight: bold;
        }
        .transaction-item {
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }
        .text-success { color: green; }
        .text-danger { color: red; }
        .show-more {
            text-align: center;
            padding: 10px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="assets/image/logo.png" alt="Logo" width="40" height="40" class="me-2">
            <span>SIMS PPOB</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="/dashboard">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="topup">Top Up</a></li>
                <li class="nav-item"><a class="nav-link active text-danger fw-bold" href="#">Transaction</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('akun') ?>">Akun</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Container -->
<div class="container mt-4">
    <!-- Informasi Pengguna -->
    <div class="d-flex align-items-center mb-3">
        <img src="assets/image/Profile Photo.png" class="rounded-circle me-3" alt="User Avatar">
        <div>
            <h5 class="mb-0">Selamat datang,</h5>
            <h3 class="fw-bold">Kristanto Wibowo</h3>
        </div>
    </div>

    <!-- Saldo -->
    <div class="saldo-box mb-4">
        <p>Saldo Anda</p>
        <p>Rp •••••••</p>
        <a href="#" class="text-white">Lihat Saldo</a>
    </div>

    <!-- Riwayat Transaksi -->
    <h5 class="fw-bold">Semua Transaksi</h5>
    <div class="list-group mt-3" id="riwayatTransaksi"></div>

    <!-- Tombol Hapus Riwayat -->
    <div class="mt-3 text-center">
        <button class="btn btn-danger" onclick="hapusRiwayat()">Hapus Riwayat</button>
    </div>

    <!-- Tombol Show More -->
    <div class="show-more">
        <a href="#" class="text-primary">Show more</a>
    </div>
</div>

<script>
    function loadRiwayat() {
        let riwayat = JSON.parse(localStorage.getItem("riwayatTopUp")) || [];
        let transactionList = document.getElementById("riwayatTransaksi");
        transactionList.innerHTML = "";

        riwayat.forEach((item, index) => {
            let textClass = item.nominal > 0 ? "text-success" : "text-danger";
            let transactionItem = `<div class="list-group-item transaction-item">
                <span class="${textClass} fw-bold"> ${item.nominal > 0 ? "+" : "-"} Rp ${item.nominal.toLocaleString("id-ID")}</span>
                <br><small>${item.waktu}</small>
            </div>`;
            transactionList.innerHTML += transactionItem;
        });
    }

    function hapusRiwayat() {
        if (confirm("Apakah Anda yakin ingin menghapus semua riwayat transaksi?")) {
            localStorage.removeItem("riwayatTopUp");
            loadRiwayat();
        }
    }

    window.onload = loadRiwayat;
</script>

</body>
</html>
