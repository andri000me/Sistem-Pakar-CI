<div class="row">
    <div class="col-10 no-margin">
        <h2>Kelas</h2>
    </div>
</div>

<?= form_open($form_action) ?>

    <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>

    <!-- Gejala -->
    <div class="row form-group">
      <div class="col-2">
            <?= form_label('Kode Gejala', 'kode_gejala', ['class' => 'label']) ?>
        </div>
        <div class="col-4">
            <?= form_input('kode_gejala', $input->kd_gejala) ?>
        </div>
        <div class="col-4">
            <?= form_error('kode_gejala') ?>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-2">
            <?= form_label('Nama Gejala', 'nama_gejala', ['class' => 'label']) ?>
        </div>
        <div class="col-4">
            <?= form_input('nama_gejala', $input->nama_gejala) ?>
        </div>
        <div class="col-4">
            <?= form_error('nama_gejala') ?>
        </div>
    </div>

    <!-- submit button -->
    <div class="row">
        <div class="col-2">&nbsp;</div>
        <div class="col-8"><?= form_button(['type' => 'submit', 'content' => 'Simpan', 'class' => 'btn-primary']) ?></div>
    </div>
 <?= form_close() ?>
