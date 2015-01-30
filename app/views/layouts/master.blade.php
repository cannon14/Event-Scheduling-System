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
	{{ HTML::script('packages/fullcalendar-2.2.6/fullcalendar.js') }}

	{{ HTML::style('packages/bootstrap/dist/css/bootstrap.min.css'); }}
	{{ HTML::style('packages/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css'); }}
	{{ HTML::style('packages/DataTables-1.10.4/media/css/jquery.dataTables.min.css') }}
	{{ HTML::style('packages/fullcalendar-2.2.6/fullcalendar.css') }}
	{{ HTML::style('css/site_styles.css'); }}

</head>

<body>
<div class="container">
	<div class="row">
		<div class="col-lg-2 logo">
			<a href='/'>{{HTML::image('images/cccom_logo.gif', 'Creditcards.com')}}</a>
		</div>
		<div class="col-lg-8 text-center">
			<h1>Conference Room Scheduling System</h1>
		</div>
	</div>

	@if(Auth::check())
		<nav class="navbar navbar-default" role="navigation">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="navbarCollapse">
					<ul class="nav navbar-nav">
						<li>{{ HTML::link(url('/'), 'Home') }}</li>
						<li>{{ HTML::link(url('events'), 'Events') }}</li>
						<li>{{ HTML::link(url('locations'), 'Locations') }}</li>
						<li>{{ HTML::link(url('users'), 'Users') }}</li>
						<li>{{ HTML::link(url('help'), 'Help') }}</li>
						<li>{{ HTML::link(url('logout'), 'Logout') }}</li>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container-fluid -->
		</nav>
	@endif

	@if (Session::has('success'))
		<div class="alert alert-success text-center">{{Session::get('success');}}</div>
	@elseif(Session::has('error'))
		<div class="alert alert-danger text-center">{{Session::get('error');}}</div>
	@endif

	@if(Session::has('errors'))
		<div class="alert alert-danger text-center">
			@foreach ($errors->all('<li>:message</li>') as $message)
				{{$message}}
			@endforeach
		</div>
	@endif

	@yield('content')

	<footer>
		<footer>
			<div class="row">
				<div class="col-lg-12 text-center">
					<p>Copyright&copy {{ HTML::link('http://www.creditcards.com', 'Creditcards.com') }} 2015</p>
				</div>
			</div>
		</footer>
</div>
<!--container-->

</body>
</html>

<script>
	//Fade all messages out over 5 seconds.
	$('.alert').fadeOut(5000);

	$(document).ready(function () {
		$('.datatable').DataTable();

		$('.datetimepicker').datetimepicker({
			format: 'YYYY-MM-D HH:mm:ss',
			language: 'en'
		});
	});
</script>