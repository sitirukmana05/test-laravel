<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
            text-align: center;
        }
        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
        .container {
            display: flex;
            flex-direction: column; /* Change to column for small screens */
            gap: 20px; /* Menambahkan jarak antar elemen */
        }
        @media (min-width: 768px) {
            .container {
                flex-direction: row; /* Change back to row for larger screens */
            }
        }
        .data-admin {
            flex: 1;
            padding: 20px;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            text-align: left; /* Mengatur teks ke kiri untuk daftar admin */
        }
        .tambah-admin {
            flex: 0 0 300px; /* Mengatur lebar tetap untuk tambah admin */
            padding: 20px;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            text-align: left; /* Mengatur teks ke kiri untuk tambah admin */
        }
        table {
            width: 100%; /* Mengatur lebar tabel menjadi 100% */
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 8px;
            text-align: center;
            word-wrap: break-word;
        }
        th {
            background-color: #8b4513;
            color: white;
        }
        td {
            background-color: #fff4e6;
        }
        button {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            margin: 5px; /* Menambah margin antara tombol */
        }
        .btn-ubah {
            background-color: #ffcc00;
            color: #fff;
            transition: background-color 0.3s, transform 0.3s;
        }
        .btn-hapus {
            background-color: #ff6347;
            color: #fff;
            transition: background-color 0.3s, transform 0.3s;
        }
        .btn-ubah:hover {
            background-color: #ffdb33;
            transform: scale(1.05);
        }
        .btn-hapus:hover {
            background-color: #ff7f50;
            transform: scale(1.05);
        }
        .form-group {
            margin-bottom: 15px;
        }
        input[type="text"] {
            width: calc(100% - 20px); /* Mengurangi lebar input agar sesuai */
            padding: 10px; /* Menambah padding */
            margin-top: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .btn-simpan {
            background-color: #8b4513;
            color: white;
            font-weight: bold;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
        }

        /* Media Queries */
        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }
            .data-admin, .tambah-admin {
                width: 100%; /* Lebar penuh pada layar kecil */
            }
            .tambah-admin {
                max-width: 100%; /* Tabel tambah admin mengisi lebar penuh */
            }
        }
    </style>
</head>
<body>
    <h1>Admin</h1>

    <div class="container">
        <div class="data-admin">
            <h2>Daftar Admin</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID Admin</th>
                        <th>Username</th>
                        <th>Nama Admin</th>
                        <th>No Telepon</th>
                        <th>Password</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>AD1</td>
                        <td>admin1</td>
                        <td>Admin 1</td>
                        <td>08123456789</td>
                        <td>password1</td>
                        <td>
                            <a href="/edit-admin/AD1">
                                <button class="btn-ubah">Ubah</button>
                            </a>
                            <form action="/delete-admin/AD1" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-hapus" onclick="return confirm('Yakin dihapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>AD2</td>
                        <td>admin2</td>
                        <td>Admin 2</td>
                        <td>08123456780</td>
                        <td>password2</td>
                        <td>
                            <a href="/edit-admin/AD2">
                                <button class="btn-ubah">Ubah</button>
                            </a>
                            <form action="/delete-admin/AD2" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-hapus" onclick="return confirm('Yakin dihapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="tambah-admin">
            <h2>Tambah Admin</h2>
            <form action="/create-admin" method="POST">
                @csrf
                <div class="form-group">
                    <label for="username">Masukkan Username</label>
                    <input type="text" name="username" id="username" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <label for="nama_admin">Masukkan Nama Admin</label>
                    <input type="text" name="nama_admin" id="nama_admin" placeholder="Nama Admin" required>
                </div>
                <div class="form-group">
                    <label for="no_telepon">Masukkan No Telepon</label>
                    <input type="number" name="no_telepon" id="no_telepon" placeholder="No Telepon" required>
                </div>
                <div class="form-group">
                    <label for="password">Masukkan Password</label>
                    <input type="text" name="password" id="password" placeholder="Password" required>
                </div>
                <button type="submit" class="btn-simpan">Simpan</button>
            </form>
        </div>
    </div>
</body>
</html>
