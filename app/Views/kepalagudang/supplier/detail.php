<?= $this->extend('kepalagudang/layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="card card-secondary shadow">
            <div class="card-header">
                <div class="card-title">Detail Supplier</div>
            </div>
            <form id="formSupplier">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="nama_supplier" class="form-label">Nama Supplier</label>
                        <input name="nama_supplier" type="text" class="form-control" id="nama_supplier" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input name="alamat" type="text" class="form-control" id="alamat" required>
                    </div>
                    <div class="mb-3">
                        <label for="telp" class="form-label">Telepon</label>
                        <input name="telp" type="text" class="form-control" id="telp" required>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="button" id="btnUpdate" class="btn btn-secondary">Update Data</button>
                    <button type="button" id="btnDelete" class="btn btn-danger">Hapus Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const id = "<?= isset($id) ? $id : '' ?>";

    async function loadSupplierDetail() {
        try {
            const response = await fetch(`<?= base_url('/api/supplier/') ?>${id}`);
            const supplier = await response.json();

            document.getElementById('nama_supplier').value = supplier.nama_supplier || '';
            document.getElementById('alamat').value = supplier.alamat || '';
            document.getElementById('telp').value = supplier.telp || '';
        } catch (error) {
            console.error('Gagal mengambil data:', error);
        }
    }

    document.addEventListener('DOMContentLoaded', loadSupplierDetail);

    document.getElementById('btnUpdate').addEventListener('click', async function() {
        const formData = {
            nama_supplier: document.getElementById('nama_supplier').value,
            alamat: document.getElementById('alamat').value,
            telp: document.getElementById('telp').value
        };

        const response = await fetch(`<?= base_url('/api/supplier') ?>/${id}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(formData)
        });

        if (response.ok) {
            Swal.fire({
                title: 'Supplier',
                text: 'Data Berhasil Diupdate',
                icon: 'success',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
                position: 'center',
                allowOutsideClick: false
            });
        } else {
            Swal.fire({
                title: 'Supplier',
                text: 'Data Gagal Diupdate',
                icon: 'error',
                position: 'center',
                showConfirmButton: false,
            });
        }
    });

    document.getElementById('btnDelete').addEventListener('click', async function() {
        const result = await Swal.fire({
            title: 'Yakin ingin menghapus data ini?',
            text: "Tindakan ini tidak bisa dibatalkan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal',
            reverseButtons: true,
            customClass: {
                confirmButton: 'btn btn-danger',
                cancelButton: 'btn btn-secondary'
            },
            buttonsStyling: true
        });
        if (!result.isConfirmed) return;

        const response = await fetch(`<?= base_url('/api/supplier') ?>/${id}`, {
            method: 'DELETE'
        });

        if (response.ok) {
            Swal.fire({
                title: 'Supplier',
                text: 'Data Berhasil Dihapus',
                icon: 'success',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
                position: 'center',
                allowOutsideClick: false
            });
            setTimeout(() => {
                window.location.href = "<?= base_url('/kepalagudang/supplier') ?>";
            }, 1500);
        } else {
            Swal.fire({
                title: 'Supplier',
                text: 'Data Gagal Dihapus',
                icon: 'error',
                position: 'center',
                showConfirmButton: false,
            });
        }
    });
</script>
<?= $this->endSection() ?>