<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kelas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container nt-4">
        <h2 class="mb-3">Data Wali Murid</h2>
        <div class="d-flex justify-content-between mb-3">
            <div>
                <a href="{{route('siswa.index')}}" class="btn btn-primary">Kelola Siswa</a>
                <a href="{{route('kelas.index')}}" class="btn btn-primary">Kelola Kelas</a>
            </div>
            <form method="GET" class="d-flex" action="{{route('wali_murid.index')}}">
                <input type="text" name="search" class="form-control me-2" placeholder="Cari siswa..." value="{{request('search')}}">
                <button type="submit" class="btn btn-success">Cari</button>
            </form>
            <a href="{{route('wali_murid.create')}}" class="btn btn-success">Tambah Wali Murid</a>
        </div>
        @if(session('error'))
            <div class="alert alert-danger" role="alert">
                {{session('error')}}
            </div>
        @elseif(session('success'))
            <div class="alert alert-success" role="alert">
                {{session('success')}}
            </div>
        @endif
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Nama Wali Murid</th>
                    <th>Kontak</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($wali_murids as $wali_murid)
                    <tr>
                        <td>{{$wali_murid->nama_wali}}</td>
                        <td>{{$wali_murid->kontak}}</td>
                        <td>
                            <a href="{{route('wali_murid.edit', $wali_murid)}}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('wali_murid.destroy', $wali_murid) }}" method="post" class="d-inline">
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
            {{ $wali_murids->appends(['search' => request('search')])->links('pagination::bootstrap-5') }}
        </nav>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</body>
</html>