@extends('layouts.app')
@section('title', 'Ajouter un etudiant')
@section('titleHeader', 'Ajouter un etudiant')
@section('content')
<hr>
<a href="{{route('list.index')}}" class="btn btn-outline-primary btn-sm">Retourner</a>
        <hr>
<div class="row mt-4 justify-content-center">
    <div class="col-6">
        <div class="card">
            <form method="post">
                @csrf
                <div class="card-header bg-info p-4 text-center ">
                   <h4>Formulaire</h4> 
                </div>
                <div class="card-body">
                    <label for="title">Nom</label>
                    <input type="text" id="nom" name="nom" class="form-control">
                    
                    <label for="email">Courriel</label>
                    <input type="email" id="email" name="email" class="form-control">

                    <label for="phone">Téléphone</label>
                    <input type="tel" id="phone" name="phone" class="form-control">

                    <label for="date_de_naissance">Date de naissance</label>
                    <input type="date" id="date_de_naissance" name="date_de_naissance" class="form-control">


                    <label for="article">Address</label>
                    <textarea name="address" id="address" class="form-control"></textarea>
                    
                    <label for="nom">Villes</label>
                    <select name="ville_id" id="nom" class="form-control">
                        @foreach($villes as $ville)
                        <option value="{{ $ville->id }}">{{ $ville->nom}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="card-footer text-center">
                    <input type="submit" class="btn btn-success" value="Save">
                </div>
            </form> 
        </div>
    </div>
</div>
@endsection