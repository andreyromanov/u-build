@extends('layouts.master')

@section('content')
    @foreach($building as $build)
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            
                <div class="card-header">Дані про об'єкт <b>{{$build->name}}</b>&nbsp;|&nbsp;Бюджет - <b>{{$build->budjet}} $</b>&nbsp;|&nbsp; Дати: <b>{{$build->start_date}} - {{$build->end_date}}</b></div>
                <div class="card-body">

                </div>
            </div>
            
        </div>
    </div>
</div>

<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><b>Управління об'ектом</b></div>
                <div class="card-body">
                </div>
            </div>
            
        </div>
    </div>
</div>

<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><b>Статистика</b></div>
                <div class="card-body">
                </div>
            </div>
            
        </div>
    </div>
</div>

<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><b>Економіка</b></div>
                <div class="card-body">
                </div>
            </div>
            
        </div>
    </div>
</div>
@endforeach
@endsection
