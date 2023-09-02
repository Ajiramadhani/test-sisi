<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-light sidebar sidebar-light shadow-sm accordion toggled" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center bg-gradient-primary text-white justify-content-center" href="<?= base_url(); ?>">
            <div class="sidebar-brand-icon">
                <img class="img-fluid img-thumbnail" width="50px" src="assets/img/logo-sisi.jpeg" alt="...">
            </div>
            <div class="sidebar-brand-text mx-3">Test SISI</div>
        </a>

    <!-- Divider -->
    <hr class="sidebar-divider">



    </li>

    <!-- Query dari Menu -->
    <?php
    $id_jenis_user = $this->session->userdata('id');
    $queryMenu = "SELECT *
                    FROM `menu_level` JOIN `menu_user`
                    ON `menu_level`.`id` = `menu_user`.`menu_id`
                    WHERE `menu_user`.`id_user` = $id_jenis_user
                    ORDER BY `menu_level`.`level` ASC;
                    ";
    $menu = $this->db->query($queryMenu)->result_array();
    ?>

    <!-- Looping Menu -->
    <?php foreach ($menu as $m) : ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#<?= $m['level']; ?>" aria-expanded="true" aria-controls="<?= $m['level']; ?>">
                <i class="fas fa-chevron-circle-down"></i>
                <span><?= $m['level']; ?></span>
            </a>
            <!-- <div class="sidebar-heading">
            
        </div> -->

            <!-- Siapkan Sub-Menu Sesuai Menu -->
            <!-- <?php
            $menuId = $m['id'];
                        $querySubMenu = "SELECT mu.id_user, mu.menu_id, m.id_level, m.menu_name, m.menu_link, m.menu_icon
                        FROM menu_user mu
                        JOIN menu m ON mu.menu_id = m.id
                        WHERE mu.menu_id = m.id
                        ORDER BY m.menu_name ASC;
                        ";
            $subMenu = $this->db->query($querySubMenu)->result_array();
            ?> -->
            <div id="<?= $m['level']; ?>" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <? ($title == $sm['menu_name']) ?>
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header"><?= $m['level']; ?></h6>
                    <?php foreach ($subMenu as $sm) : ?>
                        <a class="collapse-item" href="<?= base_url($sm['menu_link']); ?>">
                            <i class="<?= $sm['menu_icon']; ?>"></i>
                            <?= $sm['menu_name']; ?></a>

                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
        </li>


        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span>Logout</span></a>
        </li>



        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

</ul>
<!-- End of Sidebar -->