/*
Author: Pradeep Khodke
URL: http://www.codingcage.com/
*/

$('document').ready(function()
{ 
     /* validation */
      // valid email pattern
		 

	 $("#maintanance-form").validate({
	 	errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: true,
					ignore: [],
      rules:
	  {
			
            maintanance: {
            required: true
            },
            
	   },
       messages:
	   {
            
            maintanance: "Pilih Status Maintanance"
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
			var data = $("#maintanance-form").serialize();
				
			$.ajax({
				
			type : 'POST',
			url  : 'ajax/admin/maintanance_process.php',
			data : data,
			beforeSend: function()
			{	
				$("#error").fadeOut();
				$("#btn-maintanance").html('<span class="fa fa-exchange fa-pulse fa-fw"></span> Mohon tunggu ...');
			},
			success :  function(response)
			   {						
					if(response=="Sukses"){
									
						$("#btn-maintanance").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Mengubah ...').prop('disabled', true);
						$("#error").fadeIn(1000, function(){						
				 toastr.success(''+response+'', {timeOut: 5000});
											$("#btn-maintanance").html('<span class="fa fa-check"></span> Ubah Berhasil').prop('disabled', false);
												
									});
					} else {
									
						$("#error").fadeIn(1000, function(){						
				toastr.error(''+response+'', {timeOut: 5000});
										$("#btn-maintanance").html('<span class="fa fa-pencil"></span> Submit');
									});
					}
			  }
			});
				return false;
		}
	   /* post submit */
});