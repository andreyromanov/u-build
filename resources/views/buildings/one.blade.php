@extends('layouts.master')

@section('content')
    @foreach($building as $build)
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            
                <div class="card-header">Дані про об'єкт <b>{{$build->name}}</b>&nbsp;|&nbsp;Бюджет - <b>{{$build->budjet}} грн</b>&nbsp;|&nbsp; Дати: <b>{{$build->start_date}} - {{$build->end_date}}</b></div>
                <div class="card-body">
                 <div class="row building-info">
                    <div class="col-md-6 border-right building-info">
                     <label><b>Штат</b></label>
                     <br>
                    @foreach($contracts as $contract)
                        {{$contract->name}} - {{$contract->position}} <hr>
                    @endforeach
                    </div>
                    <div class="col-md-6 building-info">
                    <label><b>Закупки</b></label>
                    <br>
                    @foreach($purchases as $purch)
                        {{$purch->name}}  - {{$purch->count}}<hr>
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
                
                <input type="text" id="myInput2" onkeyup="searchWorker()" placeholder="Пошук працівників.." title="Type in a name">
                <div style="max-height: 300px;overflow:auto">
                <table id="myTable2">
                <tr class="header">
                    <th style="width:25%;">Ім'я</th>
                    <th style="width:15%;">Посада</th>
                    <th style="width:10%;">Зарплата</th>
                    <th style="width:5%;">Старт</th>
                    <th style="width:5%;">Кінець</th>
                    <th style="width:10%;"></th>
                </tr>
                @foreach($workers as $worker)
                <tr>
                    <td>{{ $worker->name }}</td>
                    <td>{{ $worker->position }}</td>
                    <td>{{ $worker->salary }} грн</td>
                    <td><input name="start_contract{{$worker->worker_id}}" type="date" class="form-control" required></td>
                    <td><input name="end_contract{{$worker->worker_id}}" type="date" class="form-control" required></td>
                    <td class="text-center"><button onclick="signContract({{ $worker->worker_id }}, {{ $build->building_id }})" class="btn btn-success"><i class="fas fa-plus nav-icon"></i></button></td>
                </tr>
                @endforeach

                </table>
                </div>

                </div>

                <hr class="my-5">
                <!--TASKS TASKS TASKS-->
                <div class="row" style="max-height: 300px;overflov:auto;">
                    <div class="col-md-12">
                        <span class="my-3 float-left"><b>Задачі будівництва</b></span>
                        <button class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModalCenter">Додати задачу</button>
                            <table id="myTable2">
                    <tr class="header">
                        <th style="width:25%;">Ім'я</th>
                        <th style="width:15%;">Посада</th>
                        <th style="width:10%;">Зарплата</th>
                        <th style="width:5%;">Старт</th>
                        <th style="width:5%;">Кінець</th>
                        <th style="width:10%;"></th>
                    </tr>
                    @foreach($workers as $worker)
                    <tr>
                        <td>{{ $worker->name }}</td>
                        <td>{{ $worker->position }}</td>
                        <td>{{ $worker->salary }} грн</td>
                        <td><input name="start_contract{{$worker->worker_id}}" type="date" class="form-control" required></td>
                        <td><input name="end_contract{{$worker->worker_id}}" type="date" class="form-control" required></td>
                        <td class="text-center"><button onclick="signContract({{ $worker->worker_id }}, {{ $build->building_id }})" class="btn btn-success"><i class="fas fa-plus nav-icon"></i></button></td>
                    </tr>
                    @endforeach

                    </table>
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
                <div class="card-header"><b>Аналіз</b></div>
                <div class="card-body">
                    Тут будуть показники діяльності ....
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
                <div class="row mb-5">
                    <div class="col-md-6">
                    <div height="400px">{!! $chart1->container() !!}</div>
                    </div>
                    
                    <div class="col-md-6">
                    <div height="400px">{!! $chart3->container() !!}</div>
                    </div>
                </div>
                <hr>
                <div height="400px" class="mt-5">{!! $chart2->container() !!}</div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<!-- Modal NEW TASK-->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Нова задача</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body py-5">
        <input type="hidden" name="building_id" value="{{ $build->building_id }}">
        <input type="hidden" name="status" value="0">

        <label for="">Зміст задачі</label>
        <input type="text" class="form-control mb-3">

        <label for="">Категорія</label>
        <select name="" id="" class="custom-select mb-3">
        <option value="">---</option>
        </select>

        <label for="">Вартість роботи</label>
        <input type="number" class="form-control mb-3" style="width:50%;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Скасувати</button>
        <button type="button" class="btn btn-primary">Додати задачу</button>
      </div>
    </div>
  </div>
</div>

@endforeach

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

{!! $chart1->script() !!}
{!! $chart2->script() !!}
{!! $chart3->script() !!}

@endsection
