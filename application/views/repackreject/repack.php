<div class="container-fluid">
  <!-- Page title -->
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col-auto">
        <h2 class="page-title">
          REPACK
        </h2>
      </div>
    </div>
  </div>
  <!-- Content here -->
  <div class="row">
    <div class="col-md-10 col-xs-12">
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">REPACK </h4>
            </div>
            <div class="card-body">
              <form name="autoSumForm" autocomplete="off" class="formValidate" id="formValidate" method="POST" action="<?php echo base_url(); ?>repackreject/input_repack">
                <div class="form-group mb-3">
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fa fa-barcode"></i>
                    </span>
                    <input type="text" readonly id="no_repack" name="no_repack" class="form-control" placeholder="No Repack" data-error=".errorTxt1" />
                  </div>
                </div>
                <div class="form-group mb-3">
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fa fa-calendar-o"></i>
                    </span>
                    <input type="text" value="" id="tgl_repack" name="tgl_repack" class="datepicker form-control date" placeholder="Tanggal" data-error=".errorTxt19" />
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <div class="input-icon">
                        <span class="input-icon-addon">
                          <i class="fa fa-barcode"></i>
                        </span>
                        <input type="hidden" readonly id="kodebarang" name="kodebarang" class="form-control" placeholder="Barang" />
                        <input type="text" readonly id="barang" name="barang" class="form-control" placeholder="Barang" />
                        <input type="hidden" id="cekdetailrepacktemp" name="cekdetailrepacktemp" class="form-control" data-error=".errorTxt1" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group mb-3">
                      <div class="input-icon">
                        <span class="input-icon-addon">
                          <i class="fa fa-file"></i>
                        </span>
                        <input type="text" style="text-align:right" value="" id="jumlah" name="jumlah" class="form-control" placeholder="Jumlah" data-error=".errorTxt19" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <a href="#" id="tambahbarang" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <table class="table table-striped table-hover" id="detailbarang">
                  <thead class="thead-dark">
                    <tr>
                      <th>Kode Produk</th>
                      <th>Nama Barang</th>
                      <th>Jml</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="loaddetailrepack">
                  </tbody>
                </table>
                <div class="mb-3 d-flex justify-content-end">
                  <button type="submit" name="submit" class="btn btn-primary btn-block mr-2" value="1"><i class="fa fa-send mr-2"></i>Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">DATA REPACK </h4>
            </div>
            <div class="card-body">
              <form method="POST" action="<?php echo base_url(); ?>repackreject/repack">
                <div class="form-group mb-3">
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fa fa-barcode"></i>
                    </span>
                    <input type="text" value="<?php echo $nomutasi; ?>" id="no_mutasi" name="no_mutasi" class="form-control" placeholder="No Repack" data-error=".errorTxt1" />
                  </div>
                </div>
                <div class="form-group mb-3">
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fa fa-calendar-o"></i>
                    </span>
                    <input type="text" value="<?php echo $tgl_mutasi; ?>" id="tgl_mutasi" name="tgl_mutasi" class="form-control datepicker" placeholder="Tanggal" data-error=".errorTxt1" />
                  </div>
                </div>
                <div class="mb-3 d-flex justify-content-end">
                  <button type="submit" name="submit" class="btn btn-primary btn-block mr-2" value="1"><i class="fa fa-search mr-2"></i>CARI</button>
                </div>
              </form>
              <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="mytable">
                  <thead class="thead-dark">
                    <tr>
                      <th>No</th>
                      <th>No. Repack</th>
                      <th>Tanggal</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sno  = $row + 1;
                    foreach ($result as $d) {
                      $tanggal = explode("-", $d['tgl_mutasi_gudang']);
                      $hari    = $tanggal[2];
                      $bulan   = $tanggal[1];
                      $tahun   = $tanggal[0];
                      $tgl     = $hari . "/" . $bulan . "/" . substr($tahun, 2, 2);
                    ?>
                      <tr>
                        <td><?php echo $sno; ?></td>
                        <td>
                          <a href="#" data-nomutasi="<?php echo $d['no_mutasi_gudang']; ?>" class="detail">
                            <?php echo $d['no_mutasi_gudang']; ?>
                          </a>
                        </td>
                        <td><?php echo $tgl; ?></td>
                        <td>
                          <a href="#" data-href="<?php echo base_url(); ?>repackreject/hapus_repack/<?php echo $d['no_mutasi_gudang']; ?>" class="btn btn-danger btn-sm hapus"><i class="fa fa-trash-o"></i></a>
                        </td>
                      </tr>
                    <?php
                      $sno++;
                    }
                    ?>
                  </tbody>
                </table>
                <div style='margin-top: 10px;'>
                  <?php echo $pagination; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <?php $this->load->view('menu/menu_gudangpusat_administrator'); ?>
    </div>
  </div>
</div>
<div class="modal modal-blur fade" id="hapusdata" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="modal-title">
          Yakin Untuk Di Hapus ?
        </div>
        <div>Jika Di Hapus, Kamu Akan Kehilangan Data Ini !</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-link link-secondary mr-auto" data-dismiss="modal">Cancel</button>
        <a class="btn btn-danger delete">Yes, Hapus !</a>
      </div>
    </div>
  </div>
</div>
<div class="modal modal-blur fade" id="detailmutasi" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title">Detail</h5>
      </div>
      <div class="modal-body">
        <div id="loadmutasi"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white mr-auto" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal modal-blur fade" id="databarang" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title">Barang</h5>
      </div>
      <div class="modal-body">
        <div id="loadBarang"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white mr-auto" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
  flatpickr(document.getElementById('tgl_mutasi'), {});
  flatpickr(document.getElementById('tgl_repack'), {});
</script>
<script>
  $(function() {
    $(".hapus").click(function(e) {
      e.preventDefault();
      var href = $(this).attr("data-href");
      //alert(href);
      $("#hapusdata").modal({
        backdrop: "static", //remove ability to close modal with click
        keyboard: false, //remove option to close with keyboard
        show: true //Display loader!
      });
      $(".delete").attr("href", href);
    });

    function loadRepack() {
      $("#loaddetailrepack").load('<?php echo base_url(); ?>repackreject/view_detail_repack_temp/');
    }

    function cekdetailrepacktemp() {
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>repackreject/cekdetailrepacktemp',
        cache: false,
        success: function(respond) {
          $("#cekdetailrepacktemp").val(respond);
        }
      });
    }
    cekdetailrepacktemp();
    loadRepack();
    $("#barang").click(function() {
      $("#databarang").modal("show");
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>oman/view_barang',
        cache: false,
        success: function(respond) {
          //alert(kodecabang);
          $("#loadBarang").html(respond);
        }
      });
    });

    $("#tambahbarang").click(function(e) {
      e.preventDefault();
      var kode_produk = $("#kodebarang").val();
      var jumlah = $("#jumlah").val();
      if (kode_produk == "") {
        swal("Oops!", "Silahkan Pilih Barang/Produk Terlebih Dahulu !", "warning");
      } else if (jumlah == "") {
        swal("Oops!", "Jumlah Tidak Boleh 0!", "warning");
      } else {
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url(); ?>repackreject/insert_detailrepacktemp',
          data: {
            kode_produk: kode_produk,
            jumlah: jumlah
          },
          cache: false,
          success: function(respond) {
            if (respond == 1) {
              swal("Oops!", "Data Untuk Produk " + kode_produk + " Sudah Ada!", "warning");
            } else {
              loadRepack();
              cekdetailrepacktemp();
            }
          }
        });
      }
    });

    $("#tgl_repack").change(function() {
      var tgl_repack = $("#tgl_repack").val();
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>repackreject/buat_nomor_repack',
        data: {
          tgl_repack: tgl_repack
        },
        cache: false,
        success: function(respond) {
          console.log(respond);
          $("#no_repack").val("");
          $("#no_repack").val(respond);
        }
      });
    });
    $(".formValidate").submit(function() {
      var no_repack = $("#no_repack").val();
      var tgl_repack = $("#tgl_permintaan").val();
      var cek = $("#cekdetailrepacktemp").val();
      if (no_repack == "") {
        swal("Oops!", "No Repack Masih Kosong!", "warning");
        return false;
      } else if (tgl_repack == "") {
        swal("Oops!", "Tanggal Repack Masih Kosong!", "warning");
        return false;
      } else if (cek == "") {
        swal("Oops!", "Data Barang Masih Kosong!", "warning");
        return false;
      } else {
        return true;
      }
    });

    $('.detail').click(function(e) {
      e.preventDefault();
      var nomutasi = $(this).attr('data-nomutasi');
      var jenis_mutasi = "REPACK";
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>repackreject/detail_mutasi',
        data: {
          nomutasi: nomutasi,
          jenis_mutasi: jenis_mutasi
        },
        cache: false,
        success: function(respond) {
          $("#loadmutasi").html(respond);
        }

      });
      $("#detailmutasi").modal("show");
    });
  })
</script>