<!DOCTYPE html>
<html>
<head>
    <title>Tambah Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h2 {
            text-align: center;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        input, select, button {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background: #28a745;
            color: white;
            font-size: 16px;
            cursor: pointer;
            margin-top: 15px;
        }
        button:hover {
            background: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Form Tambah Siswa</h2>
        <form method="POST" action="{{route('siswa.store')}}">
            @csrf
            <label>NIS:</label>
            <input type="text" name="NIS" required>
            
            <label>Nama Siswa:</label>
            <input type="text" name="nama_murid" required>
            
            <label>Jenis Kelamin:</label>
            <select name="jenis_kelamin" required>
                <option value="L">Laki-Laki</option>
                <option value="P">Perempuan</option>
            </select>
            
            <label>Tempat Lahir:</label>
            <input type="text" name="tempat_lahir" required>
            
            <label>Tanggal Lahir:</label>
            <input type="date" name="tanggal_lahir" required>
            
            <label>Kelas:</label>
            <select name="kelas_id" required>
                @foreach($kelas as $k)
                    <option value="{{$k->id}}">{{$k->nama_kelas}}</option>
                @endforeach
            </select>
            
            <label>Wali Murid:</label>
            <select name="wali_murid_id" required>
                @foreach($wali_murid as $wali)
                    <option value="{{$wali->id}}">{{$wali->nama_wali}}</option>
                @endforeach
            </select>
            
            <button type="submit">Tambah Siswa</button>
        </form>
    </div>
</body>
</html>
