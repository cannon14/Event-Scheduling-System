<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <title>Creditcards.com Conference Room Scheduling System</title>

        {{ HTML::script('packages/jquery/jquery.min.js'); }}
        {{ HTML::script('packages/bootstrap/dist/js/bootstrap.min.js'); }}
        {{ HTML::script('packages/moment/moment.js'); }}
        {{ HTML::script('packages/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js'); }}

        {{ HTML::style('packages/bootstrap/dist/css/bootstrap.min.css'); }}
        {{ HTML::style('packages/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css'); }}
        {{ HTML::style('css/site_styles.css'); }}

    </head>
    <body>
        <div class="container" id="site_container">
            @yield('content')
        </div>
    </body>
</html>