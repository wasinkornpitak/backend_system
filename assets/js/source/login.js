function login(){

	var data = {
		user: $('#email').val(),
		password: $('#password').val(),
		operate: 'login'
	};

	$.ajax({
		url: jsVar.ajax_url + 'user',
		type: 'POST',
		data: data,
		dataType: 'json',
		success: function(data){
			console.log(data);
			alert(data.message);
			if(data.result){
				location.reload();
			}
		}
	})
	// .fail(function (jqXHR, textStatus, errorThrown) { 
	// 	alert(
	// 		'jqXHR : '+ jqXHR +'\n'+
	// 		'textStatus : '+ textStatus +'\n'+
	// 		'errorThrown : '+ errorThrown
	// 	);
	// });

}
