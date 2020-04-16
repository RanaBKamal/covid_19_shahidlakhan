@extends('layouts.master')

@section('title')
	COVID-19, सहयोगी दाताहरुको सुची
@stop

@section('page-content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-12" style="overflow-x: auto;">
				<h3 class="text-center" style="margin-bottom: 15px;font-weight: bold;">
					COVID-19, सहयोगी दाताहरुको सुची
				</h3>
				<h3><span class="donate-button"><a class="btn btn-danger" href="{{route('donate-link')}}">सहयोग गर्न चाहानुहुन्छ? यहाँ थिच्नुहोस</a></span></h3>
				<table id="donors" class="table table-striped table-bordered" style="width: 100%;">
					<thead>
			            <tr>
			                <th>क्र.स.</th>
			                <th>व्यक्ति/संस्थाको नाम</th>
			                <th>सहयोग रकम</th>
			                <th>अन्य सहयोग विवरण</th>
			                <th>अन्य विवरण</th>
			                <th>मिति</th>
			            </tr>
			        </thead>
			        <tbody>
			        	@if($donors->count())
			        		@php
        						function ent_to_nepali_num_convert($number){
							        $eng_number = array("0","1","2","3","4","5","6","7","8","9");
							        $nep_number = array("०","१","२","३","४","५","६","७","८","९");
							        return str_replace($eng_number, $nep_number, $number);
							    }
							    $total_amount = 0;
        					@endphp
			        		@foreach($donors as $donor)
			        			<tr>
			        				<td>
	    								{{ent_to_nepali_num_convert($loop->index+1)}}
			        				</td>
			        				<td>{{$donor->name}}</td>
			        				<td>{{ent_to_nepali_num_convert($donor->amount)}}
			        					@php
			        						$total_amount = $total_amount + $donor->amount;
			        					@endphp
			        				</td>
			        				<td>
			        					@php
			        					echo $donor->other_detail;
			        					@endphp
			        				</td>
			        				<td>{{$donor->other}}</td>
			        				<td>{{ent_to_nepali_num_convert($donor->donation_date)}}</td>
			        			</tr>
			        		@endforeach
			        	@endif
			        	@if($donors->count())
			        		<tfoot>
				        		<tr class="no-sort">
			        				<td>
	    								
			        				</td>
			        				<td style="font-weight:bold;">जम्मा</td>
			        				<td style="font-weight:bold;">
			        					@php
			        						echo ent_to_nepali_num_convert($total_amount);
			        					@endphp
			        				</td>
			        				<td>
			        				</td>
			        				<td></td>
			        				<td></td>
			        			</tr>
			        		</tfoot>
			        	@endif
			        </tbody>
				</table>
			</div>
		</div>
	</div>
@stop

@section('js')
	@can('employee-content')
		<script>
			$(document).ready(function() {
			    $('#donors').DataTable( {
			        dom: 'lBfrtip',
			        "aaSorting": [],
			        buttons: [
			            'print'
			        ]
			    } );
			} );
		</script>
	@endcan
	@cannot('employee-content')
		<script>
			$(document).ready(function() {
			    $('#donors').DataTable();
			} );
		</script>
	@endcannot
@stop