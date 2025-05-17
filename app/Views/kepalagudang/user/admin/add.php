<?= $this->extend('kepalagudang/layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="card card-secondary shadow">
            <div class="card-header">
                <div class="card-title">Tambah Admin Gudang</div>
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
                    <button type="submit" class="btn btn-secondary">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('formAdminGudang').addEventListener('submit', async function(e) {
        e.preventDefault();

        const formData = {
            username: document.getElementById('username').value,
            password: document.getElementById('password').value,
            nama_lengkap: document.getElementById('nama_lengkap').value,
            alamat: document.getElementById('alamat').value,
            role: document.getElementById('role').value
        };

        const response = await fetch(`<?= base_url('/api/users') ?>`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(formData)
        });

        const text = await response.text();
        try {
            const result = JSON.parse(text);
            console.log(result);
            if (result?.status === "success") {
                Swal.fire({
                    title: 'Admin Gudang',
                    text: 'Data Berhasil Ditambahkan',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    position: 'center',
                    allowOutsideClick: false
                });
                setTimeout(() => {
                    window.location.href = '<?= base_url('/kepalagudang/user/admin') ?>';
                }, 1500);
            } else {
                alert('Gagal menambahkan admin gudang: ' + (result.message || 'Error'));
                Swal.fire({
                    title: 'Admin Gudang',
                    text: 'Data Gagal Ditambahkan',
                    icon: 'error',
                    position: 'center',
                    showConfirmButton: false,
                });
            }
        } catch (err) {
            console.error('JSON parse error:', text);
            alert('Respons dari server bukan JSON!');
        }
    });
</script>
<?= $this->endSection() ?>