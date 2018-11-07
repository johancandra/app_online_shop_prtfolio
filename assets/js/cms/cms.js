var load_prod_page = function(base_url,type,page,length,sort,sort_type,mode){
	$.ajax({
		url: base_url+"cms/get_prod_page?type="+type+"&page="+page+"&length="+length+"&mode="+mode+"&sort="+sort+"&sort_type="+sort_type, 
		success: function(result){
			result = JSON.parse(result);
			console.log(result.page);
			var html = '<li><a onclick="load_prod_page(';
			html += "'"+result.base_url+"','"+type+"',"+result.page_+","+result.length+",'"+sort+"','"+sort_type+"','before'";
			html += ');">&laquo;</a></li>';
			for(var c = 0;c<result.page.length;c++){
				html += "<li><a href='"+result.base_url+'cms/view_?type='+type+'&page=';
				html += result.page[c]+'&length='+result.length+'&sort='+sort+'&sort_type='+sort_type;
				html += "'>"+result.page[c]+"</a></li>";
			}
			html += '<li><a onclick="load_prod_page(';
			html += "'"+result.base_url+"','"+type+"',"+result.page_+","+result.length+",'"+sort+"','"+sort_type+"','next'";
			html += ');"">&raquo;</a></li>';
			$("#prod_list_page").html(html);
		}
	});	
}
var update_ = function(base_url,type){
	var s = '';
	$('input:not(.nav-search-input):not(.form-control)').each(function( index ) {
		if(typeof($(this).attr('class'))!="undefined"){	
			if(s != ''){
				s += '&';
			}
			s += $(this).attr('class')+'='+$(this).val();
		}
	});
	s += '&type='+type;
	$.ajax({
		url: base_url+"cms/update_?"+s, 
		success: function(result){
			result = JSON.parse(result);
			alert('Update successfull.');
			window.location = base_url+'cms/view_?type='+type+'&page=1&length=5&sort=id&sort_type=asc';
			hide_product_list_popup();
		}
	});	
}
var delete_ = function(base_url,type,id){
	var s = '';
	s += '&type='+type+'&id='+id;
	$.ajax({
		url: base_url+"cms/delete_?"+s, 
		success: function(result){
			result = JSON.parse(result);
			alert('Delete successfull.');
			window.location = base_url+'cms/view_?type='+type+'&page=1&length=5&sort=id&sort_type=asc';
			hide_product_list_popup();
		}
	});	
}
var add_ = function(base_url,type){
	var s = '';
	$('input:not(.nav-search-input):not(.form-control)').each(function( index ) {
		if(typeof($(this).attr('class'))!="undefined"){	
			if(s != ''){
				s += '&';
			}
			s += $(this).attr('class')+'='+$(this).val();
		}
	});
	s += '&type='+type;
	$.ajax({
		url: base_url+"cms/add_?"+s, 
		success: function(result){
			result = JSON.parse(result);
			alert('Add successfull.');
			window.location = base_url+'cms/view_?type='+type+'&page=1&length=5&sort=id&sort_type=asc';
			hide_product_list_popup();
		}
	});	
}

var show_product_list_popup = function(base_url,id,type){
	$.ajax({
		url: base_url+"cms/get_by_id?type="+type+"&id="+id, 
		success: function(result){
			result = JSON.parse(result);
			console.log(result);
			for(prop in result[0]){
				$('input.'+prop).val(result[0][prop]);
			}
			$("#product_list_popup").css("display", "table");		
			$("#product_list_popup_").css("display", "block");	
			$("#add_button").css("display", "none");		
			$("#add_button").css("display", "none");
			$("#upd_button").css("display", "table");
			$("#upd_button").css("display", "block");		
			$("body").css("overflow", "hidden");
		}
	});	
}
var show_product_list_popup_ = function(){
	$("#product_list_popup").css("display", "table");		
	$("#product_list_popup_").css("display", "block");
	$("#upd_button").css("display", "none");
	$("#upd_button").css("display", "none");	
	$("#add_button").css("display", "table");		
	$("#add_button").css("display", "block");	
	$("body").css("overflow", "hidden");
}
var hide_product_list_popup = function(){
	$("#product_list_popup").css("display", "none");		
	$("#product_list_popup_").css("display", "none");	
	$("body").css("overflow", "auto");	
}
var show_login_popup = function(){
	$("#login_popup").css("display", "table");		
	$("#login_popup_").css("display", "block");	
	$("body").css("overflow", "hidden");	
}
var hide_login_popup = function(){
	$("#login_popup").css("display", "none");		
	$("#login_popup_").css("display", "none");	
	$("body").css("overflow", "auto");	
}