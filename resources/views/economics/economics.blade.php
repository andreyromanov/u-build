@extends('layouts.master')

@section('content')

<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Статичтичні показники</div>

                <div class="card-body">
                <div class="row text-center mb-5">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">Тип</th>
                            <th scope="col">Од.вим.</th>
                            <th scope="col">Минулий</th>
                            <th scope="col">Поточний</th>
                            <th scope="col">Різниця</th>
                            <th scope="col">%</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td>Середня кіл-сть праців</td>
                            <td>чол.</td>
                            <td>{{$av_workers_prev}}</td>
                            <td>{{$av_workers_cur}}</td>
                            <td>{{$av_workers_cur - $av_workers_prev}}</td>
                            <td>{{$workers_diff}}</td>
                            </tr>

                            <tr>
                            <td>Середня зар.плата</td>
                            <td>грн.</td>
                            <td>{{$av_sal_prev}}</td>
                            <td>{{$av_sal_cur}}</td>
                            <td>{{$av_sal_cur - $av_sal_prev}}</td>
                            <td>{{$sal_diff}}</td>
                            </tr>

                            <tr>
                            <td>Середня кіл-сть закупівель</td>
                            <td>зак.</td>
                            <td>{{$purchs_prev}}</td>
                            <td>{{$purchs_cur}}</td>
                            <td>{{$purchs_cur - $purchs_prev}}</td>
                            <td>{{$purchs_diff}}</td>
                            </tr>
                            
                        </tbody>
                        </table>
                   </div>
                    
                                       
                    <div class="row text-center">
                        <div class="col-md-6 border-right">
                        <h5>Середня кількість працівників, чол</h5>
                        <div height="400px">{!! $chart->container() !!}</div>
                        </div>

                        <div class="col-md-6">
                        <h5>Середня заробітня плата, грн</h5>
                        <div height="400px">{!! $chart2->container() !!}</div>
                        </div>
                   </div>
                   <hr>
                   <h5 class="text-center mt-5">Співвідношення постачальників компанії</h5>

                   <div height="400px">{!! $chart5->container() !!}</div>
                    <div class="text-center pb-4">
                   @foreach($pers as $p)
                    <label class="ml-5" style="font-weight:300;font-size:18px">{{$p['seller']}} - {{$p['pers']}}%</label>
                   @endforeach
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

{!! $chart->script() !!}
{!! $chart2->script() !!}
{!! $chart5->script() !!}

@endsection
