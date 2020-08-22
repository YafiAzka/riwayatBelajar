<div class="panel panel-default">
                        <div class="panel-heading">
                            Data Buku
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    
                                    <form method="POST">
                                        <div class="form-group">
                                            <label>Judul</label>
                                            <input class="form-control" name="judul" />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Pengarang</label>
                                            <input class="form-control" name="pengarang" />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Penerbit</label>
                                            <input class="form-control" name="penerbit" />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Tahun Terbit</label>
                                            <select class="form-control" name="tahun">
                                                <?php 
                                                $tahun= date("Y");

                                                for ($i=$tahun-30; $i <=$tahun ; $i++) 
                                                { 
                                                    echo '<option value="'.$i.'">'.$i.'</option>';                                                    
                                                }
                                                 ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Isbn</label>
                                            <input class="form-control" name="isbn"  />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Jumlah Buku</label>
                                            <input class="form-control" name="jumlah_buku" type="number" />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Lokasi</label>
                                            <select class="form-control" name="lokasi">
                                                <option value="rak 1">Rak 1</option>
                                                <option value="rak 2">Rak 2</option>
                                                <option value="rak 3">Rak 3</option>
                                            </select>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label>Tanggal Input</label>
                                            <input class="form-control" name="tgl_input" type="date" />
                                            
                                        </div>

                                        <div>
                                            <input class="btn btn-success" type="submit" name="simpan">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                        $judul=$_POST['judul'];
                        $pangarang=$_POST['pengarang'];
                        $penerbit=$_POST['penerbit'];
                        $tahun=$_POST['tahun'];
                        $isbn=$_POST['isbn'];
                        $jumlah_buku=$_POST['jumlah_buku'];
                        $lokasi=$_POST['lokasi'];
                        $tgl_input=$_POST['tgl_input'];

                        $simpan=$_POST['simpan'];

                        if ($simpan) {
                            $sql = $koneksi ->query("insert into tb_buku(judul,pengarang,penerbit,tahun_terbit,isbn,jumlah_buku,
                            lokasi,tgl_input)
                        value('$judul','$pangarang','$penerbit','$tahun','$isbn','$jumlah_buku','$lokasi','$tgl_input')");

                        if ($sql) {
                            ?>
                            <script type="text/javascript">
                                alert('Data Berhasil diinput');
                                window.location.href="?page=buku";
                            </script>
                            <?php  
                        }
                    }
                    ?>
                    
