<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
       <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

   
      @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
      <li class="nav-item active">
        <a class="nav-link"  href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"> 
          {{ $properties['native'] }} <span class="sr-only">(current)</span></a>
      </li>
      @endforeach
      
  
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
   


<br>
<br>
<br>


        <div class="flex-center position-ref full-height">
         <div class="container">
             <div class="title m-b-md">
                {{ __('messages.Add your offer') }} 
      
                </div>
                @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                {{ Session::get('success')}}
                </div>
                @endif
                <br />
                <form method="POST" action="{{ route('offers.update', $offer -> id) }}">
                @csrf
               <!-- <input name="_token" value="{{csrf_token()}}"> -->
                  <div class="form-group">
                    <label for="exampleInputEmail1">{{__('messages.Offer Name en')}}</label>
                    <input type="text" class="form-control" value="{{ $offer -> name_en }}" name="name_en" placeholder="{{__('messages.Offer Name en')}}">
                   @error('name')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">{{__('messages.Offer Name fr')}}</label>
                    <input type="text" class="form-control" value="{{ $offer -> name_fr }}" name="name_fr" placeholder="{{__('messages.Offer Name fr')}}">
                   @error('name_fr')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">{{__('messages.Offer Name ar')}}</label>
                    <input type="text" class="form-control" value="{{ $offer -> name_ar }}" name="name_ar" placeholder="{{__('messages.Offer Name_ar')}}">
                   @error('name_ar')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>


                  <div class="form-group">
                    <label for="exampleInputPassword1">{{__('messages.Offer Price')}}</label>
                    <input type="text" class="form-control" value="{{ $offer -> price }}" name="price" placeholder="{{__('messages.Offer Price')}}">
                    @error('price')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror

                </div>
              


                  <div class="form-group">
                    <label for="exampleInputPassword1">{{__('messages.Offer Details en')}}</label>
                    <input type="text" class="form-control" value="{{ $offer -> details_en }}" name="details_en" placeholder="{{__('messages.Offer Details en')}}">
                    @error('details_en')
                    <small class="form-text text-danger">{{ $message}}</small>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">{{__('messages.Offer Details fr')}}</label>
                    <input type="text" class="form-control" value="{{ $offer -> details_fr }}" name="details_fr" placeholder="{{__('messages.Offer Details fr')}}">
                    @error('details_fr')
                    <small class="form-text text-danger">{{ $message}}</small>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">{{__('messages.Offer Details ar')}}</label>
                    <input type="text" class="form-control" value="{{ $offer -> details_ar }}" name="details_ar" placeholder="{{__('messages.Offer Details ar')}}">
                    @error('details_ar')
                    <small class="form-text text-danger">{{ $message}}</small>
                    @enderror

                </div>

                   <button type="submit" class="btn btn-primary">{{ __('messages.Save Offer') }}</button>
                </form>
            </div>
        </div>
    </body>
</html>
