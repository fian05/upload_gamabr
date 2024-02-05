<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Tambah</title>
</head>
<body>
    <a href="{{ route('tampil') }}">Lihat Data</a>
    <form action="{{ route('submit-data') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="nama_produk" placeholder="Nama" required>
        <input type="number" name="stok_produk" min="0" placeholder="Stok" required>
        <input type="text" name="harga_produk" pattern="[0-9]+" placeholder="Harga" required>
        <input type="file" name="gambar_produk" accept="image/png, image/jpg, image/jpeg" required>
        <button type="submit">Tambah</button>
    </form>
</body>
</html>