@extends('layouts.master')

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Менеджер - <b>{{Auth::user()->name}}</b></div>

                <div class="card-body">
                    <div class="row p-2 text-center">
                    <div class="col-md-3">
                    <img src="/img/profile.png" class="rounded mx-auto d-block " alt="..." style="width:200px;">
                    </div>
                    <div class="col-md-9">
                    <h5 class="text-center mb-4">Зареєстрований - {{Auth::user()->created_at}}</h5>
                    <form action="/update_profile" method="POST">
                    @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Ім'я</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" required autocomplete="name" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Email</label>

                            <div class="col-md-8">
                                <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}" required autocomplete="name" autofocus>
                            </div>
                        </div>
                        
                      <button type="submit" class="btn btn-primary">Зберегти</button>
               
                    </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
