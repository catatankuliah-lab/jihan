<?= $this->extend('kepalagudang/layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="card card-secondary shadow">
            <div class="card-header">
                <div class="card-title">Tambah Supplier</div>
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
                        <label for="telp" class="form-label">No. Telepon</label>
                        <input name="telp" type="text" class="form-control" id="telp" required>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-secondary">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('formSupplier').addEventListener('submit', async function(e) {
        e.preventDefault();

        const formData = {
            nama_supplier: document.getElementById('nama_supplier').value,
            alamat: document.getElementById('alamat').value,
            telp: document.getElementById('telp').value
        };

        const response = await fetch(`<?= base_url('/api/supplier') ?>`, {
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
                    title: 'Supplier',
                    text: 'Data Berhasil Ditambahkan',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    position: 'center',
                    allowOutsideClick: false
                });
                setTimeout(() => {
                    window.location.href = '<?= base_url('/kepalagudang/supplier') ?>';
                }, 1500);
            } else {
                Swal.fire({
                    title: 'Supplier',
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