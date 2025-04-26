<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>testing bro</title>
</head>
<body>
    @foreach($siswas as $siswa)
        <ul>
            <li>Nama : {{$siswa->nama_murid}}</li>
            <li>Kelas : {{$siswa->kelas->nama_kelas}}</li>
            <li>Wali Murid : {{$siswa->wali_murid->nama_wali}}</li>
        </ul>
    @endforeach
</body>
</html>
