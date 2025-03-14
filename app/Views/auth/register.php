<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | HIS PPOB</title>
    
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
        .register-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 850px;
            width: 100%;
            display: flex;
            align-items: center;
            overflow: hidden;
        }
        .register-form {
            flex: 1;
            padding: 2rem;
        }
        .register-title {
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
        .login-link {
            text-align: center;
            margin-top: 15px;
        }
        .register-image {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            padding: 20px;
        }
        .register-image img {
            max-width: 100%;
            height: auto;
            object-fit: cover;
        }
    </style>
</head>
<body>

<div class="register-container">
    <!-- Form Register di sebelah kiri -->
    <div class="register-form">
        <h2 class="register-title">Buat Akun Baru</h2>
        
        <form action="<?= base_url('/register') ?>" method="post" onsubmit="showSuccessAlert(event)">
            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="full_name" class="form-control" placeholder="Masukkan Nama Lengkap" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nomor Telepon</label>
                <input type="text" name="phone_number" class="form-control" placeholder="Masukkan Nomor Telepon" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="address" class="form-control" placeholder="Masukkan Alamat"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Masukkan Email" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
            </div>
            <button type="submit" class="btn btn-red w-100">Daftar</button>
        </form>

        <p class="login-link">Sudah punya akun? <a href="<?= base_url('/login') ?>">Login</a></p>
    </div>

    <!-- Gambar di sebelah kanan -->
    <div class="register-image">
        <img src="<?= base_url('assets/image/b.png') ?>" alt="Ilustrasi 3D Orang Berjalan">
    </div>
</div>

<!-- JavaScript untuk menampilkan popup setelah pendaftaran berhasil -->
<script>
    function showSuccessAlert(event) {
        event.preventDefault(); // Mencegah form langsung submit

        Swal.fire({
            title: "Pendaftaran Berhasil!",
            text: "Akun Anda telah berhasil dibuat. Silakan login untuk melanjutkan.",
            icon: "success",
            confirmButtonText: "OK",
            allowOutsideClick: false
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?= base_url('/login') ?>"; // Redirect ke halaman login
            }
        });
    }
</script>

</body>
</html>
