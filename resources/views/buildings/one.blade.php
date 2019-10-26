@extends('layouts.master')

@section('content')
    @foreach($building as $build)
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            
                <div class="card-header">Дані про об'єкт <b>{{$build->name}}</b>&nbsp;|&nbsp;Бюджет - <b>{{$build->budjet}} $</b>&nbsp;|&nbsp; Дати: <b>{{$build->start_date}} - {{$build->end_date}}</b></div>
                <div class="card-body">
                 <div class="row">
                    <div class="col-md-6 border-right">
                     <label><b>Штат</b></label>

                    </div>
                    <div class="col-md-6">
                    <label><b>Закупки</b></label>
                    <br>
                    @foreach($purchases as $purch)
                        {{$purch->name}} <br>
                    @endforeach
                    </div>
                 </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><b>Управління об'ектом</b></div>
                <div class="card-body">
                <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-materials" role="tab" aria-controls="nav-home" aria-selected="true">Матеріали</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-workers" role="tab" aria-controls="nav-profile" aria-selected="false">Працівники</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
                </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-materials" role="tabpanel" aria-labelledby="nav-home-tab">
                <br>
                
                <input type="text" id="myInput" onkeyup="search()" placeholder="Пошук будівельних матеріалів.." title="Type in a name">
                <div style="max-height: 300px;overflow:auto">
                <table id="myTable">
                <tr class="header">
                    <th style="width:20%;">Назва</th>
                    <th style="width:20%;">Ціна</th>
                    <th style="width:30%;">Постачальник</th>
                    <th style="width:10%;">Кількість</th>
                    <th style="width:20%;"></th>
                </tr>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }} грн</td>
                    <td>{{ $product->seller }}</td>
                    <td><input name="mat_count{{$product->product_id}}" type="number" min="1" value="1" class="form-control" required></td>
                    <td class="text-center"><button onclick="buyMaterial({{ $product->product_id }}, {{ $build->building_id }})" class="btn btn-success"><i class="fas fa-plus nav-icon"></i></button></td>
                </tr>
                @endforeach

                </table>
                </div>
                </div>

                <div class="tab-pane fade" id="nav-workers" role="tabpanel" aria-labelledby="nav-profile-tab">
                <br>
                
                <input type="text" id="myInput" onkeyup="search()" placeholder="Пошук працівників.." title="Type in a name">
                <div style="max-height: 300px;overflow:auto">
                <table id="myTable">
                <tr class="header">
                    <th style="width:30%;">Ім'я</th>
                    <th style="width:10%;">Посада</th>
                    <th style="width:10%;">Зарплата</th>
                    <th style="width:5%;">Старт</th>
                    <th style="width:5%;">Кінець</th>
                    <th style="width:10%;"></th>
                </tr>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }} грн</td>
                    <td>{{ $product->seller }}</td>
                    <td><input name="start_contract{{$product->product_id}}" type="date" class="form-control" required></td>
                    <td><input name="endcontract{{$product->product_id}}" type="date" class="form-control" required></td>
                    <td class="text-center"><button onclick="signContract({{ $product->product_id }}, {{ $build->building_id }})" class="btn btn-success"><i class="fas fa-plus nav-icon"></i></button></td>
                </tr>
                @endforeach

                </table>
                </div>

                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                3
                </div>

                </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><b>Статистика</b></div>
                <div class="card-body">
                </div>
            </div>
            
        </div>
    </div>
</div>

<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><b>Економіка</b></div>
                <div class="card-body">
                </div>
            </div>
            
        </div>
    </div>
</div>
@endforeach
@endsection
