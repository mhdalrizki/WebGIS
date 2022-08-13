<?= $this->extend('_Layouts/Index') ?>

<?= $this->section('content') ?>
<?php
//fungsi mengambil data
if ($getData != null) {
    extract($getData);

    
}


?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?= $title ?></h3>
                <p class="text-subtitle text-muted">For user to check they list</p>
            </div>
           
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
               
            </div>
            <div class="card-body">
                <div id="map" style="height: 580px;"></div>
            </div>
        </div>

    </section>
</div>



<?= $this->endSection() ?>

<?= $this->section('style') ?>
<?= $this->endSection() ?>

