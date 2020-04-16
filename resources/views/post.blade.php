@extends('layouts.master')

@if($post->count())
	@section('title')
		{{$post->title}}
	@stop

	@section('page-content')
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<h4 class="text-center">{{$post->title}}</h4>
				</div>
				<div class="col-12" style="margin-bottom: 15px;">
					<span class="text-center" style="display: block;">
						{{$post->created_at->format('j F, Y')}}
					</span>
				</div>
				
				<div class="col-12"  style="margin-bottom: 15px;">
					<a href="{{Voyager::image($post->image)}}">
						<img src="{{Voyager::image($post->image)}}" alt="{{$post->title}}" class="img-fluid rounded">
					</a>
				</div>
				<div class="col-12"  style="margin-bottom: 15px;">
					@php 
						echo $post->body;
					@endphp
				</div>
				<div class="col-12"  style="margin-bottom: 15px;">
					<span style="float: right;">
						By: {{$post->authorId->name}}
					</span>
				</div>
			</div>
		</div>
	@stop
@else
	@section('title')
		No post found
	@stop	
@endif
