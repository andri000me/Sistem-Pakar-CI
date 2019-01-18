<?php
    // Login?
    $is_login = $this->session->userdata('is_login');

    $perPage = 5;
    $keywords = $this->input->get('keywords');

    if (isset($keywords)) {
        $page = $this->uri->segment(3);
    } else {
        $page = $this->uri->segment(2);
    }
?>

<!-- Page heading -->
<div class="row">
    <div class="col-10">
        <h2>Konsultasi</h2>
    </div>
</div>

<!-- Flash message -->
<?php $this->load->view('_partial/flash_message') ?>

<!--Searh form -->
<div class="row">
    <div class="col-5">
        &nbsp;
    </div>
    <div class="col-5 align-right">
    </div>
</div>

<!-- Gejala -->
<?php if ($gejalaa): ?>
    <?php foreach($gejalaa as $gejala): ?>
        <div class="row judul">
            <hr class="hr-row">
            <div class="col-7">
                <dl>
                    <dt>Kode Gejala</dt>
                    <dd><?= $gejala->kd_gejala ?></dd>
                    <dd>Apakah <?= $gejala->nama_gejala ?> ?</dd>
                </dl>
            </div>
            <?= form_open('konsultasi/proses', ['method' => 'POST']) ?>
                <!-- jenis_kelamin--> 
                <div class="row form-group">
                    <div class="col-4">
                        <?= form_hidden('kd_gejala', $gejala->kd_gejala) ?>
                        <label class="block-label">
                            <?= form_radio('answer', 'yes',
                                isset($input->answer) && ($input->answer == 'yes') ? true : false)
                            ?> Ya
                        </label>
                        <label class="block-label">
                            <?= form_radio('answer', 'no',
                                isset($input->answer) && ($input->answer == 'no') ? true : false)
                            ?> Tidak
                        </label>
                    </div>
                    <div class="col-4">
                        <?= form_error('answer') ?>
                    </div>
                    <?php endforeach ?>
                      <!-- submit button -->
                    <div class="row">
                        <div class="col-2">&nbsp;</div>
                        <div class="col-8"><?= form_button(['type' => 'submit', 'content' => 'Lanjutkan', 'class' => 'btn-primary']) ?></div>
                    </div>
                </div>
            <?= form_close() ?>
        </div>
    
<?php else: ?>
    <div class="row">
        <div class="col-10">
            <p>Tidak ada data judul buku.</p>
        </div>
    </div>
<?php endif ?>