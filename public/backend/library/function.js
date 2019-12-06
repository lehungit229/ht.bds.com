var BASE_URL = "http://ht.bds.com/"
$(document).ready(function() {
	/* UPLOAD ẢNH */
	$(document).on('click', '.img-thumbnail', function(){
		openKCFinderAlbum($(this));
	});
	if($('.js_dropdown').length){
		$('.js_dropdown').each(function(item) {
			js_dropdown($(this))
		});
	}

	$('.js_close_windown').click(function(){
		close();
	});
	$('.js_open_windown').click(function(){
		js_open_windown($(this))
	});
	// luôn focus mouse ở ô title khi load trang
	if($('.i-checks').length){
		ichecks($('.i-checks'));
	}
	if($('.js_name').length){
		$(document).on('change keyup keydown','.js_name',function(){
			ucWord($('.js_name'));
		});
	}
	if($('input[name="fullname"]').length){
		forcusEnd($('input[name="fullname"]'));
	}
	if($('input[name="title"]').length){
		forcusEnd($('input[name="title"]'));
	}

	/* SELECT 2 */
	if($('.select3NotSearch').length){
		$('.select3NotSearch').select2({
		    minimumResultsForSearch: -1
		});
	}
	if($('.select3').length){
		$('.select3').select2();
	}
	$('.selectMultipe').each(function(key, index){
		selectMultipe($(this));
	});
	
	// nhân bảng dòng 
	$(document).on('click','.js_ducated_row', function(){
		let _this = $(this);
		swal({
			title: "Hãy chắc chắn rằng bạn muốn thực hiện thao tác này?",
			text: '',
			type: "warning", 	
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Thực hiện!",
			cancelButtonText: "Hủy bỏ!",
			closeOnConfirm: false,
			closeOnCancel: false },
			function (isConfirm) {
				if (isConfirm) {
					let row = _this.parents('tr').html();
					let index = _this.parents('tr').index();
					_this.parents('tr').after('<tr>'+row+'</tr>');
					_this.parents('tbody').find('tr:eq('+sum(index,1)+')').find('td:eq(9)').find('span').remove();
					// copy value
					var time = setTimeout(function(){
						let table = _this.parents('table');
						_this.parents('tr').find('td').each(function(item) {
							$(this).find('input').each(function(item1) {
								let index = _this.parents('tr').index();
								let val = $(this).val();
								let name = $(this).attr('name')
								_this.parents('tbody').find('tr:eq('+sum(index,1)+')').find('input[name="'+name+'"]').attr('name', name.replace(index, sum(index,1)))
								_this.parents('tbody').find('tr:eq('+sum(index,1)+')').find('input[name="'+name.replace(index, sum(index,1))+'"]').val(val)
								// _this.parents('tbody').find('tr:eq('+sum(index,1)+')').find('input[name="'+name+'"]').attr('name', name.replace(index, sum(index,1)))
							});
							$(this).find('select').each(function(item1) {
								let index = _this.parents('tr').index();
								let val = $(this).val();
								let name = $(this).attr('name')
								_this.parents('tbody').find('tr:eq('+sum(index,1)+')').find('select[name="'+name+'"]').attr('name', name.replace(index, sum(index,1)))
								_this.parents('tbody').find('tr:eq('+sum(index,1)+')').find('select[name="'+name.replace(index, sum(index,1))+'"]').val(val)
							});
						});
					}, 500);

					swal("Nhân bản thành công!", "", "success");
				} else {
					swal("Hủy bỏ", "Thao tác bị hủy bỏ", "error");
				}
				update_key_in_table(_this.parents('table'));
			});
	});

	

	// Xóa 1 row trong bảng
	$(document).on('click','.js_del_row', function(){
		let _this = $(this);
		
		swal({
			title: "Hãy chắc chắn rằng bạn muốn thực hiện thao tác này?",
			text: '',
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Thực hiện!",
			cancelButtonText: "Hủy bỏ!",
			closeOnConfirm: false,
			closeOnCancel: false },
			function (isConfirm) {
				if (isConfirm) {
					_this.parents('tr').remove();
					swal("Xóa thành công!", "Hạng mục đã được xóa khỏi danh sách.", "success");
					update_key_in_table(_this.parents('table'));
				} else {
					swal("Hủy bỏ", "Thao tác bị hủy bỏ", "error");
				}
			});
	});
	
	// ______________________________CHECKBOX ALL IN VIEW______________________________
	$(document).on('click','.label-checkboxitem',function(){
		let _this = $(this);
		_this.parent().find('.checkbox-item').trigger('click');
		check(_this);
		change_background(_this);
		check_item_all(_this);
		check_setting();
	});

	$(document).on('click','.labelCheckAll',function(){
		let _this = $(this);
		_this.siblings('input').trigger('click');
		check(_this);
		checkall(_this);
		change_background();
		check_setting();
	});

	//_____________________________ÉP KIỂU INPUT INT FLOAT_____________________________
	// nếu input là 0 thì khi click vào sẽ rỗng
	$(document).on('click','.float, .int',function(){
		let data = $(this).val();
		if(data == 0){
			$(this).val('');
		}
	});
	$(document).on('keydown','.float, .int',function(e){
		let data = $(this).val();
		if(data == 0){
			let unicode=e.keyCode || e.which;
			if(unicode != 190){
				$(this).val('');
			}
		}
	});
	//khi thay đổi hoặc ấn phím xong : nếu  =='' sẽ trở về không, nếu == NaN cũng về 0
	$(document).on('change keyup blur','.int',function(){
		let data = $(this).val();
		if(data == '' ){
			$(this).val('0');
			return false;
		}
		data = data.replace(/\./gi, "");
		$(this).val(addCommas(data));
		// khi đánh chữ thì về 0
		data = data.replace(/\./gi, "");
		if(isNaN(data)){
			$(this).val('0');
			return false;
		}
	});
	$(document).on('change blur','.float',function(){
		let data = $(this).val();
		if(data == '' ){
			$(this).val('0');
			return false;
		}
		// khi đánh chữ thì về 0
		data = data.replace(/\./gi, "");
		if(isNaN(data)){
			$(this).val('0');
			return false;
		}
	});


	$('.ckeditor-description').each(function(){
		CKEDITOR.replace( this.id, {
			height: 250,
			extraPlugins: 'colorbutton,panelbutton,pastefromexcel,font,format,youtube,link',
			removeButtons: '',
			entities: true,
			allowedContent: true,
			
		});
	});
	$('.ckeditor-content').each(function(){
		CKEDITOR.replace( this.id, {
			height: 250,
			extraPlugins: 'colorbutton,panelbutton,pastefromexcel,font,format,youtube',
			removeButtons: '',
			entities: true,
			allowedContent: true,
			toolbarGroups: [
				{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
				{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
				{ name: 'links' },
				{ name: 'insert' },
				{ name: 'forms' },
				{ name: 'tools' },
				{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
				{ name: 'colors' },
				{ name: 'others' },
				'/',
				{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
				{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
				{ name: 'styles' }
			],
		});
	});

	$(function(){
		$('.ck-editor').each(function(){
			//colorbutton,
			CKEDITOR.replace( this.id, {
				height: 400,
				extraPlugins: 'colorbutton, panelbutton, link, justify, lineheight, youtube, videodetector, image, imageresize, font, codemirror, copyformatting, autosave, find, qrc, slideshow, preview, hkemoji, contents, googledocs, codesnippet',
				removeButtons: '',
				entities: false,
				entities_latin : false,
				allowedContent: true,
				toolbarGroups: [
					{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
					{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
					{ name: 'links' },
					{ name: 'insert' },
					{ name: 'forms' },
					{ name: 'tools' },
					{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
					{ name: 'colors' },
					{ name: 'others' },
					'/',
					{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
					{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
					{ name: 'styles' }
				],
			}).on('change',
				function(e){
					if(e.editor.name == 'ckDescription'){
						var metaDescription = document.getElementById('seoDescription').value;
						if(metaDescription == ''){
							let data = decodeEntities(e.editor.getData());
							var parser = new DOMParser;
							var dom = parser.parseFromString(
								'<!doctype html><body>' + data,
								'text/html');
							var decodedString = dom.body.textContent;
							document.getElementById('metaDescription').innerHTML = decodedString.slice(0, 320);
						}
					}
				}
			);;
		});
	});


	// seo
	if($('.js_seopage').length){
		$(document).on('click','.edit-seo', function(){
			$('.seo-group').toggleClass('hidden');
			return false;
		});
		$(document).on('keyup', 'input[name=name]', function(){
			let _this = $(this);
			let metaTitle = _this.val();
			let totalCharacter = metaTitle.length;

			if(totalCharacter > 70){
				$('input[name=meta_name]').addClass('input-error');
			}else{
				$('input[name=meta_name]').removeClass('input-error');
			}

			let slugTitle = slug(metaTitle);
			if($('input[name=meta_name]').val() == ''){
				$('.g-title').text(metaTitle);
			}

			let canonical = $('input[name=canonical]');
			if(canonical.attr('data-flag') == 0){
				canonical.val(slugTitle);
				$('.g-link').text(BASE_URL + slugTitle + '.html');
			}
		});
		
		$(document).on('keyup','input[name=canonical]', function(){
			let _this = $(this);
			_this.attr('data-flag', '1');
			let slugTitle = slug(_this.val());
			$('.g-link').text(BASE_URL + slugTitle + '.html');
		});
		
		$(document).on('keyup change','input[name=meta_name]', function(){
			let _this = $(this);
			let totalCharacter = _this.val().length;
			$('#titleCount').text(totalCharacter);
			if(totalCharacter > 70){
				_this.addClass('input-error');
			}else{
				_this.removeClass('input-error');
			}
			$('.g-title').text(_this.val());
		});
		
		$(document).on('keyup change','textarea[name=meta_description]', function(){
			let _this = $(this);
			let totalCharacter = _this.val().length;
			$('#descriptionCount').text(totalCharacter);
			if(totalCharacter > 320){
				_this.addClass('input-error');
			}else{
				_this.removeClass('input-error');
			}
			$('.g-description').text(_this.val());
		});
	}

	
});

function decodeEntities(encodedString) {
    var translate_re = /&(nbsp|amp|quot|lt|gt);/g;
    var translate = {
        "nbsp":" ",
        "amp" : "&",
        "quot": "\"",
        "lt"  : "<",
        "gt"  : ">"
    };
    return encodedString.replace(translate_re, function(match, entity) {
        return translate[entity];
    }).replace(/&#(\d+);/gi, function(match, numStr) {
        var num = parseInt(numStr, 10);
        return String.fromCharCode(num);
    });
}
function addCommas(nStr){
	nStr = String(nStr);
	nStr = nStr.replace(/\./gi, "");
	let str ='';
	for (i = nStr.length; i > 0; i -= 3){
		a = ( (i-3) < 0 ) ? 0 : (i-3); 
		str= nStr.slice(a,i) + '.' + str; 
	}
	str= str.slice(0,str.length-1); 
	return str;
}

/* CHECKBOX */
function check(object){
	if(object.hasClass('checked')){
		object.removeClass('checked');
	}else{
		object.addClass('checked');
	}
}
function check_setting(){
	if($('.checkbox-item').length) {
		if($('.checkbox-item:checked').length > 0) {
			$('.fa-cog').addClass('text-pink');
		}
		else{
			$('.fa-cog').removeClass('text-pink');
		}
	}
}
function check_item_all(_this){
	let table = _this.parents('table');
	if(table.find('.checkbox-item').length) {
		if(table.find('.checkbox-item:checked').length == table.find('.checkbox-item').length) {
			table.find('#checkbox-all').prop('checked', true);
			table.find('.labelCheckAll').addClass('checked');
		}
		else{
			table.find('#checkbox-all').prop('checked', false);
			table.find('.labelCheckAll').removeClass('checked');
		}
	}
}
function checkall(_this){
	let table = _this.parents('table');
	if($('#checkbox-all').length){
		if(table.find('#checkbox-all').prop('checked')){
			table.find('.checkbox-item').prop('checked', true);
			table.find('.label-checkboxitem').addClass('checked');
			
		}
		else{
			table.find('.checkbox-item').prop('checked', false);
			table.find('.label-checkboxitem').removeClass('checked');
		}
	}
	check_setting();
}

function change_background() {
	$('.checkbox-item').each(function() {
		if($(this).is(':checked')) {
			$(this).parents('tr').addClass('bg-active');
		}else {
			$(this).parents('tr').removeClass('bg-active');
		}
	});
}

function slug(title){
	title = cnvVi(title);
	return title;
}


function cnvVi(str) {
	str = str.toLowerCase();
	str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
	str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
	str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
	str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
	str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
	str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
	str = str.replace(/đ/g, "d");
	str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g, "-");
	str = str.replace(/-+-/g, "-");
	str = str.replace(/^\-+|\-+$/g, "");
	return str;
}
function replace(Str=''){
	if(Str==''){
		return '';
	}else{
		Str = Str.replace(/\./gi, "");
		return Str;
	}
}
 
function selectMultipe(_this){
	// let text = _this.attr('data-text')
	// let module = _this.attr('data-module');
	// let key = _this.attr('data-key');
	// let value = _this.attr('data-value');
	// let query = _this.attr('data-query')
	// let selected= _this.attr('data-selected')

	// key = (typeof key == 'undefined') ? 'id' : key ;
	// value = (typeof value == 'undefined') ? 'name' : value ;
	// text = (typeof text == 'Vui lòng nhập 2 kí tự') ? 'name' : text ;

	// if(selected != ''){
	// 	setTimeout(function(){
	// 		$.post('backend/ajax/dropdown', {
	// 			selected: selected, module: module,value:value, key:key},
	// 			function(data){
	// 				let json = JSON.parse(data);
	// 				if(json.items!='undefined' && json.items.length){
	// 					for(let i = 0; i< json.items.length; i++){
	// 						var option = new Option(json.items[i].text, json.items[i].id, true, true);
	// 						_this.append(option).trigger('change');
	// 					}
	// 				}
	// 			});
	// 	}, 100);
	// }else{
	// 	select2(_this, module, key, value, query)
	// }
}

function select2(_this, module, key, value, query ){
	_this.select2({
		minimumInputLength: 2,
		placeholder: 'Nhập 2 kí tự để tìm kiếm..',
			ajax: {
				url: BASE_URL+'backend/ajax/get_select2',
				type: 'get',
				dataType: 'json',
				deley: 250,
				data: function (params) {
					return {
						locationVal: params.term,
						module:module, key:key, value:value, query:query,
					};
				},
				processResults: function (data) {
					return {
						results: $.map(data, function(obj, i){
							return obj
						})
					}
					
				},
				cache: true,
			}
	});
}
function cutnchar(str,n){
	length = str.length;
	if(length < n){
		return str;
	}
	str = str.substr(0,n)+'...';
	return str;
}
function sum(a = 0 ,b = 0){
	if(b == ''){b = 0}
	return parseFloat(a) + parseFloat(b);
}
function sub(a = 0 ,b = 0){
	return parseFloat(a) - parseFloat(b);
}
function div(a = 0 ,b = 0){
	return parseFloat(a) / parseFloat(b);
}
function mul(a = 0 ,b = 0, c = 1){
	return Math.round(parseFloat(a) * parseFloat(b) * parseFloat(c));
}
function ichecks(_this) {
	_this.iCheck({
		checkboxClass: 'icheckbox_square-green',
		radioClass: 'iradio_square-green',
	});
}
function ucwords(str) { 
    str = (str + '').toLowerCase(); 
    return str.replace(/^([a-z])|\s+([a-z])/g, function ($1) { 
     return $1.toUpperCase(); 
    }); 
} 
function ucWord(str) {
	string = ucwords(str.val())
	str.val(string);
	return true
}

function forcusEnd(input) {
	input.focus();
	var tmpStr = input.val();
	input.val('');
	input.val(tmpStr);
}

function update_key_in_table(table){
	table.find('tbody tr').each(function(index) {
		$(this).find('td:eq(0)').html(sum(index, 1))
		$(this).find('input').each(function(item1) {
			let name = $(this).attr('name')
			let sub_name = name.substr(0, name.length -5);
			$(this).attr('name', sub_name+'['+index+'][]')
		});
		$(this).find('select').each(function(item1) {
			let name = $(this).attr('name')
			let sub_name = name.substr(0, name.length -5);
			$(this).attr('name', sub_name+'['+index+'][]')
		});
	});
}

function add_loading(_this){
	let html = '<div class="lds-css ng-scope"><div class="lds-eclipse"><div></div></div></div>'
	_this.css("position", "relative");
	_this.append(html)
}
function del_loading(_this){
	_this.find('.lds-css').remove()
	_this.css("position", "");
}
function add_loading_2(_this){
	let html = '<div class="sk-spinner sk-spinner-wave loading-2"> <div class="sk-rect1"></div> <div class="sk-rect2"></div> <div class="sk-rect3"></div> <div class="sk-rect4"></div> <div class="sk-rect5"></div> </div>'
	_this.css("background", "rgba(0, 0, 0, 0.45)");
	_this.append(html)
}

function del_loading_2(_this){
	_this.find('.loading-2').remove()
	_this.css("background", "");
}
function add_loading_view(_this){
	_this= _this.parents('table')
	let html = '<div class="sk-spinner sk-spinner-wave loading-2" style="background: #fff; top:90%"> <div class="sk-rect1"></div> <div class="sk-rect2"></div> <div class="sk-rect3"></div> <div class="sk-rect4"></div> <div class="sk-rect5"></div> </div>'
	_this.after(html)
}

function del_loading_view(_this){
	_this= _this.parents('table')
	_this.parent().find('.loading-2').remove()
	_this.css("background", "");
}

function first(array, n){
	if (array == null) 
      return void 0;
    if (n == null) 
      return array[0];
    if (n < 0)
      return [];
    return array.slice(0, n);
}
function convert_false_to($val = '' , $str = ''){
	if($val == '' || $val == null || typeof $val == 'undefined' || $val == false || isNaN($val)){
		$val = $str;
	}
	return $val;
}
function check_val($val = '', $str = ''){
	if($val == '' || $val == null || typeof $val == 'undefined' || $val == false ){
		if($str == ''){
			return false
		}
	}
	if($str == ''){
		return true;
	}else{
		return $str;
	}
}

function get_all_time(){
	var currentdate = new Date(); 
	let time = {}
	time.getHours = ((sub(currentdate.getHours(), 10) < 0) ? '0'+currentdate.getHours() : currentdate.getHours() )
	time.getMinutes = ((sub(currentdate.getMinutes(), 10) < 0) ? '0'+currentdate.getMinutes() : currentdate.getMinutes() )
	time.getSeconds = ((sub(currentdate.getSeconds(), 10) < 0) ? '0'+currentdate.getSeconds() : currentdate.getSeconds() )
	time.getDate = ((sub(currentdate.getDate(), 10) < 0) ? '0'+currentdate.getDate() : currentdate.getDate() )
	time.getMonth = ((sub((currentdate.getMonth() + 1), 10) < 0) ? '0'+(currentdate.getMonth() + 1) : (currentdate.getMonth() + 1) )
	time.getYear = currentdate.getFullYear()
	return time
}
$.fn.serializeObject = function() {
    var obj = {};
    var arr = this.serializeArray();
    arr.forEach(function(item, index) {
        if (obj[item.name] === undefined) { // New
            obj[item.name] = item.value || '';
        } else {                            // Existing
            if (!obj[item.name].push) {
                obj[item.name] = [obj[item.name]];
            }
            obj[item.name].push(item.value || '');
        }
    });
    return obj;
};

function gettime(time, formatString = 'DD/MM/YYYY'){
	if(time == '-'){
		return '-'
	}
	time = new Date(time)
	  var YYYY,YY,MMMM,MMM,MM,M,DDDD,DDD,DD,D,hhhh,hhh,hh,h,mm,m,ss,s,ampm,AMPM,dMod,th;
	  YY = ((YYYY= time.getFullYear())+"").slice(-2);
	  MM = (M= time.getMonth()+1)<10?('0'+M):M;
	  MMM = (MMMM=["January","February","March","April","May","June","July","August","September","October","November","December"][M-1]).substring(0,3);
	  DD = (D= time.getDate())<10?('0'+D):D;
	  DDD = (DDDD=["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"][ time.getDay()]).substring(0,3);
	  th=(D>=10&&D<=20)?'th':((dMod=D%10)==1)?'st':(dMod==2)?'nd':(dMod==3)?'rd':'th';
	  formatString = formatString.replace("YYYY",YYYY).replace("YY",YY).replace("MMMM",MMMM).replace("MMM",MMM).replace("MM",MM).replace("M",M).replace("DDDD",DDDD).replace("DDD",DDD).replace("DD",DD).replace("D",D).replace("th",th);
	  h=(hhh= time.getHours());
	  if (h==0) h=24;
	  if (h>12) h-=12;
	  hh = h<10?('0'+h):h;
	  hhhh = hhh<10?('0'+hhh):hhh;
	  AMPM=(ampm=hhh<12?'am':'pm').toUpperCase();
	  mm=(m= time.getMinutes())<10?('0'+m):m;
	  ss=(s= time.getSeconds())<10?('0'+s):s;
	  return formatString.replace("hhhh",hhhh).replace("hhh",hhh).replace("hh",hh).replace("h",h).replace("mm",mm).replace("m",m).replace("ss",ss).replace("s",s).replace("ampm",ampm).replace("AMPM",AMPM);
};
function operator_time(time, val = 0, type = 'd', result = 'DD/MM/YYYY'){
	let day = time.substr(0,2) 
	let month = time.substr(3,2) 
	let year = time.substr(6,4) 
	let date = new Date(year+'-'+month+'-'+day)
	switch(type) {
	  	case 'd':
			return gettime(new Date(date.setDate(sum(date.getDate(),val))), result)
	    	break;
	  	case 'm':
			return gettime(new Date(date.setMonth(sum(date.getMonth(),val))), result)
		    break;
	    case 'y':
			return gettime(new Date(date.setYear(sum(date.getYear(),val))), result)
	    	break;
	}
}
function toObject(arr) {
  var rv = {};
  for (var i = 0; i < arr.length; ++i)
    rv[i] = arr[i];
  return rv;
}
function timeDifference(previous, current = Date.now()) {

    var msPerMinute = 60 * 1000;
    var msPerHour = msPerMinute * 60;
    var msPerDay = msPerHour * 24;
    var msPerMonth = msPerDay * 30;
    var msPerYear = msPerDay * 365;

    var elapsed = sub(previous,current) ;
    if(elapsed < 0){
    	console.log(1)
    	var elapsedTest = sub(elapsed, 2*elapsed);
    }else{
    	elapsedTest = elapsed ;
    }

    if (elapsedTest < msPerMinute) {
         return Math.round(elapsed/1000) + ' giây';   
    }

    else if (elapsedTest < msPerHour) {
         return Math.round(elapsed/msPerMinute) + ' phút';   
    }

    else if (elapsedTest < msPerDay ) {
         return Math.round(elapsed/msPerHour ) + ' giờ';   
    }

    else if (elapsedTest < msPerMonth) {
        return Math.round(elapsed/msPerDay) + ' ngày';   
    }

    else if (elapsedTest < msPerYear) {
        return Math.round(elapsed/msPerMonth) + ' tháng';   
    }

    else {
        return Math.round(elapsed/msPerYear ) + ' năm';   
    }
}
function parseURLParams(url) {
    var queryStart = BASE_URL.indexOf("?") + 1,
        queryEnd   = BASE_URL.indexOf("#") + 1 || BASE_URL.length + 1,
        query = BASE_URL.slice(queryStart, queryEnd - 1),
        pairs = query.replace(/\+/g, " ").split("&"),
        parms = {}, i, n, v, nv;

    if (query === BASE_URL || query === "") return;

    for (i = 0; i < pairs.length; i++) {
        nv = pairs[i].split("=", 2);
        n = decodeURIComponent(nv[0]);
        v = decodeURIComponent(nv[1]);

        if (!parms.hasOwnProperty(n)) parms[n] = [];
        parms[n].push(nv.length === 2 ? v : null);
    }
    return parms;
}

function js_dropdown(_this){
	let name = _this.attr('data-name')
	let module = _this.attr('data-module')
	let key = _this.attr('data-key')
	let value = _this.attr('data-value')
	let text = _this.attr('data-text')
	let query = _this.attr('data-query')
	let checked = _this.attr('data-checked')
	let data_class = _this.attr('data-class')
	let data_id = _this.attr('data-id')
	let data_type = _this.attr('data-type')
	let data_disabled = _this.attr('data-disabled')
	let limit = _this.attr('data-limit')
	
	if(typeof disabled == 'undefined' || disabled == '') { disabled = 'false' }
	if(typeof key == 'undefined' || key == '') { key = 'id' }
	if(typeof value == 'undefined' || key == '') { value = 'title' }
	if(typeof limit == 'undefined' || limit == '') { limit = 20 }
	if(typeof data_id == 'undefined') { data_id = '' }
	if(typeof data_class == 'undefined') { data_class = ''}
	pathname = 'fields='+key+','+value+'&limit='+limit

	if(typeof query == 'undefined' || query == ''){ 
		pathname = pathname+'&query=trash=0' 
	}else{
		pathname = pathname+'&query='+query+',trash=0'
	}

	$.ajax({
		type: 'GET', 
		url: BASE_URL+'/backend/ajax/dropdown',
		crossDomain:true,
		cache: false,
		success: function(resultApi){
			let json = JSON.parse(resultApi);
			if(json.result == true){
				let list = json.data.list

				let html = ''
				if(data_type == "radio"){
					list.forEach(function(item, index, array) {
						html = html+'<div class="i-checks"><label> ';
							html = html+'<input type="radio" value='+item[key]+' name="incident[catalogueid]"> <i></i> '+item[value];
						html = html+'</label></div>';
					});
				}else{
					html = html+'<select name="'+name+'" class="form-control '+data_class+'" id="'+data_id+'">';
						if(check_val(text)){
							html = html+'<option value=>'+text+'</option>';
						}
						list.forEach(function(item, index, array) {
							if(checked == item[key]){
								html = html+'<option selected  value='+item[key]+'>'+item[value]+'</option>';
							}else{
								html = html+'<option value='+item[key]+'>'+item[value]+'</option>';
							}
						});
					html = html+'</select>';
				}
				
				

				_this.html(html)
				$('.select3NotSearch').select2({
				    minimumResultsForSearch: -1
				});
				ichecks($('.i-checks'));
				if(data_disabled == 'true'){
					_this.find('input').parent().addClass('disabled')
					_this.find('input').prop('disabled', true);
					_this.find('select').parent().addClass('disabled')
					_this.find('select').prop('disabled', true);
				}

			}

		},
		error: function(){
			toastr.error('Có lỗi sảy ra vui lòng thử lại')
		}
	});
}

function js_open_windown($this){
	let h = screen.availHeight;
	let w = screen.availWidth;
	window.open($this.href, 'chorme', 'top='+h*2/100+', left='+w*5/100+', width='+w*90/100+',height='+h*90/100);
	return false;
}

function numberOrder(id){
	let numberOrder=1;
	$(id).find('tr:not(.hidden)').each(function (){
		$(this).find('.numberOrder').html(numberOrder);
		numberOrder = numberOrder + 1;
	})
}
function pre(msg, flag = true){
    if( flag == true){
	    throw msg;
    }else{
    	console.log(msg)
    }
}

function openKCFinderAlbum(field, type, result) {
    window.KCFinder = {
        callBack: function(url) {
            field.attr('src', url);
            field.parent().next().val(url);
            window.KCFinder = null;
        }
    };
	if(typeof(type) == 'undefined'){
		type = 'images';
	}
    window.open(BASE_URL + 'plugin/kcfinder-3.12/browse.php?type='+type+'&dir=images/public', 'kcfinder_image',
        'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
        'resizable=1, scrollbars=0, width=1080, height=800'
    );
	return false;
}
