@extends('backend.common.layout')

@section('content')

@php
    $moduleTitle = "Nhóm thành viên"
@endphp
<div id="page-wrapper" class="gray-bg dashbard-1">
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Thêm mới {{ $moduleTitle }}</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ URL::to('/') }}">Home</a>
                </li>
                <li class="active"><strong>Thêm mới {{ $moduleTitle }}</strong></li>
            </ol>
        </div>
    </div>
    
    <form method="POST" action="{{ url('backend/usercatalogue/store') }}">
        @csrf

        <div class="wrapper wrapper-content animated fadeInRight">
            @section('error')
                @include('backend/common/error')
            @show
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox m0">
                        <div class="ibox-content">
                            <div class="form-group m-b">
                                <div class="row">
                                    <label class="col-md-2 control-label text-left">
                                        <span>Tên {{ $moduleTitle }}</span>
                                    </label>
                                    <div class="col-md-10">
                                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            
                            @php
                                $permission = old('permission');
                            @endphp

                            @php
                                $xml = simplexml_load_file(env('APP_URL').'/app/http/controllers/backend/config.xml') or die('Error: Cannot create object '.$dir.'/'.$valFolder.'/config.xml');  
                                $xml = json_decode(json_encode((array)$xml), TRUE);
                                $xml = $xml['permissions'];
                            @endphp
                            @if(isset($xml) && is_array($xml) && count($xml))
                            @foreach($xml as $keyPermission => $valPermission) 
                            <div class="form-group">
                                <div class="row">
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
                            </div>
                            @endforeach
                            @endif
                            
                            <div class="toolbox action clearfix">
                                <div class="uk-flex uk-flex-middle uk-button pull-right">
                                    <button class="btn btn-primary btn-sm" name="create" value="create" type="submit">Khởi tạo {{ $moduleTitle }}  mới</button>
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
