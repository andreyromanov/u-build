@extends('layouts.master')

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Основні показники</div>

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
                            <td>Валовий прибуток</td>
                            <td>грн.</td>
                            <td>{{$income_total_prev}}</td>
                            <td>{{$income_total}}</td>
                            <td>{{$income_total - $income_total_prev}}</td>
                            <td>{{$income_diff}}</td>
                            </tr>

                            <tr>
                            <td>Чистий прибуток</td>
                            <td>грн.</td>
                            <td>{{$income_pure_prev}}</td>
                            <td>{{$income_pure_cur}}</td>
                            <td>{{$income_pure_cur - $income_pure_prev}}</td>
                            <td>{{$income_pure_diff}}</td>
                            </tr>

                            <tr>
                            <td>Продуктивність праці</td>
                            <td>.</td>
                            <td>{{$prod_prev}}</td>
                            <td>{{$prod_cur}}</td>
                            <td>{{$prod_cur - $prod_prev}}</td>
                            <td>{{$prod_diff}}</td>
                            </tr>

                            <tr>
                            <td>Вироблення</td>
                            <td>задач/днів</td>
                            <td>{{$plansCount_done_prev}}</td>
                            <td>{{$plansCount_done_cur}}</td>
                            <td>{{$plansCount_done_cur - $plansCount_done_prev}}</td>
                            <td>{{$plansCount_done_diff}}</td>
                            </tr>

                            <tr>
                            <td>Трудомісткість</td>
                            <td>днів/задач</td>
                            <td>{{$work_prev}}</td>
                            <td>{{$work_cur}}</td>
                            <td>{{$work_cur - $work_prev}}</td>
                            <td>{{$work_diff}}</td>
                            </tr>

                            <tr>
                            <td>Витрати на будівництво</td>
                            <td>грн</td>
                            <td>{{$spent_prev}}</td>
                            <td>{{$spent_cur}}</td>
                            <td>{{$spent_cur - $spent_prev}}</td>
                            <td>{{$spent_diff}}</td>
                            </tr>
                            
                        </tbody>
                        </table>
                   </div>

                   <hr>

                   <div class="row text-center mt-5">
                        <div class="col-md-6 border-right"><h5>Чистий прибуток, грн</h5><hr>
                        <div>{!! $chart6->container() !!}</div>
                        </div>
                        <div class="col-md-6"><h5>Продуктивність праці</h5><hr>
                        <div>{!! $chart7->container() !!}</div></div>
                        <div class="col-md-6 mt-5"><h5>Витрати на будівництво</h5><hr>
                        <div>{!! $chart8->container() !!}</div></div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

{!! $chart6->script() !!}
{!! $chart7->script() !!}
{!! $chart8->script() !!}
@endsection
