@extends('layouts.master')

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Панель</div>

                <div class="card-body">
                    <div class="row p-2 text-center">
                                
                                <div class="col-md-4">
                        <div class="card">
                            <div class="card-body text-center">
                                
                                <h4 class="card-subtitle mb-2 text-muted">Об'єкти</h4>
                                <p class="card-text">
                                <hr>
                                <h3>{{$buildingsCount}}</h3>
                                <hr>
                                Завершено - 
                                </p>
                                
                            </div>
                            </div>
                            </div>

                            <div class="col-md-4">
                        <div class="card">
                            <div class="card-body text-center">
                                
                                <h4 class="card-subtitle mb-2 text-muted">Контракти</h4>
                                <p class="card-text">
                                <hr>
                                <h3>{{$buildingsCount}}</h3>
                                <hr>
                                Завершено - 
                                </p>
                                
                            </div>
                            </div>
                            </div>

                            <div class="col-md-4">
                        <div class="card">
                            <div class="card-body text-center">
                                
                                <h4 class="card-subtitle mb-2 text-muted">Задачі</h4>
                                <p class="card-text">
                                <hr>
                                <h3>{{$buildingsCount}}</h3>
                                <hr>
                                Завершено - 
                                </p>
                                
                            </div>
                            </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
