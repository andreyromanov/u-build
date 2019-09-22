@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <div class="row p-2 text-center">
                        <img class="preloader m-auto" src="../img/load/45.gif">
                        <div class="col-md-12 border" style="display: none;"></div>
                    </div>
                    <button onclick="showUserInfo({{Auth::user()->id}})" class="btn btn-primary">
                        SHOW USER INFO
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
