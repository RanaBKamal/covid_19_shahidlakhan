@extends('layouts.master')

@section('title')
	COVID-19, सहयोगी दाताहरुको सुची
@stop

@section('page-content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-12" style="overflow-x: auto;">
				@can('employee-content')
					<h3 class="text-center" style="margin-bottom: 15px;font-weight: bold;">
						COVID-19, सहयोग गर्न चाहनेहरुको सुची
					</h3>
					<table id="donation-request-list" class="table table-striped table-bordered" style="width: 100%;">
						<thead>
				            <tr>
				                <th>क्र.स.</th>
				                <th>पुरा नाम</th>
				                <th>स्थाई ठेगाना </th>
				                <th>अस्थाई ठेगाना</th>
				                <th>इमेल</th>
				                <th>सम्पर्क/फोन  न.</th>
				                <th>सहयोग गर्न  चाहेको रकम</th>
				                <th>अन्य सहयोग</th>
				            </tr>
				        </thead>
				        <tbody>
				        	@if($donateRequests->count())
				        		@php
	        						function ent_to_nepali_num_convert($number){
								        $eng_number = array("0","1","2","3","4","5","6","7","8","9");
								        $nep_number = array("०","१","२","३","४","५","६","७","८","९");
								        return str_replace($eng_number, $nep_number, $number);
								    }
								    $total_amount = 0;
	        					@endphp
				        		@foreach($donateRequests as $request)
				        			<tr>
				        				<td>
		    								{{ent_to_nepali_num_convert($loop->index+1)}}
				        				</td>
				        				<td>{{$request->name}}</td>
				        				<td>{{$request->permanent_address}}</td>
				        				<td>
				        					{{$request->current_address}}
				        				</td>
				        				<td>{{$request->email}}</td>
				        				<td>{{$request->contact}}</td>
				        				<td>{{$request->amount}}</td>
				        				<td>{{$request->other_help}}</td>
				        			</tr>
				        		@endforeach
				        	@endif
				        </tbody>
					</table>
				@endcan
				@cannot('employee-content')
					<h3 class="text-center" style="margin-bottom: 15px;font-weight: bold;">
						अनुमति नभएको खण्ड
					</h3>
				@endcannot
			</div>
		</div>
	</div>
@stop

@section('js')
	@can('employee-content')
		<script>
			$(document).ready(function() {
			    $('#donation-request-list').DataTable( {
			        dom: 'lBfrtip',
			        "aaSorting": [],
			        buttons: [
			            'print'
			        ]
			    } );
			} );
		</script>
	@endcan
@stop