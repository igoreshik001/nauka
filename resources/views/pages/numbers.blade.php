@extends('layouts.main')

@section('grid')
	<h3 class="text-center">D+ = {{$numbers->D_max ?? 0}}</h3>
	<div class="table-wrapper-scroll-y my-custom-scrollbar">
		<table class="table table-bordered table-striped mb-0">
			<thead>
				<tr>
					<th>#</th>
					<th>n</th>
					<th>d+</th>
					<th>d-</th>
				</tr>
			</thead>
			<tbody>
				@foreach($n as $one_n)
					<tr>
						<td>{{$loop->iteration}}</td>
						<td>{{$one_n}}</td>
						<td>{{$d[$loop->index]}}</td>
						<td>{{$d_minus[$loop->index]}}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection()

@section('d_max')
	<h3 class="text-center">D_max = {{$numbers->D_max ?? 0}}</h3>
	<div class="table-wrapper-scroll-y my-custom-scrollbar">
	@foreach($D_max as $one_D)
		@if($loop->index % 10 == 0)
			<div class="flex-row d-flex" id="{{$loop->index}}">
		@endif
		<div class="col-sm border border-dark"><span class="small">{{$loop->iteration.': '}}</span><a href="/id/{{$one_D->id}}" class="text-primary">{{$one_D->D_max}}</a></div>
		@if($loop->index % 10 == 9)
			</div>
		@endif
	@endforeach
	</div>
@endsection