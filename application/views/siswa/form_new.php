<div class="row">
    <div class="col-10 no-margin">
        <h2>Siswa</h2>
    </div>
</div>

<?= form_open($form_action) ?>

    <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>

    <!-- nis -->
    <div class="row form-group">
        <div class="col-2">
            <?= form_label('Kode NG', 'kode_ng', ['class' => 'label']) ?>
        </div>
        <div class="col-4">
            <?= form_input('kode_ng') ?>
        </div>
        <div class="col-4">
            <?= form_error('kode_ng') ?>
        </div>
    </div>

    <!-- nama_siswa -->
    <div class="row form-group">
        <div class="col-2">
            <?= form_label('Jenis NG', 'jenis_ng', ['class' => 'label']) ?>
        </div>
        <div class="col-4">
            <?= form_input('jenis_ng') ?>
        </div>
        <div class="col-4">
            <?= form_error('jenis_ng') ?>
        </div>
    </div>

    <!-- jenis_kelamin 
    <div class="row form-group">
        <div class="col-2">
            <p class="label">Jenis Kelamin</p>
        </div>
        <div class="col-4">
            <label class="block-label">
                <?= form_radio('jenis_kelamin', 'L',
                    isset($input->jenis_kelamin) && ($input->jenis_kelamin == 'L') ? true : false)
                ?> Laki-laki
            </label>
            <label class="block-label">
                <?= form_radio('jenis_kelamin', 'P',
                    isset($input->jenis_kelamin) && ($input->jenis_kelamin == 'P') ? true : false)
                ?> Perempuan
            </label>
        </div>
        <div class="col-4">
            <?= form_error('jenis_kelamin') ?>
        </div>
    </div>-->

    <!-- nama_siswa -->
    <div class="row form-group">
        <div class="col-2">
            <?= form_label('Definisi', 'definisi', ['class' => 'label']) ?>
        </div>
        <div class="col-4">
            <?= form_input('definisi') ?>
        </div>
        <div class="col-4">
            <?= form_error('definisi') ?>
        </div>
    </div>

    <!-- nama_siswa -->
    <div class="row form-group">
        <div class="col-2">
            <?= form_label('Solusi', 'solusi', ['class' => 'label']) ?>
        </div>
        <div class="col-4">
            <?= form_input('solusi') ?>
        </div>
        <div class="col-4">
            <?= form_error('solusi') ?>
        </div>
    </div>

    <!-- submit button -->
    <div class="row">
        <div class="col-2">&nbsp;</div>
        <div class="col-8"><?= form_button(['type' => 'submit', 'content' => 'Simpan', 'class' => 'btn-primary']) ?></div>
    </div>
 <?= form_close() ?>
