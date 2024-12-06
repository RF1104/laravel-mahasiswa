<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            padding: 20px;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        a {
            color: #4CAF50;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        button {
            padding: 5px 10px;
            color: white;
            background-color: #f44336;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #e53935;
        }
        img {
            border-radius: 50%;
            width: 50px;
            height: 50px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <a href="{{ route('mahasiswa.create') }}">Tambah Mahasiswa</a><br><br>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>NIM</th>
                <th>Nama Lengkap</th>
                <th>Jurusan</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mahasiswa as $key => $mhs)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>
                        @if ($mhs->foto)
                            <img src="{{ asset('storage/foto_mahasiswa/' . basename($mhs->foto)) }}" alt="Foto Mahasiswa">
                        @else
                            No Photo
                        @endif

                    </td>
                    <td>{{ $mhs->nim }}</td>
                    <td>{{ $mhs->nama_lengkap }}</td>
                    <td>{{ $mhs->jurusan }}</td>
                    <td>{{ $mhs->email }}</td>
                    <td>
                        <a href="{{ route('mahasiswa.edit', $mhs->id) }}">Edit</a> |
                        <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
