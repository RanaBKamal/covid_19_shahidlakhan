@extends('layouts.master')

@section('page-content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<h2 class="text-center">@yield('cat-title')</h2>
			</div>
		</div>
	</div>
	@yield('category-content')
@stop