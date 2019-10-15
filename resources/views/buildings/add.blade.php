@extends('layouts.master')

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Реєсттрація об'єкту</div>

                <div class="card-body">
                    <form action="/register_building" method="POST">
                    @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Назва</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('email') }}" required autocomplete="name" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Бюджет</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="budjet" value="{{ old('email') }}" required autocomplete="name" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Початок</label>

                            <div class="col-md-6">
                                <input type="date" class="form-control" name="start_date" value="{{ old('email') }}" required autocomplete="name" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Кінець</label>

                            <div class="col-md-6">
                                <input type="date" class="form-control" name="end_date" value="{{ old('email') }}" required autocomplete="name" autofocus>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Додати
                                </button>

                                
                            </div>
                        </div>
                    </form>
        
                
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
