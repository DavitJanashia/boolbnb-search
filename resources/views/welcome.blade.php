<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>{{-- autocomplete --}}
        <script src="https://cdn.jsdelivr.net/npm/algoliasearch@4.5.1/dist/algoliasearch-lite.umd.js" integrity="sha256-EXPXz4W6pQgfYY3yTpnDa3OH8/EPn16ciVsPQ/ypsjk=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/instantsearch.js@4.8.3/dist/instantsearch.production.min.js" integrity="sha256-LAGhRRdtVoD6RLo2qDQsU2mp+XVSciKRC8XPOBWmofM=" crossorigin="anonymous"></script>

        <script src="{{ asset('js/app.js') }}" defer></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

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
        <div id="laravelDefault" class="flex-center position-ref">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>
                <a id="btnajax" class="btn btn-primary" >ProvaAjax</a>

                <div class="content">
                    <div class="title m-b-md">
                        Search
                    </div>
                </div>

                <form>
                  <fieldset class="container mt-4">
                    <legend>Algolia Address Autocomplete</legend>
                    <div class="row">

                      <div class="col-md-12">
                        <label for="address">Street Address</label>
                        <input id="address" class="form-control" type="text">
                      </div>
                      <div class="col-md-6">
                        <label for="city">City</label>
                        <input id="city" class="form-control" type="text">
                      </div>
                      <div class="col-md-6">
                        <label for="state">State</label>
                        <input id="state" class="form-control" type="text">
                      </div>
                      <div class="col-md-6">
                        <label for="postcode">Postal Code</label>
                        <input id="postcode" class="form-control" type="text">
                      </div>



                      {{-- <button id="mybtn" type="button" name="button">btn</button> --}}

                    </div>
                  </fieldset>

                </form>
                  {{-- ALGOLIA SEARCHING RESULTS WITH MADE IN PHP --}}
                  {{-- @foreach ($hits as $hit)
                    <ul>
                      <li>
                        {{ $hit['city'] }}
                      </li>
                    </ul>
                  @endforeach --}}
                  {{-- END OF ALGOLIA SEARCHING RESULTS WITH MADE IN PHP --}}
            </div>
        </div>

        {{-- SLIDER RANGE --}}
        <div id="slidecontainer">
          <p>Scegli il raggio in km:</p>
          <input id="mySliderRadius" type="range" min="1" max="1000000" value="20000">

          <p>km: <span id="sliderValue"></span></p>
        </div>

          {{-- RESULTS --}}
        <div id="div-results">
          <ul id="myAlgoliaResults">
          </ul>
        </div>


    </body>
</html>
