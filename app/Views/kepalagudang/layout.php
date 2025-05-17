<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Layout | AdminLTE 4</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="Layout | AdminLTE 4" />
    <meta name="author" content="ColorlibHQ" />
    <meta
        name="description"
        content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS." />
    <meta
        name="keywords"
        content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard" />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
        integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
        crossorigin="anonymous" />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
        integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg="
        crossorigin="anonymous" />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="<?= base_url('css/adminlte.css') ?>" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
        <nav class="app-header navbar navbar-expand bg-body">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                            <i class="bi bi-list"></i>
                        </a>
                    </li>
                    <span class="nav-link"><?= esc($title ?? 'Home') ?></span>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown user-menu">
                        <img
                            src="<?= base_url('/assets/img/user2-160x160.jpg') ?>"
                            class="user-image rounded-circle shadow"
                            alt="User Image" />
                        <span class="d-none d-md-inline">Alexander Pierce</span>
                    </li>
                </ul>
            </div>
        </nav>
        <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
            <div class="sidebar-brand">
                <a href="../index.html" class="brand-link">
                    <img
                        src="<?= base_url('/assets/img/AdminLTELogo.png') ?>"
                        alt="AdminLTE Logo"
                        class="brand-image opacity-75 shadow" />
                    <span class="brand-text fw-light">AdminLTE 4</span>
                </a>
            </div>
            <div class="sidebar-wrapper">
                <nav class="mt-2">
                    <ul
                        class="nav sidebar-menu flex-column"
                        id="sidebar-menu"
                        data-lte-toggle="treeview"
                        role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="<?= base_url('kepalagudang') ?>" class="nav-link">
                                <i class="nav-icon bi bi-speedometer"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-people"></i>
                                <p>
                                    Users
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview ms-3">
                                <li class="nav-item">
                                    <a href="<?= base_url('kepalagudang/user/admin') ?>" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Admin Gudang</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('kepalagudang/user/kasir') ?>" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Kasir Toko</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('kepalagudang/supplier') ?>" class="nav-link">
                                <i class="nav-icon bi bi-clipboard-fill"></i>
                                <p>
                                    Supplier
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('kepalagudang/barang') ?>" class="nav-link">
                                <i class="nav-icon bi bi-box"></i>
                                <p>
                                    Barang
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-pencil-square"></i>
                                <p>
                                    Transaksi
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview ms-3">
                                <li class="nav-item">
                                    <a href="<?= base_url('kepalagudang/trasnsaksi/kegudang') ?>" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Masuk Gudang</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('kepalagudang/trasnsaksi/darigudang') ?>" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Keluar Gudang</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('kepalagudang/trasnsaksi/daritoko') ?>" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Transaksi Kasir</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('') ?>" class="nav-link">
                                <i class="nav-icon bi bi-box-arrow-right"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <main class="app-main">
            <div class="app-content mt-4">
                <div class="container-fluid">
                    <?= $this->renderSection('content') ?>
                </div>
            </div>
        </main>
        <footer class="app-footer">
            <div class="float-end d-none d-sm-inline">BUMDES DESA CIKUBANGMULYA 2025</div>
        </footer>
    </div>
    <script
        src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
        integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ="
        crossorigin="anonymous"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <script src="<?= base_url('js/adminlte.js') ?>"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Hapus '/kepalagudang' dari awal path agar pencocokan lebih akurat
            const rawPath = window.location.pathname.toLowerCase();
            const currentPath = rawPath.replace(/^\/kepalagudang/, '') || '/';

            const menuLinks = Array.from(document.querySelectorAll('#sidebar-menu a.nav-link'));

            let bestMatchLink = null;
            let longestMatchLength = 0;

            menuLinks.forEach(link => {
                const hrefRaw = link.getAttribute('href');
                if (!hrefRaw || hrefRaw === '#') return;

                // Ubah href ke path absolut dan hilangkan '/kepalagudang' juga
                const href = new URL(hrefRaw, window.location.origin).pathname.toLowerCase().replace(/^\/kepalagudang/, '') || '/';

                if (currentPath.startsWith(href) && href.length > longestMatchLength) {
                    longestMatchLength = href.length;
                    bestMatchLink = link;
                }
            });

            if (bestMatchLink) {
                bestMatchLink.classList.add('active');

                const treeviewMenu = bestMatchLink.closest('.nav-treeview');
                if (treeviewMenu) {
                    const parentItem = treeviewMenu.closest('.nav-item');
                    if (parentItem) {
                        const parentLink = parentItem.querySelector('a.nav-link');
                        if (parentLink) parentLink.classList.add('active');
                        parentItem.classList.add('menu-open');
                    }
                }
            }
        });
    </script>
</body>

</html>