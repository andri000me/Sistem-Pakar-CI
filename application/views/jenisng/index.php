<?php
    $perPage = 10;
    $keywords = $this->input->get('keywords');

    if (isset($keywords)) {
        $page = $this->uri->segment(3);
    } else {
        $page = $this->uri->segment(2);
    }

    // No urut data tabel.
    $i = isset($page) ? $page * $perPage - $perPage : 0;
?>

<!-- Page heading -->
<div class="row">
    <div class="col-10">
        <h2>Jenis NG</h2>
    </div>
</div>

<!-- Flash message -->
<?php $this->load->view('_partial/flash_message') ?>

<!-- Table -->
<div class="row">
    <div class="col-10">
        <?php if ($jenisng):?>
            <table class="awn-table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode NG</th>
                        <th scope="col">Jenis NG</th>
                        <th scope="col">Definisi</th>
                        <th scope="col">Solusi</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($jenisng as $jenis): ?>
                    <?= ($i & 1) ? '<tr class="zebra">' : '<tr>'; ?>
                        <td><?= ++$i ?></td>
                        <td><?= $jenis->kd_NG ?></td>
                        <td><?= $jenis->jenis_NG ?></td>
                        <td><?= $jenis->definisi ?></td>
                        <td><?= $jenis->solusi ?></td>
                        <td><?= anchor("jenis_ng/edit/$jenis->id", 'Edit', ['class' => 'btn btn-warning']) ?></td>
                        <td>
                            <?= form_open("jenis_ng/delete/$jenis->id") ?>
                                <?= form_hidden('id', $jenis->id) ?>
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
            <p>Tidak ada data Jenis NG.</p>
        <?php endif ?>
    </div>
</div>

<div class="row">
    <!-- Button create -->
    <div class="col-5">
        <?= anchor("jenis_ng/create", 'Tambah', ['class' => 'btn btn-primary']) ?>
    </div>
</div>
