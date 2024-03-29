@section('title', 'Show Attendances')
@extends('layouts.app')

@section('content')

<h5 class="pb-4"><i class="fas fa-chart-pie shadow-sm"></i> <b> Attendances Data</b></h5>
<div class="card">
    <div class="card-header bg-green d-flex justify-content-between align-items-center">
        <span class="h5 mb-0"><i class="fas fa-door-open"></i> <b> {{ $class->name }}</b>
        </span>
        <span class="h5 mb-0"><i class="fas fa-moon"></i> <b>{{ $month }}</b> </span>
        <span class="h5 mb-0"><i class="fas fa-user-friends"></i>
            <b>{{ $students->first()->attendances->where('subject_id', $subject->id)->first()->teacher->user->name ?? "Empty" }}</b>
        </span>
        <span class="h5 mb-0"><i class="fas fa-book-reader"></i> <b>{{ $subject->name }}</b> </span>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-borderless table-striped table-sm ">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        @for ($i = 1; $i <= 31; $i++) <td>{{ $i }}</td>
                            @endfor
                    </tr>
                </thead>
                <tbody>

                    @php $index = 1; $date = 1; @endphp
                    @foreach ($students as $student)
                    <tr>
                        <th scope="row">{{ $index }}</th>
                        <td>{{ $student->user->name }}</td>

                        @for ($i = 1; $i <= 31; $i++) <td>
                            @php
                            $m = (request('month_id') < 10) ? 0 . request('month_id') : request('month_id') @endphp {!!
                                $student->attendances
                                ->where('subject_id', request()->subject_id)
                                ->where('student_id', $student->id)
                                ->where('created_at', $m . "-" . $date=($i < 10) ? 0 . $i : $i)->
                                    first()->status
                                    ?? "."
                                    !!}
                                    </td>
                                    @endfor

                    </tr>

                    @php $index++ @endphp
                    @endforeach
                    <tr>

                </tbody>
                <p></p>
            </table>
        </div>

        <div class="mt-3 jumbotron">
            <table class="h5">
                <h3>INFORMATION!</h3>
                <tr>
                    <td><i class="fas fa-check"></i></td>
                    <td>=</td>
                    <td>Attend</td>
                </tr>
                <tr>
                    <td><b>S</b></td>
                    <td>=</td>
                    <td>Sick</td>
                </tr>
                <tr>
                    <td><i class="fas fa-times"></i> </td>
                    <td>=</td>
                    <td>Absent</td>
                </tr>
            </table>
        </div>
        <a href="{{ route('attendances.index') }}" class="btn btn-outline-success">Back</a>
    </div>
</div>

@endsection