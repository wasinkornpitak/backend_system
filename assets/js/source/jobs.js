$(function(){
	get_jobs_list(1);

	$('#job_category').change(function(){
		if($('#job_category').val() != ''){
			get_sub_category($(this).val(), 'job_sub_category');
		}
	});

	$('#job_sub_category').change(function(){
		if($('#job_sub_category').val() != ''){
			get_job_step($(this).val());
		}
	});

	$('#add_job_form').delegate('#btn_save' , 'click' , function(){
		const res = $('#add_job_form').serializeArray();
		const data = {};
		const key_problems = [];

		$.each(res, function(inx, obj){
			data[obj.name] = obj.value;
		});

		$.each($("#key_problems:checked"), function(){
			key_problems.push($(this).val());
			// key_problems.push($(this).val()+ ':' + $('#key_problems').next('span').text());
		});

		data['key_problems'] = key_problems;
		data['operate'] = 'add_job';

		var form_data = new FormData();

		$.each(data, function(key, value) {
			form_data.append(key, value);
		});

		if($('[name^=key_image]').length > 0){
			for (let i = 1; i <= $('[name^=key_image]').length; i++) {
				let file = $('#add_job_form').find('[name="key_image' + i + '"]').prop('files')[0];
				if (typeof file !== 'undefined') {
					if ((file.type == 'image/jpeg' || file.type == 'image/png') && file.size < 3000000) {
						form_data.append('key_image' + i, file);
					} else {
						alert('รูปแบบรูปที่ ' + i + ' ไม่ถูกต้อง');
						return;
					}
				}
			}
		}	

		$.ajax({
			contentType: false,
        	processData: false,
			url: jsVar.ajax_url + 'jobs',
			data: form_data,
			type: 'POST',
			dataType: 'json',
			success: function(data){
				console.log(data);
			}
		});
	});

});

function get_jobs_list(page){

	const data = {
		operate: 'get_list',
		job_status: $('#job_status').val(),
		first_category: $('#first_category').val(),
		category: $('#category').val(),
		text_search: $('#text_search').val(),
		limit: '',
		page: page
	};

	console.log(data);

	$.ajax({
		url: jsVar.ajax_url + 'jobs',
		data: data,
		type: 'POST',
		dataType: 'json',
		success: function(data){
			var html_to_display = '';
			console.log(data);
			if(data.result){
				$.each(data.data, function(inx, obj) {
					html_to_display += '<tr>';
					// var status = '<a href="javascript:void(0)" style="background-color: white;cursor: default;" class="badge badge-outline-'+obj.job_status.class+'">'+obj.job_status.status+'</a>'
					var status = obj.job_status.html;
					html_to_display += '<td>'+ obj.code + '<br><br>' + status +'</td>';
					html_to_display += '<td>';
					html_to_display += '<small>SLA in:</small><br>'+ obj.sla_in + '<br>';
					html_to_display += '<small>SLA out:</small><br>'+ obj.sla_out;
					html_to_display += '</td>';
					html_to_display += '<td>'+ obj.category + '<br>' + obj.sub_category +'</td>';
					html_to_display += '<td>'+ obj.customer_address +'</td>';
					var employees_name = '';
					if(obj.employees_firstname !== undefined){
						employees_name = obj.employees_firstname+' '+obj.employees_lastname;
					}else{
						employees_name = '-';
					}
					html_to_display += '<td>'+ employees_name +'</td>';
					html_to_display += '<td><a href="'+ jsVar.base_url + 'jobs/detail/' + obj._id.$oid +'" class="btn btn-info btn-sm">แก้ไข</a>&nbsp;<a href="#!" class="btn btn-danger btn-sm">ลบ</a></td>';
					html_to_display += '</tr>';
				});
			}else{
				html_to_display += '<tr><td COLSPAN ="10" style="text-align: center;">ไม่พบข้อมูล</td></tr>';
			}
			$('#jobs-list').find('tbody').html(html_to_display);
			$('.page-detail').html(data.page_detail);
			$('.pagination').html(data.pagination);
		}
	})

}

function get_job_step(category_id){
	const data = {
		category_id: category_id,
		operate: 'get_job_step'
	};

	$.ajax({
		url: jsVar.ajax_url + 'jobs',
		data: data,
		type: 'POST',
		dataType: 'json',
		success: function(data){
			console.log(data);
			if(data.result){
				var html_to_display = '';
				$.each(data.data, function(index, object){
					html_to_display += '<h5 class="card-header">'+ object.group_title +'</h5>';
					html_to_display += '<div class="card-body"><div class="row">';
					$.each(object.step_data, function(inx, obj){
						html_to_display += '<div class="form-group col-sm-12">';

						if(obj.type == 'radio' || obj.type == 'checkbox' || obj.type == 'select'){
							if(obj.value !== ''){
								html_to_display += '<label class="form-label">'+ obj.title +' :</label>';
							}
						}else{
							html_to_display += '<label class="form-label">'+ obj.title +' :</label>';
						}

						if(obj.type == 'radio' || obj.type == 'checkbox'){
							if(obj.value !== ''){
								$.each(obj.value, function(inx_val, obj_val){
									html_to_display += '<label class="custom-control custom-'+obj.type+'">';
                                    html_to_display += '<input name="'+ obj.key_of_element +'" id="'+ obj.key_of_element +'" type="'+obj.type+'" class="custom-control-input" value="'+ obj_val._id.$oid+'">';
                                    html_to_display += '<span class="custom-control-label">'+ obj_val.title.th +'</span>';
                                    html_to_display += '</label>';
								});
							}
						}

						if(obj.type == 'text' || obj.type == 'number'){
							html_to_display += '<input type="'+ obj.type +'" id="'+obj.key_of_element+'" name="'+obj.key_of_element+'" class="form-control" placeholder="">';
						}

						if(obj.type == 'date'){
							html_to_display += '<input type="text" class="form-control" name="'+obj.key_of_element+'" id="datepicker-features">';
						}

						if(obj.type == 'image'){
							if(obj.value !== '' && obj.value !== undefined){
								for(let i = 1; i <= obj.value; i++){
									html_to_display += '<input type="file" class="form-control" id="'+obj.key_of_element + i +'" name="'+obj.key_of_element+ i +'">';
								}
							}else{
								html_to_display += '<input type="file" class="form-control" id="'+obj.key_of_element+'" name="'+obj.key_of_element+'">';
							}
						}

						if(obj.type == 'textarea'){
							html_to_display += '<textarea class="form-control" id="'+obj.key_of_element+'" name="'+obj.key_of_element+'" rows="4" cols="50"></textarea>';
						}

						if(obj.type == 'select'){
							if(obj.value !== ''){
								html_to_display += '<select class="custom-select" id="'+ obj.key_of_element +'" name="'+ obj.key_of_element +'">';
								$.each(obj.value, function(inx_val, obj_val){
                                    html_to_display += '<option value="'+obj_val._id.$oid+'">'+obj_val.title.th+'</option>';
								});
								html_to_display += '</select>';
							}
						}

						html_to_display += '<div class="clearfix"></div>';
						html_to_display += '</div>';
					});
					html_to_display += '</div></div>';
				});
				$("#job_sub_detail").html(html_to_display);
				$("#btn_div").html('<button id="btn_save" name="btn_save" type="button" class="btn btn-primary">Save changes</button>');
				$("#job_sub_detail").css("display", "block");
			}
		}
	})
}
