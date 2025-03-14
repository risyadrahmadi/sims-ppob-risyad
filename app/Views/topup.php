<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMS PPOB-Muhammad Risyad Rahmadi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert2 -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            padding: 15px;
        }
        .navbar-brand {
            font-weight: bold;
        }
        .navbar-nav .nav-link {
            color: black;
            font-weight: bold;
        }
        .navbar-nav .nav-link.active {
            color: red;
        }
        .saldo-box {
            background-color: #e74c3c;
            color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: left;
        }
        .avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
        }
        .topup-box {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        }
        .topup-btn {
            width: 100%;
            background-color: #e74c3c;
            border: none;
            color: white;
            padding: 10px;
            border-radius: 5px;
            font-size: 16px;
        }
        .topup-btn:hover {
            background-color: #c0392b;
        }
        .topup-amount {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .topup-amount button {
            flex: 1 1 calc(33.33% - 10px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: white;
            cursor: pointer;
            transition: background 0.2s;
        }
        .topup-amount button:hover {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-white">
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
                <li class="nav-item"><a class="nav-link" href="dashboard">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link active" href="#">Top Up</a></li>
                <li class="nav-item"><a class="nav-link" href="transaction">Transaction</a></li>
                <li class="nav-item"><a class="nav-link" href="akun">Akun</a></li>
                <li class="nav-item"><a class="nav-link text-danger" href="#" onclick="logout()">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Konten -->
<div class="container mt-4">
    <div class="row align-items-center mb-3">
        <div class="col-md-6 d-flex align-items-center">
            <img src="assets/image/Profile Photo.png" alt="Profile" class="avatar">
            <h4 class="mb-0">Kristanto Wibowo</h4>
        </div>
        <div class="col-md-6 text-end">
            <div class="saldo-box">
                <h6>Saldo Anda</h6>
                <h2>Rp <span id="saldo">0</span></h2>
            </div>
        </div>
    </div>

    <!-- Form Top Up -->
    <div class="topup-box">
        <h5>Silahkan masukkan <strong>Nominal Top Up</strong></h5>
        <input type="number" id="inputNominal" class="form-control mt-2" placeholder="Masukkan nominal Top Up">
        
        <div class="topup-amount mt-3">
            <button onclick="pilihNominal(10000)">Rp10.000</button>
            <button onclick="pilihNominal(20000)">Rp20.000</button>
            <button onclick="pilihNominal(50000)">Rp50.000</button>
            <button onclick="pilihNominal(100000)">Rp100.000</button>
            <button onclick="pilihNominal(250000)">Rp250.000</button>
            <button onclick="pilihNominal(500000)">Rp500.000</button>
        </div>

        <button class="topup-btn mt-3" id="btnTopUp" onclick="prosesTopUp()">Top Up</button>
    </div>
</div>

<script>
    let saldo = 0;

    function prosesTopUp() {
        let nominal = parseInt(document.getElementById("inputNominal").value);
        if (isNaN(nominal) || nominal <= 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Masukkan nominal yang valid!',
                confirmButtonColor: '#e74c3c'
            });
            return;
        }

        saldo += nominal;
        document.getElementById("saldo").innerText = saldo.toLocaleString("id-ID");

        // Simpan ke localStorage untuk halaman transaksi
        let riwayat = JSON.parse(localStorage.getItem("riwayatTopUp")) || [];
        riwayat.push({ nominal: nominal, waktu: new Date().toLocaleString() });
        localStorage.setItem("riwayatTopUp", JSON.stringify(riwayat));

        document.getElementById("inputNominal").value = "";

        // Notifikasi sukses dengan animasi
        Swal.fire({
            title: 'Top Up Berhasil!',
            text: 'Saldo Anda bertambah Rp ' + nominal.toLocaleString("id-ID"),
            icon: 'success',
            showConfirmButton: false,
            timer: 2000
        }).then(() => {
            window.location.href = "transaction"; // Redirect setelah notifikasi
        });
    }

    function pilihNominal(nominal) {
        document.getElementById("inputNominal").value = nominal;
    }

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
