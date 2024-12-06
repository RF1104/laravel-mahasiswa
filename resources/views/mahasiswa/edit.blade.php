<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }
        label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Edit Mahasiswa</h1>
    <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="nim">NIM:</label>
        <input type="text" name="nim" id="nim" value="{{ $mahasiswa->nim }}" required><br><br>

        <label for="nama_lengkap">Nama Lengkap:</label>
        <input type="text" name="nama_lengkap" id="nama_lengkap" value="{{ $mahasiswa->nama_lengkap }}" required><br><br>

        <label for="jurusan">Jurusan:</label>
        <input type="text" name="jurusan" id="jurusan" value="{{ $mahasiswa->jurusan }}" required><br><br>

        <label for="tempat_lahir">Tempat Lahir:</label>
        <input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ $mahasiswa->tempat_lahir }}" required><br><br>

        <label for="tanggal_lahir">Tanggal Lahir:</label>
        <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ $mahasiswa->tanggal_lahir }}" required><br><br>

        <label for="no_hp">No HP:</label>
        <input type="text" name="no_hp" id="no_hp" value="{{ $mahasiswa->no_hp }}" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ $mahasiswa->email }}" required><br><br>

        <label for="alamat_tinggal">Alamat Tinggal:</label>
        <textarea name="alamat_tinggal" id="alamat_tinggal" required>{{ $mahasiswa->alamat_tinggal }}</textarea><br><br>

        <label for="foto">Foto:</label>
        <input type="file" name="foto" id="foto"><br><br>

        <button type="submit">Update</button>
    </form>
</body>
</html>
