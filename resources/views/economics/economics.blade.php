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
                    
                    <div class="row text-center">
                        <div class="col-md-6 border-right">
                            
                            <div height="400px">{!! $chart->container() !!}</div>
                            <h5>moda</h5>
                        </div>
                        <div class="col-md-6">
                        
                        <div height="400px">{!! $chart2->container() !!}</div>
                        <h5>poligon</h5>
                        </div>
                   </div>
                   <div class="row border-top text-center">
                        <div class="col-md-6 border-right">
                        
                        <div height="400px">{!! $chart3->container() !!}</div>
                        <h5>top</h5>
                        </div>
                        <div class="col-md-6">
                        
                        <div height="400px">{!! $chart4->container() !!}</div>
                        <h5>disp</h5>
                        </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

{!! $chart->script() !!}
{!! $chart2->script() !!}
{!! $chart3->script() !!}
{!! $chart4->script() !!}
@endsection
