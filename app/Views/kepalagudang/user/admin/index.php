<?= $this->extend('kepalagudang/layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="card card-secondary shadow">
            <div class="card-header">
                <div class="card-title">Daftar Admin Gudang</div>
                <div class="card-tools">
                    <a href="<?= base_url('/kepalagudang/user/admin/add') ?>" class="no-link-style me-2">
                        <i class="bi bi-plus-circle"></i>
                    </a>
                </div>
            </div>
            <div class="card-body p-3">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Nama Lengkap</th>
                            <th>Alamat</th>
                        </tr>
                    </thead>
                    <tbody id="adminGudangBody">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    .no-link-style {
        color: inherit;
        text-decoration: none;
    }

    .no-link-style:hover,
    .no-link-style:focus {
        color: inherit;
        text-decoration: none;
        cursor: pointer;
    }
</style>

<script>
    async function loadAdminGudang() {
        const response = await fetch(`<?= base_url('/api/users/admingudang') ?>`);
        const data = await response.json();
        const tbody = document.getElementById('adminGudangBody');

        tbody.innerHTML = '';

        data.forEach((user, index) => {
            const row = `
                <tr class="align-middle" style="cursor: pointer;" onclick="window.location='<?= base_url('/kepalagudang/user/admin/detail/') ?>${user.id}'">
                    <td>${index + 1}</td>
                    <td>${user.nama_lengkap}</td>
                    <td>${user.alamat}</td>
                </tr>
            `;
            tbody.insertAdjacentHTML('beforeend', row);
        });
    }

    document.addEventListener('DOMContentLoaded', loadAdminGudang);
</script>
<?= $this->endSection() ?>