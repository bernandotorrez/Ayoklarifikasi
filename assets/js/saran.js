/*
Author: Pradeep Khodke
URL: http://www.codingcage.com/
*/

$('document').ready(function()
{ 
     /* validation */
      // valid email pattern
		 

	 $("#saran-form").validate({
	 	errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: true,
					ignore: "",
      rules:
	  {
			saran: {
			required: true,
			minlength: 15
			
			},
			
            
	   },
       messages:
	   {
            
            saran:{
            	required: "Saran tidak boleh kosong",
            	minlength: "Minimal 15 Karakter"
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
	   
	   /* post submit */
	   function submitForm()
	   {		
			var data = $("#saran-form").serialize();
				
			$.ajax({
				
			type : 'POST',
			url  : 'ajax/saran_process.php',
			data : data,
			beforeSend: function()
			{	
				$("#error").fadeOut();
				$("#btn-simpan").html('<span class="fa fa-exchange fa-pulse fa-fw"></span> Mohon tunggu ...');
			},
			success :  function(response)
			   {						
					if(response=="ok"){
									
						$("#btn-simpan").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Mengirim Saran ...').prop('disabled', true);
						$("#error").fadeIn(1000, function(){						
				 toastr.success('Saran Diterima :) <br> Terimakasih Sudah Memberi Saran', {timeOut: 5000});
											$("#btn-simpan").html('<span class="fa fa-check"></span> Saran Diterima').prop('disabled', true);
												
									});
					} else {
									
						$("#error").fadeIn(1000, function(){						
				toastr.error(''+response+'', {timeOut: 5000});
										$("#btn-simpan").html('<span class="fa fa-pencil"></span> Submit');
									});
					}
			  }
			});
				return false;
		}
	   /* post submit */
});