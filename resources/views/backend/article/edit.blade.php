@extends('backend.common.layout')

@section('content')
@php
    $moduleTitle = "Bài viết";
@endphp


<div id="page-wrapper" class="gray-bg dashbard-1 js_seopage">
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Cập nhật {{ $moduleTitle }}</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ URL::to('/') }}">Home</a>
                </li>
                <li class="active"><strong>Cập nhật {{ $moduleTitle }}</strong></li>
            </ol>
        </div>
    </div>
    <form method="POST" action="{{ url('backend/articles/'.$module->id ?? '') }}">
        @csrf
    	@method('PUT')
        <div class="wrapper wrapper-content animated fadeInRight">
            @section('error')
                @include('backend/common/error')
            @show
            
            <div class="row">
                <div class="col-lg-8 clearfix">
                    <div class="ibox mb20">
                        <div class="ibox-title" style="padding: 9px 15px 0px;">
                            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                <h5>Thông tin cơ bản <small class="text-danger">Điền đầy đủ các thông tin được mô tả dưới đây</small></h5>
                                <div class="ibox-tools">
                                    <button type="submit" name="update" value="update" class="btn btn-primary block full-width m-b">Cập nhật</button>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="row mb15">
                                <div class="col-lg-12">
                                    <div class="form-row">
                                        <label class="control-label text-left">
                                            <span>Tiêu đề danh mục <b class="text-danger">(*)</b></span>
                                        </label>
                                        <input type="text" name="name" value="{{ old('name', $module->name) }}" class="form-control" placeholder="" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb15">
                                <div class="col-lg-12">
                                    <div class="form-row">
                                        <label class="control-label text-left">
                                            <span>Mô tả ngắn</span>
                                        </label>
                                        <textarea type="text" name="description" id="ckDescription" class="form-control ck-editor" placeholder="" autocomplete="off">{{ htmlspecialchars_decode(html_entity_decode(old('description',$module->description))) }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="ibox mb20">
                        <div class="ibox-title">
                            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                <h5>Tối ưu SEO <small class="text-danger">Thiết lập các thẻ mô tả giúp khách hàng dễ dàng tìm thấy bạn.</small></h5>
                                
                                <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                    <div class="edit">
                                        <a href="#" class="edit-seo">Chỉnh sửa SEO</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="google">
                                        <div class="g-title">
                                            @php
                                                echo 
                                                    old('meta_name', $module->meta_name) 
                                                    ?? old('name', $module->name)
                                                    ?? 'HT Việt Nam - Đơn vị thiết kế website hàng đầu Việt Nam';
                                            @endphp
                                        </div>
                                        <div class="g-link">
                                            @php
                                                echo 
                                                    old('canonical', $module->canonical) 
                                                    ? url(old('canonical', $module->canonical)) 
                                                    : 'http://thegioiweb.org/kho-giao-dien-website.html';
                                            @endphp
                                        </div>
                                        <div class="g-description" id="metaDescription">
                                            @php
                                                echo 
                                                    old('meta_description', $module->meta_description) 
                                                    ?? (old('description', $module->description) 
                                                        ? strip_tags(old('description', $module->description)) 
                                                        : 'List of all combinations of words containing CKEDT. Words that contain ckedt letters in them. Anagrams made from C K E D T letters.List of all combinations of words containing CKEDT. Words that contain ckedt letters in them. Anagrams made from C K E D T letters.');
                                            @endphp
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="seo-group hidden">
                                <hr>
                                <div class="row mb15">
                                    <div class="col-lg-12">
                                        <div class="form-row">
                                            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                                <label class="control-label ">
                                                    <span>Tiêu đề SEO</span>
                                                </label>
                                                <span style="color:#9fafba;"><span id="titleCount">0</span> trên 70 ký tự</span>
                                            </div>
                                            <input type="text" name="meta_name" value="{{ old('meta_name', $module->meta_name) }}" class="form-control" placeholder="" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb15">
                                    <div class="col-lg-12">
                                        <div class="form-row">
                                            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                                <label class="control-label ">
                                                    <span>Mô tả SEO</span>
                                                </label>
                                                <span style="color:#9fafba;"><span id="descriptionCount">0</span> trên 320 ký tự</span>
                                            </div>
                                            <textarea type="text" name="meta_description" class="form-control" id="seoDescription" placeholder="" autocomplete="off">{{ old('meta_description', $module->meta_description) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb15">
                                    <div class="col-lg-12">
                                        <div class="form-row">
                                            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                                <label class="control-label ">
                                                    <span>Đường dẫn <b class="text-danger">(*)</b></span>
                                                </label>
                                            </div>
                                            <div class="outer">
                                                <div class="uk-flex uk-flex-middle">
                                                    <div class="base-url">{{ URL::to('/', $module->canonical) }}</div>
                                                    <input type="text" name="canonical" value="{{ old('canonical', $module->canonical) }}" class="form-control" placeholder="" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                        
                    </div>
                    <button type="submit" name="update" value="update" class="btn btn-primary block m-b pull-right">Cập nhật</button>
                    
                </div>
                <div class="col-lg-4">
                    <div class="ibox mb20">
                        <div class="ibox-title">
                            <h5>Lựa chọn danh mục cha </h5>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-row mb10">
                                        <small class="text-danger">Chọn [Root] Nếu không có danh mục cha</small>
                                    </div>
                                    <div class="form-row">
                                        {{ Form::select('catalogueid', $cataList, $module->catalogueid, ['class' => 'form-control']) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="ibox mb20">
                        <div class="ibox-title">
                            <h5>Ảnh đại diện </h5>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-row">
                                        <div class="avatar" style="cursor: pointer;"><img src="{{ url('public/backend/not-found.png', $module->image) }}" class="img-thumbnail" alt=""></div>
                                        <input type="text" name="image" value="{{ old('image', $module->image) }}" class="form-control hidden" placeholder="" autocomplete="off"  onclick="openKCFinder(this)">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="ibox mb20">
                        <div class="ibox-title">
                            <h5>Hiển thị </h5>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-row">
                                        <span class="text-black mb15">Quản lý thiết lập hiển thị cho blog này.</span>
                                        <div class="block clearfix">
                                            <div class="i-checks mr30" style="width:100%;">
                                                <span style="color:#000;"> 
                                                	@php
                                                		$checked = (old('publish', $module->publish) == 0) ? 'checked' : ''
                                                	@endphp
                                                    <input {{ $checked }} class="popup_gender_1 gender" type="radio" value="0"  name="publish"> <i></i>Cho phép hiển thị trên website
                                                </span>
                                            </div>
                                        </div>
                                        <div class="block clearfix">
                                        	@php
                                        		$checked = (old('publish') == 1) ? 'checked' : ''
                                        	@endphp
                                            <div class="i-checks" style="width:100%;">
                                            	<span style="color:#000;"> 
                                            		<input {{ $checked }} type="radio" class="popup_gender_0 gender" required value="1" name="publish"> <i></i> Tắt chức năng hiển thị trên website. 
                                            	</span>
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
    </form>
    @section('footer')
        @include('backend/common/footer')
    @show
</div>
@stop
