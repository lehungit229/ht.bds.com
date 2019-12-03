@extends('backend.common.layout')

@section('content')
<div id="page-wrapper" class="gray-bg dashbard-1">
	<div class="row wrapper border-bottom white-bg page-heading">
		<div class="col-lg-10">
			<h2>Cập nhật thành viên</h2>
			<ol class="breadcrumb">
				<li>
					<a href="{{ URL::to('/') }}">Home</a>
				</li>
				<li class="active"><strong>Cập nhật thành viên</strong></li>
			</ol>
		</div>
	</div>
	
	<form method="POST" action="{{ url('backend/users/'.$module['id'] ?? '') }}">
		@csrf
    	@method('PUT')

		<div class="wrapper wrapper-content animated fadeInRight">
			<div class="row">
				<div class="box-body">
					@if (count($errors) > 0)
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif
				</div>
			</div>
			<div class="row">
				<div class="col-lg-5">
					<div class="panel-head">
						<h2 class="panel-title">Thông tin chung</h2>
						<div class="panel-description">
							Một số thông tin cơ bản của người sử dụng.
						</div>
					</div>
				</div>
				<div class="col-lg-7">
					<div class="ibox m0">
						<div class="ibox-content">
							<div class="row mb15">
								<div class="col-lg-6">
									<div class="form-row">
										<label class="control-label text-left">
											<span>Email <b class="text-danger">(*)</b></span>
										</label>
										<input type="text" name="email" value="{{ old('email', $module->email ?? '') }}" class="form-control" readonly placeholder="" autocomplete="off">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-row">
										<label class="control-label text-left">
											<span>Nhóm nhận sự <b class="text-danger">(*)</b></span>
										</label>

										<select type="text" name="catalogue[]" value="" class="form-control selectMultipe" multiple="multiple" placeholder="" autocomplete="off" data-module="user_catalogues" data-selected=""></select>
									</div>
								</div>
								
							</div>
							<div class="row mb15">
								<div class="col-lg-6">
									<div class="form-row">
										<label class="control-label text-left">
											<span>Họ tên <b class="text-danger">(*)</b></span>
										</label>
										<input type="text" name="name" value="{{ old('name', $module->name ) }}" class="form-control" placeholder="" autocomplete="off">
									</div>
								</div>
								
								<div class="col-lg-6">
									<div class="form-row">
										<label class="control-label text-left">
											<span>Số điện thoại</span>
										</label>
										<input type="text" name="phone" value="{{ old('phone', $module->phone ?? '') }}" class="form-control" placeholder="" autocomplete="off">
									</div>
								</div>
							</div>
							<div class="row mb15">
								<div class="col-lg-6">
									<div class="form-row">
										<label class="control-label text-left">
											<span>Ngày sinh <b class="text-danger"></b></span>
										</label>
										<input type="text" data-mask="99/99/9999" name="birthday" value="{{ old('birthday', gettime($module->birthday ?? '','d/m/Y')) }}" class="form-control" placeholder="" autocomplete="off">
									</div>
								</div>

								
								<div class="col-lg-6">
									<div class="form-row">
										<label class="control-label text-left">
											<span>Giới tính <b class="text-danger"></b></span>
										</label>
										<div class="uk-flex uk-flex-middle">
											<div class="i-checks mr30"><label> 
												<input {{ old('gender', $module->gender ?? '') == 1 ? 'checked' : '' }} class="gender" type="radio" value="1"  name="gender"> 
												<i></i> Nam
											</label></div>

											<div class="i-checks"><label> 
												<input {{ old('gender', $module->gender ?? '') == 2 ? 'checked' : '' }} class="gender" type="radio" value="2"  name="gender"> 
												<i></i> Nữ
											</label></div>
										</div>
									</div>
								</div>
							</div>			
							
							<div class="row mb15">
								<div class="col-lg-6">
									<div class="form-row">
										<label class="control-label text-left">
											<span>Địa chỉ</span>
										</label>
										<input type="text" name="address" value="{{ old('address', $module->address ?? '') }}" class="form-control" placeholder="" autocomplete="off">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-row">
										<label class="control-label text-left">
											<span>Ghi chú</span>
										</label>
										<input type="text" name="note" value="{{ old('note', $module->note ?? '') }}" class="form-control" placeholder="" autocomplete="off">
									</div>
								</div>
							</div>
							<div class="toolbox action clearfix">
								<div class="uk-flex uk-flex-middle uk-button pull-right">
									<button class="btn btn-primary btn-sm" name="update" value="update" type="submit">Cập nhật</button>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
			
		</div>
	</form>
	@section('footer')
	    @include('backend/common/footer')
	@show
</div>
@stop
