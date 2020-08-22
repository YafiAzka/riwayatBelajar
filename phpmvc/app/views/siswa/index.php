<div class="container mt-4 pb-3">

  <div class="row">
    <div class="col-lg-6">
      <?php Flasher::flash(); ?>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-lg-6">
      <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
        Tambah Siswa
      </button>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6">
      <form action="<?= BASEURL; ?>/siswa/cari" method="POST">
        <div class="input-group ">
          <input type="text" class="form-control" placeholder="Cari Siswa.." id="keyword" name="keyword" autocomplete="off" >
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit" id="tombolCari">Cari..</button>
          </div>
        </div>
      </form>
    </div>
  </div>


    <div class="row">
        <div class="col-lg-6">
            <h3 class="mt-3">Daftar Siswa</h3>
            <ul class="list-group shadow">
                <?php foreach ($data['sis'] as $sis) :  ?>
                    <li class="list-group-item ">
                        <?= $sis['nama']; ?>
                        <a href="<?= BASEURL ?>/siswa/hapus/<?= $sis['id']; ?>" class="badge badge-danger float-right ml-1 tombol-hapus ">hapus</a>
                        <a href="<?= BASEURL ?>/siswa/ubah/<?= $sis['id']; ?>" class="badge badge-success float-right ml-1 tampilModalUbah" data-toggle="modal" data-target="#formModal" data-id="<?= $sis['id']?>">ubah</a>
                        <a href="<?= BASEURL ?>/siswa/detail/<?= $sis['id']; ?>" class="badge badge-primary float-right ml-1 ">detail</a>
                        
                    </li>
                <?php endforeach; ?>
            </ul>

        </div>
    </div>


</div>


<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLable" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLable">Tambah Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="<?= BASEURL ?>/siswa/tambah" method="POST">
        <div class="form-group">
          <input type="hidden" name="id" id="id">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama">

            <label for="nis">NIS</label>
            <input type="number" class="form-control" id="nis" name="nis">

            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com">

            <label for="jurusan">Jurusan</label>
                <select class="form-control" id="jurusan" name="jurusan">
                    <option value="Rekayasa Perangkat Lunak">Rekayasa Perangakat Lunak</option>
                    <option value="Teknik Jaringan Akses">Teknik Jaringan Akses</option>
                    <option value="Multimedia">Multimedia</option>
                </select>
        </div>
                
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>