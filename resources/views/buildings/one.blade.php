@extends('layouts.master')

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            @foreach($building as $build)
                <div class="card-header">Об'єкт <b>{{$build->name}}</b></div>
                <div class="card-body">
                
                 Назва - {{$build->name}} <br>
                 Бюджет - {{$build->budjet}} $<br>
                 Дати: {{$build->start_date}} - {{$build->end_date}}
                
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
