@extends('layouts.app')
@section('title', config('app.name'))
@section('titleHeader', config('app.name'))
@section('content')
        <div class="row">
            <div class="col-12 text-center">
                <p>
                Visiter la liste des étudiants de ce collège Maisonneuve
                </p>
                <a href="{{ route('list.index')}}" class="btn btn-outline-primary">Afficher les etudaints</a>
            </div>
        </div>
@endsection