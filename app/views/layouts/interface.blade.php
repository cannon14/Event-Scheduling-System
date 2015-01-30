<!DOCTYPE html>
<html>
<head>
    <title>Creditcards.com Event Scheduling System</title>
    <meta charset="UTF-8">
    <meta name="application-name" content="Event Scheduling System">
    <meta name="description" content="Application to schedule events">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="CreditCards.com">
    <meta name="copyright" content="Copyright <?= date("Y"); ?> CreditCards.com">

    {{ HTML::script('packages/jquery/jquery.min.js'); }}
    {{ HTML::script('packages/bootstrap/dist/js/bootstrap.min.js'); }}
    {{ HTML::script('packages/moment/moment.js'); }}
    {{ HTML::script('packages/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js'); }}
    {{ HTML::script('packages/DataTables-1.10.4/media/js/jquery.dataTables.min.js') }}

    {{ HTML::style('packages/bootstrap/dist/css/bootstrap.min.css'); }}
    {{ HTML::style('packages/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css'); }}
    {{ HTML::style('packages/DataTables-1.10.4/media/css/jquery.dataTables.min.css') }}
    {{ HTML::style('css/site_styles.css'); }}

</head>

<body>
<div class="container">

    @yield('content')

</div><!--container-->

</body>
</html>