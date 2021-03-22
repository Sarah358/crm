<!-- Stored in resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- css  --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    {{-- js --}}
    <script src="{{asset('js/app.js')}}" defer> </script>

    <title>crm - @yield('title')</title>
</head>

<body>
  @yield('sidebar')
@yield('content')

</body>
</html>