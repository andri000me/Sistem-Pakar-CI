<div class="row">
    <div class="col-10">
        <h2>Home</h2>
    </div>
</div>

<?php
    $is_login = $this->session->userdata('is_login');
    $username = $this->session->userdata('username');
?>

<?php if ($is_login): ?>
    <div class="row">
        <div class="col-10">
        <p>Halo, <strong><?= $username ?></strong>!</p>
            <p>Selamat Bekerja.</p>
        </div>
    </div>
<?php else: ?>
    <div class="row">
        <div class="col-10">
            <p>Selamat datang di Sistem Pakar Kualitas Bonde </p>
            <p>Untuk melakukan konsultasi, gunakan menu <strong>"Konsultasi"</strong>.</p>
        </div>
    </div>
<?php endif ?>