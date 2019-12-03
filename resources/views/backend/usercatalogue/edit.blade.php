@extends('backend.common.layout')

@section('content')
<div id="page-wrapper" class="gray-bg dashbard-1">
	<div class="row wrapper border-bottom white-bg page-heading">
		<div class="col-lg-10">
			<h2>Cập nhật nhóm thành viên</h2>
			<ol class="breadcrumb">
				<li>
					<a href="{{ URL::to('/') }}">Home</a>
				</li>
				<li class="active"><strong>Cập nhật nhóm thành viên</strong></li>
			</ol>
		</div>
	</div>
	
	<form method="POST" action="{{ url('backend/usercatalogues/'.$module->id ?? '') }}">
		@csrf
    	@method('PUT')

		<div class="wrapper wrapper-content animated fadeInRight">
			@section('error')
			    @include('backend/common/error')
			@show
			<div class="row">
				<div class="col-lg-12">
					<div class="ibox m0">
						<div class="ibox-content">
							<div class="form-group m-b">
								<label class="col-md-2 control-label text-left">
									<span>Tên nhóm thành viên</span>
								</label>
								<div class="col-md-10">
									<input type="text" name="name" value="{{ old('name', $module->name) }}" class="form-control" placeholder="" autocomplete="off">
								</div>
							</div>
							
							@php
								$permission = old('permission');
								if(!isset($permission) || !check_array($permission)){
									$permission = json_decode($module->permission);
								}
							@endphp

							@php
								$xml = simplexml_load_file(URL::to('/').'/app/http/controllers/backend/config.xml') or die('Error: Cannot create object '.$dir.'/'.$valFolder.'/config.xml');  
								$xml = json_decode(json_encode((array)$xml), TRUE);
								$xml = $xml['permissions'];
							@endphp
							@if(isset($xml) && is_array($xml) && count($xml))
							@foreach($xml as $keyPermission => $valPermission) 
							<div class="form-group">
								<label class="col-md-2 control-label text-left">
									<span>{{ $valPermission['title'] ?? '' }}</span>
								</label>
								@if(isset($valPermission['item']) && is_array($valPermission['item']) && count($valPermission['item']))
								<div class="col-md-10">
									<div class="userGroupContainer clearfix">
										@foreach($valPermission['item'] as $keyItems => $valItems)
										<div class="i-checks">
											@php
												$checked = (
													isset($permission) && is_array($permission) && 
													in_array($valItems['param'], $permission))
													?'checked="checked"':'';
											@endphp
											<label><input name="permission[]" {{ $checked }} type="checkbox" value="{{ $valItems['param'] }}"> <i></i>{{ $valItems['description'] }}</label>
										</div>
										@endforeach
									</div>
								</div>
								@endif
							</div>
							@endforeach
							@endif
							
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
