@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ __('Edit Employee') }}</h5>
                </div>
                <form action="{{ route('employees.update', [$employee->id]) }}" method="POST" autocomplete="off">
                    @method('put')
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="name">{{ __('Employee Name') }}</span>
                                </div>
                                <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" value="{{ $employee->name }}">
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
                                <input class="form-control @error('birth_date') is-invalid @enderror" type="date" id="birth_date" name="birth_date" value="{{ $employee->birth_date }}">
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
                                <input class="form-control @error('salary') is-invalid @enderror" type="text" id="salary" name="salary" value="{{ $employee->salary }}">
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
                                <input class="form-control @error('salary_day') is-invalid @enderror" type="number" id="salary_day" name="salary_day" value="{{ $employee->salary_day }}">
                                <div class="invalid-feedback">
                                    @error('salary_day')
                                        <div>{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-sm mb-3">
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
                        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                    </div>
                </form>
            </div>
    </div>
</div>

@endsection

