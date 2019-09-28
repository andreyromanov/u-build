@extends('layouts.master')

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">ECONOMIKA</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @foreach($economics as $economica)
                        {{$economica->name}} - {{$economica->count}} - {{$economica->cost}}<br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
