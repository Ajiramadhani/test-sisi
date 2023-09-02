<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="flash-login" data-flashlogin="<?= $this->session->flashdata('flash-log'); ?>"></div>
    <?php if ($this->session->flashdata('flash-log')) {
    } ?>

    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <?php if ($this->session->flashdata('flash')) {
    } ?>
    <div class="col-lg-6">
        <a href="<?= base_url('user/edit'); ?>" class="btn btn-primary mb-3">Edit Profile</a>
    </div>
    <div class="card mb-3 col-lg-8">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img class="card-img" src="assets/img/profile/guest.png">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['nama_user']; ?></h5>
                    <h5 class="card-title"><?= $user['username']; ?></h5>
                    <h5 class="card-title"><?= $user['no_hp']; ?></h5>
                    <p class="card-text"><?= $user['email']; ?></p>
                    <p class="card-text"><small class="text-muted">Member Since <?= $user['created_at']; ?></small></p>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->