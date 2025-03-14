<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Transaksi</title>
</head>
<body>
    <h1>Daftar Transaksi</h1>
    <table border="1">
    <tr>
        <th>ID</th>
        <th>User ID</th>
        <th>Jumlah</th>
        <th>Jenis Transaksi</th>
        <th>Tanggal</th>
    </tr>
    <?php if (!empty($transactions)) : ?>
        <?php foreach ($transactions as $transaction) : ?>
            <tr>
                <td><?= $transaction['id'] ?></td>
                <td><?= $transaction['user_id'] ?></td>
                <td><?= $transaction['jumlah'] ?></td>
                <td><?= $transaction['jenis_transaksi'] ?></td>
                <td><?= $transaction['tanggal'] ?></td>
            </tr>
        <?php endforeach; ?>
    <?php else : ?>
        <tr><td colspan="5">Tidak ada transaksi.</td></tr>
    <?php endif; ?>
</table>

</body>
</html>
