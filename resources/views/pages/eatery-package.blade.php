@extends('layouts.master')

@section('title')
	COVID-19, राहत खाद्य प्याकेज
@stop

@section('page-content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-12" style="overflow-x: auto;">
				<h3 class="text-center" style="margin-bottom: 15px;font-weight: bold;">
					राहत खाद्यान्न प्याकेज सम्बन्धी जानकारी
				</h3>
				<table id="eatery-package" class="table table-striped table-bordered" style="width: 100%;">
					<thead>
			            <tr>
			                <th>क्र.स.</th>
			                <th>सामानको  विवरण</th>
			                <th>२ जनाको सम्मको परिवार</th>
			                <th>४ जना सम्मको  परिवार</th>
			                <th>६ जना सम्मको  परिवार</th>
			                <th>६ जना भन्दा बढीको परिवार</th>
			            </tr>
			        </thead>
			        <tbody>
			        	@if($packageItems->count())
			        		@php
        						function ent_to_nepali_num_convert($number){
							        $eng_number = array("0","1","2","3","4","5","6","7","8","9");
							        $nep_number = array("०","१","२","३","४","५","६","७","८","९");
							        return str_replace($eng_number, $nep_number, $number);
							    }
        					@endphp
			        		@foreach($packageItems as $item)
			        			<tr>
			        				<td>
        								{{ent_to_nepali_num_convert($loop->index+1)}}
			        				</td>
			        				<td>{{$item->name}}</td>
			        				<td>{{$item->two_family_q}}</td>
			        				<td>{{$item->four_family_q}}</td>
			        				<td>{{$item->six_family_q}}</td>
			        				<td>{{$item->asix_family_q}}</td>
			        			</tr>
			        		@endforeach
			        	@endif
			        </tbody>
				</table>
				<span style="float: right;">Source: <a href="http://shahidlakhanmun.gov.np/content/%E0%A4%86%E0%A4%9C-%E0%A4%AE%E0%A4%BF%E0%A4%A4%E0%A4%BF-%E0%A5%A8%E0%A5%A6%E0%A5%AD%E0%A5%AC-%E0%A4%B8%E0%A4%BE%E0%A4%B2-%E0%A4%9A%E0%A5%88%E0%A4%A4%E0%A5%8D%E0%A4%B0-%E0%A5%A8%E0%A5%AB%E0%A4%97%E0%A4%A4%E0%A5%87-%E0%A4%95%E0%A5%8B%E0%A4%B0%E0%A5%8B%E0%A4%A8%E0%A4%BE-%E0%A4%AD%E0%A4%BE%E0%A4%87%E0%A4%B0%E0%A4%B8%E0%A4%95%E0%A5%8B%E0%A4%AD%E0%A4%BF%E0%A4%A1-%E0%A5%A7%E0%A5%AF-%E0%A4%95%E0%A5%8B-%E0%A4%B0%E0%A5%8B%E0%A4%95%E0%A4%A5%E0%A4%BE%E0%A4%AE-%E0%A4%A8%E0%A4%BF%E0%A4%AF%E0%A4%A8%E0%A5%8D%E0%A4%A4%E0%A5%8D%E0%A4%B0%E0%A4%A3-%E0%A4%A4%E0%A4%A5%E0%A4%BE-%E0%A4%89%E0%A4%AA%E0%A4%9A%E0%A4%BE%E0%A4%B0%E0%A4%95%E0%A4%BE-%E0%A4%B2%E0%A4%BE%E0%A4%97%E0%A4%BF-%E0%A4%B6%E0%A4%B9%E0%A4%BF%E0%A4%A6">शहिद लखन गाउँपालिका</a></span>
			</div>
		</div>
	</div>
@stop

@section('js')
	<script>
		$(document).ready(function() {
		    $('#eatery-package').DataTable();
		} );

	</script>
@stop