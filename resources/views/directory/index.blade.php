@extends('layouts.app')
@section('title',trans('lang.text_titlePageDir'))
@section('titleHeader',trans('lang.text_titlePageDir'))
@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <p>@lang('lang.text_articleExplain2')</p>
        </div>
        <div class="col-4 d-flex justify-content-center gap-2">
            @auth
                <p class="">@lang('lang.text_dirExplain')</p>
                <a href="{{ route('directory.create') }}" class="btn btn-primary btn-sm mt-3" style="position: relative; top: -20px;">{{__('lang.text_ajouter')}}</a>
            @endauth
        </div>
        <div class="card-header text-center mt-3">
            <h4 class="text-center p-3" style="background-color: #F7FAFC;">{{__('lang.text_titlePageDir')}}</h4>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>@lang('lang.text_titre')</th>
                <th>@lang('lang.text_dateCreation')</th>
                <th >@lang('lang.text_name')</th>
                <th >@lang('lang.text_file')</th>
                <th >@lang('lang.text_show')</th>
                <th >@lang('lang.text_md')</th>
            </tr>
        </thead>
        <tbody>
            @foreach($directories as $directory)
                <tr>
                    <td>{{ $directory->id }}</td>
                    @if(App::getLocale() == 'en')
                        <td> {{ $directory->titre_en }}</td>
                    @else
                        <td> {{ $directory->titre_fr }}</td>
                    @endif

                    <td>{{ $directory->date }}</td>
                    <td>{{ $directory->etudiant->nom }}</td>

                    <td><a href="{{ asset('storage/documents/' . str_replace('public/documents/', '', $directory->file)) }}" target="_blank">Download Document</a></td>

                    <!-- <td><embed src="{{ asset('storage/documents/' . str_replace('public/documents/', '', $directory->file)) }}" width="600" height="500" type="application/pdf">
                    </td> -->

                    <td><a href="{{ asset('storage/documents/' . str_replace('public/documents/', '', $directory->file)) }}" target="_blank">Open Document</a>
                    </td>
                    <td>
                        <div class="row">
                            <div class="col-4">
                                @if (Auth::check() && Auth::user()->etudiant->id == $directory->etudiant_id)
                                    <a href="{{ route('directory.edit', $directory->id)}}" class="btn btn-success">@lang('lang.text_modify')</a> 
                            </div>                            
                            <div class="col-4">
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete">
                                @lang('lang.text_delete')
                                </button>
                            @endif
                            </div>
                        </div>
                    </td>                
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$directories}}
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
      @lang('lang.text_veirfy'):<strong> {{ $directory->etudiant->nom }} ?</strong>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.text_close')</button>
        <form action="{{ route('directory.destroy', $directory->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="@lang('lang.text_delete')" class="btn btn-danger">
        </form>
      </div>
    </div>
  </div>
</div>
@endsection