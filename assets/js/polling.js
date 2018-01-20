/*
Author: Pradeep Khodke
URL: http://www.codingcage.com/
*/

$('document').ready(function()
{ 
     /* validation */
	 $("#polling-form").validate({
      rules:
	  {
			
            polling: {
            required: true
          
            },
            source1: {
            required: true,
            maxlength: 500
          
            },
            alasan: {
            required: true
          
            },
	   },
       messages:
	   {
            
            source1:{
                      required: "Source Berita Harus Diisi!",
                      maxlength: "Maximal Hanya 500 Karakter!"
                     },
            polling: "Silahkan isi Vote!",
            alasan: "Silahkan isi Alasan Anda!"
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
			var data = $("#polling-form").serialize();
				
			$.ajax({
				
			type : 'POST',
			url  : 'ajax/polling_process.php',
			data : data,
			beforeSend: function()
			{	
				$("#error").fadeOut();
				$("#btn-simpan").html('<span class="fa fa-exchange fa-pulse fa-fw"></span> Mohon tunggu ...');
			},
			success :  function(response)
			   {						
					if(response=="Komentar Berhasil"){
									
						$("#btn-simpan").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Voting ...').prop('disabled', true);
						$("#error").fadeIn(1000, function(){						
				 toastr.success(''+response+'', {timeOut: 5000});
											$("#btn-simpan").html('<span class="fa fa-check"></span> Voting Berhasil').prop('disabled', true);
											

									});

					} else {
									
						$("#error").fadeIn(1000, function(){						
				toastr.error(''+response+'', {timeOut: 5000});
										$("#btn-simpan").html('<span class="fa fa-pencil"></span> Voting');
									});
					}
			  }
			});
				return false;
		}
	   /* post submit */
});
