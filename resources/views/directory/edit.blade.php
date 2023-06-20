@extends('layouts.app')
@section('title', ('lang.text_modifyDir'))
@section('titleHeader', trans('lang.text_modifyDir'))
@section('content')
<hr>
<br>
<div class="row mt-4 justify-content-center">
    <div class="col-6">
        <div class="card">
            <form method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-header bg-info p-4 text-center ">
                   <h4>@lang('lang.text_formule')</h4> 
                </div>            
                <div class="card-body">
                    <label for="title">@lang('lang.text_name')</label>
                    <input type="text" id="nom" name="nom" class="form-control" value="{{ auth()->user()->name }}" >

                    <label for="titre_en">@lang('lang.text_titreEn')</label>
                    <input type="text" id="titre_en" name="titre_en" class="form-control" value="{{ $directory->titre_en }}">

                    <label for="titre_fr">@lang('lang.text_titreFr')</label>
                    <input type="text" id="titre_fr" name="titre_fr" class="form-control" value="{{ $directory->titre_fr }}">
                    
                    <label for="file">@lang('lang.text_file') :</label>
                    <p class="text-success">@lang('lang.text_fileC'): {{$directory->file}}</p>
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