<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-success elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url("/"); ?>" class="brand-link text-center">
        <span class="brand-text">Masjid Assalam</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img class="img-profile rounded-circle elevation-2" src="https://ui-avatars.com/api/?name=<?= user()->username; ?>">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= user()->username; ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <?php $database = \Config\Database::connect();
                $menus = $database->table("menu_admin_page")->orderBy('urutan', 'ASC')->get()->getResultArray();
                ?>

                <?php foreach ($menus as $menu) : ?>
                    <?php $subMenus = $database->table("submenu_admin_page")->where("parent_id", $menu['id'])->get()->getResultArray(); ?>

                    <li class="nav-item <?= count($subMenus) > 0 ? 'has-treeview' : ''; ?> <?= $parent_menu == $menu['nama'] ? 'menu-open' : ''; ?>">
                        <a href="<?= base_url($menu['url']) ?>" class="nav-link <?= $parent_menu == $menu['nama'] ? 'active' : ''; ?>">
                            <i class="nav-icon <?= $menu['icon']; ?>"></i>
                            <p>
                                <?= $menu['nama']; ?>
                                <?= count($subMenus) > 0 ? '<i class="fas fa-angle-left right"></i>' : ''; ?>
                            </p>
                        </a>

                        <?php if (count($subMenus) > 0) : ?>
                            <ul class="nav nav-treeview">
                                <?php foreach ($subMenus as $subMenu) : ?>
                                    <li class="nav-item">
                                        <a href="<?= base_url($subMenu['url']) ?>" class="nav-link <?= isset($sub_menu) ? ($sub_menu == $subMenu['nama'] ? 'active' : '') : ''; ?>">
                                            <i class="<?= $subMenu['icon']; ?>"></i>
                                            <p><?= $subMenu['nama']; ?></p>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                    </li>
                <?php endforeach; ?>
                <!-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Item 1</p>
                    </a>
                </li> -->

            </ul>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>