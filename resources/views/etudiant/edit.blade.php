@extends('layouts.app')
@section('title', 'Modifier un etudiant')
@section('titleHeader', 'Modifier un etudiant')
@section('content')
<hr>
<br>
<div class="row mt-4 justify-content-center">
    <div class="col-6">
        <div class="card">
            <form method="post">
                @csrf
                @method('put')
                <div class="card-header bg-info p-4 text-center ">
                   <h4>Formulaire</h4> 
                </div>            

                <div class="card-body">
                    <label for="title">Nom</label>
                    <input type="text" id="nom" name="nom" class="form-control" value="{{$etudiant->nom}}">
                    
                    <label for="email">Courriel</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{$etudiant->email}}">

                    <label for="phone">Téléphone</label>
                    <input type="tel" id="phone" name="phone" class="form-control" value="{{$etudiant->phone}}">

                    <label for="date_de_naissance">Date de naissance</label>
                    <input type="date" id="date_de_naissance" name="date_de_naissance" class="form-control" value="{{$etudiant->date_de_naissance}}">


                    <label for="article">Address</label>
                    <textarea name="address" id="address" class="form-control">{{$etudiant->address}}</textarea>
                    
                    <label for="nom">Villes</label>
                    <select name="ville_id" id="nom" class="form-control">
                        @foreach($villes as $ville)
                            <option value="{{ $ville->id }}" {{ $etudiant->ville_id == $ville->id ? 'selected' : '' }}>
                                {{ $ville->nom }}
                            </option>
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