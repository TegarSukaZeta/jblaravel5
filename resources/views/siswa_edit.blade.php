<!DOCTYPE html>
<html>
<head>
    <title>Edit Siswa</title>
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
        <h2>Form Edit Siswa</h2>
        <form method="POST" action="{{route('siswa.update', $siswa)}}">
            @csrf
            @method('PUT')
            <label>NIS:</label>
            <input type="text" name="NIS" required value="{{$siswa->NIS}}">
            
            <label>Nama Siswa:</label>
            <input type="text" name="nama_murid" required value="{{$siswa->nama_murid}}">
            
            <label>Jenis Kelamin:</label>
            <select name="jenis_kelamin" required>
                <option value="L" {{($siswa->jenis_kelamin == 'L') ? 'selected' : ''}}>Laki-Laki</option>
                <option value="P" {{($siswa->jenis_kelamin == 'P') ? 'selected' : ''}}>Perempuan</option>
            </select>
            
            <label>Tempat Lahir:</label>
            <input type="text" name="tempat_lahir" required value="{{$siswa->tempat_lahir}}">
            
            <label>Tanggal Lahir:</label>
            <input type="date" name="tanggal_lahir" required value="{{$siswa->tanggal_lahir}}">
            
            <label>Kelas:</label>
            <select name="kelas_id" required>
                @foreach($kelas as $k)
                    <option value="{{$k->id}}" {{($siswa->id_kelas == $k->id) ? 'selected' : ''}}>{{$k->nama_kelas}}</option>
                @endforeach
            </select>
            
            <label>Wali Murid:</label>
            <select name="wali_murid_id" required>
                @foreach($wali_murid as $wali)
                    <option value="{{$wali->id}}" {{($siswa->id_wali_murid == $wali->id) ? 'selected' : ''}}>{{$wali->nama_wali}}</option>
                @endforeach
            </select>
            
            <button type="submit">Edit Siswa</button>
        </form>
    </div>
</body>
</html>
