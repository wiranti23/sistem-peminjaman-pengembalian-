<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>



<div class="mb-3 btn-group-sm btn-group">
    <a href="<?php echo base_url('/loanpublic?page_loanpublic=1') ?>" class="btn btn-outline-primary <?= ($type == 1) ? 'active' : '' ?>">UMUM/BPJS/JKN</a>
    <a href="<?php echo base_url('/loancoass?page_loancoass=1') ?>" class="btn btn-outline-primary <?= ($type == 2) ? 'active' : '' ?> ">CO.ass</a>
</div>

<div class=" mb-5">
    <form class="input-group" method="get" action="<?php echo base_url('/f/public/') ?>">
        <span class="input-group-text">Cari Data</span>
        <input type="text" name="id" class="form-control" placeholder="Masukkan ID Transaksi" aria-label="Recipient's username" aria-describedby="button-addon2">
        <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="lni lni-search"></i>Cari</button>
    </form>
</div>

<?php if ($role != 3) : ?>
    <div class="d-grid gap-2 mb-5 justify-content-md-end">
        <a class="btn btn-outline-info btn-sm me-md-2" href="<?php echo base_url('/loanpublic/add') ?>" role="button"><i class="lni lni-circle-plus"></i>Tambah</a>
    </div>
<?php endif ?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Peminjam</th>
            <th scope="col">Nomor Identitas</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($publicdata as $data) : ?>
            <tr>
                <th scope="row"><?= $nomor++; ?></th>
                <td><?= $data['fullname'] ?></td>
                <td><?= $data['identity_number'] ?></td>
                <td>
                    <div class="btn-group-vertical">
                        <a role="button" href="<?php echo base_url("/f/public/?id") . $data['id'] ?>" class="btn btn-outline-primary btn-sm"><i class="lni lni-eye"></i>Lihat</a>
                    <?php if ($role != 3) : ?>
                        <a role="button" href="<?php echo base_url("loanpublic/edit/") . $data['id'] ?>" class="btn btn-outline-warning btn-sm"><i class="lni lni-pencil-alt"></i>Edit</a>
                    <?php endif ?>
                    <?php if ($role != 3) : ?>    
                        <a class="btn btn-outline-danger btn-sm" href="<?= base_url('loanpublic/delete/' . $data['id'] . '/' . $data['rm_id']); ?>" onclick="javascript:return confirm('Apakah ingin menghapus data ini ?')">
                            <i class="lni lni-trash-can"></i>Hapus</a>
                    <?php endif ?>
                    </div>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?= $pager->links('loanpublic', 'bootstrap_pagination') ?>

<?= $this->endSection() ?>