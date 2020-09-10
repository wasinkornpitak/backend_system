function get_sub_category(first_category_id, select_obj){

	var data = {
		'first_category_id': first_category_id,
		'operate': 'get_sub_cat'
	};

	$.ajax({
		url: jsVar.ajax_url + 'category',
		data: data,
		type: 'POST',
		dataType: 'json',
		success: function(data) {
		  	console.log(data);
			var html_to_display = '';
			if (data.result) {
				var html_to_display = '<option value="">เลือก</option>';
				$.each(data.data, function(inx, obj) {
					html_to_display += '<option value="' + obj._id.$oid + '">' + obj.title.th + '</option>';
				});
			}
		   	$('[name="'+select_obj+'"]').html(html_to_display);
		}
	 });

}

function get_main_category(select_obj){

	const data = {
		operate: 'get_main_cat'
	};

	$.ajax({
		url: jsVar.ajax_url + 'category',
		data: data,
		type: 'POST',
		dataType: 'json',
		success: function(data){
			console.log(data);
			var html_to_display = '';
			if(data.result){
				html_to_display = '<option value="">เลือก</option>';
				$.each(data.data, function(inx, obj){
					html_to_display += '<option value="' + obj._id.$oid + '">' + obj.title.th + '</option>';
				});
			}
			$('#'+select_obj+'').html(html_to_display);
			$("#job_detail").css("display", "block");
			$("#customer_detail").css("display", "block");
		}
	})

}
