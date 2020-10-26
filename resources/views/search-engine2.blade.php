<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Search</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    Search
                </div>
            </div>

            <form>
              <fieldset class="container mt-4">
                <legend>Algolia Address Autocomplete</legend>
                <div class="row">

                  <div class="col-md-6">
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

                </div>
              </fieldset>

            </form>

        </div>
        {{-- algolia --}}

    </body>
</html>
