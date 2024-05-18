
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" data-bg-class="bg-menu-theme" style="touch-action: none; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
    <div class="app-brand demo">
        <a href="#" class="app-brand-link">
            <span class="app-brand-logo demo">
				<img src="<?=base_url('assets/')?>img/fd.png" alt="Logo Image" width="28px">
            </span>
            <span class="app-brand-text demo menu-text fw-bold">Arsip</span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>
    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
         <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Arsip</span>

            </li>
            <li class="menu-item">
                <a class="menu-link" href="<?=base_url('user/mydrive');?>">
                <i class="menu-icon tf-icons fa-solid fa-folder-open"></i>
                    <div data-i18n="My Drive">My Drive</div>
                </a>
            </li>
            <li class="menu-item">
                <a class="menu-link" href="<?=base_url('user/surat_masuk');?>">
                <i class="menu-icon tf-icons fa-solid fa-envelope-circle-check"></i>

                    <div data-i18n="Surat Masuk">Surat Masuk</div>
                </a>
            </li>
            <li class="menu-item">
                <a class="menu-link" href="<?=base_url('user/surat_keluar');?>">
                <i class="menu-icon tf-icons fa-solid fa-envelope-open"></i>
                    <div data-i18n="Surat Keluar">Surat Keluar</div>
                </a>
            </li>
            <?php if ($this->session->userdata('level') == 1): ?>
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Admin Menu</span>
            </li>
            <li class="menu-item">
                <a class="menu-link" href="<?=base_url('User/list_user');?>">
                    <i class="menu-icon tf-icons fas fa-fw fa-user-check"></i>
                    <div data-i18n="List User">List User</div>
                </a>
            </li>
            <!-- <li class="menu-item">
                <a class="menu-link" href="<?=base_url('User/confirm_user');?>">
                    <i class="menu-icon tf-icons fas fa-fw fa-user-check"></i>
                    <div data-i18n="Confirm User">Confirm User</div>
                </a>
            </li> -->
            <?php endif;?>
            <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Setting</span>
            </li>

            <li class="menu-item ">
                <a class="menu-link" href="<?=base_url('User/myprofile');?>">
                    <i class="menu-icon tf-icons fas fa-fw fa-users"></i>
                    <div data-i18n="myprofile">myprofile</div>
                </a>
            </li>
            <li class="menu-item ">
                <a class="menu-link" href="<?=base_url('Auth/logout');?>">
                    <i class="menu-icon tf-icons fas fa-fw fa-sign-out-alt"></i>
                    <div data-i18n="Logout">Logout</div>
                </a>
            </li>

        <br>
    </ul>
    <br>
</aside>
