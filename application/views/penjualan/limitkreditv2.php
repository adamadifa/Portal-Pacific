<div class="container-fluid">
  <!-- Page title -->
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col-auto">
        <h2 class="page-title">
          Data Pengajuan Limit Kredit Pelanggan
        </h2>
      </div>
    </div>
  </div>
  <!-- Content here -->
  <div class="row">
    <div class="col-md-10 col-xs-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Data Pengajuan Limit Kredit Pelanggan</h4>
        </div>
        <div class="card-body">
          <form method="POST" action="<?php echo base_url(); ?>penjualan/limitkreditv2" autocomplete="off">
            <?php if ($sess_cab == 'pusat') { ?>
              <div class="mb-3">
                <select name="cabang" id="cabang" class="form-select">
                  <option value="">-- Semua Cabang --</option>
                  <?php foreach ($cabang as $c) { ?>
                    <option <?php if ($cbg == $c->kode_cabang) {
                              echo "selected";
                            } ?> value="<?php echo $c->kode_cabang; ?>"><?php echo strtoupper($c->nama_cabang); ?></option>
                  <?php } ?>
                </select>
              </div>
            <?php } else { ?>
              <input type="hidden" name="cabang" id="cabang" value="<?php echo $sess_cab; ?>">
            <?php } ?>
            <div class="mb-3">
              <select name="salesman" id="salesman" class="form-select">
                <option value="">-- Semua Salesman --</option>
              </select>
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" value="<?php echo $pelanggan; ?>" name="pelanggan" placeholder="Nama Pelanggan">
            </div>
            <div class="mb-3">
              <div class="row">
                <div class="col-md-6">
                  <div class="input-icon">
                    <input id="dari" type="date" value="<?php echo $dari; ?>" placeholder="Dari" class="form-control" name="dari" />
                    <span class="input-icon-addon"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <rect x="4" y="5" width="16" height="16" rx="2" />
                        <line x1="16" y1="3" x2="16" y2="7" />
                        <line x1="8" y1="3" x2="8" y2="7" />
                        <line x1="4" y1="11" x2="20" y2="11" />
                        <line x1="11" y1="15" x2="12" y2="15" />
                        <line x1="12" y1="15" x2="12" y2="18" /></svg>
                    </span>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="input-icon">
                    <input id="sampai" type="date" value="<?php echo $sampai; ?>" placeholder="Sampai" class="form-control" name="sampai" />
                    <span class="input-icon-addon"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <rect x="4" y="5" width="16" height="16" rx="2" />
                        <line x1="16" y1="3" x2="16" y2="7" />
                        <line x1="8" y1="3" x2="8" y2="7" />
                        <line x1="4" y1="11" x2="20" y2="11" />
                        <line x1="11" y1="15" x2="12" y2="15" />
                        <line x1="12" y1="15" x2="12" y2="18" /></svg>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="mb-3 d-flex justify-content-end">
              <button type="submit" name="submit" class="btn btn-primary btn-block mr-2" value="1"><i class="fa fa-search mr-2"></i>CARI</button>
            </div>
          </form>
          <div class="alert alert-icon alert-danger" style="font-size:18px !important" role="alert">
            <i class="fa fa-bell mr-2" aria-hidden="true"></i>
            Sehubungan ada beberapa data pengajuan yang ter approve, sebelum di setujui oleh stakeholder terkait, maka dari itu ada beberpa perbaikan
            yang kami lakukan dalam proses pengajuan diantaranya :
            <ol>
              <li>
                Membuat Proses Pengajuan Baru, dengan ketentuan semua pengajuan limit kredit yang diajukan harus di approve oleh semua stakeholder yang terkait sampai ke direktur, sehingga
                semua pengajuan, dapat diketahui oleh semua stakeholder terutama Direktur.
              </li>
              <li>
                Untuk History Pengajuan Limit Kredit, dengan ketentuan sebelumnya bisa di lihat <a href="<?php echo base_url(); ?>penjualan/limitkredit"><b>Disini</b></a>
              </li>
              <li>
                Data Pengajuan Limit Kredit Pelanggan, yang ter approve sebelum disetujui oleh stakeholder terkait, maka data limit kredit tersebut
                akan di reset kembali terlebih dahulu, dan data pengajuan tersebut akan masuk ke data pengajuan limit kredit dengan ketentuan yang baru ini.
                untuk di approve kembali oleh stakeholder terkait yang belum melakukan approval di pengajuan sebelumnya.
              </li>
            </ol>
          </div>
          <a href="#" class="btn btn-danger mb-2" id="tambahpengajuan"> <i class="fa fa-plus mr-2"></i> Tambah Data </a>

          <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover" id="mytable">
              <thead class="thead-dark">
                <tr>
                  <th>No</th>
                  <th>No Pengajuan</th>
                  <th>Tanggal</th>
                  <th>Kode Pelanggan</th>
                  <th>Pelanggan</th>
                  <th>Salesman</th>
                  <th>Jumlah</th>
                  <th>Jatuh Tempo</th>
                  <!-- <th>Status</th>
                    <th>Ket</th> -->
                  <th>Kacab</th>
                  <th>MM</th>
                  <th>GM</th>
                  <th>Dirut</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sno   = $row + 1;
                foreach ($result as $d) {
                ?>
                  <tr>
                    <td><?php echo $sno; ?></td>
                    <td><?php echo $d['no_pengajuan']; ?></td>
                    <td><?php echo $d['tgl_pengajuan']; ?></td>
                    <td><?php echo $d['kode_pelanggan']; ?></td>
                    <td><?php echo $d['nama_pelanggan']; ?></td>
                    <td><?php echo $d['nama_karyawan']; ?></td>
                    <td align="right"><?php echo number_format($d['jumlah'], '0', '', '.'); ?></td>
                    <td>
                      <?php
                      if ($d['jatuhtempo'] == 14) {
                        $lama = "14 Hari";
                      } else if ($d['jatuhtempo'] == 30) {
                        $lama = "30 Hari";
                      } else if ($d['jatuhtempo'] == 45) {
                        $lama = "45 Hari";
                      } else if ($d['jatuhtempo'] == 60) {
                        $lama = "2 Bulan";
                      } else if ($d['jatuhtempo'] == 90) {
                        $lama = "3 Bulan";
                      } else if ($d['jatuhtempo'] == 180) {
                        $lama = "6 Bulan";
                      } else if ($d['jatuhtempo'] == 360) {
                        $lama = "1 Tahun";
                      } else {
                        $lama = "";
                      }

                      echo $lama;
                      ?>
                    </td>

                    <td>
                      <?php
                      if (empty($d['kacab'])) {
                      ?>
                        <span class="badge bg-orange"><i class="fa fa-history"></i></span>
                      <?php
                      } else if (
                        !empty($d['kacab']) && !empty($d['mm']) && $d['status'] == 2
                        or !empty($d['kacab']) && empty($d['mm']) && $d['status'] == 0
                        or !empty($d['kacab']) && !empty($d['mm']) && $d['status'] == 0
                        or !empty($d['kacab']) && !empty($d['mm']) && $d['status'] == 1
                      ) {
                      ?>
                        <span class="badge bg-green"><i class="fa fa-check"></i></span>
                      <?php
                      } else {
                      ?>
                        <span class="badge bg-red"><i class="fa fa-close"></i></span>
                      <?php
                      }
                      ?>
                    </td>
                    <td>
                      <?php
                      if (empty($d['mm'])) {
                      ?>
                        <span class="badge bg-orange"><i class="fa fa-history"></i></span>
                      <?php
                      } else if (
                        !empty($d['mm']) && !empty($d['gm']) && $d['status'] == 2
                        or !empty($d['mm']) && empty($d['gm']) && $d['status'] == 0
                        or !empty($d['mm']) && !empty($d['gm']) && $d['status'] == 0
                        or !empty($d['mm']) && !empty($d['gm']) && $d['status'] == 1
                      ) {
                      ?>
                        <span class="badge bg-green"><i class="fa fa-check"></i></span>
                      <?php
                      } else {
                      ?>
                        <span class="badge bg-red"><i class="fa fa-close"></i></span>
                      <?php
                      }
                      ?>
                    </td>
                    <td>
                      <?php
                      if (empty($d['gm'])) {
                      ?>
                        <span class="badge bg-orange"><i class="fa fa-history"></i></span>
                      <?php
                      } else if (
                        !empty($d['gm']) && !empty($d['dirut']) && $d['status'] == 2
                        or !empty($d['gm']) && empty($d['dirut']) && $d['status'] == 0
                        or !empty($d['gm']) && !empty($d['dirut']) && $d['status'] == 0
                        or !empty($d['gm']) && !empty($d['dirut']) && $d['status'] == 1
                      ) {
                      ?>
                        <span class="badge bg-green"><i class="fa fa-check"></i></span>
                      <?php
                      } else {
                      ?>
                        <span class="badge bg-red"><i class="fa fa-close"></i></span>
                      <?php
                      }
                      ?>
                    </td>
                    <td>
                      <?php
                      if (empty($d['dirut'])) {
                      ?>
                        <span class="badge bg-orange"><i class="fa fa-history"></i></span>
                      <?php
                      } else if (!empty($d['dirut']) && $d['status'] != 2) {
                      ?>
                        <span class="badge bg-green"><i class="fa fa-check"></i></span>
                      <?php
                      } else {
                      ?>
                        <span class="badge bg-red"><i class="fa fa-close"></i></span>
                      <?php
                      }
                      ?>
                    </td>
                    <td>
                      <?php if ($d['status'] == 0) { ?>
                        <a href="#" data-href="<?php echo base_url(); ?>penjualan/hapuspengajuanlimitv2/<?php echo $d['no_pengajuan']; ?>" class="btn btn-red btn-sm hapus"><i class="fa fa-trash-o"></i></a>
                      <?php } ?>
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
    <div class="col-md-2">
      <?php $this->load->view('menu/menu_penjualan_administrator'); ?>
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
<div class="modal modal-blur fade" id="pengajuanlimit" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title">Input Pengajuan Limit</h5>
      </div>
      <div class="modal-body">
        <div id="loadcontent"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white mr-auto" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    flatpickr(document.getElementById('dari'), {});
    flatpickr(document.getElementById('sampai'), {});
  });
</script>
<script>
  $(document).ready(function() {
    //$('#cabang').selectize({});


    function loadSalesman() {
      var cabang = $("#cabang").val();
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>laporanpenjualan/get_salesman',
        data: {
          cabang: cabang
        },
        cache: false,
        success: function(respond) {
          $('#salesman').selectize()[0].selectize.destroy();
          $("#salesman").html(respond);
          $('#salesman').selectize({});

        }
      });
    }
    loadSalesman();
    $("#cabang").change(function() {
      loadSalesman();
    });
    $(".hapus").click(function() {
      var href = $(this).attr("data-href");
      //alert(href);
      $("#hapusdata").modal({
        backdrop: "static", //remove ability to close modal with click
        keyboard: false, //remove option to close with keyboard
        show: true //Display loader!
      });
      $(".delete").attr("href", href);
    });

    $("#tambahpengajuan").click(function() {
      $("#pengajuanlimit").modal({
        backdrop: "static", //remove ability to close modal with click
        keyboard: false, //remove option to close with keyboard
        show: true //Display loader!
      });
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>penjualan/input_pengajuanlimitv2',
        cache: false,
        success: function(respond) {
          $('#loadcontent').html(respond);
        }
      });
    });


  });
</script>