@extends('backend.common.layout')

@section('content')

@php
	$moduleTitle = "Bài viết";
@endphp

<div id="page-wrapper" class="gray-bg dashbard-1">
	<div class="row wrapper border-bottom white-bg page-heading">
		<div class="col-lg-10">
			<h2>Quản lý {{ $moduleTitle }}</h2>
			<ol class="breadcrumb">
				<li>
					<a href="{{ URL::to('/') }}">Home</a>
				</li>
				<li class="active"><strong>Quản lý {{ $moduleTitle }}</strong></li>
			</ol>
		</div>
	</div>
	<div class="wrapper wrapper-content  animated fadeInRight">
		<div class="row">
			<div class="col-sm-12" style="padding-left:0;padding-right:0;">
				<div class="ibox">
					<div class="ibox-title">
						<h5>Danh sách {{ $moduleTitle }}</h5>
						<div class="ibox-tools">
							<a class="collapse-link">
								<i class="fa fa-chevron-up"></i>
							</a>
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="fa fa-wrench"></i>
							</a>
							<ul class="dropdown-menu dropdown-user">
								<li><a type="button" class="ajax-recycle-all" data-title="Lưu ý: Số {{ $moduleTitle }} bị xóa sẽ không thể truy cập vào hệ thống quản trị được nữa!" data-module="user">Xóa tất cả</a>
								</li>
							</ul>
							<a class="close-link">
								<i class="fa fa-times"></i>
							</a>
						</div>
					</div>
					
					
					<div class="ibox-content">
						<div class="uk-flex uk-flex-middle uk-flex-space-between">	
							
							<div class="uk-flex uk-flex-middle uk-flex-space-between">
								<div class="input-group">
								</div>
								<form method="GET" action="{{ url('backend/article/search' ) }}">
								    {{ csrf_field() }}
									<input type="text" style="width:250px;" name="keyword" value="{{ $_GET['keyword'] ?? '' }}" placeholder="Nhập tên {{ $moduleTitle }} ... " class="input keyword form-control">
								   <button type="submit"  class="hidden"><i class="fa fa-trash"></i></button>
								</form>
							</div>
							<div class="uk-button">
								<a href="{{ url('backend/article/create') }}" class="btn btn-danger btn-sm"><i class="fa fa-plus"></i> Thêm {{ $moduleTitle }}</a>
							</div>
						</div>
						<div class="table-responsive">
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th class="text-center max-width50">
											<input type="checkbox" id="checkbox-all">
											<label for="check-all" class="labelCheckAll"></label>
										</th>
										<th class="text-left">Tiêu đề</th>
										<th class="text-left">Ngày tạo</th>
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
												<td class="text-left">{{ $item->name }}</td>
												<td>{{ gettime($item->created_at ?? '', 'd/m/Y') }}</td>
												<td class="client-status" style="text-align:center;">
													<form class="delete" method="POST" action="{{ url('backend/articles/'.$item->id ?? '' ) }}" onsubmit='return ConfirmDelete()'] >
														<a type="button" href="{{ url('backend/articles/'.$item->id.'/edit') }}"   class="btn btn-sm btn-primary btn-update"><i class="fa fa-edit"></i></a>
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
	@section('footer')
	    @include('backend/common/footer')
	@show
</div>

@stop
