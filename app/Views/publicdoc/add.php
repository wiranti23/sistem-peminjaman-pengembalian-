<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<?php if (session()->getFlashdata('msg')) : ?>
    <div class="alert alert-danger" role="alert">
        <?= session()->getFlashdata('msg') ?>
    </div>
<?php endif; ?>

<form action="<?php echo base_url('/public/store'); ?>" method="post">
    <div class="form-floating mb-3">
        <input type="text" name="fullname" id="fullname" placeholder="Nama Lengkap" class="form-control">
        <label for="fullname">Nama Lengkap</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" name="identitynumber" id="identitynumber" placeholder="NIK" class="form-control">
        <label for="coassnumber">NIP</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" name="address" id="address" placeholder="Alamat" class="form-control">
        <label for="phone">Alamat</label>
    </div>
    <label for="phone" class="form-label">Nomor Telpon Peminjam</label>
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">+62</span>
        <input type="tel" name="phone" id="phone" placeholder="Nomor Telpon Peminjam" value="" class="form-control">
    </div>
    <div class="mb-3">
        <label for="searchrm">Pilih Klinik</label>
        <select name="service" id="serivce" class="form-select">
            <?php foreach ($serviceunits as $serviceunit) : ?>
                <option value="<?= $serviceunit['id'] ?>"><?= $serviceunit['service_name'] ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button type="submit" class="btn btn-primary">Tambah</button>
    </div>
</form>

<script src="<?php echo base_url('/select2/dist/js/select2.min.js') ?>" type='text/javascript' defer></script>
<script>
    $(".inputdate").on("change", function() {
        this.setAttribute(
            "data-date",
            moment(this.value, "YYYY-MM-DD")
            .format(this.getAttribute("data-date-format"))
        )
    }).trigger("change")
</script>
<!-- <script type='text/javascript'>
    $(document).ready(function() {
        $('#search').select2({
            placeholder: "Pilih Rekam Medik"
        });
    });
</script> -->

<!-- <script>
    $(document).ready(function() {
        $('#searchrm').select2({
            placeholder: "Cari Rekam Medik",
            ajax: {
                url: "<?php echo base_url('/recordmedical/searchdata') ?>",
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
        });
    });
</script> -->

<?= $this->endSection() ?>