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
                            <td>Прибуток</td>
                            <td>тис.грн.</td>
                            <td>100</td>
                            <td>@150</td>
                            <td>50</td>
                            <td>50%</td>
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
