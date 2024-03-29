@section('title', 'Student | ' . $student->user->name)
@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Student ID : <b>{{ $student->user->id }}</b></div>

    <div class="card-body">
        <h3 class="card-title">{{ $student->user->name }}</h3>
        <h5 class="card-subtitle mb-2 text-muted">{{ $student->user->email }}</h5>
        <p class="card-text">{{ $student->address }}</p>
        <h5 class="card-subtitle mb-2 text-muted">{{ $student->class->name ?? 'Unknown Class' }}</h5>
        <a href="{{ route('students.index') }}" class="card-link btn btn-outline-success">Back</a>
    </div>

</div>

@endsection