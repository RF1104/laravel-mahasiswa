<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
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
    <h1>Tambah Mahasiswa</h1>
    <form action="{{ route('mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
    
        <label for="nim">NIM:</label>
        <input type="text" name="nim" id="nim" value="{{ old('nim') }}" required placeholder="Masukkan NIM">
        @error('nim')
            <div style="color: red;">{{ $message }}</div>
        @enderror
    
        <label for="nama_lengkap">Nama Lengkap:</label>
        <input type="text" name="nama_lengkap" id="nama_lengkap" value="{{ old('nama_lengkap') }}" required placeholder="Masukkan Nama Lengkap">
        @error('nama_lengkap')
            <div style="color: red;">{{ $message }}</div>
        @enderror
    
        <label for="jurusan">Jurusan:</label>
        <input type="text" name="jurusan" id="jurusan" value="{{ old('jurusan') }}" required placeholder="Masukkan Jurusan">
        @error('jurusan')
            <div style="color: red;">{{ $message }}</div>
        @enderror
    
        <label for="tempat_lahir">Tempat Lahir:</label>
        <input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir') }}" required placeholder="Masukkan Tempat Lahir">
        @error('tempat_lahir')
            <div style="color: red;">{{ $message }}</div>
        @enderror
    
        <label for="tanggal_lahir">Tanggal Lahir:</label>
        <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
        @error('tanggal_lahir')
            <div style="color: red;">{{ $message }}</div>
        @enderror
    
        <label for="no_hp">No HP:</label>
        <input type="text" name="no_hp" id="no_hp" value="{{ old('no_hp') }}" required placeholder="Masukkan No HP">
        @error('no_hp')
            <div style="color: red;">{{ $message }}</div>
        @enderror
    
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required placeholder="Masukkan Email">
        @error('email')
            <div style="color: red;">{{ $message }}</div>
        @enderror
    
        <label for="alamat_tinggal">Alamat Tinggal:</label>
        <textarea name="alamat_tinggal" id="alamat_tinggal" required placeholder="Masukkan Alamat Tinggal">{{ old('alamat_tinggal') }}</textarea>
        @error('alamat_tinggal')
            <div style="color: red;">{{ $message }}</div>
        @enderror
    
        <label for="foto">Foto:</label>
        <input type="file" name="foto" id="foto" accept="image/*">
        @error('foto')
            <div style="color: red;">{{ $message }}</div>
        @enderror
    
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
