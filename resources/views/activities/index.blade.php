@extends('layouts.app')

<form method="GET" action="{{ route('activities.index') }}">
        <label>Filter Status:</label>
        <select name="status">
            <option value="">Semua Data</option>
            <option value="Planned" {{ request('status') == 'Planned' ? 'selected' : '' }}>Planned</option>
            <option value="Ongoing" {{ request('status') == 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
            <option value="Done" {{ request('status') == 'Done' ? 'selected' : '' }}>Done</option>
        </select>
        <button type="submit">Terapkan Filter</button>
    </form>
    <br>
    
@section('content')
    <h1>Daftar Kegiatan</h1>
    
    @forelse ($activities as $activity)
        <article class="card" style="border: 1px solid #ccc; padding: 15px; margin-bottom: 10px;">
            <h2 style="margin-top: 0;">
                <a href="{{ route('activities.show', $activity) }}">
                    {{ $activity->title }}
                </a>
            </h2>
            <p>{{ $activity->activity_date->format('d M Y') }}</p>
            <p>Status: {{ $activity->status }}</p>
        </article>
    @empty
        <p>Belum ada kegiatan.</p>
    @endforelse
@endsection