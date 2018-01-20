

  <script src="assets/js/jquery-ui.custom.min.js" type="text/javascript"></script>
  <script src="bootstrap3/js/bootstrap.min.js" type="text/javascript"></script>

  <script src="assets/js/jquery.validate.min.js" type="text/javascript"></script>
  <!--  Plugins -->
  
  <script src="assets/js/gsdk-radio.js"></script>
  
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <!--  Get Shit Done Kit PRO Core javascript    -->
  <script src="assets/js/get-shit-done.js"></script>
<script type="text/javascript" src="assets/js/post.js"></script>
<script type="text/javascript" src="assets/js/login.js"></script>
<script type="text/javascript" src="assets/js/daftar.js"></script>
<script type="text/javascript" src="assets/js/lupa.js"></script>
<script type="text/javascript" src="assets/js/polling.js"></script>
<script type="text/javascript" src="assets/js/reset.js"></script>
<script type="text/javascript" src="assets/js/admin.js"></script>
<script type="text/javascript" src="assets/js/saran.js"></script>
<script type="text/javascript" src="assets/js/kontak.js"></script>
<script type="text/javascript" src="assets/js/maintanance.js"></script>
<script type="text/javascript" src="assets/js/toastr.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-select.js"></script>

  
   
     <script src="dist/summernote.js"></script>
   
     <script type="text/javascript">
    $(document).ready(function() {
        $('#summernote').summernote({
          height: 300,                 // set editor height
  minHeight: null,             // set minimum height of editor
  maxHeight: null          
        });

    });
  var postForm = function() {
    var content = $('textarea[name="isi"]').html($('#summernote').code());
  }
  </script>
    

    <script type="text/javascript">
        var big_image;
        $().ready(function(){
            responsive = $(window).width();

            $(window).on('scroll', gsdk.checkScrollForTransparentNavbar);

            if (responsive >= 768){
                big_image = $('.parallax-image').find('img');

                $(window).on('scroll',function(){
                    parallax();
                });
            }

        });

       var parallax = function() {
            var current_scroll = $(this).scrollTop();

            oVal = ($(window).scrollTop() / 3);
            big_image.css('top',oVal);
        };

    </script>
<script type="text/javascript">
$(document).ready(function() {

    
    $("#msg").delay(3000).fadeIn(500);
     $("#msg").hide(3000);

});
</script>