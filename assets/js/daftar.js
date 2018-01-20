
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
		 
		 $.validator.addMethod("validname", function( value, element ) {
		     return this.optional( element ) || nameregex.test( value );
		 }); 
		 
		 // valid email pattern
		 var eregex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		 
		 $.validator.addMethod("validemail", function( value, element ) {
		     return this.optional( element ) || eregex.test( value );
		 });
	 $("#daftar-form").validate({
      rules:
	  {
			rpass: {
					required: true,
					minlength: 6,
					maxlength: 15
				},
				rcpass: {
					required: true,
					minlength: 6,
					maxlength: 15,
					equalTo: '#rpass'
				},
				
			rnama: {
					required: true,
					validname: true,
					minlength: 4,
					maxlength:50
				},
				remail : {
				required : true,
				validemail: true
				
				},
				jk : {
				required : true
				
				},


				
	   },
        messages:
		   {
				rnama: {
					required: "Isi Nickname Kamu",
					validname: "Nickname hanya mengandung alpabet dan spasi",
					minlength: "Nickname kamu terlalu pendek",
					maxlength: "Maximal 50 karakter"
					  },
				remail : {
				required : "Isi Email Kamu",
				validemail : "Email Tidak Valid"
			},
				rpass:{
					required: "Isi Kata Sandi Kamu",
					minlength: "Kata Sandi Minimal 6 Karakter",
					maxlength: "Kata Sandi maksimal 15 Karakter"
					},
					rcpass:{
					required: "Isi Kata Sandi Kamu, Samakan Dengan Kata Sandi Diatas",
					minlength: "Kata Sandi Minimal 6 Karakter",
					maxlength: "Kata Sandi maksimal 15 Karakter",
					equalTo: "Kata Sandi Tidak Sama"
					},
				jk:{
					required: "Pilih jenis kelamin",
					equalTo: "Kata Sandi tidak cocok!"
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
			var data = $("#daftar-form").serialize();
				
			$.ajax({
				
			type : 'POST',
			url  : 'ajax/daftar_process.php',
			data : data,
			beforeSend: function()
			{	
				$("#error1").fadeOut();
				$("#btn-daftar").html('<span class="fa fa-exchange fa-pulse fa-fw"></span> Mohon tunggu ...');
			},
			success :  function(response)
			   {						
					if(response=="ok"){
									
						$("#btn-daftar").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Mendaftar ...').prop('disabled', true);
						$("#error1").fadeIn(1000, function(){						
				toastr.success(''+response+'', {timeOut: 5000});

											$("#btn-daftar").html('<span class="fa fa-sign-in"></span> Daftar').prop('disabled', false);
											});
					}
					else if(response=="Email sudah terdaftar"){
									
						$("#btn-daftar").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Mendaftar ...').prop('disabled', true);
						$("#error1").fadeIn(1000, function(){						
				toastr.warning(''+response+'', {timeOut: 5000});

											$("#btn-daftar").html('<span class="fa fa-sign-in"></span> Daftar').prop('disabled', false);
											});
					} else if(response=="Pendaftaran Sukses! Silahkan Cek Inbox atau Spam Email Anda"){
									
						$("#btn-daftar").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Mendaftar ...').prop('disabled', true);
						$("#error1").fadeIn(1000, function(){						
				toastr.success(''+response+'', {timeOut: 5000});

											$("#btn-daftar").html('<span class="fa fa-check"></span> Pendaftaran Berhasil').prop('disabled', true);
											});
					} else {
									
						$("#error1").fadeIn(1000, function(){						
				toastr.info(''+response+'', {timeOut: 5000});
										$("#btn-daftar").html('<span class="fa fa-sign-in"></span> Daftar');
									});
					}
			  }
			});
				return false;
		}
	   /* daftar submit */
});