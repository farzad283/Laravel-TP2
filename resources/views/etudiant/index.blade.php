@extends('layouts.app')
@section('title', 'liste d etudiant')
@section('titleHeader', 'Liste des etudiants')
@section('content')
<hr>
<br>
<div class="row">
    <div class="col-8 ">
    <p>Cliquez sur l'étudiant pour voir les détails</p>
    </div>
    <div class="col-4 d-flex justify-content-center gap-2">
    <p class="">Créer un nouveau etudiant</p>
    <a href="{{route('etudiant.create')}}" class="btn btn-primary btn-sm mt-3" style="position: relative; top: -20px;">Ajouter</a>
    </div>
</div>
<hr>
<div class="row mt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header text-center">
                <h4>Liste des etudiants</h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    @forelse($lists as $list)
                        <div class="col-md-4 themed-grid-col mb-1 pl-3">
                            <small class="text-dark">{{$list->id}}</small>
                            <a href="{{ route('etudiant.show', $list->id) }}"> - {{$list->nom}}</a>
                        </div> 
                    @empty
                        <div class="text-danger">Aucun etudiant trouvé</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection