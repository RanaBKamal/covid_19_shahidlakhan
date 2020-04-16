@extends('layouts.category')
@section('category-content')
	@if($posts->count())
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<table id="notices" class="table table-striped table-bordered" style="width: 100%;">
						<thead style="display: none;">
							<th></th>
						</thead>
						<tbody>
							@if($posts->count())
								@foreach($posts as $post)
									<tr>
										<td>
											<a href="{{route('post', ['slug' => $post->slug])}}"><h4>{{substr($post->title, 0, 200)}}</h4></a>
											<span class="badge badge-light">{{$post->created_at->format('j F, Y')}}</span>
										</td>
									</tr>
								@endforeach
							@endif
							@section('cat-title')
								{{$post->category->name}}
							@stop
						</tbody>
					</table>
				</div>
			</div>
		</div>
	@else
		@section('title')
			No posts found
		@stop	
	@endif
@stop
@section('js')
	<script>
		$(document).ready(function() {
		    $('#notices').DataTable();
		} );
	</script>
@stop