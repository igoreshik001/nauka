<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<title>numbers</title>
	<style type="text/css">
	.height {
		height: 500px;
	}

	.my-custom-scrollbar {
		position: relative;
		height: 500px;
		overflow: auto;
	}
	.table-wrapper-scroll-y {
		display: block;
		background-color: powderblue;
	}
</style>
</head>
<body>
	<div class="height">
		<div class="d-flex mx-3">
			<div class="w-25 border border-dark m-3 bg-info">
				@yield('grid')
			</div>
			<div class="w-75 border border-dark m-3 bg-info">
				@yield('d_max')
			</div>
		</div>


		<div class="container-sm d-flex justify-content-center bg-secondary mt-4 py-4">
			<form action="/" method="post" name="numbers">
				{{csrf_field()}}
				<label for="n1">n:</label><br>
				<input type="number" id="n1" name="n1" required><br>
				<label for="n2">N:</label><br>	
				<input type="number" id="n2" name="n2" required><br><br>
				<input type="submit" value="Submit">
			</form>
		</div>
	</div>
</body>
</html>