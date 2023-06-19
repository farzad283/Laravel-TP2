@extends('layouts.app')
@section('title',trans('lang.text_user'))
@section('titleHeader', trans('lang.text_user'))
@section('content')

<div class="cart mt-3">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>@lang('lang.text_name')</th>
                    <th>@lang('lang.text_email')</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id}}</td>
                        <td>{{ $user->name}}</td>
                        <td>{{ $user->email}}</td>                 
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users }}
    </div>
</div>

@endsection