$(".user-edit-btn").click(function(e){
	//e.preventDefault();
	var id = $(this).attr('id');
	var userId = id.substr(1);
	
	//console.log(userId);

	$('.userEditForm'+userId).submit(function(e){
		e.preventDefault();

		$.ajax({
	        type:"POST",
	        url:'/admin/user/edit/'+userId,
	        data:$(this).serialize(),
	        dataType: 'json',
	        success: function(data){
	        	$("#user-edit"+userId).modal('hide');
	        	location.reload();
	        },
	        error: function(data){
	        	console.log('error');
	        }
	    });
	});

});

$(".approval-btn-check").click(function(){
	var gId = $(this).attr("id").substr(8);
	console.log(gId);
	$("#al-check"+gId).click();
});


$('.testimonial-approval').each(function(index, el) {
	var pickForm = $(this).attr('id');

	var check = pickForm.substr(2);

	$("#"+pickForm).submit(function(e){
		e.preventDefault();

		var id = $(this).attr('id').substr(2);

		console.log(id);

		$.ajax({
			type:"POST",
			url:'/admin/testimonial/approve/'+id,
			data:$(this).serialize(),
			dataType:'json',
			success: function(data){
				if(data.on){
					$("#stat"+id).html("Approved");
				} else if (data.off) {
					$("#stat"+id).html("Not Approved")
				}
			},
			error: function(data){
			}
		});
	});
}); 

/*$('#new-user-form').submit(function(e){
	e.preventDefault();

	$.ajax({
		type:"POST",
		url:'/admin/user/store',
		data:$(this).serialize(),
		dataType: 'json',
		success: function(data){

			$("#myModal").modal("hide");

			$("#new-user-form").find(".help-block").html("");
			$("#new-user-form").find("#email").parent().removeClass("has-error");
			$("#new-user-form").find("#phone").parent().removeClass("has-error");
			$("#new-user-form").find("#name").parent().removeClass("has-error");
			$("#new-user-form").find("#password").parent().removeClass("has-error");
			$("#new-user-form").trigger("reset");

			location.reload();

			$("#user-page-flash").find(".alert").html("");
			$("#user-page-flash").find(".alert").html("User Successfully Added");
			$("#user-page-flash").show();
		},
		error: function(data){
			var errors = data.responseJSON;
			$("#new-user-form").find(".help-block").html("");
			$("#new-user-form").find("#email").parent().removeClass("has-error");
			$("#new-user-form").find("#phone").parent().removeClass("has-error");
			$("#new-user-form").find("#name").parent().removeClass("has-error");
			$("#new-user-form").find("#password").parent().removeClass("has-error");
			if (errors.email){
				var a = $("#new-user-form").find("#email").parent().addClass('has-error');
				$("#new-user-form").find("#email").after("<span class='help-block'><strong>"+errors.email[0]+"</strong></span>");
			}
			if (errors.phone){
				var a = $("#new-user-form").find("#phone").parent().addClass('has-error');
				$("#new-user-form").find("#phone").after("<span class='help-block'><strong>"+errors.phone[0]+"</strong></span>");
			}
			if (errors.name){
				var a = $("#new-user-form").find("#name").parent().addClass('has-error');
				$("#new-user-form").find("#name").after("<span class='help-block'><strong>"+errors.name[0]+"</strong></span>");
			}
			if (errors.password){
				var a = $("#new-user-form").find("#password").parent().addClass('has-error');
				$("#new-user-form").find("#password").after("<span class='help-block'><strong>"+errors.password[0]+"</strong></span>");
			}
		}
	});
});*/


