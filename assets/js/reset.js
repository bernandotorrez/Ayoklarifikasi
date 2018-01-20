/*
Author: Pradeep Khodke
URL: http://www.codingcage.com/
*/

$('document').ready(function()
{ 
     /* validation */
	 $("#reset-form").validate({
      rules:
	  {
			resetpass: {
					required: true,
					minlength: 6,
					maxlength: 15
				},
				cresetpass: {
					required: true,
					equalTo: '#resetpass'
				},
            
	   },
       messages:
	   {
           resetpass:{
					required: "Isi Kata Sandi Kamu",
					minlength: "Kata Sandi Minimal 6 Karakter"
					},
				cresetpass:{
					required: "Ketik Ulang Kata Sandi Kamu",
					equalTo: "Kata Sandi tidak cocok!"
					},
           
    },
		   errorPlacement : function(error, element) {
			  $(element).closest('.form-group').find('.help-block').html(error.html());
		   },
		   highlight : function(element) {
			  $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
			  
		   },
		   unhighlight: function(element, errorClass, validClass) {
			  $(element).closest('.form-group').removeClass('has-error');
			  $(element).closest('.form-group').find('.help-block').html('');
			  
		   },
				submitHandler: submitForm
		   }); 
	   /* validation */
	   
	   /* post submit */
	   function submitForm()
	   {		

			var data = $("#reset-form").serialize();
			
			$.ajax({
				
			type : 'POST',
			url  : 'ajax/reset_process.php',
			data : data,
			beforeSend: function()
			{	
				$("#error").fadeOut();
				$("#btn-reset").html('<span class="fa fa-exchange fa-pulse fa-fw"></span> Mohon tunggu ...');
			},
			success :  function(response)
			   {						
					if(response=="ok"){
									
						$("#btn-reset").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Perbarui Kata Sandi ...').prop('disabled', true);
						$("#error").fadeIn(1000, function(){						
				toastr.success(''+response+'', {timeOut: 5000});

											$("#btn-reset").html('<span class="fa fa-pencil"></span> Ubah Kata Sandi').prop('disabled', false);
											});
					}
					else if(response=="Kata Sandi Berhasil Diperbarui"){
									
						$("#btn-reset").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Perbarui Kata Sandi ...').prop('disabled', true);
						$("#error").fadeIn(1000, function(){						
				toastr.success(''+response+'', {timeOut: 5000});

											$("#btn-reset").html('<span class="fa fa-check"></span> Ubah Kata Sandi Berhasil').prop('disabled', true);
											});
					} else if(response=="Kata Sandi Tidak Cocok"){
									
						$("#btn-reset").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Perbarui Kata Sandi ...').prop('disabled', true);
						$("#error").fadeIn(1000, function(){						
				toastr.warning(''+response+'', {timeOut: 5000});

											$("#btn-reset").html('<span class="fa fa-pencil"></span> Ubah Kata Sandi').prop('disabled', false);
											});
					} else {
									
						$("#error").fadeIn(1000, function(){						
				toastr.error(''+response+'', {timeOut: 5000});
										$("#btn-reset").html('<span class="fa fa-pencil"></span> Ubah Kata Sandi');
									});
					}
			  }
			});
				return false;
		}
	   /* post submit */
});
