<?php $i = 0 ?>

<!-- Page heading -->
<div class="row">
    <div class="col-10">
        <h2>Gejala</h2>
    </div>
</div>

<!-- Flash message -->
<?php $this->load->view('_partial/flash_message') ?>

<!-- Table -->
<div class="row">
    <div class="col-6">
        <?php if ($gejalaa):?>
            <table class="awn-table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Gejala</th>
                        <th scope="col">Nama Gejala</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($gejalaa as $gejala): ?>
                    <?= ($i & 1) ? '<tr class="zebra">' : '<tr>'; ?>
                        <td><?= ++$i ?></td>
                        <td><?= $gejala->kd_gejala ?></td>
                        <td><?= $gejala->nama_gejala ?></td>
                        <td><?= anchor("gejala/edit/$gejala->id", 'Edit', ['class' => 'btn btn-warning']) ?></td>
                        <td>
                            <?= form_open("gejala/delete/$gejala->id") ?>
                                <?= form_hidden('id_gejala', $gejala->id) ?>
                                <?= form_button(['type' => 'submit', 'content' => 'Delete', 'class' => 'btn-danger']) ?>
                            <?= form_close() ?>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6">Jumlah : <?= isset($jumlah) ? $jumlah : '' ?></td>
                    </tr>
                </tfoot>
            </table>
        <?php else: ?>
            <p>Tidak ada data gejala.</p>
        <?php endif ?>
    </div>
</div>

<div class="row">
    <!-- Button create -->
    <div class="col-10">
        <?= anchor("gejala/create", 'Tambah', ['class' => 'btn btn-primary']) ?>
    </div>
</div>
