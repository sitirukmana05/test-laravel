<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3e5f5;
            margin: 0;
            padding: 20px;
        }
        h1, h2 {
            color: #6a1b9a;
        }
        .wrapper {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }
        .container, .form-container {
            width: 48%; /* Memberikan ruang yang sama antara daftar barang dan form */
        }
        /* Memodifikasi tampilan tabel agar serupa dengan form */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #e1bee7; /* Latar belakang tabel dibuat sama dengan form */
            border-radius: 10px;
            overflow: hidden;
        }
        table, th, td {
            border: 1px solid #d1c4e9;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #8e24aa;
            color: white;
        }
        .button {
            padding: 10px 15px;
            margin-top: 10px;
            background-color: #8e24aa;
            color: white;
            border: none;
            cursor: pointer;
            text-decoration: none;
            border-radius: 5px;
        }
        .button:hover {
            background-color: #6a1b9a;
        }
        form {
            margin-top: 20px;
        }
        input {
            padding: 10px;
            margin: 5px;
            border: 1px solid #d1c4e9;
            border-radius: 5px;
            width: calc(100% - 22px); /* Menyesuaikan lebar input */
            background-color: #f3e5f5;
        }
        input:focus {
            outline: none;
            border-color: #8e24aa;
        }
        .form-container {
            background-color: #e1bee7;
            padding: 20px;
            border-radius: 10px;
            height: fit-content; /* Menyelaraskan tinggi form dengan konten */
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <!-- Daftar Barang -->
        <div class="container">
            <h1>Daftar Barang</h1>
            <table>
                <thead>
                    <tr>
                        <th>ID Barang</th>
                        <th>Nama Barang</th>
                        <th>Harga Barang</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataBarangs as $dataBarang)
                        <tr>
                            <td>{{ $dataBarang->id_barang }}</td>
                            <td>{{ $dataBarang->nama_barang }}</td>
                            <td>{{ $dataBarang->harga_barang }}</td>
                            <td>
                                <a href="/edit-databarang/{{ $dataBarang->id_barang }}" class="button">Edit</a>
                                <form action="/databarangs/{{ $dataBarang->id_barang }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="button" onclick="return confirm('Apakah Anda yakin ingin menghapus?');">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Form Tambah Barang -->
        <div class="form-container">
            <h2>Tambah Barang Baru</h2>
            <form action="/databarangs" method="POST">
                @csrf
                <input type="text" name="nama_barang" placeholder="Nama Barang" required>
                <input type="text" id="harga_barang" name="harga_barang" placeholder="Harga Barang" required>
                <button type="submit" class="button">Tambah Barang</button>
            </form>
        </div>
    </div>

    <script>
        // Fungsi untuk memformat angka menjadi format Rupiah
        function formatRupiah(angka, prefix){
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split   		= number_string.split(','),
            sisa     		= split[0].length % 3,
            rupiah     		= split[0].substr(0, sisa),
            ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
        
            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if(ribuan){
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
        
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }

        // Event listener untuk input harga barang
        var hargaInput = document.getElementById('harga_barang');
        hargaInput.addEventListener('keyup', function(e) {
            hargaInput.value = formatRupiah(this.value, 'Rp. ');
        });
    </script>
</body>
</html>
