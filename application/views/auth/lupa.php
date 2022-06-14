<div class="container">
  <!-- Outer Row -->
  <div class="row justify-content-center">
    <div class="col-xl-10 col-lg-12 col-md-12">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
            <div class="col-lg-6">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                  <p class="mb-4">We get it, stuff happens. Just enter your email address below
                    and we'll send you a link to reset your password!</p>
                </div>
                <form class="user" method="post" action="<?=base_url("lupa")?>">
                  <?= $this->session->flashdata('message'); ?>
                  <div class="form-group">
                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="email"
                      aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    <?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <button class="btn btn-primary btn-user btn-block" type="submit">Reset Password</button>
                </form>
                <hr>
                <div class="text-center">
                  <a class="small" href=" <?= base_url('auth/register')?>">Create
                    an
                    Account!</a>
                </div>
                <div class="text-center">
                  <a class="small" href="<?= base_url()?>">Already
                    have
                    an account? Login!</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>
</div>