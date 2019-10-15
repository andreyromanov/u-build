@extends('layouts.master')

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            @foreach($building as $build)
                <div class="card-header">Реєсттрація об'єкту <b>{{$build->name}}</b></div>

                <div class="card-body">
                
                    BUILDING ONE - {{$build->building_id}}
        
                
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
