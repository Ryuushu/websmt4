<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Broadcast Promo</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <h1>Broadcast Promo Baru</h1>
    @if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
    @endif
    <form method="POST" action="{{ url('/broadcast-promo') }}">
        @csrf
        <div>
            <label for="title">Judul Promo:</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div>
            <label for="description">Deskripsi:</label>
            <textarea id="description" name="description" required></textarea>
        </div>
        <div>
            <label for="discount">Diskon (%):</label>
            <input type="number" id="discount" name="discount" required>
        </div>
        <button type="submit">Kirim Promo</button>
    </form>
</body>
</html>