@extends('layouts.citizen') {{-- Or your main layout file --}}

@section('content')
<div class="container mt-5">
    <h2>Complaint Details - #{{ $complaint->id }}</h2>
    <hr>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $complaint->category }}</h5>
            <p class="card-text"><strong>Description:</strong> {{ $complaint->description }}</p>
            <p class="card-text"><strong>Location:</strong> {{ $complaint->location }}</p>
            <p class="card-text"><strong>Submitted by:</strong> {{ $complaint->first_name }} {{ $complaint->last_name }} ({{ $complaint->email }})</p>
            <p class="card-text"><strong>Contact:</strong> {{ $complaint->contact_no }}</p>
            <p class="card-text"><strong>Submitted on:</strong> {{ $complaint->created_at->toFormattedDateString() }}</p>
            @if($complaint->photo_path)
                <img src="{{ asset('storage/' . $complaint->photo_path) }}" class="img-fluid rounded mt-3" alt="Attached Photo">
            @endif
        </div>
    </div>
    <a href="{{ route('complaints.index') }}" class="btn btn-primary mt-3">Back to List</a>
</div>
@endsection
