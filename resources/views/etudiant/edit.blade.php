@extends('layouts.app')
@section('title',trans('lang.text_modifyStudent'))
@section('titleHeader', trans('lang.text_modifyStudent'))
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
                   <h4>@lang('lang.text_formule')</h4> 
                </div>            

                <div class="card-body">
                    <label for="title">@lang('lang.text_name')</label>
                    <input type="text" id="nom" name="nom" class="form-control" value="{{$etudiant->nom}}">

                    <label for="phone">@lang('lang.text_phone')</label>
                    <input type="tel" id="phone" name="phone" class="form-control" value="{{$etudiant->phone}}">

                    <label for="date_de_naissance">@lang('lang.text_date')</label>
                    <input type="date" id="date_de_naissance" name="date_de_naissance" class="form-control" value="{{$etudiant->date_de_naissance}}">


                    <label for="article">@lang('lang.text_address')</label>
                    <textarea name="address" id="address" class="form-control">{{$etudiant->address}}</textarea>
                    
                    <label for="nom">@lang('lang.text_ville')</label>
                    <select name="ville_id" id="nom" class="form-control">
                        @foreach($villes as $ville)
                            <option value="{{ $ville->id }}" {{ $etudiant->ville_id == $ville->id ? 'selected' : '' }}>
                                {{ $ville->nom }}
                            </option>
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