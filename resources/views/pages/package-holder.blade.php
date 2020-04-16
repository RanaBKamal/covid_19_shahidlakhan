@extends('layouts.master')

@section('title')
	COVID-19, राहत प्राप्त गर्नेहरुकाे नामावली
@stop

@section('page-content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-12" style="overflow-x: auto;">
				<h3 class="text-center" style="margin-bottom: 15px;font-weight: bold;">
					राहत प्राप्त गर्नेहरुकाे नामावली
				</h3>
				<table id="package-holder" class="table table-striped table-bordered" style="width: 100%;">
					<thead>
			            <tr>
			                <th>क्र.स.</th>
			                <th>नाम</th>
			                <th>उमेर</th>
			                <th colspan="2">स्थाई ठेगाना </th>
			                <th>राहत दिनुपर्ने कारण</th>
			                <th>परिवार संख्या</th>
			                <th>सम्पर्क न.</th>
			                <th>अन्य विवरण</th>
			                <th>प्रमाणित गर्ने</th>
			            </tr>
			            <tr>
			                <th></th>
			                <th></th>
			                <th></th>
			                <th>वडा</th>
			                <th>टोल</th>
			                <th></th>
			                <th></th>
			                <th></th>
			                <th></th>
			                <th></th>
			            </tr>
			        </thead>
			        <tbody>
			        	@if($packageHolders->count())
			        		@php
        						function ent_to_nepali_num_convert($number){
							        $eng_number = array("0","1","2","3","4","5","6","7","8","9");
							        $nep_number = array("०","१","२","३","४","५","६","७","८","९");
							        return str_replace($eng_number, $nep_number, $number);
							    }
        					@endphp
			        		@foreach($packageHolders as $package)
			        			<tr>
			        				<td>
        								{{ent_to_nepali_num_convert($loop->index+1)}}
			        				</td>
			        				<td>{{$package->name}}</td>
			        				<td>{{$package->age}}</td>
			        				<td>{{ent_to_nepali_num_convert($package->p_address_n)}}</td>
			        				<td>{{$package->p_address_tole}}</td>
			        				<td>{{$package->reason}}</td>
			        				<td>{{$package->family_no}}</td>
			        				<td>{{$package->contact}}</td>
			        				<td>{{$package->remarks}}</td>
			        				<td>{{$package->approved_by}}</td>
			        			</tr>
			        		@endforeach
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
			    $('#package-holder').DataTable( {
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
			    $('#package-holder').DataTable();
			} );
		</script>
	@endcannot
@stop