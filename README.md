<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Angga Film</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; margin: 20px; }
        h1, h2 { color: #333; }
        code { background: #f4f4f4; padding: 5px; border-radius: 5px; }
        pre { background: #f4f4f4; padding: 10px; border-radius: 5px; overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
        th { background: #333; color: white; }
    </style>
</head>
<body>

    <h1>🎬 Movie Explorer API 🎥</h1>
    <p><strong>Movie Explorer API</strong> adalah API berbasis Laravel untuk mencari, menampilkan, dan mengelola informasi film dari TMDb. Dengan API ini, Anda bisa mendapatkan daftar film populer, film dengan rating tertinggi, serta mencari film berdasarkan judul. 🚀</p>

    <h2>🌟 Fitur Utama</h2>
    <ul>
        <li>✅ <strong>Cari Film</strong> – Temukan film berdasarkan judul.</li>
        <li>✅ <strong>Film Populer</strong> – Jelajahi film yang sedang trending.</li>
        <li>✅ <strong>Rating Tertinggi</strong> – Lihat film dengan skor terbaik.</li>
        <li>✅ <strong>Film Terbaru</strong> – Dapatkan daftar film yang baru dirilis.</li>
    </ul>

    <h2>🔧 Teknologi yang Digunakan</h2>
    <ul>
        <li>🎯 <strong>Laravel</strong> – Framework PHP yang kuat dan fleksibel.</li>
        <li>🎯 <strong>TMDb API</strong> – Sumber data film yang lengkap dan up-to-date.</li>
        <li>🎯 <strong>MySQL</strong> – Database untuk menyimpan data film.</li>
    </ul>

    <h2>🚀 Cara Menggunakan</h2>
    <ol>
        <li>Clone repositori ini:  
            <pre><code>git clone https://github.com/Gezod/iae_1_monolith_api.git</code></pre>
        </li>
        <li>Masuk ke direktori proyek:  
            <pre><code>cd iae_1_monolith_api</code></pre>
        </li>
        <li>Install dependensi Laravel:  
            <pre><code>composer install</code></pre>
        </li>
        <li>Buat file <code>.env</code> dan atur konfigurasi database serta API Key TMDb:  
            <pre><code>cp .env.example .env
php artisan key:generate</code></pre>
            Lalu edit file <code>.env</code> dan tambahkan API Key TMDb:  
            <pre><code>TMDB_TOKEN=your_tmdb_api_key</code></pre>
        </li>
        <li>Jalankan migrasi database:  
            <pre><code>php artisan migrate</code></pre>
        </li>
        <li>Jalankan server:  
            <pre><code>php artisan serve</code></pre>
        </li>
        <li>API bisa diakses melalui:  
            <pre><code>http://localhost:8000/api/movies</code></pre>
        </li>
    </ol>

    <h2>🔥 Contoh Endpoint API</h2>
    <table>
        <thead>
            <tr>
                <th>Method</th>
                <th>Endpoint</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>GET</td>
                <td><code>/api/movies</code></td>
                <td>Mendapatkan daftar film populer</td>
            </tr>
            <tr>
                <td>GET</td>
                <td><code>/api/movies?filter=top-rated</code></td>
                <td>Mendapatkan film dengan rating tertinggi</td>
            </tr>
            <tr>
                <td>GET</td>
                <td><code>/api/movies?filter=latest</code></td>
                <td>Mendapatkan film terbaru</td>
            </tr>
            <tr>
                <td>GET</td>
                <td><code>/api/movies?title=Batman</code></td>
                <td>Mencari film berdasarkan judul</td>
            </tr>
            <tr>
                <td>GET</td>
                <td><code>/api/movies/{id}</code></td>
                <td>Mendapatkan detail film berdasarkan ID</td>
            </tr>
        </tbody>
    </table>

    <h2>🎭 Jelajahi Dunia Film!</h2>
    <p>Apakah Anda siap menemukan film terbaik? 🎥✨</p>
    <p>Selamat menonton dan menikmati dunia sinema! 🍿🎬</p>

</body>
</html>
