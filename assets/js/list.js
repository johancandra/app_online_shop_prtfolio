var load_prod_page = function(base_url,page,length,sub_type,sort,sort_type,mode){
	$.ajax({
		url: base_url+"display/get_prod_page?page="+page+"&length="+length+"&sub_type="+sub_type+"&mode="+mode+"&sort="+sort+"&sort_type="+sort_type, 
		success: function(result){
			result = JSON.parse(result);
			console.log(result.page);
			var html = '<li><a onclick="load_prod_page(';
			html += "'"+result.base_url+"',"+result.page_+","+result.length+",'"+result.sub_type+"','"+sort+"','"+sort_type+"','before'";
			html += ');">&laquo;</a></li>';
			for(var c = 0;c<result.page.length;c++){
				html += "<li><a href='"+result.base_url+'display/view_home?page=';
				html += result.page[c]+'&length='+result.length+'&sub_type='+result.sub_type+'&sort='+sort+'$sort_type='+sort_type;
				html += "'>"+result.page[c]+"</a></li>";
			}
			html += '<li><a onclick="load_prod_page(';
			html += "'"+result.base_url+"',"+result.page_+","+result.length+",'"+result.sub_type+"','"+sort+"','"+sort_type+"','next'";
			html += ');"">&raquo;</a></li>';
			$("#prod_list_page").html(html);
		}
	});	
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
var validateEmail = function(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
var validatepassword = function(password,password2){
	return password==password2;
}
var validatefullname = function(fullname) {
	return fullname!='';
}
var validateaddress = function(address) {
	return address!='';
}
var validatecity = function(city) {
	return city!='';
}
var add_to_chart = function(base_url){
	show_order_popup();
	var list_id = $('input#list_id').val();
	var total = $('input#total').val();
	$.ajax({
		url: base_url+"display/add_chart?product_id="+list_id+"&total="+total, 
		success: function(result){
			result = JSON.parse(result);
			
			if(typeof result.error != 'undefined'){
				alert(result.error);
			}else{
				alert('Add to chart successfull.');
			}

			hide_order_popup();
			window.location = base_url;
		}
	});	
}
var clear_chart = function(base_url){
	show_order_popup();
	var list_id = $('input#list_id').val();
	var total = $('input#total').val();
	$.ajax({
		url: base_url+"display/clear_chart", 
		success: function(result){
			result = JSON.parse(result);
			alert('Clear chart successfull.');
			hide_order_popup();
			window.location = base_url;
		}
	});	
}
var order_chart = function(base_url){
	show_order_popup();
	var list_id = $('input#list_id').val();
	var total = $('input#total').val();
	$.ajax({
		url: base_url+"display/order_chart", 
		success: function(result){
			result = JSON.parse(result);
			alert('Order chart successfull.');
			hide_order_popup();
			window.location = base_url;
		}
	});	
}
var show_order_popup = function(){
	$("#order_popup").css("display", "table");		
	$("#order_popup_").css("display", "block");	
	$("body").css("overflow", "hidden");	
}
var hide_order_popup = function(){
	$("#order_popup").css("display", "none");		
	$("#order_popup_").css("display", "none");	
	$("body").css("overflow", "auto");	
}
var register_user = function(base_url){
	var err = [];
	var email = $('input.email').val();
	var password = $('input.password').val();
	var password2 = $('input.password2').val();
	var fullname = $('input.fullname').val();
	var address = $('input.address').val();
	var city = $('input.city').val();

	console.log(email);
	console.log(validateEmail(email));
	if(!validateEmail(email)){
		err.push('email');
	}
	if(!validatepassword(password,password2)){
		err.push('password');
	}
	if(!validatefullname(fullname)){
		err.push('fullname');
	}
	if(!validateaddress(address)){
		err.push('address');
	}
	if(!validatecity(city)){
		err.push('city');
	}
	console.log(err);
	if (err.length == 0){
		$.ajax({
			url: base_url+"display/register?email="+email+"&password="+password+"&fullname="+fullname+"&address="+address+"&city="+city, 
			success: function(result){
				result = JSON.parse(result);
				alert('Register user successfull.');
				hide_register_popup();
			}
		});	
	}else{
		alert('We detect error, please check again.');
	}
}
var show_register_popup = function(){
	$("#register_popup").css("display", "table");		
	$("#register_popup_").css("display", "block");	
	$("body").css("overflow", "hidden");	
}
var hide_register_popup = function(){
	$("#register_popup").css("display", "none");		
	$("#register_popup_").css("display", "none");	
	$("body").css("overflow", "auto");	
}