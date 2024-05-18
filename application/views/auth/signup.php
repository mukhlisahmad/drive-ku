
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
              <p class="mb-4">Please Register to your account and start </p>
							<?=$this->session->flashdata('message');?>
						<!-- form -->
			<form class="user" method="post" action="<?=base_url('auth/signup');?>">
                <div class="mb-3">
                  <label for="username" class="form-label">Username</label>
				  <input class="form-control" type="text" name="username" value="<?=set_value('username')?>" placeholder="Username " autocomplete="off">
    							<?=form_error('username', '<small class="text-danger pl-3">', '</small>');?>
                </div>
				<div class="mb-3">
                  <label for="email" class="form-label">email</label>
				  <div class="form-group">
    							<input class="form-control" type="text" name="email" value="<?=set_value('email')?>" placeholder="Email " autocomplete="off">
    							<?=form_error('email', '<small class="text-danger pl-3">', '</small>');?>
    				</div>
            <div class="form-group">
            <label for="level" class="form-label"></label>
    							<input class="form-control" type="hidden" name="level" value="2"  autocomplete="off">
    				</div>

				<hr>
        <p>password must be 6 character</p>
    						<div class="form-group row">
                <div class="col-sm-6">
								<label for="confirm" class="form-label">Password</label>
    								<input type="password" class="form-control form-control-user" id="exampleRepeat" placeholder="Password" name="confirm">
    							</div>
    							<div class="col-sm-6">
								<label for="password" class="form-label"> Confirm Password</label>
    								<input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Confirm Password" name="password">
    								<?=form_error('password', '<small class="text-danger pl-3">', '</small>');?>
    							</div>
    						</div>
							<hr>
                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember-me" />
                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                  </div>
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">Register</button>
                </div>
              </form>
              <p class="text-center">
			  <p>Sudah Memiliki Akun? <a href="<?=base_url('auth')?>" class="text-secondary">Login
    							Disini!</a></p>
                </a>
								<br><hr>
              </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
