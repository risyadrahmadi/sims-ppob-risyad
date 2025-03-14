<!DOCTYPE html>
<html lang="id">
<head>
    <title>Dashboard | HIS PPOB</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Dashboard</h2>
        <div class="card p-3">
            <p><strong>Nama:</strong> <?= $user['name'] ?></p>
            <p><strong>Saldo:</strong> Rp<?= number_format($user['balance'], 2, ',', '.') ?></p>
        </div>
        <h4 class="mt-4">Layanan</h4>
        <ul>
            <?php foreach ($services as $service): ?>
                <li><?= $service['name'] ?> - Rp<?= number_format($service['price'], 2, ',', '.') ?></li>
            <?php endforeach; ?>
        </ul>
        <h4 class="mt-4">Banner</h4>
        <img src="<?= $banner ?>" class="img-fluid" alt="Promo">
        <a href="<?= base_url('logout') ?>" class="btn btn-danger mt-3">Logout</a>
    </div>
</body>
</html>
