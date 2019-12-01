@extends('layouts.master')

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

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
                            <td>{{ round(($income_total - $income_total_prev) / (($income_total + $income_total_prev) / 2)  * 100, 2) }}</td>
                            </tr>

                            <tr>
                            <td>Чистий прибуток</td>
                            <td>грн.</td>
                            <td>{{$income_total_prev}}</td>
                            <td>{{$income_total}}</td>
                            <td>{{$income_total - $income_total_prev}}</td>
                            <td>{{ round(($income_total - $income_total_prev) / (($income_total + $income_total_prev) / 2)  * 100, 2) }}</td>
                            </tr>

                            <tr>
                            <td>Продуктивність праці</td>
                            <td>грн.</td>
                            <td>{{$income_total_prev}}</td>
                            <td>{{$income_total}}</td>
                            <td>{{$income_total - $income_total_prev}}</td>
                            <td>{{ round(($income_total - $income_total_prev) / (($income_total + $income_total_prev) / 2)  * 100, 2) }}</td>
                            </tr>

                            <tr>
                            <td>Виролення</td>
                            <td>грн.</td>
                            <td>{{$income_total_prev}}</td>
                            <td>{{$income_total}}</td>
                            <td>{{$income_total - $income_total_prev}}</td>
                            <td>{{ round(($income_total - $income_total_prev) / (($income_total + $income_total_prev) / 2)  * 100, 2) }}</td>
                            </tr>

                            <tr>
                            <td>Трудомісткість</td>
                            <td>грн.</td>
                            <td>{{$income_total_prev}}</td>
                            <td>{{$income_total}}</td>
                            <td>{{$income_total - $income_total_prev}}</td>
                            <td>{{ round(($income_total - $income_total_prev) / (($income_total + $income_total_prev) / 2)  * 100, 2) }}</td>
                            </tr>
                            
                        </tbody>
                        </table>
                   </div>

                   <hr>

                   <div class="row text-center mt-5">
                        <div class="col-md-6 border-right"><h5>moda</h5><hr></div>
                        <div class="col-md-6"><h5>poligon</h5><hr></div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
