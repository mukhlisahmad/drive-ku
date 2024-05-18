
    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
          <!-- Login -->
          <div class="card">
            <div class="card-body">
                <center>
                <img src="<?=base_url('assets/')?>img/fd.png" width="55px"alt="">
                </center>
              <div class="app-brand justify-content-center mb-4 mt-2">
                <a href="index.html" class="app-brand-link gap-2">
                  <span class="app-brand-text demo text-body fw-bold ms-1">Drive Arsip</span>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-1 pt-2">Selamat Datang  👋</h4>
              <p class="mb-4">Please sign-in to your account and start </p>
              <?=$this->session->flashdata('message');?>
              <form id="formAuthentication" class="mb-3" action="<?=base_url('auth');?>" method="POST">
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
				<input class="form-control form-control-lg" name="email" id="email" type="text" placeholder="Email" autocomplete="off">
                    <?=form_error('email', '<small class="text-danger pl-3">', '</small>');?>
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>

                  </div>
                  <div class="input-group input-group-merge">
					<input class="form-control form-control-lg" name="password" id="password" type="password" placeholder="password"autocomplete="off" >
                    <?=form_error('password', '<small class="text-danger pl-3">', '</small>');?>
                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember-me" />
                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                  </div>
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                </div>
              </form>

              <p class="text-center">
                <span>Belum Punya Akun?</span>
                <a href="<?=base_url('auth/signup');?>">
                  <span>Create an account</span>
                </a>
								<br><hr>
              </p>
              </div>
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>
