@extends('layouts.app')
@section('title', trans('lang.text_eachstudent'))
@section('titleHeader', trans('lang.text_eachstudent'))
@section('content')
<hr>
<div class="row mt-5">
    <div class="col-12">
        <a href="{{route('list.index')}}" class="btn btn-outline-primary btn-sm">@lang('lang.text_areturn')</a>
        <br>
        <br>
        <hr>
        <br>
        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
            <div class="col-md-6 mx-auto"> 
                <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3 bg-info">
                        <h3 class="my-0 fw-normal">{{$etudiant->nom}}</h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled mt-3 mb-4">
                            <li class="mb-2"><strong class="text-primary">@lang('lang.text_address') : </strong>{{$etudiant->address}}</li>
                            <li class="mb-2"><strong class="text-primary">@lang('lang.text_phone') : </strong>{{$etudiant->phone}}</li>
                            <li class="mb-2"><strong class="text-primary">@lang('lang.text_date') : </strong>{{$etudiant->date_de_naissance}}</li>
                            <li class="mb-2"><strong class="text-primary">@lang('lang.text_ville') : </strong> {{$etudiant->etudiantHasVille->nom}}</li>
                        </ul>
                        @if (Auth::check() && Auth::user()->id == $etudiant->user_id)
                        <div class="row">
                            <div class="col-6">
                                <a href="{{ route('etudiant.edit', $etudiant->id)}}" class="btn btn-success">@lang('lang.text_modify')</a>
                            </div>
                            <div class="col-6">
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete">
                                @lang('lang.text_delete')
                                </button>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
</div>

<!-- Modal -->
<div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content ">
      <div class="modal-header bg-info">
        <h1 class="modal-title fs-5 " id="exampleModalLabel">@lang('lang.text_deleteveirfy')</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @lang('lang.text_veirfy'):<strong> {{ $etudiant->nom}} ?</strong>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.text_close')</button>
        <form method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="@lang('lang.text_delete')" class="btn btn-danger">
        </form>
      </div>
    </div>
  </div>
</div>
       

@endsection