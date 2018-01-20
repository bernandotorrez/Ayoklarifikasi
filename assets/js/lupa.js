
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
     /* validation */ var nameregex = /^[a-zA-Z ]+$/;
		 
		 $.validator.addMethod("validname", function( value, element ) {
		     return this.optional( element ) || nameregex.test( value );
		 }); 
		 
		 // valid email pattern
		 var eregex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		 
		 $.validator.addMethod("validemail", function( value, element ) {
		     return this.optional( element ) || eregex.test( value );
		 });
	 $("#lupa-form").validate({
      rules:
	  {
			
				fpemail : {
				required : true,
				validemail: true
				
				},

				
	   },
        messages:
		   {
				
				remail : {
				required : "Isi Email Kamu",
				validemail : "Email Tidak Valid"
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
	   
	   /* lupa submit */
	   function submitForm()
	   {		
			var data = $("#lupa-form").serialize();
				
			$.ajax({
				
			type : 'POST',
			url  : 'ajax/lupa_process.php',
			data : data,
			beforeSend: function()
			{	
				$("#error1").fadeOut();
				$("#btn-lupa").html('<span class="fa fa-exchange fa-pulse fa-fw"></span> Mohon tunggu ...');
			},
			success :  function(response)
			   {						
					if(response=="ok"){
									
						$("#btn-lupa").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Mengecek ...').prop('disabled', true);
						$("#error1").fadeIn(1000, function(){						
				toastr.success(''+response+'', {timeOut: 5000});

											$("#btn-lupa").html('<span class="fa fa-envelope-o"></span> Kirim Kata Sandi').prop('disabled', false);
											});
					}
					else if(response=="Lupa Kata Sandi Berhasil Dilakukan, Silahkan Cek Inbox atau Spam Email Kamu"){
									
						$("#btn-lupa").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Mengecek ...').prop('disabled', true);
						$("#error1").fadeIn(1000, function(){						
				toastr.success(''+response+'', {timeOut: 5000});

											$("#btn-lupa").html('<span class="fa fa-check"></span> Permintaan Berhasil Dilakukan').prop('disabled', true);
											});
					} else {
									
						$("#error1").fadeIn(1000, function(){						
				toastr.warning(''+response+'', {timeOut: 5000});
										$("#btn-lupa").html('<span class="fa fa-envelope-o"></span> Kirim Kata Sandi').prop('disabled', false);
									});
					}
			  }
			});
				return false;
		}
	   /* lupa submit */
});