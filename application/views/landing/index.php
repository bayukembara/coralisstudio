<?php

use function PHPSTORM_META\type;

?>
<div class="container-fluid">

  <!-- Page Heading -->
  <?= $this->session->flashdata('message'); ?>
  <div class="card">
    <div class="card-title">
      <h3 class=" text-gray-800 text-center mt-4"><?= $title; ?>
      </h3>
    </div>
    <hr>
    <div class="card-body mt-0">
      <form class="user" method="post" action="<?= base_url('landing/update')?>" enctype="multipart/form-data">
        <div class="form-group row mb-3">
          <label for="Name" class="form-label">Fullname</label>
          <input type="name" class="form-control" id="name" name="name" aria-describedby="emailHelp"
            value="<?= $user['name']?>">
          <?= form_error('name', '<small class="text-danger pl-2">', '</small>'); ?>
        </div>
        <div class="form-group row mb-3">
          <label for="Name" class="form-label">Email</label>
          <input type="name" class="form-control" id="email" name="email" aria-describedby="emailHelp" readonly
            value="<?= $user['email']?>">
          <?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?>
        </div>
        <div class="mb-3">
          <div class="form-group row">
            <label for="Name" class="form-label">Picture</label>
          </div>
          <div class="form-group row">
            <div class="col-4">
              <img src="<?= base_url('assets/img/picture/') . $user['picture']; ?>" class="img-fluid" name="old_image"
                style="width: 18rem;">
            </div>
            <div class="col-8">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="image" name="image">
                <label class="custom-file-label" for="image">Choose file</label>
              </div>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
  <?= $user['email']?>


</div>
<!-- /.container-fluid -->