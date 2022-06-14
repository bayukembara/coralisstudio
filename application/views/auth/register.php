<div class="container">

  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
        <div class="col-lg-7">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
            </div>
            <form class="user needs-validation" method="post" action="<?= base_url('auth/register')?>" novalidate="">
              <div class="form-group">
                <input type="text" class="form-control form-control-user" id="name" placeholder="Fullname" name="name"
                  value="<?= set_value('name')?>">
                <?= form_error('name', '<small class="text-danger pl-2">', '</small>'); ?>
              </div>
              <div class="form-group">
                <input type="email" class="form-control form-control-user" id="email" placeholder="Email Address"
                  name="email">
                <?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?>
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="password" class="form-control form-control-user" id="exampleInputPassword"
                    placeholder="Password" name="password">
                  <?= form_error('password', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>
                <div class="col-sm-6">
                  <input type="password" class="form-control form-control-user" id="exampleRepeatPassword"
                    placeholder="Repeat Password" name="re-password">
                  <?= form_error('re-password', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>
              </div>
              <button type="submit" class="btn btn-primary btn-user btn-block">
                Register Account
              </button>
            </form>
            <hr>
            <div class="text-center">
              <a class="small" href="<?= base_url('lupa')?>">Forgot
                Password?</a>
            </div>
            <div class="text-center">
              <a class="small" href="<?= base_url()?>">Already have
                an account? Login!</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>