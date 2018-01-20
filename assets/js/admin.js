/*
Author: Pradeep Khodke
URL: http://www.codingcage.com/
*/

$('document').ready(function()
{ 
     /* validation */
      // valid email pattern
		 

	 $("#admin-form").validate({
	 	errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: true,
					ignore: "",
      rules:
	  {
			token: {
			required: true,
			maxlength: 100,
			minlength: 50
			},
			
	   },
       messages:
	   {
            token:{
                      required: "Masukkan Token Akses Admin!",
                      maxlength: "Maximal Hanya 100 Karakter!",
                      minlength: "Minimal 50 Karakter!"
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
			var data = $("#admin-form").serialize();
				
			$.ajax({
				
			type : 'POST',
			url  : 'ajax/admin_process.php',
			data : data,
			beforeSend: function()
			{	
				$("#error").fadeOut();
				$("#btn-admin").html('<span class="fa fa-exchange fa-pulse fa-fw"></span> Mohon tunggu ...');
			},
			success :  function(response)
			   {						
					if(response=="Akses Admin Diterima!"){
									
						$("#btn-admin").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Mengecek ...').prop('disabled', true);
						$("#error").fadeIn(1000, function(){						
				 toastr.success(''+response+'', {timeOut: 5000});
											$("#btn-admin").html('<span class="fa fa-check"></span> Akses Admin Diterima!').prop('disabled', true);
												setTimeout('window.location.replace("https://ayoklarifikasi.com/home.html")', 1000);
									});
					} else {
									
						$("#error").fadeIn(1000, function(){						
				toastr.error(''+response+'', {timeOut: 5000});
										$("#btn-admin").html('<span class="fa fa-pencil"></span> Submit');
									});
					}
			  }
			});
				return false;
		}
	   /* post submit */
});