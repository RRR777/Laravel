<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>TodoList</title>
    <link rel="stylesheet" href="/css/app.css"
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
    crossorigin="anonymous">
</head>

<body>
    @include('inc.navbar')
    <div class="container">
        @include('inc.messages')
        @yield('content')
    </div>

    <footer id="footer" class="text-center">
        <p>Copyright &copy; 2018 TodoList </p>
    </footer>
</body>
</html>
