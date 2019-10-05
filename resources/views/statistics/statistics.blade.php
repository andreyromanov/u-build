@extends('layouts.master')

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <div class="row text-center">
                        <div class="col-md-6 border-right"><h5>moda</h5><hr></div>
                        <div class="col-md-6"><h5>poligon</h5><hr></div>
                   </div>
                   <div class="row border-top text-center">
                        <div class="col-md-6 border-right"><h5>top</h5><hr></div>
                        <div class="col-md-6"><h5>disp</h5><hr></div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
