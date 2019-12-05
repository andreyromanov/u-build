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
                            <td>{{ round((($income_total-$income_total_prev)/$income_total_prev*100) , 2) }}</td>
                            </tr>

                            <tr>
                            <td>Чистий прибуток</td>
                            <td>грн.</td>
                            <td>{{$income_total_prev-($income_total_prev*0.18)}}</td>
                            <td>{{$income_total-($income_total*0.18)}}</td>
                            <td>{{$income_total-($income_total*0.18) - $income_total_prev}}</td>
                            <td>{{ round(((($income_total*0.18)-($income_total_prev*0.18))/($income_total_prev*0.18)*100) , 2) }}</td>
                            </tr>

                            <tr>
                            <td>Продуктивність праці</td>
                            <td>.</td>
                            <td>{{$prod_prev}}</td>
                            <td>{{$prod_cur}}</td>
                            <td>{{$prod_cur - $prod_prev}}</td>
                            <td>{{ round((($prod_cur-$prod_prev)/$prod_prev*100) , 2) }}</td>
                            </tr>

                            <tr>
                            <td>Вироблення</td>
                            <td>задач/днів</td>
                            <td>{{round($plansCount_done_prev,2)}}</td>
                            <td>{{round($plansCount_done_cur,2)}}</td>
                            <td>{{round($plansCount_done_cur,2) - round($plansCount_done_prev,2)}}</td>
                            <td>{{round(((round($plansCount_done_cur,2)-round($plansCount_done_prev,2))/round($plansCount_done_prev,2)*100) , 2)}}</td>
                            </tr>

                            <tr>
                            <td>Трудомісткість</td>
                            <td>днів/задач</td>
                            <td>{{round($work_prev)}}</td>
                            <td>{{round($work_cur,2)}}</td>
                            <td>{{round($work_cur,2) - round($work_prev,2)}}</td>
                            <td>{{ round((($work_cur-$work_prev)/$work_prev*100) , 2) }}</td>
                            </tr>

                            <tr>
                            <td>Витрати на будівництво</td>
                            <td>грн</td>
                            <td>{{round($min_prev)}}</td>
                            <td>{{round($min_cur,2)}}</td>
                            <td>{{round($min_cur,2) - round($min_prev,2)}}</td>
                            <td>{{ round((($min_cur-$min_prev)/$min_prev*100) , 2) }}</td>
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
