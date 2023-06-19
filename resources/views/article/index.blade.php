@extends('layouts.app')
@section('title', trans('lang.text_article'))
@section('titleHeader', trans('lang.text_article'))
@section('content')
<hr>
<br>
<div class="row">
    <div class="col-8">
        <p>@lang('lang.text_articleExplain2')</p>
    </div>
    <div class="col-4 d-flex justify-content-center gap-2">
        <p class="">@lang('lang.text_articleExplain')</p>
        <a href="{{ route('article.create') }}" class="btn btn-primary btn-sm mt-3" style="position: relative; top: -20px;">@lang('lang.text_ajouterArticle')</a>

    </div>
</div>
<hr>
<div class="row mt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header text-center">
                <h4>@lang('lang.text_article')</h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    @forelse($lists as $list)
                        <div class="col-md-4 themed-grid-col mb-1 pl-3">
                            <small class="text-dark">{{ $list->id }}</small>
                            <a href="{{ route('article.show', $list->id) }}"> - {{ $list->titre_en }}</a>
                        </div> 
                    @empty
                        <div class="text-danger">Aucun article trouvé</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
