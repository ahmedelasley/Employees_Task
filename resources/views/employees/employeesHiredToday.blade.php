@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Employees Hired Today ') . date('d') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Salary</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($employees as $employee) 
                                    <tr>
                                        <th>{{ $employees->firstItem()+$loop->index }}</th>
                                        <td>{{ $employee->name }}</td>
                                        <td>{{ $employee->salary }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="fs-1 text-center ">No Data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <nav aria-label="page navigation example">
                        <ul class="pagination justify-content-center">
                            {{ $employees->withQueryString()->onEachSide(1)->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
