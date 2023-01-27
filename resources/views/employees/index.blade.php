@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ __('Add Employee') }}</h5>
                </div>
                <form action="{{ route('employees.store') }}" method="POST" autocomplete="off">
                {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group">
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="name">{{ __('Employee Name') }}</span>
                                </div>
                                <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" value="{{ old('name') }}">
                                <div class="invalid-feedback">
                                    @error('name')
                                        <div>{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="birth_date">{{ __('Birth Date') }}</span>
                                </div>
                                <input class="form-control @error('birth_date') is-invalid @enderror" type="date" id="birth_date" name="birth_date" value="{{ old('birth_date') }}">
                                <div class="invalid-feedback">
                                    @error('birth_date')
                                        <div>{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="salary">{{ __('Salary') }}</span>
                                </div>
                                <input class="form-control @error('salary') is-invalid @enderror" type="text" id="salary" name="salary" value="{{ old('salary') }}">
                                <div class="invalid-feedback">
                                    @error('salary')
                                        <div>{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="salary_day">{{ __('Salary Day') }}</span>
                                </div>
                                <input class="form-control @error('salary_day') is-invalid @enderror" type="number" id="salary_day" name="salary_day" value="{{ old('salary_day') }}">
                                <div class="invalid-feedback">
                                    @error('salary_day')
                                        <div>{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-sm mb-3">
                                <!-- <div class="input-group-prepend">
                                    <span class="input-group-text" id="user_id">{{ __('Salary Day') }}</span>
                                </div> -->
                                <input class="form-control @error('user_id') is-invalid @enderror" type="hidden" id="user_id" name="user_id" value="{{ \Auth::user()->id }}">
                                <div class="invalid-feedback">
                                    @error('user_id')
                                        <div>{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{ __('Add') }}</button>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title">
                            {{ __('Employees') }}
                        </h5>
                        <!-- <div>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">Add Employee</button>
                        </div> -->
                    </div>
    
                </div>

                <div class="card-body">
                    
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Birth Date</th>
                                    <th>Salary</th>
                                    <th>Salary Day</th>
                                    <th>User Name</th>
                                    <th>Control</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($employees as $employee) 
                                    <tr>
                                        <th>{{ $employees->firstItem()+$loop->index }}</th>
                                        <td>{{ $employee->name }}</td>
                                        <td>{{ $employee->birth_date }}</td>
                                        <td>{{ $employee->salary }}</td>
                                        <td>{{ $employee->salary_day }}</td>
                                        <td>{{ $employee->user->name }}</td>
                                        <td>
                                            <a href="{{ route('employees.edit',[$employee->id]) }}" class="btn btn-success btn-sm" >Edit</a>
                                            <form action="{{ route('employees.destroy', $employee->id ) }}" method="POST" class="d-inline">
										@method('delete')
										@csrf
										<button type="submit" class="btn btn-danger btn-sm">Delete</button>
									</form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="fs-1 text-center ">No Data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <nav aria-label="Page navigation example">
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

