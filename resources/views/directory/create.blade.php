@extends('layouts.app')
@section('title', trans('lang.text_ajouterDoc'))
@section('titleHeader', trans('lang.text_ajouterDoc'))
@section('content')
<hr>
<a href="{{ route('directory.index') }}" class="btn btn-outline-primary btn-sm">@lang('lang.text_areturn')</a>
<hr>
<div class="row mt-4 justify-content-center">
    <div class="col-6">
        <div class="card">
            <form method="post"  action="{{ route('directory.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-header bg-info p-4 text-center ">
                   <h4>@lang('lang.text_formule')</h4> 
                </div>
                <div class="card-body">
                    <label for="title">@lang('lang.text_name')</label>
                    <input type="text" id="nom" name="nom" class="form-control" value="{{ auth()->user()->name }}" >

                    <label for="titre_en">@lang('lang.text_titreEn')</label>
                    <input type="text" id="titre_en" name="titre_en" class="form-control">

                    <label for="titre_fr">@lang('lang.text_titreFr')</label>
                    <input type="text" id="titre_fr" name="titre_fr" class="form-control">


                    <label for="etudient_id">@lang('lang.text_file') :</label>
                    <input type="file" class="form-control" id="file" name="file" >                    
                </div>
                <div class="card-footer text-center">
                    <input type="submit" class="btn btn-success" value="@lang('lang.text_save')">
                </div>
            </form> 
        </div>
    </div>
</div>
@endsection
