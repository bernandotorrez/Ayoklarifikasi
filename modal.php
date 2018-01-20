 <!-- login modal -->
    <div class="modal modal-small fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="false" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-center">Login</h4>
      </div>
      <div class="modal-body">
           
           
              <div id="error">
        <!-- error will be shown here ! -->
        </div>
            <form method="post" id="login-form">
            <div class="form-group">
            <input type="email" value="" name="email" placeholder="Email" class="form-control" id="email" required="" maxlength="50">
            <span class="help-block" id="error"></span> 
          </div>
           <div class="form-group">
            <input type="password" value="" name="password" placeholder="Kata sandi" class="form-control" required="" maxlength="50" id="password">
            <span class="help-block" id="error"></span> 
          </div>
        
           <div class="form-group">
            <button type="submit" class="btn btn-info btn-fill btn-block" name="btn-login" id="btn-login">
        <span class="fa fa-sign-in"></span> Masuk
      </button> 
        </div>  
    
     
          
          </form>
      </div>
      <div class="modal-footer">
            <span class="text-muted">Belum Punya Akun? <a href="#" data-toggle="modal" data-target="#registerModal" data-dismiss="modal">Daftar Disini</a></span>
            <br><br>
             <span class="text-muted">Atau Lupa Kata Sandi? <a href="#" data-toggle="modal" data-target="#lupaModal" data-dismiss="modal">Lupa Kata Sandi</a></span>
      </div>
    </div>
  </div>
</div>
<!-- end login modal -->

<!-- register modal -->
<div class="modal modal-small fade" id="registerModal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-center">Daftar</h4>
      </div>
      <div class="modal-body">
           
             <div id="error1">
        <!-- error will be shown here ! -->
        </div>
            <form method="post" id="daftar-form">
            <div class="form-group">
            <input type="email" value="" placeholder="Email" name="remail" class="form-control" wtx-context="24C3A2D9-F682-451D-84CA-8CFB740F8439" required="Isi Email Kamu" maxlength="50" id="remail">
            <span class="help-block" id="error"></span> 
          </div>
          <div class="form-group">
            <input type="text" value="" placeholder="Nickname" name="rnama" class="form-control" wtx-context="24C3A2D9-F682-451D-84CA-8CFB740F8439" required="" maxlength="50" id="rnama">
            <span class="help-block" id="error"></span> 
          </div>
           <div class="form-group">
          
                                        <select name="jk" class="selectpicker" data-style="" id="jk" required="">
                                            <option disabled selected> Jenis Kelamin</option>
                                            <option value="Boy">Laki - Laki </option>
                                            <option value="Girl">Perempuan</option>
                                          
                                  </select>
       
            <span class="help-block" id="error"></span> 
          </div>
        
           <div class="form-group">
            <input type="password" value="" placeholder="Kata Sandi" name="rpass" class="form-control" wtx-context="BA6C38B1-3135-40E3-A3A7-329A345EC706" required="" maxlength="50" id="rpass">
            <span class="help-block" id="error"></span> 
          </div>
           <div class="form-group">
            <input type="password" value="" placeholder="Ketik Ulang Kata Sandi" name="rcpass" class="form-control" wtx-context="73D7328B-E757-4546-8D3D-1B2E875EA14F" required="" maxlength="50" id="rcpass">
            <span class="help-block" id="error"></span> 
          </div>
           <div class="form-group">
            <button type="submit" class="btn btn-info btn-fill btn-block" name="btn-daftar" id="btn-daftar">
        <span class="fa fa-user-plus"></span> Daftar
      </button> 
        </div>  
          
          </form>
      </div>
      <div class="modal-footer">
            <span class="text-muted">Sudah Punya Akun? <a href="#" data-toggle="modal" data-target="#loginModal" data-dismiss="modal">Masuk</a></span>
              <br><br>
            <span class="text-muted">Atau Lupa Kata Sandi? <a href="#" data-toggle="modal" data-target="#lupaModal" data-dismiss="modal">Lupa Kata Sandi</a></span>
      </div>
    </div>
  </div>
</div>
<!-- end register modal -->

<!-- lupa kata sandi modal -->
<div class="modal modal-small fade" id="lupaModal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-center">Lupa Kata Sandi</h4>
      </div>
      <div class="modal-body">
            
           
             <div id="error1">
        <!-- error will be shown here ! -->
        </div>
            <form method="post" id="lupa-form">
            <div class="form-group">
            <input type="email" value="" placeholder="Email" name="fpemail" class="form-control" wtx-context="24C3A2D9-F682-451D-84CA-8CFB740F8439" required="Isi Email Kamu" maxlength="50" id="fpemail">
            <span class="help-block" id="error"></span> 
          </div>
         
         
           <div class="form-group">
            <button type="submit" class="btn btn-info btn-fill btn-block" name="btn-lupa" id="btn-lupa">
        <span class="fa fa-envelope-o"></span> Kirim Kata Sandi
      </button> 
        </div>  
          
          </form>
      </div>
      <div class="modal-footer">
            <span class="text-muted">Sudah Punya Akun? <a href="#" data-toggle="modal" data-target="#loginModal" data-dismiss="modal">Masuk</a></span>
              <br><br>
            <span class="text-muted">Belum Punya Akun? <a href="#" data-toggle="modal" data-target="#registerModal" data-dismiss="modal">Daftar</a></span>
      </div>
    </div>
  </div>
</div>
<!-- end lupa kata sandi modal -->