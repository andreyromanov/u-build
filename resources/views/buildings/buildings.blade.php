@extends('layouts.master')

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">BUILDINGS</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
        <div class="row">

            <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
                </div>
            </div>
<hr>

        @foreach($buildings as $building)
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <h4 class="card-title">{{$building->name}}</h4>
                    <h6 class="card-subtitle mb-2 text-muted">{{$building->budjet}} $</h6>
                    <p class="card-text">
                    <hr>
                    Початок: {{$building->start_date}}
                    <br>
                    Кінець: {{$building->end_date}}
                    <hr>
                    </p>
                    
                    <a href="#" class="card-link " >Another link</a>
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
