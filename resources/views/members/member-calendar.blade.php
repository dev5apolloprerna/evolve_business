@extends('layouts.app')
@section('title', 'Members Calendar')
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div>
                                <h3 class="mb-1">Member Calendar</h3>
                            </div>
                        </div>

                        @if ($members->isEmpty())
                            <div class="alert alert-info mb-0">No member dates found.</div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-hover align-middle">
                                    <thead>
                                        <tr>
                                            <th>Member Name</th>
                                            <th>Date of Birth</th>
                                            <th>Work Anniversary</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($members as $member)
                                            <tr>
                                                <td>{{ $member->member_name ?? '-' }}</td>
                                                <td>
                                                    {{ $member->date_of_birth ? \Carbon\Carbon::parse($member->date_of_birth)->format('d-m-Y') : '-' }}
                                                </td>
                                                <td>
                                                    {{ $member->work_anniversary_date
                                                        ? \Carbon\Carbon::parse($member->work_anniversary_date)->format('d-m-Y')
                                                        : '-' }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center mt-3">
                                    {{ $members->appends(request()->except('page'))->links() }}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
