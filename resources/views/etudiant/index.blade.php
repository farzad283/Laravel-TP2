@extends('layouts.app')
@section('title', trans('lang.text_student'))
@section('titleHeader', trans('lang.text_student'))
@section('content')
<hr>
<br>
<div class="row">
    @if (Auth::check() && Auth::user()->etudiant)
    <div class="col-8"><a class=" btn btn-primary btn-sm mr-3" href="{{route('article.index')}}">@lang('lang.text_article')</a></div>
    @endif
  
    <div class="col-12 d-flex justify-content-center gap-2">
    @if (Auth::check() && Auth::user()->etudiant)
        <p style="position: relative; top: -25px;">@lang('lang.text_articleExplain')</p>
        <a href="{{ route('article.create') }}" class="btn btn-primary btn-sm mt-3" style="position: relative; top: -45px;">@lang('lang.text_ajouterArticle')</a>
        
    @elseif (!Auth::guest())
        <p class="">@lang('lang.text_studientExplain')</p>
        <a href="{{ route('etudiant.create', ['user' => $user[0]->id]) }}" class="btn btn-primary btn-sm mt-3 " style="position: relative; top: -20px;">@lang('lang.text_ajouter')</a>
    @endif

    </div>
</div>
<hr>
<div class="row mt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header text-center">
                <h4>@lang('lang.text_student')</h4>
            </div>
            <div class="card-body">
            </div>
                <div class="row mb-3">
                    @forelse($lists as $list)
                        <div class="col-md-4 themed-grid-col mb-1 pl-3">
                            <small class="text-dark">{{ $list->id }}</small>
                            <a href="{{ route('etudiant.show', $list->id) }}"> - {{ $list->nom }}</a>
                        </div> 
                    @empty
                        <div class="text-danger">Aucun étudiant trouvé</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
