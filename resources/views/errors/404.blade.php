<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tidak Ditemukan</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f3f4f6;
        }
        
        .error-container {
            text-align: center;
            padding: 2rem;
        }
        
        .error-code {
            font-size: 8rem;
            font-weight: 600;
            color: #374151;
            margin: 0;
            line-height: 1;
        }
        
        .error-title {
            font-size: 2rem;
            color: #374151;
            margin: 1rem 0;
        }
        
        .error-message {
            color: #6b7280;
            margin-bottom: 2rem;
        }
        
        .back-button {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background-color: #3b82f6;
            color: white;
            text-decoration: none;
            border-radius: 0.375rem;
            transition: background-color 0.2s;
        }
        
        .back-button:hover {
            background-color: #2563eb;
        }

        @media (max-width: 640px) {
            .error-code {
                font-size: 6rem;
            }
            
            .error-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="error-container">
        <h1 class="error-code">404</h1>
        <h2 class="error-title">Halaman Tidak Ditemukan</h2>
        <p class="error-message">Maaf, halaman yang Anda cari tidak dapat ditemukan.</p>
        <a href="{{ url('/') }}" class="back-button">Kembali ke Beranda</a>
    </div>
</body>
</html>