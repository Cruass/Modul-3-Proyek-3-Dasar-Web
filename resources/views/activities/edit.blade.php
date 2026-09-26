<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Kegiatan</title>
</head>
<body>
    <h1>Edit Kegiatan</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('activities.update', $activity->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div>
            <label>Judul Kegiatan (Min 5 Karakter):</label><br>
            <input type="text" name="title" value="{{ old('title', $activity->title) }}" required>
        </div>
        <br>
        
        <div>
            <label>Tanggal Kegiatan:</label><br>
            <input type="date" name="activity_date" value="{{ old('activity_date', $activity->activity_date) }}" required>
        </div>
        <br>
        
        <div>
            <label>Status:</label><br>
            <select name="status" required>
                <option value="Planned" {{ old('status', $activity->status) == 'Planned' ? 'selected' : '' }}>Planned</option>
                <option value="Ongoing" {{ old('status', $activity->status) == 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
                <option value="Done" {{ old('status', $activity->status) == 'Done' ? 'selected' : '' }}>Done</option>
            </select>
        </div>
        <br>
        
        <button type="submit">Update Data</button>
        <a href="{{ route('activities.index') }}">Batal</a>
    </form>
</body>
</html>