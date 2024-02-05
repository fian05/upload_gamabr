<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Tampil</title>
</head>
<body>
    <a href="{{ route('tambah-data') }}">Tambah Data</a>
    <table border="1">
        <tr>
            <td>No.</td>
            <td>Nama Gambar</td>
            <td>Gambar</td>
            <td>Harga</td>
            <td>Stok</td>
            <td>Aksi</td>
        </tr>
        @foreach ($datas as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->nama_produk }}</td>
                <td><img src="{{ asset('media/photos/upload/'.$data->gambar_produk) }}" width="200"></td>
                <td>{{ $data->harga_produk }}</td>
                <td>{{ $data->stok_produk }} unit</td>
                <td>Edit | Hapus</td>
            </tr>
        @endforeach
    </table>
</body>
</html>