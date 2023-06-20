@extends('layouts.app')
@section('title', config('app.name'))
@section('titleHeader', config('app.name'))
@section('content')
        <div class="row">
            <div class="col-12 text-center">
                <p>
                @lang('lang.text_afficher2')
                </p>
                <a href="{{ route('list.index')}}" class="btn btn-outline-primary">@lang('lang.text_afficher')</a>
            </div>
        </div>
@endsection