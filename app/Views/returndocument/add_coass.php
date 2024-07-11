<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<?php if (session()->getFlashdata('msg')) : ?>
    <div class="alert alert-danger" role="alert">
        <?= session()->getFlashdata('msg') ?>
    </div>
<?php endif; ?>

<form action="<?php echo base_url('/returndoccoass/update'); ?>" method="post">
    <!-- <input type="hidden" class="txt_csrfname" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" /> -->
    <!-- <div class="form-floating mb-3"> -->
    <!-- <input type="text" name="rmid" id="rmid" placeholder="RM.NO" value="" class="form-control"> -->

    <div class="mb-5">
        <label class="mb-3" for="searchtid">Cari Nomor Transaksi</label>
        <select id="searchid" name="tid" class="form-select">
            <option value=""></option>
        </select>
    </div>
    <div class="form-floating mb-3">
        <input type="text" id="rmid" class="form-control" readonly>
        <label for="rmid">RM.ID</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" id="patientname" class="form-control" readonly>
        <label for="patientname">Nama Pasien</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" id="poli" class="form-control" readonly>
        <label for="poli">Poli</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" id="loandate" class="form-control" readonly>
        <label for="loandate">Tanggal Pinjam</label>
    </div>
    <!-- <input type="hidden" name="tid" id="tid"> -->
    <div class="form-floating mb-3 dateformat">
        <input type="date" name="returndate" id="returndate" value="<?= date('Y-m-d'); ?>" placeholder="Tanggal Pengembalian" class="inputdate form-control">
        <label for="returndate">Tanggal Pengembalian</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" name="returndesc" id="returndesc" placeholder="Keterangan" value="" class="form-control">
        <label for="returndesc">Keterangan</label>
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button type="submit" class="btn btn-primary">Tambah</button>
    </div>
</form>

<script>
    $(document).ready(function() {
        $('#searchid').select2({
            placeholder: "Cari ID Transaksi",
            ajax: {
                url: "<?php echo base_url('/returndoccoass/searchdata') ?>",
                dataType: 'json',
                type: 'POST',
                delay: 250,
                data: function(params) {
                    return {
                        searchTerm: params.term
                    };
                },
                processResults: function(data) {
                    return {
                        results: data.data
                    };
                },
                cache: true
            }
        }).on('select2:select', function(e) {
            var selectedID = e.params.data.id;
            $.ajax({
                url: "<?php echo base_url('/returndoccoass/showdata') ?>", // Ganti dengan URL yang sesuai
                dataType: 'json',
                type: 'POST',
                data: {
                    id: selectedID
                },
                success: function(response) {
                    $('#tid').val(response[0].tid);
                    $('#rmid').val(response[0].rmid);
                    $('#patientname').val(response[0].patientname);
                    $('#poli').val(response[0].poli);
                    $('#loandate').val(response[0].loandate);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>

<script src="<?php echo base_url('/select2/dist/js/select2.min.js') ?>" type='text/javascript' defer></script>

<?= $this->endSection() ?>