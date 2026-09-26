<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Kegiatan</title>
</head>
<body>
    <h1>Tambah Kegiatan Baru</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('activities.store') }}" method="POST">
        @csrf
        
        <div>
            <label>Judul Kegiatan (Min 5 Karakter):</label><br>
            <input type="text" name="title" value="{{ old('title') }}" required>
        </div>
        <br>
        
        <div>
            <label>Tanggal Kegiatan:</label><br>
            <input type="date" name="activity_date" value="{{ old('activity_date') }}" required>
        </div>
        <br>
        
        <div>
            <label>Status:</label><br>
            <select name="status" required>
                <option value="Planned" {{ old('status') == 'Planned' ? 'selected' : '' }}>Planned</option>
                <option value="Ongoing" {{ old('status') == 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
                <option value="Done" {{ old('status') == 'Done' ? 'selected' : '' }}>Done</option>
            </select>
        </div>
        <br>
        
        <button type="submit">Simpan</button>
        <a href="{{ route('activities.index') }}">Batal</a>
    </form>
</body>
</html>