<?= $this->extend('kepalagudang/layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="card card-secondary shadow">
            <div class="card-header">
                <div class="card-title">Daftar Barang</div>
                <div class="card-tools">
                    <a href="<?= base_url('/kepalagudang/barang/add') ?>" class="no-link-style me-2">
                        <i class="bi bi-plus-circle"></i>
                    </a>
                </div>
            </div>
            <div class="card-body p-3">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Barang</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th>Satuan</th>
                            <th>Kode Rak</th>
                            <th>Kadaluarsa</th>
                            <th>Supplier</th>
                        </tr>
                    </thead>
                    <tbody id="barangBody">
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
        const response = await fetch(`<?= base_url('/api/barang') ?>`);
        const data = await response.json();
        console.log(data);
        const tbody = document.getElementById('barangBody');

        tbody.innerHTML = '';

        data.forEach((user, index) => {
            const row = `
                <tr class="align-middle" style="cursor: pointer;" onclick="window.location='<?= base_url('/kepalagudang/barang/detail/') ?>${user.id}'">
                    <td>${index + 1}</td>
                    <td>${user.nama_barang}</td>
                    <td>${user.stok}</td>
                    <td>${Number(user.harga).toLocaleString('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0
                    })}</td>
                    <td>${user.satuan}</td>
                    <td>${user.kode_rak}</td>
                    <td>${new Date(user.tanggal_kadaluarsa).toLocaleDateString('id-ID', {
                    day: 'numeric',
                    month: 'long',
                    year: 'numeric'
                    })}</td>
                    <td>${user.nama_supplier}</td>
                </tr>
            `;
            tbody.insertAdjacentHTML('beforeend', row);
        });
    }

    document.addEventListener('DOMContentLoaded', loadAdminGudang);
</script>
<?= $this->endSection() ?>