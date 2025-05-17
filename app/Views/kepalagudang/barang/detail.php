<?= $this->extend('kepalagudang/layout') ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col-12">
        <div class="card card-secondary shadow">
            <div class="card-header">
                <div class="card-title">Detail Barang</div>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Nama Barang</label>
                    <input type="text" id="nama_barang" class="form-control" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Stok</label>
                    <input type="text" id="stok" class="form-control" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="text" id="harga" class="form-control" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Satuan</label>
                    <input type="text" id="satuan" class="form-control" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Kode Rak</label>
                    <input type="text" id="kode_rak" class="form-control" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Kadaluarsa</label>
                    <input type="text" id="tanggal_kadaluarsa" class="form-control" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Supplier</label>
                    <input type="text" id="nama_supplier" class="form-control" readonly>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const id = "<?= isset($id) ? $id : '' ?>";

    async function loadBarangDetail() {
        try {
            const response = await fetch(`<?= base_url('/api/barang/') ?>${id}`);
            const barang = await response.json();

            console.log(barang);

            document.getElementById('nama_barang').value = barang.nama_barang || '';
            document.getElementById('stok').value = barang.stok || '';
            document.getElementById('harga').value = Number(barang.harga).toLocaleString('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }) || '';
            document.getElementById('satuan').value = barang.satuan || '';
            document.getElementById('kode_rak').value = barang.kode_rak || '';
            document.getElementById('tanggal_kadaluarsa').value = new Date(barang.tanggal_kadaluarsa).toLocaleDateString('id-ID', {
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            }) || '';
            document.getElementById('nama_supplier').value = barang.nama_supplier || '';
        } catch (err) {
            console.error("Gagal memuat detail barang:", err);
        }
    }

    document.addEventListener('DOMContentLoaded', loadBarangDetail);
</script>

<?= $this->endSection() ?>