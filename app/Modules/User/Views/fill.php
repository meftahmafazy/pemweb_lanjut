<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<?php

use App\Models\ModelProdi;
use App\Models\ModelMhs;
use App\Models\ModelSurat;
?>
<div class="container">

  <!-- Title -->
  <center>
    <h1>PEMBUATAN SURAT MAHASISWA FMIPA ULM </h1>
  </center>
  <div class="row">
    <div class="col">

      <!-- Form -->
      <form action="<?= base_url('/surat/simpan') ?>" method="POST" enctype="multipart/form-data">

        <!-- Baris 1 -->
        <div class="form-group">
          <div class="form-row">

            <!-- Nama -->
            <div class="form-group col-md-6">
              <label for="inputName">Nama</label>
              <input type="text" class="form-control  <?= ($validation->hasError('nama_mahasiswa')) ? 'is-invalid' : ''; ?>" id="inputEmail4" name="nama_mahasiswa" value="<?= old('nama_mahasiswa'); ?>">
              <div id="validationServer03Feedback" class="invalid-feedback">
                <?= $validation->getError('nama_mahasiswa') ?>
              </div>
            </div>

            <!-- NIM -->
            <div class="form-group col-md-6">
              <label for="inputPassword4">NIM</label>
              <input type="text" class="form-control <?= ($validation->hasError('nim')) ? 'is-invalid' : ''; ?>" id="inputPassword4" name="nim" value="<?= old('nim'); ?>">
              <div id="validationServer03Feedback" class="invalid-feedback">
                <?= $validation->getError('nim') ?>
              </div>
            </div>
          </div>
        </div>
        <!-- Akhir Baris 1 -->

        <div class="form-group">
          <div class="form-row">
            <!-- Email -->
            <div class="form-group col-md-6">
              <label for="inputEmail4">Email</label>
              <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="inputEmail4" name="email" value="<?= old('email'); ?>">
              <div id="validationServer03Feedback" class="invalid-feedback">
                <?= $validation->getError('email') ?>
              </div>
            </div>

            <!--Angkatan -->
            <div class="form-group col-md-6">
              <label for="inputPassword4">Angkatan</label>
              <input type="text" class="form-control <?= ($validation->hasError('angkatan')) ? 'is-invalid' : ''; ?>" id="inputPassword4" name="angkatan" value="<?= old('angkatan'); ?>">
              <div id="validationServer03Feedback" class="invalid-feedback">
                <?= $validation->getError('angkatan') ?>
              </div>
            </div>
          </div>
        </div>
        <!-- Akhir Baris 2 -->

        <!-- Baris 3 -->
        <div class="form-group">
          <div class="form-row">

            <!-- Keperluan -->
            <div class="form-group col-md-6">
              <label for="inputAddress">Keperluan</label>
              <input type="text" class="form-control <?= ($validation->hasError('keperluan')) ? 'is-invalid' : ''; ?>" id="inputAddress" name="keperluan" value="<?= old('keperluan'); ?>">
              <div id="validationServer03Feedback" class="invalid-feedback">
                <?= $validation->getError('keperluan') ?>
              </div>
            </div>

            <!-- Tanggal Surat -->
            <div class="form-group col-md-6">
              <label for="inputAddress">Tanggal Surat</label>
              <div class="input-group input-daterange"> <input type="date" id="start" class="form-control" name="tanggal_surat" value="<?= old('tanggal_surat'); ?>" required></div>
            </div>

          </div>
        </div>
        <!-- Akhir Baris 3 -->

        <!-- Baris 4 -->
        <div class="form-group">
          <div class="form-row">

            <!-- Semester -->
            <div class="form-group col-md-3">
              <label for="inputState">Semester</label>
              <input type="text" class="form-control <?= ($validation->hasError('semester')) ? 'is-invalid' : ''; ?>" name="semester" id="inputAddress" placeholder="II" value="<?= old('semester'); ?>">
              <div id="validationServer03Feedback" class="invalid-feedback">
                <?= $validation->getError('semester') ?>
              </div>
            </div>

            <!-- Prodi -->
            <div class="form-group col-md-3">
              <label for="inputState">Program Studi</label>
              <select id="inputState" class="form-control" name="prodi" value="<?= old('prodi'); ?>" required>
                <option selected>Choose...</option>
                <?php
                foreach ($prodi as $row) {
                ?>
                  <option value="<?= $row['id_prodi'] ?>"> <?= $row['nama_prodi'] ?></option>
                <?php } ?>
              </select>
            </div>

            <!-- Jenis Surat -->
            <div class="form-group col-md-3">
              <label for="inputState">Jenis Surat</label>
              <select id="inputState" class="form-control" name="id_jenisSurat" value="<?= old('id_jenisSurat'); ?>" required>
                <option selected>Choose...</option>
                <?php
                foreach ($surat as $row) {
                ?>
                  <option value="<?= $row['id_jenisSurat'] ?>"> <?= $row['nama_jenisSurat'] ?></option>
                <?php } ?>
              </select>
            </div>

            <!-- Jenis Kelamin -->
            <div class="form-group col-md-3">
              <label for="inputState">Jenis Kelamin</label>
              <select id="inputState" class="form-control" name="jenis_kelamin" value="<?= old('jenis_kelamin'); ?>" required>
                <option selected>Choose...</option>
                <option name="jenis_kelamin" value="Laki-Laki">Laki-Laki</option>
                <option name="jenis_kelamin" value="Perempuan">Perempuan</option>
              </select>
            </div>
          </div>
        </div>
        <!-- Akhir Baris 4 -->

        <!-- Baris 5 -->
        <div class="form-group">
          <div class="form-row">
            <!-- Thumbnail Upload File -->

            <div class="col-md-2">
              <img src="/img/upload/default_user.png" class="img-thumbnail img-preview" width="120px">
            </div>

            <!-- Input Gambar -->
            <div class="col-md-10">
              <div class="custom-file">
                <input type="file" class="custom-file-input <?= ($validation->hasError('foto_mhs')) ? 'is-invalid' : ''; ?>" id="foto_mhs" name="foto_mhs" value="<?= old('foto_mhs'); ?>" onchange="previewImg()">
                <div id="validationServer03Feedback" class="invalid-feedback">
                  <?= $validation->getError('foto_mhs') ?>
                </div>
                <label class="custom-file-label" for="foto_mhs">Masukkan KTM Anda</label>
              </div>
            </div>
          </div>
        </div>
        <!-- Akhir Baris 5 -->

        <center>
          <button type="submit" class="btn btn-primary" name="daftar">Simpan</button>
          <button type="reset" class="btn btn-danger" name="daftar">Ulang</button>
        </center>
    </div>
    </form>
  </div>
</div>
</div>

<?= $this->endSection(); ?>