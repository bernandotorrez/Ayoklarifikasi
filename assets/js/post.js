/*
Author: Pradeep Khodke
URL: http://www.codingcage.com/
*/

$('document').ready(function()
{ 
     /* validation */
      // valid email pattern
		 

	 $("#post-form").validate({
	 	errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: true,
					ignore: [],
      rules:
	  {
			
			source: {
            required: true,
            maxlength: 250
           
            },
            isi: {
            required: true,
            minlength:50
          
            },
             tujuan: {
            required: true,
          	minlength: 10,
          	maxlength: 150
            },
            vote: {
            required: true
          
            },
            komentar: {
            required: true,
          	minlength: 25
            },
            tags: {
            required: true
            },
            tambahtags: {
            maxlength: 25,
            
            },
            
	   },
       messages:
	   {
            judul:{
                      required: "Judul Posting Harus Diisi!",
                      maxlength: "Maximal Hanya 250 Karakter!"
                     },
            source:{
                      required: "Source Isu Harus Diisi!",
                      maxlength: "Maximal Hanya 250 Karakter!",
                      valideurl: "Masukkan URL yang benar!"
                     },
                     tujuan:{
                      required: "Tujuan Harus Diisi!",
                      maxlength: "Maximal Hanya 150 Karakter!",
                      minlength: "Minimal 10 Karakter!"
                     },
                     komentar:{
                      required: "Komentar Harus Diisi!",
                      
                      minlength: "Minimal 10 Karakter!"
                     },
                     tambahtags:{
                      
                      maxlength: "Maximal Hanya 25 Karakter!"
                      
                     },
                     isi:{
                       required: "Silahkan isi konten isu (minimal 50 Karakter)",
                      minlength: "Minimal 50 Karakter!"
                      
                     },
           
            vote: "Pilih vote anda",
            tags: "Pilih tags"
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
			var data = $("#post-form").serialize();
				
			$.ajax({
				
			type : 'POST',
			url  : 'ajax/post_process.php',
			data : data,
			beforeSend: function()
			{	
				$("#error").fadeOut();
				$("#btn-simpan").html('<span class="fa fa-exchange fa-pulse fa-fw"></span> Mohon tunggu ...');
			},
			success :  function(response)
			   {						
					if(response=="Posting Isu Berhasil"){
									
						$("#btn-simpan").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Memposting ...').prop('disabled', true);
						$("#error").fadeIn(1000, function(){						
				 toastr.success(''+response+'', {timeOut: 5000});
											$("#btn-simpan").html('<span class="fa fa-check"></span> Posting Berhasil').prop('disabled', true);
												setTimeout('window.location.replace("https://ayoklarifikasi.com/home.html")', 1000);
									});
					} else {
									
						$("#error").fadeIn(1000, function(){						
				toastr.error(''+response+'', {timeOut: 5000});
										$("#btn-simpan").html('<span class="fa fa-pencil"></span> Posting');
									});
					}
			  }
			});
				return false;
		}
	   /* post submit */
});