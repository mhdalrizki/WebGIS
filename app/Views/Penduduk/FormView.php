<?= $this->extend('_Layouts/IndexView') ?>

<?= $this->section('content') ?>
<?php
//fungsi mengambil data
if ($getData != null) {
    extract($getData);
}




if (session()->getFlashdata('hasForm')) {
    extract(session()->getFlashdata('hasForm'));
}

?>
<div class="page-heading">

    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?= $title ?></h3>
                <p class="text-subtitle text-muted">For user to check they list</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="/<?= $url ?>"><?= $title ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $page ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h4><?= $page ?></h4>
                    </div>
                    <div>
                    </div>
                </div>

            </div>
            <div class="card-body">

                <?php
                if (session()->getFlashdata('validation')) {
                ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach (session()->getFlashdata('validation') as $item) : ?>
                                <li><?= $item ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                <?php
                }
                ?>


                <form action="<?= site_url($url . '/save') ?>" method="POST" id="formData" enctype="multipart/form-data">
                    <?= input_hidden('id', $id ?? '') ?>
                    <div class=" row">


                        <div class="col-md-8">
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <b>LOKASI</b>
                                    </div>
                                    <div class="panel-body">

                                        <div id="map" style="height: 600px;"></div>



                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="" class="mb-3">No KK</label>
                                <?= input_text('nokk', $nokk ?? '', '', 'required') ?>
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="mb-3">Kepala Keluarga</label>
                                <?= input_text('kepala_keluarga', $kepala_keluarga ?? '', '', 'required') ?>
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="mb-3">NIK Kepala Keluarga</label>
                                <?= input_text('nik_kepala', $nik_kepala ?? '', '', 'required') ?>
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="mb-3">RT</label>
                                <?= input_text('rt', $rt ?? '', '', 'required') ?>
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="mb-3">RW</label>
                                <?= input_text('rw', $rw ?? '', '', 'required') ?>
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="mb-3">Alamat</label>
                                <?= input_text('alamat', $alamat ?? '', '', 'required') ?>
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="mb-3">No Telepon</label>
                                <?= input_text('no_telepon', $no_telepon ?? '', '', 'required') ?>
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="mb-3">Jumlah Anggota KK</label>
                                <?= input_text('jumlah_anggota', $jumlah_anggota ?? '', '', 'required') ?>
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="mb-3">Keterangan Bantuan</label>
                                <?= input_text('keterangan_bantuan', $keterangan_bantuan ?? '', '', '') ?>
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="mb-3">Catatan</label>
                                <?= input_text('catatan', $catatan ?? '', '', '') ?>
                            </div>
                            <!-- <div class="form-group mb-3">
                                <label for="" class="mb-3">Latitude</label>
                                <?= input_text('latitude', $latitude ?? '', '', 'required') ?>
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="mb-3">Longitude</label>
                                <?= input_text('longitude', $longitude ?? '', '', 'required') ?>
                            </div> -->
                            <div class="form-group mb-3">
                                <label for="" class="mb-3">Latitude</label>
                                <input type="text" name="latitude" id="latitude" value="<?= $latitude ?? '' ?>">
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="mb-3">Longitude</label>
                                <input type="text" name="longitude" id="longitude" value="<?= $longitude ?? '' ?>">
                            </div>
                            <?php if (isset($foto)) : ?>
                                <a href="<?= uploaded($foto, 'penduduk') ?>" target="_BLANK">
                                    [lihat foto]
                                </a>
                            <?php endif ?>
                            <?= input_file('file', '', '', '') ?>
                            <div class="form-group mb-3">
                                <button class="btn btn-primary" type="submit"><i class="bi bi-save"></i> Simpan</button>
                                <a href="<?= site_url($url) ?>" class="btn btn-danger"><i class="bi bi-reply"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>


    </section>
</div>

<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script>
    let pristine;
    let elnokk = document.querySelector('[name=nokk]');
    let elId = document.querySelector('[name=id]');
    window.onload = function() {
        let form = document.getElementById("formData");

        pristine = new Pristine(form); //meload form

        elnokk.addEventListener('input', async (e) => {
            let get = await fetch('<?= site_url($url . '/check_kk') ?>/' + elnokk.value + '/' + elId.value);
            let resp = await get.json();
            if (!resp.status) {
                pristine.addError(elnokk, "No KK Sudah Digunakan");
            }
        });

        form.addEventListener('submit', function(e) {
            var valid = pristine.validate();
            if (!valid) {
                e.preventDefault();
            }
        });
    };






    <?= $this->endSection() ?>