<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container nt-4">
        <h2 class="mb-3">Data Siswa</h2>
        <div class="d-flex justify-content-between mb-3">
            <div>
                <a href="{{route('kelas.index')}}" class="btn btn-primary">Kelola Kelas</a>
                <a href="{{route('wali_murid.index')}}" class="btn btn-primary">Kelola Wali Murid</a>
            </div>
            <form method="GET" class="d-flex" action="{{route('siswa.index')}}">
                <input type="text" name="search" class="form-control me-2" placeholder="Cari siswa..." value="{{request('search')}}">
                <button type="submit" class="btn btn-success">Cari</button>
            </form>
            <a href="{{route('siswa.create')}}" class="btn btn-success">Tambah Siswa</a>
        </div>
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{session('success')}}
            </div>
        @endif
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Kelas</th>
                    <th>Wali Murid</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($siswas as $siswa)
                    <tr>
                        <td>{{$siswa->NIS}}</td>
                        <td>{{$siswa->nama_murid}}</td>
                        <td>{{$siswa->jenis_kelamin}}</td>
                        <td>{{$siswa->tempat_lahir}}</td>
                        <td>{{$siswa->tanggal_lahir}}</td>
                        <td>{{$siswa->kelas->nama_kelas}}</td>
                        <td>{{$siswa->wali_murid->nama_wali}}</td>
                        <td>
                            <a href="{{route('siswa.edit', $siswa)}}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('siswa.destroy', $siswa) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form> 
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        <nav>
            {{ $siswas->appends(['search' => request('search')])->links('pagination::bootstrap-5') }}
        </nav>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</body>
</html>