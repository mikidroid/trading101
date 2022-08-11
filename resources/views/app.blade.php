<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <title inertia>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<style>

*,div{
  
  font-family: 'Montserrat', sans-Serif !important;
  line-height: 1.5rem;
  
}
</style>

    <script src="{{ mix('/js/app.js') }}" defer></script>
    @routes
  </head>
  <body>
    @inertia
  </body>
</html>
