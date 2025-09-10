<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 | Halaman Tidak Ditemukan</title>
    <style>
        /* CSS Reset Sederhana */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body Styling */
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background-color: #f8fafc;
            color: #4a5568;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        /* Kontainer Utama */
        .container {
            padding: 2rem;
        }

        /* Teks Error 404 */
        .error-code {
            font-size: 8rem;
            font-weight: 800;
            color: #e2e8f0;
            text-shadow: 
                -1px -1px 0 #cbd5e0,  
                 1px -1px 0 #cbd5e0,
                -1px  1px 0 #cbd5e0,
                 1px  1px 0 #cbd5e0;
        }

        /* Pesan Error */
        .error-message {
            margin-top: 0.5rem;
            font-size: 1.5rem;
            font-weight: 500;
            color: #718096;
        }

        /* Deskripsi Error */
        .error-description {
            margin-top: 1rem;
            color: #a0aec0;
        }

        /* Tombol Kembali */
        .back-link {
            display: inline-block;
            margin-top: 2rem;
            padding: 0.75rem 1.5rem;
            background-color: #4299e1;
            color: #ffffff;
            text-decoration: none;
            border-radius: 0.5rem;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .back-link:hover {
            background-color: #2b6cb0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="error-code">404</div>
        <div class="error-message">Oops! Halaman Tidak Ditemukan</div>
        <p class="error-description">
            Maaf, halaman yang kamu cari sepertinya sudah hilang atau tidak pernah ada.
        </p>
        <a href="{{ url('/') }}" class="back-link">Kembali ke Beranda</a>
    </div>
</body>
</html>