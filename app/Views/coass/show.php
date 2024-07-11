<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<?php if (session()->getFlashdata('msg')) : ?>
    <div class="alert alert-danger" role="alert">
        <?= session()->getFlashdata('msg') ?>
    </div>
<?php endif; ?>

<input type="hidden" name="tid" value="<?= $coass['id'] ?>">
<div class="form-floating mb-3">
    <input type="text" id="fullname" placeholder="Nama Lengkap Koass" value="<?= $coass['coass_name'] ?>" class="form-control" readonly>
    <label for="fullname">Nama Koass</label>
</div>
<div class="form-floating mb-3">
    <input type="text" id="coassnumber" placeholder="NIM" value="<?= $coass['coass_number'] ?>" class="form-control" readonly>
    <label for="coassnumber">NIM</label>
</div>
<div class="form-floating mb-3">
    <input type="tel" id="phone" placeholder="Nomor Telpon Coass" value="<?= $coass['phone'] ?>" class="form-control" readonly>
    <label for="phone">Nomor Telpon Coass</label>
</div>
<div class="form-floating mb-3">
    <input type="text" id="clinic" placeholder="Nama Klinik" value="<?= $coass['service_name'] ?>" class="form-control" readonly>
    <label for="clinic">Klinik</label>
</div>

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

<?= $this->endSection() ?>