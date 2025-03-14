<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMS PPOB-Muhammad Risyad Rahmadi</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
    <!-- SweetAlert2 (Popup Notifikasi) -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            background: linear-gradient(135deg, #ff9a9e, #fad0c4);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .login-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 850px;
            width: 100%;
            display: flex;
            align-items: center;
            overflow: hidden;
        }
        .login-form {
            flex: 1;
            padding: 2rem;
            text-align: center;
        }
        .login-title {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }
        .btn-red {
            background-color: #dc3545;
            color: white;
        }
        .btn-red:hover {
            background-color: #c82333;
        }
        .register-link {
            text-align: center;
            margin-top: 15px;
        }
        .login-image {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            padding: 20px;
        }
        .login-image img {
            max-width: 100%;
            max-height: 400px;
            object-fit: contain;
        }
        .navbar-brand {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }
        .navbar-brand img {
            width: 50px;
            height: 50px;
            margin-right: 10px;
        }
        .navbar-brand span {
            font-size: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="login-container">
    <!-- Form Login -->
    <div class="login-form">
        <a class="navbar-brand" href="#">
            <img src="assets/image/logo.png" alt="Logo">
            <span>SIMS PPOB</span>
        </a>
        
        <form id="loginForm" action="<?= base_url('/login') ?>" method="post">
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Masukkan Email" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
            </div>
            <button type="submit" id="loginButton" class="btn btn-red w-100">Login</button>
        </form>

        <p class="register-link">Belum punya akun? <a href="<?= base_url('/register') ?>">Daftar</a></p>
    </div>

    <!-- Gambar di sebelah kanan -->
    <div class="login-image">
        <img src="assets/image/Illustrasi Login.png" alt="Ilustrasi 3D Orang Berjalan">
    </div>
</div>

<!-- JavaScript untuk notifikasi login -->
<script>
document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Mencegah reload halaman

    var form = this;
    var formData = new FormData(form);
    var loginButton = document.getElementById("loginButton");

    // Matikan tombol sementara agar tidak diklik dua kali
    loginButton.disabled = true;
    loginButton.innerText = "Memproses...";

    fetch(form.action, {
        method: form.method,
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire({
                title: "Login Berhasil!",
                text: "Anda akan diarahkan ke dashboard.",
                icon: "success",
                confirmButtonText: "OK",
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "<?= base_url('/dashboard') ?>";
                }
            });
        } else {
            Swal.fire({
                title: "Login Gagal!",
                text: "Email atau password salah.",
                icon: "error",
                confirmButtonText: "Coba Lagi"
            });
            // Aktifkan kembali tombol login jika gagal
            loginButton.disabled = false;
            loginButton.innerText = "Login";
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire({
            title: "Terjadi Kesalahan!",
            text: "Silakan coba lagi nanti.",
            icon: "error",
            confirmButtonText: "OK"
        });
        loginButton.disabled = false;
        loginButton.innerText = "Login";
    });
});
</script>

</body>
</html>
