<nav class="navbar top-navbar col-lg-12 col-12 p-0">
    <div class="container">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo" href="<?= $helper->url(); ?>"><?= $helper->getSetting('siteNameBig') ?></a>
            <a class="navbar-brand brand-logo-mini" href="<?= $helper->url(); ?>"><?= $helper->getSetting('siteNameSmall') ?></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">

            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link" href="#" data-toggle="dropdown" id="profileDropdown">
                        <img src="https://via.placeholder.com/30x30" alt="profile" />
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="<?= $helper->url(); ?>profile">
                            <i class="mdi mdi-settings text-primary"></i>
                            Mein Profil
                        </a>
                        <a class="dropdown-item" href="<?= $helper->url(); ?>logout">
                            <i class="mdi mdi-logout text-primary"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </div>
</nav>

<nav class="bottom-navbar">
    <div class="container">
        <ul class="nav page-navigation">
            <li class="nav-item">
                <a class="nav-link" href="<?= $helper->url(); ?>">
                    <i class="mdi mdi-shield-half-full menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= $helper->url(); ?>members">
                    <i class="mdi mdi-puzzle menu-icon"></i>
                    <span class="menu-title">All Members</span>
                </a>
            </li>

            <?php if ($user->isAdmin($_COOKIE['session_token'])) { ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="mdi mdi-image-filter menu-icon"></i>
                        <span class="menu-title">Administration</span>
                        <i class="menu-arrow"></i></a>
                    <div class="submenu">
                        <ul class="submenu-item">
                            <li class="nav-item"><a class="nav-link" href="<?= $helper->url(); ?>team/teams">Teamverwaltung</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?= $helper->url(); ?>team/users">Benutzerverwaltung</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?= $helper->url(); ?>team/members">Memberverwaltung</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?= $helper->url(); ?>team/settings">Settings</a></li>
                        </ul>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>
</div>

<div class="container-fluid page-body-wrapper">
    <div class="main-panel">