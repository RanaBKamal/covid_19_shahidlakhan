@extends('layouts.master')

@section('title')
	COVID-19, शहिद लखन गाउँपालिका
@stop

@section('page-content')
	@can('employee-content')
		<div class="verified-content-wrapper clearfix card">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<h3 class="text-center" style="display: block;font-weight: bold;padding-top: 10px;">कर्मचारीले  प्रयोग गर्न मिल्ने खण्ड</h3>
					</div>
				</div>
				<div class="row">
					<div class="col-12 col-md-4">
						<div class="small-box bg-primary text-center">
							<div class="inner">
								<h4>सहयोग गर्न चाहनेहरुको सुची</h4>
							</div>
							<div class="icon">
								<!-- <i class="fas fa-shopping-cart"></i> -->
							</div>
							<a href="{{route('donation-request-list')}}" class="btn btn-success" style="margin-bottom: 10px;color: #ffffff !important;font-weight: bold;font-size:16px;">
							पुरा सुची हेर्नुहोस्
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	@endcan
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card card-outline">
					<ul class="nav nav-tabs">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#quarentine-point">क्वारेन्टाइन स्थलहरुको विवरण</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#health-point">स्वास्थ्य संस्थाहरुको विवरण</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
						<div class="tab-pane container active" id="quarentine-point">
							<div class="container-fluid">
								<div class="row">
									<div class="col-12">
										<span class="text-center" style="display: block;margin: 15px;font-size: 1.4em;font-weight: bold;">क्वारेन्टाइन स्थलहरुको विवरण</span>		
									</div>
									<div class="col-12">
										<div class="clearfix" style="overflow: auto;">
											<table id="quarentine-point-table" class="table table-striped table-bordered" style="width: 100%;">
												<thead>
													<tr>
														<th>क्र.स.</th>
														<th>संस्थाको नाम र ठेगाना</th>
														<th>क्षमता</th>
														<th>हाल बसिरहेको</th>
														<th>सम्बन्धित व्यक्ति र सम्पर्क</th>
													</tr>
												</thead>
												<tbody>
													@php
						        						function ent_to_nepali_num_convert($number){
													        $eng_number = array("0","1","2","3","4","5","6","7","8","9");
													        $nep_number = array("०","१","२","३","४","५","६","७","८","९");
													        return str_replace($eng_number, $nep_number, $number);
													    }
													    $c_total = 0;
													    $o_total = 0;
						        					@endphp
													@if($qpoints->count())
														@foreach($qpoints as $qp)
															<tr>
																<td>{{ent_to_nepali_num_convert($loop->index+1)}}</td>
																<td>{{$qp->name_address}}</td>
																<td>{{ent_to_nepali_num_convert($qp->capacity)}}
																	@php
																		$c_total += $qp->capacity;
																		$o_total += $qp->occupied;
																	@endphp
																</td>
																<td>{{ent_to_nepali_num_convert($qp->occupied)}}</td>
																<td>{{$qp->person_contact}}</td>
															</tr>
														@endforeach
													@endif
												</tbody>
												@if($qpoints->count())
													<tfoot>
														<tr class="no-sort">
															<td></td>
															<td style="font-weight:bold;">जम्मा</td>
															<td style="font-weight:bold;">{{ent_to_nepali_num_convert($c_total)}}
															</td>
															<td style="font-weight:bold;">{{ent_to_nepali_num_convert($o_total)}}</td>
															<td></td>
														</tr>
													</tfoot>
												@endif
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane container fade" id="health-point">
							<div class="container-fluid">
								<div class="row">
									<div class="col-12">
										<span class="text-center" style="display: block;margin: 15px;font-size: 1.4em;font-weight: bold;">स्वास्थ्य संस्थाहरुको विवरण</span>
									</div>
									<div class="col-12">
										<div class="clearfix" style="overflow: auto;">
											<table id="health-point-table" class="table table-striped table-bordered" style="width: 100%;">
												<thead>
													<tr>
														<th>क्र.स.</th>
														<th>स्वास्थ्य संस्थाको नाम र ठेगाना</th>
														<th>खुल्ने समय </th>
														<th>सम्पर्क </th>
														<th>अन्य विवरण</th>
													</tr>
												</thead>
												<tbody>
													@if($hpoints->count())
														@foreach($hpoints as $hp)
															<tr>
																<td>{{ent_to_nepali_num_convert($loop->index+1)}}</td>
																<td>{{$hp->name_address}}</td>
																<td>{{$hp->open_time}}</td>
																<td>{{$hp->contact_info}}</td>
																<td>{{$hp->other_info}}</td>
															</tr>
														@endforeach
													@endif
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 col-md-4">
				<div class="small-box bg-primary text-center">
					<div class="inner">
						<h4>राहत खाद्यान्न प्याकेज सम्बन्धी जानकारी</h4>
					</div>
					<div class="icon">
						<!-- <i class="fas fa-shopping-cart"></i> -->
					</div>
					<a href="{{route('eatery-package-detail')}}" class="btn btn-success" style="margin-bottom: 10px;color: #ffffff !important;font-weight: bold;font-size:16px;">
					यहाँ थिच्नुहोस्
					</a>
				</div>
			</div>
			<div class="col-12 col-md-4">
				<div class="small-box bg-primary text-center">
					<div class="inner">
						<h4>लकडाउनमा राहत पाउनेहरुको सुची</h4>
					</div>
					<div class="icon">
						<i class="fas fa-user-friends"></i>
					</div>
					<a href="{{route('package-holder-detail')}}" class="btn btn-success" style="margin-bottom: 10px;color: #ffffff !important;font-weight: bold;font-size:16px;">
					पुरा सुची हेर्नुहोस्
					</a>
				</div>
			</div>
			<div class="col-12 col-md-4">
				<div class="small-box bg-primary text-center">
					<div class="inner">
						<h4>लकडाउनलाई सहज बनाउन सहयोगी दाताहरुको सुची</h4>
					</div>
					<div class="icon">
						<!-- <i class="fas fa-user-friends"></i> -->
					</div>
					<a href="{{route('donor-detail')}}" class="btn btn-success" style="margin-bottom: 10px;color: #ffffff !important;font-weight: bold;font-size:16px;">
					पुरा सुची हेर्नुहोस्
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card card-outline">
					<ul class="nav nav-tabs">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#corona-update">कोरोना अपडेट विवरण</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#notice">सूचना</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#news">समाचार</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
						<div class="tab-pane container active" id="corona-update">
							<div class="container-fluid">
								<div class="row">
									<div class="col-12" id="corona-update-component">
										<div class="corona-update-wrapper clearfix">
										    <div class="text-center" style="font-size: 1.2em;">कोरोना अपडेट विवरण यहाँ आउनेछ।</div>
										  </div>
										<!-- <corona-update></corona-update> -->
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane container fade" id="notice">
							@if($notices->count())
								<ul class="list-group list-group-flush">	
									@foreach($notices as $notice)
										<li class="list-group-item">
										  	<a href="{{route('post', ['slug' => $notice->slug])}}"><h5>
										  		{{substr($notice->title,0, 100)}}
										  	</h5>
										  		<span class="badge badge-light">{{$notice->created_at->format('j F, Y')}}</span>
										  	</a>
										</li>		
									@endforeach
									<li class="list-group-item">
										<a href="{{route('category', ['slug' => 'notice'])}}" class="text-center btn btn-primary" style="float: right;">सबै सूचना हेर्नुहोस्</a>
									</li>
								</ul>
							@else
								<span style="display: block;" class="text-center">सूचना छैन</span>
							@endif
						</div>
						<div class="tab-pane container fade" id="news">
							@if($news->count())
								<ul class="list-group list-group-flush">	
									@foreach($news as $new)
										<li class="list-group-item">
										  	<a href="{{route('post', ['slug' => $notice->slug])}}"><h5>
										  		{{substr($new->title,0, 100)}}
										  	</h5>
										  		<span class="badge badge-light">{{$new->created_at->format('j F, Y')}}</span>
										  	</a>
										</li>		
									@endforeach
									<li class="list-group-item">
										<a href="{{route('category', ['slug' => 'news'])}}" class="text-center btn btn-primary" style="float: right;">सबै समाचार हेर्नुहोस्</a>
									</li>
								</ul>
							@else
								<span style="display: block;" class="text-center">समाचार छैन</span>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="verified-content-wrapper clearfix card">
					<div class="container">
						<div class="row">
							<div class="col-12">
								<h3 class="text-center" style="display: block;font-weight: bold;padding-top: 10px;">प्रयोगकर्ताको लागि अनुमति भएको खण्ड</h3>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<h5 class="text-center" style="display: block;font-weight: bold;padding-top: 10px;">यसको लागि तपाइले रजिस्टर गरेर लग इन गर्नु पर्दछ। <a href="{{route('register')}}" class="btn btn btn-success text-center">रजिस्टर गर्नुहोस्</a></h5>
							</div>
						</div>
						@auth
							@if(Auth::user()->can('user-content') || Auth::user()->can('employee-content'))
								<div class="row">
									<div class="col-12">
										<h5 class="text-center">प्रयोगकर्ता सामग्री </h5>
									</div>
								</div>
							@endif
						@endauth
					</div>
				</div>		
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 col-md-12">
				<div class="link-wrapper card">
					<div class="ribbon-wrapper ribbon-lg">
					  <div class="ribbon bg-success text-lg">
					    लिंकहरु
					  </div>
					</div>
					<div class="ribbon-body">
						@if($links->count())
							<ul class="list-group">
								@foreach($links as $link)
									<li class="list-group-item">
										<a target="_blank" class="important-link-item" href="{{$link->link}}"><i class="fa fa-link link-icon"></i>
											{{$link->name}}
										</a>
									</li>

								@endforeach
							</ul>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
@stop

@section('js')
	<script>
		$(document).ready(function() {
		    $('#quarentine-point-table').DataTable({
		    	"aaSorting": [],
		    });
		    $('#health-point-table').DataTable({
		    	"aaSorting": [],
		    });
		} );
		// const app = new Vue({
		//     el: '#corona-update-component',
		// });
	</script>
@stop
