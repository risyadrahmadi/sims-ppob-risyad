<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akun - SIMS PPOB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .profile-card {
            max-width: 500px;
            margin: auto;
            padding: 20px;
            background: white;
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .profile-picture {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            display: block;
            margin: 0 auto;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand text-danger fw-bold" href="#">SIMS PPOB</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="/dashboard">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="/topup">Top Up</a></li>
                <li class="nav-item"><a class="nav-link" href="/transaction">Transaction</a></li>
                <li class="nav-item"><a class="nav-link active text-danger fw-bold" href="/akun">Akun</a></li>
                <li class="nav-item">
                    <a class="nav-link text-danger fw-bold" href="<?= base_url('logout') ?>">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Profile Card -->
<div class="container mt-5">
    <div class="profile-card">
        <div class="text-center">
            <img src="<?= base_url('assets/image/Profile Photo.png') ?>" alt="Foto Profil" class="profile-picture">
            <h3 class="fw-bold mt-3"><?= esc($user['full_name']) ?></h3>
            <p class="text-muted">Foto Profil</p>
        </div>

        <!-- Notifikasi sukses -->
        <?php if(session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <form method="post" action="<?= base_url('akun/update') ?>" class="mt-3">
            <label>Nama Lengkap</label>
            <input type="text" name="full_name" class="form-control mb-3" value="<?= esc($user['full_name']) ?>" required>

            <label>Nomor Telepon</label>
            <input type="text" name="phone_number" class="form-control mb-3" value="<?= esc($user['phone_number']) ?>" required>

            <label>Alamat</label>
            <textarea name="address" class="form-control mb-3" required><?= esc($user['address']) ?></textarea>

            <label>Email</label>
            <input type="email" name="email" class="form-control mb-3" value="<?= esc($user['email']) ?>" required>

            <button type="submit" class="btn btn-danger w-100">Simpan</button>
        </form>
    </div>
</div>

</body>
</html>
