<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMS PPOB-Muhammad Risyad Rahmadi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert2 -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .navbar a {
            text-decoration: none;
            color: black;
            font-weight: 600;
        }
        .welcome {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .saldo-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 20px;
        }
        .saldo-card {
            background-color: #ff4b5c;
            color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: left;
            width: 350px;
        }
        .saldo-card .saldo {
            font-size: 24px;
            font-weight: bold;
        }
        .lihat-saldo {
            color: white;
            text-decoration: underline;
        }
        .services {
            display: flex;
            flex-wrap: nowrap;
            overflow-x: auto;
            gap: 20px;
            padding-bottom: 10px;
            margin-top: 20px;
        }
        .service-item {
            text-align: center;
            flex: 0 0 auto;
            width: 100px;
        }
        .service-item img {
            width: 50px;
            height: 50px;
        }
        .promo-section {
            display: flex;
            gap: 10px;
            overflow-x: auto;
            padding-bottom: 10px;
            margin-top: 20px;
        }
        .promo-card {
            flex: 0 0 auto;
            width: 250px;
            padding: 15px;
            border-radius: 10px;
            color: white;
            text-align: left;
        }
        .bg-red { background-color: #d32f2f; }
        .bg-pink { background-color: #ec407a; }
        .bg-blue { background-color: #1976d2; }
        .bg-green { background-color: #388e3c; }
        .bg-brown { background-color: #795548; }
    </style>
</head>
<body>
    <nav class="navbar navbar-light bg-white px-4">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="assets/image/logo.png" alt="Logo" width="40" height="40" class="me-2">
            <span>SIMS PPOB</span>
        </a>
        <div>
            <a href="topup" class="mx-2">Top Up</a>
            <a href="transaction" class="mx-2">Transaction</a>
            <a href="akun" class="mx-2">Akun</a>
            <a href="#" class="mx-2 text-danger" onclick="logout()">Logout</a>
        </div>
    </nav>

    <div class="container mt-4">
        <!-- Baris Atas: Foto + Nama dan Saldo -->
        <div class="saldo-container">
            <div class="welcome">
                <img src="assets/image/Profile Photo.png" alt="User Avatar" class="rounded-circle" width="50">
                <h4>Selamat datang, <strong><?php echo "Kristanto Wibowo"; ?></strong></h4>
            </div>
            <div class="saldo-card">
                <h5>Saldo Anda</h5>
                <p class="saldo">Rp <?php echo str_repeat("•", 8); ?></p>
                <a href="#" class="lihat-saldo">Lihat Saldo 👁</a>
            </div>
        </div>

        <h5 class="mt-4">Layanan</h5>
        <div class="services">
            <?php 
            $services = [
                ["PBB", "assets/image/PBB.png"],
                ["Listrik", "assets/image/listrik.png"],
                ["Pulsa", "assets/image/Pulsa.png"],
                ["PDAM", "assets/image/PDAM.png"],
                ["PGN", "assets/image/PGN.png"],
                ["TV Langganan", "assets/image/Televisi.png"],
                ["Musik", "assets/image/Musik.png"],
                ["Voucher Game", "assets/image/Game.png"],
                ["Voucher Makanan", "assets/image/Voucher Makanan.png"],
                ["Kurban", "assets/image/kurban.png"],
                ["Zakat", "assets/image/zakat.png"],
                ["Paket Data", "assets/image/Paket Data.png"]
            ];

            foreach ($services as $service) {
                echo '<div class="service-item">
                        <img src="' . $service[1] . '" alt="' . $service[0] . '">
                        <p>' . $service[0] . '</p>
                      </div>';
            }
            ?>
        </div>

        <h5 class="mt-4">Temukan Promo Menarik</h5>
        <div class="promo-section">
            <?php 
            $promos = [
                ["", "", "", "assets/image/Banner 1.png"],
                ["", "", "", "assets/image/Banner 2.png"],
                ["", "", "", "assets/image/Banner 3.png"],
                ["","", "", "assets/image/Banner 4.png"],
                ["", "", "", "assets/image/Banner 5.png"]
            ];

            foreach ($promos as $promo) {
                echo '<div class="promo-card ' . $promo[2] . '">
                        <img src="' . $promo[3] . '" alt="' . $promo[0] . '" style="width:100%; border-radius:10px;">
                        <h6>' . $promo[0] . '</h6>
                        <p>' . $promo[1] . '</p>
                      </div>';
            }
            ?>
        </div>
    </div>

    <script>
        function logout() {
            Swal.fire({
                title: 'Logout?',
                text: 'Anda akan keluar dari akun ini.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e74c3c',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Logout'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "login";
                }
            });
        }
    </script>
</body>
</html>
