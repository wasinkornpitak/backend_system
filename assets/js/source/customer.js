$(document).ready(function(){
	var timer;
    $("#txt_search").on('keyup', function() {
		const search = $(this).val();
		clearTimeout(timer);  
		timer = setTimeout(function(){ 
			if(search != ""){
				$.ajax({
					url: jsVar.ajax_url + 'customer',
					type: 'post',
					data: {text_search : search, operate: 'get_list'},
					dataType: 'json',
					success:function(response){
						if(response.result){
							const len = response.data.length;
							$("#search_result").empty();
							
							for( let i = 0; i<len; i++){
								let id = response.data[i]['id'];
								let name = response.data[i]['name'];
								$("#search_result").append("<li value='"+id.$oid+"'>"+name+"</li>");
							}

							$("#search_result li").bind("click", function(){
								set_text(this);
							});
						}else{
							$("#search_result").empty();
						}
					}
				});
			}else{
				$("#search_result").empty();
			}
		}, 200);
    });
});

function set_text(element){

	const value = $(element).text();
	const customer_id = $(element).attr('value');

    $("#txt_search").val(value);
    $("#txt_search").text(customer_id);
    $("#search_result").empty();
}

function get_customer(){
	const customer_id = $('#txt_search').text();

	if(customer_id === ''){
		alert('เลือกลูกค้า');
		return;
	}

	const data = {
		customer_id: customer_id,
		operate:  'get_detail'
	};

	$.ajax({
		url: jsVar.ajax_url + 'customer',
		data: data,
		type: 'POST',
		dataType: 'json',
		success: function(data){
			console.log(data);
			var html_to_display = '';
			if(data.result){
				$('#customer_name').text(data.customer_detail.name);
				$('#customer_tel').text(data.customer_detail.tel);
				$('#customer_email').text(data.customer_detail.email);
				$('#customer_id').val(data.customer_detail._id.$oid);
				$.each(data.customer_addr, function(inx, obj){
					html_to_display += '<option value="' + obj._id.$oid + '">' + obj.address + '</option>';
				});
				$('#customer_addr').html(html_to_display);
				get_main_category('job_category');
			}
		}
	})
}


