
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
      var eregex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		 
		 $.validator.addMethod("validemail", function( value, element ) {
		     return this.optional( element ) || eregex.test( value );
		 });
	 $("#login-form").validate({
      rules:
	  {
			password: {
					required: true,
					minlength: 6,
					maxlength: 15
				},
				
			email : {
				required : true,
				validemail: true
				
				},
	   },
       messages:
		   {
				name: {
					required: "Isi Nama Kamu",
					validname: "Nama hanya mengandung alpabet dan spasi",
					minlength: "Nama kamu terlalu pendek"
					  },
				email : {
				required : "Isi Email Kamu",
				validemail : "Email Tidak Valid"
				
			},
				password:{
					required: "Isi Kata Sandi Kamu",
					minlength: "Kata Sandi Minimal 6 Karakter"
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
	   
	   /* login submit */
	   function submitForm()
	   {		
			var data = $("#login-form").serialize();
				
			$.ajax({
				
			type : 'POST',
			url  : 'ajax/login_process.php',
			data : data,
			beforeSend: function()
			{	
				$("#error").fadeOut();
				$("#btn-login").html('<span class="fa fa-exchange fa-pulse fa-fw"></span> Mohon tunggu ...');
			},
			success :  function(response)
			   {						
					if(response=="ok"){
									
						$("#btn-login").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Masuk ...').prop('disabled', true);
						$("#error").fadeIn(1000, function(){						
				toastr.success('Login Berhasil!', {timeOut: 5000});
				$("#btn-login").html('<span class="fa fa-check"></span> Login Berhasil').prop('disabled', true);
				setTimeout('location.reload()', 500);
											
											});
					}
					else if(response=="Bruteforce"){
									
						$("#btn-login").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Masuk ...').prop('disabled', true);
						$("#error").fadeIn(1000, function(){	
						toastr.warning('<strong>Maaf!</strong> Anda gagal login lebih dari 5 kali, Untuk masalah keamanan, akun ini di Lock selama 5 menit.', {timeOut: 5000});					
						$("#btn-login").html('<span class="fa fa-sign-in"></span> Masuk').prop('disabled', false);
											});
					} else if(response=="Error"){
									
						$("#btn-login").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Masuk ...').prop('disabled', true);
						$("#error").fadeIn(1000, function(){	
						toastr.error('<strong>Email </strong>atau <strong>Kata Sandi</strong> anda salah!', {timeOut: 5000});					
						$("#btn-login").html('<span class="fa fa-sign-in"></span> Masuk').prop('disabled', false);
											});
					} else if(response=="Inactive"){
									
						$("#btn-login").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Masuk ...').prop('disabled', true);
						$("#error").fadeIn(1000, function(){	
						toastr.info('<strong>Maaf!</strong> Akun Ini Belum Di Verifikasi, Cek Inbox Email Anda.', {timeOut: 5000});					
						$("#btn-login").html('<span class="fa fa-sign-in"></span> Masuk').prop('disabled', false);
											});
					} else {
									
						$("#error").fadeIn(1000, function(){	
									toastr.info(''+response+'', {timeOut: 5000});		
				
										$("#btn-login").html('<span class="fa fa-sign-in"></span> Masuk');
									});
					}
			  }
			});
				return false;
		}
	   /* login submit */
});