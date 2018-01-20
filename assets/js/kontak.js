
/*
Author: Pradeep Khodke
URL: http://www.codingcage.com/
*/

/*
Author: Pradeep Khodke
URL: http://www.codingcage.com/
*/

$('document').ready(function()
{ 
     /* validation */ 
     var nameregex = /^[a-zA-Z ]+$/;
		 
		 
		 
		 // valid email pattern
		 var eregex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		 
		 $.validator.addMethod("validemail", function( value, element ) {
		     return this.optional( element ) || eregex.test( value );
		 });
	 $("#kontak-form").validate({
      rules:
	  {
			
				email : {
				required : true,
				validemail: true,
				maxlength: 50
				},
				subject : {
				required : true,
				maxlength: 100,
				minlength: 5
				},
				pesan : {
				required : true,
				maxlength: 250,
				minlength: 15
				},


				
	   },
        messages:
		   {
				subject: {
					required: "Isi Subject",
					minlength: "Minimal 5 karakter",
					maxlength: "Maksimal 100 karakter"
					  },
				email : {
				required : "Isi Email Kamu",
				validemail : "Email Tidak Valid",
				maxlength: "Maksimal 50 karakter"
			},
				pesan:{
					required: "Isi Pesan",
					minlength: "Minimal 15 karakter",
					maxlength: "Maksimal 250 karakter"
					}
				
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
	   
	   /* daftar submit */
	   function submitForm()
	   {		
			var data = $("#kontak-form").serialize();
				
			$.ajax({
				
			type : 'POST',
			url  : 'ajax/kontak_process.php',
			data : data,
			beforeSend: function()
			{	
				$("#error").fadeOut();
				$("#btn-simpan").html('<span class="fa fa-exchange fa-pulse fa-fw"></span> Mohon tunggu ...');
			},
			success :  function(response)
			   {						
					if(response=="ok"){
									
						$("#btn-simpan").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Mengirim Pesan ...').prop('disabled', true);
						$("#error").fadeIn(1000, function(){						
				toastr.success('Kirim Pesan Berhasil', {timeOut: 5000});

											$("#btn-simpan").html('<span class="fa fa-check"></span> Kirim Pesan Berhasil').prop('disabled', true);
											});
					
					} else {
									
						$("#error").fadeIn(1000, function(){						
				toastr.info(''+response+'', {timeOut: 5000});
										$("#btn-simpan").html('<span class="fa fa-envelope"></span> Kirim Pesan');
									});
					}
			  }
			});
				return false;
		}
	   /* daftar submit */
});