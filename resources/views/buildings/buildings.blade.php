@extends('layouts.master')

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Об'єкти</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
        <div class="row">

        @foreach($buildings as $building)
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <h4 class="card-title">{{$building->name}}</h4>
                    <h6 class="card-subtitle mb-2 text-muted">{{$building->budjet}} грн</h6>
                    <p class="card-text">
                    <hr>
                    Початок: {{$building->start_date}}
                    <br>
                    Кінець: {{$building->end_date}}
                    <hr>
                    </p>
                    
                    <a href="/building_one/{{$building->building_id}}" class="card-link " >Деталі</a>
                </div>
                </div>
            </div>
        @endforeach
            
        </div>
                
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
