@extends('layouts.app')
@section('title', trans('lang.text_articles'))
@section('titleHeader', trans('lang.text_articles'))
@section('content')
<hr>
<div class="row mt-5">
    <div class="col-12">
        <a href="{{route('article.index')}}" class="btn btn-outline-primary btn-sm">@lang('lang.text_areturn')</a>
        <br>
        <br>
        <hr>
        <br>
        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
            <div class="col-md-6 mx-auto"> 
                <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3 bg-info">
                    <h3 class="my-0 fw-normal">@lang('lang.text_author') : {{ $etudiant->nom}}</h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled mt-3 mb-4">
                        @if(App::getLocale() == 'en')
                          <li class="mb-2"><strong class="text-primary">@lang('lang.text_titreEn'): </strong>{{$article->titre_en}}</li>
                          <li class="mb-2"><strong class="text-primary">@lang('lang.text_contenuFr') : </strong>{{$article->contenu_en}}</li>
                        @else
                          <li class="mb-2"><strong class="text-primary">@lang('lang.text_titreFr') : </strong>{{$article->titre_fr}}</li>
                           <li class="mb-2"><strong class="text-primary">@lang('lang.text_contenuEn') : </strong>{{$article->contenu_fr}}</li>
                        @endif
                            <hr>
                            <li class="mb-2"><strong class="text-primary">@lang('lang.text_dateCreation') : </strong>{{$article->date_de_creation}}</li>
                        </ul>
                        <div class="row">
                            <div class="col-6">
                            @if (Auth::check() && Auth::user()->etudiant->id == $article->etudiant_id)
                                <a href="{{ route('article.edit', $article->id)}}" class="btn btn-success">@lang('lang.text_modify')</a>
                            
                            </div>
                            <div class="col-6">
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete">
                                @lang('lang.text_delete')
                                </button>
                            @endif
                            </div>
                        </div>
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
        <h1 class="modal-title fs-5 " id="exampleModalLabel">Effacer Verification</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Voulez-vous vraiment effacer la donnée d'article:<strong> {{ $article->nom}} ?</strong>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Effacer" class="btn btn-danger">
        </form>
      </div>
    </div>
  </div>
</div>
       

@endsection