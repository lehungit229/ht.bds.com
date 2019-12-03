@extends('backend.common.layout')

@section('content')

<div id="page-wrapper" class="gray-bg dashbard-1">
	<div class="row wrapper border-bottom white-bg page-heading">
		<div class="col-lg-10">
			<h2>Quản lý người dùng</h2>
			<ol class="breadcrumb">
				<li>
					<a href="{{ URL::to('/') }}">Home</a>
				</li>
				<li class="active"><strong>Quản lý người dùng</strong></li>
			</ol>
		</div>
	</div>
	<div class="wrapper wrapper-content  animated fadeInRight">
		<div class="row">
			<div class="col-sm-8" style="padding-left:0;padding-right:0;">
				<div class="ibox">
					<div class="ibox-title">
						<h5>Danh sách người dùng</h5>
						<div class="ibox-tools">
							<a class="collapse-link">
								<i class="fa fa-chevron-up"></i>
							</a>
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="fa fa-wrench"></i>
							</a>
							<ul class="dropdown-menu dropdown-user">
								<li><a type="button" class="ajax-recycle-all" data-title="Lưu ý: Số thành viên bị xóa sẽ không thể truy cập vào hệ thống quản trị được nữa!" data-module="user">Xóa tất cả</a>
								</li>
							</ul>
							<a class="close-link">
								<i class="fa fa-times"></i>
							</a>
						</div>
					</div>
					
					
					<div class="ibox-content">
						<div class="uk-flex uk-flex-middle uk-flex-space-between">	
							<div class="uk-button">
								<a href="{{ url('backend/user/create') }}" class="btn btn-danger btn-sm"><i class="fa fa-plus"></i> Thêm tài khoản</a>
							</div>
							<div class="uk-flex uk-flex-middle uk-flex-space-between">
								<div class="input-group">
								</div>
								<form method="GET" action="{{ url('backend/user/search' ) }}">
								    {{ csrf_field() }}
									<input type="text" style="width:250px;" name="keyword" value="{{ $_GET['keyword'] ?? '' }}" placeholder="Nhập Email, số điện thoại, tài khoản ... " class="input keyword form-control">
								   <button type="submit"  class="hidden"><i class="fa fa-trash"></i></button>
								</form>
							</div>
						</div>
						<div class="clients-list">
							<ul class="nav nav-tabs">
								<li class="active"><a data-toggle="tab" href="#tab-1"><i class="fa fa-user"></i> Danh sách người dùng</a></li>
							</ul>
							<div class="tab-content" id="userData">
								<div id="tab-1" class="tab-pane active">
									<div class="full-height-scroll">
										<div class="table-responsive">
											<table class="table table-striped table-hover">
												<thead>
													<tr>
														<th class="text-center max-width50">
															<input type="checkbox" id="checkbox-all">
															<label for="check-all" class="labelCheckAll"></label>
														</th>
														<th class="text-left">Email</th>
														<th class="text-left">Họ tên</th>
														<th class="text-left">Phone</th>
														<th class="text-center width90">Thao tác</th>
													</tr>
												</thead>
												<tbody>
													@php
														$items =  $modules->items();
													@endphp
													@if (isset($items) && is_array($items) && count($items))
														@foreach($items as $item)
															<tr style="cursor:pointer;" class="choose" data-info="{{ base64_encode(json_encode($item)) }}" >
																<td class="text-center">
																	<input type="checkbox" name="checkbox[]" value="{{ $item->id }}" class="checkbox-item">
																	<div for="" class="label-checkboxitem"></div>
																</td>
																<td class="client-email"> {{ (!empty($item->email)) ? $item->email : '-' }}</td>
																<td class="text-success">{{ $item->name }}</td>
																<td>{{ $item->phone ?? '' }}</td>
																<td class="client-status" style="text-align:center;">
																	<form class="delete" method="POST" action="{{ url('backend/users/'.$item->id ?? '' ) }}" onsubmit='return ConfirmDelete()'] >
																		<a type="button" href="{{ url('backend/users/'.$item->id.'/edit') }}"   class="btn btn-sm btn-primary btn-update"><i class="fa fa-edit"></i></a>
																	    {{ csrf_field() }}
																	    {{ method_field('delete') }}
																		
																	   <button type="submit"  class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
																	</form>
																</td>
															</tr>
														@endforeach
													@else
														<tr>
															<td colspan="5">
																<small class="text-danger">Không có dữ liệu phù hợp</small>
															</td>
														</tr>
													@endif
												</tbody>
											</table>
											<div class="text-right">
												{!! $modules->render() !!}
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
	</div>
	@section('footer')
	    @include('backend/common/footer')
	@show
</div>

@stop
