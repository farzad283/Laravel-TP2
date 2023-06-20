<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- Flags -->
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css" rel="stylesheet">

    </head>
<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid d-flex justify-content-between">
            @php $lang = session('locale') @endphp  
            <div class="">
                <a class="navbar-brand" href="#">
                @lang('lang.text_hello')
                {!! Auth::user() && Auth::user()->etudiant ? Auth::user()->name . '&nbsp;<span class="badge bg-success text-light">' . __('lang.text_eachstudent') . '</span>' : (Auth::user()->name ?? 'Guest') !!}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
            </div>
          
            <div class="d-flex justify-content-end ">
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    @if (Auth::check() && Auth::user()->etudiant)
                        <div><a class="nav-link  text-success" style="margin-right: 10px;" href="{{route('article.index')}}">@lang('lang.text_articles')</a></div>
                        <div><a class="nav-link  text-success " href="{{route('directory.index')}}">@lang('lang.text_directory')</a></div>
                    @endif
                    <div class="navbar-nav">
                        @guest  
                            <a class="nav-link" href="{{route('registration')}}">@lang('lang.text_registration')</a>
                            <a class="nav-link" href="{{route('login')}}">@lang('lang.text_login')</a>
                        @else
                            <a class="nav-link" href="{{route('user.list')}}">@lang('lang.text_users')</a>
                            <a class="nav-link" href="{{route('list.index')}}">@lang('lang.text_blogs')</a>
                            <a class="nav-link" href="{{route('logout')}}">@lang('lang.text_logout')</a>
                        @endguest
                            <a class="nav-link @if($lang == 'fr') text-info @endif" href="{{route('lang','fr')}}">Français <i class='flag flag-france'></i></a>
                            <a class="nav-link @if($lang == 'en') text-info @endif" href="{{route('lang','en')}}">English <i class="flag flag-united-states"></i></a>
                            <a class="nav-link badge bg-danger text-light" href="https://github.com/farzad283/Laravel-TP2.git" target="_blank" style="padding: 5px 20px; margin-left: 40px; line-height: 30px; font-size: 14px;">Github</a>


                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h1 class="dispaly-6 mt-5">
                    @yield('titleHeader')
                </h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-6">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismisible fade show">
                            {{session('success')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>                
                    @endif
                @if(!$errors->isEmpty())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>                          
                    </div>                       
                @endif
                </div>
            </div>
        </div>
    @yield('content')
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</html>
