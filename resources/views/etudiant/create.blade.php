@extends('layouts.app')
@section('title', ('lang.text_ajouterStudent'))
@section('titleHeader', trans('lang.text_ajouterStudent'))
@section('content')
<hr>
<a href="{{ route('list.index') }}" class="btn btn-outline-primary btn-sm">@lang('lang.text_areturn')</a>
<hr>
<div class="row mt-4 justify-content-center">
    <div class="col-6">
        <div class="card">
            <form method="post"  action="{{ route('etudiant.store') }}">
                @csrf
                <div class="card-header bg-info p-4 text-center ">
                   <h4>@lang('lang.text_formule')</h4> 
                </div>
                <div class="card-body">
                    <label for="title">@lang('lang.text_name')</label>
                    <input type="text" id="nom" name="nom" class="form-control" value="{{ auth()->user()->name }}" >

                    <label for="phone">@lang('lang.text_phone')</label>
                    <input type="tel" id="phone" name="phone" class="form-control">

                    <label for="date_de_naissance">@lang('lang.text_date')</label>
                    <input type="date" id="date_de_naissance" name="date_de_naissance" class="form-control">

                    <label for="article">@lang('lang.text_address')</label>
                    <textarea name="address" id="address" class="form-control"></textarea>
                    
                    <label for="nom">@lang('lang.text_ville')</label>
                    <select name="ville_id" id="nom" class="form-control">
                        @foreach($villes as $ville)
                        <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="card-footer text-center">
                    <input type="submit" class="btn btn-success" value="@lang('lang.text_save')">
                </div>
            </form> 
        </div>
    </div>
</div>
@endsection
