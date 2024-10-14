<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Barang</title>
</head>
<body> 
    <h1>Edit Data Barang</h1>
    <form action="/databarangs/{{ $dataBarangs->id_barang }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="nama_barang" value="{{ $dataBarangs->nama_barang }}" required>
        <input type="text" name="harga_barang" value="{{ $dataBarangs->harga_barang }}" required>
        <button type="submit" class="button">Simpan Perubahan</button>
    </form>    
</body>
</html>
