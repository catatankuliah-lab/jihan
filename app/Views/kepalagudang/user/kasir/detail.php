<?= $this->extend('kepalagudang/layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="card card-secondary shadow">
            <div class="card-header">
                <div class="card-title">Detail Kasir Toko</div>
            </div>
            <form id="formAdminGudang">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input name="username" type="text" class="form-control" id="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                        <input name="nama_lengkap" type="text" class="form-control" id="nama_lengkap" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input name="alamat" type="text" class="form-control" id="alamat" required>
                    </div>
                    <input name="role" id="role" type="hidden" value="admin_gudang">
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
    async function loadUserDetail() {
        try {
            const response = await fetch(`<?= base_url('/api/users/') ?>${id}`);
            const user = await response.json();

            document.getElementById('username').value = user.username;
            document.getElementById('password').value = '';
            document.getElementById('nama_lengkap').value = user.nama_lengkap;
            document.getElementById('alamat').value = user.alamat;
            document.getElementById('role').value = user.role;
        } catch (error) {
            console.error('Gagal mengambil data:', error);
        }
    }
    document.addEventListener('DOMContentLoaded', loadUserDetail);
    document.getElementById('btnUpdate').addEventListener('click', async function() {
        const formData = {
            username: document.getElementById('username').value,
            password: document.getElementById('password').value,
            nama_lengkap: document.getElementById('nama_lengkap').value,
            alamat: document.getElementById('alamat').value,
            role: document.getElementById('role').value
        };

        const response = await fetch(`<?= base_url('/api/users') ?>/${id}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(formData)
        });
        if (response.ok) {
            Swal.fire({
                title: 'Kasir Toko',
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
                title: 'Kasir Toko',
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

        const response = await fetch(`<?= base_url('/api/users') ?>/${id}`, {
            method: 'DELETE'
        });

        if (response.ok) {
            Swal.fire({
                title: 'Kasir Toko',
                text: 'Data Berhasil Dihapus',
                icon: 'success',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
                position: 'center',
                allowOutsideClick: false
            });
            setTimeout(() => {
                window.location.href = "<?= base_url('/kepalagudang/user/kasir') ?>";
            }, 1500);
        } else {
            Swal.fire({
                title: 'Kasir Toko',
                text: 'Data Gagal Dihapus',
                icon: 'error',
                position: 'center',
                showConfirmButton: false,
            });
        }
    });
</script>
<?= $this->endSection() ?>