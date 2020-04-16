@extends('layouts.master')

@section('title')
	COVID-19, सहयोग गर्नुहोस्
@stop

@section('page-content')
	<div class="clearfix" id="donate-now">
		<donate-now></donate-now>
	</div>
@stop

@section('js')
	<script src="https://www.google.com/recaptcha/api.js?onload=vueRecaptchaApiLoaded&render=explicit" async defer>
</script>
	<script>
		const app = new Vue({
		    el: '#donate-now',
		});
	</script>
@stop