<?php
function uang($nilai)
{
  return number_format($nilai, '0', '', '.');
}
?>

<div class="container-fluid">
  <!-- Page title -->
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col-auto">
        <h2 class="page-title">
          DATA JURNAL UMUM
        </h2>
      </div>
    </div>
  </div>
  <!-- Content here -->
  <div class="row">
    <div class="col-md-10 col-xs-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">DATA JURNAL UMUM</h4>

        </div>
        <div class="card-body">
          <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>accounting/view_jurnal_umum" autocomplete="off">
            <div class="mb-3">
              <select class="form-control selectoption" id="kode_akun" name="kode_akun">
                <option value="">AKUN</option>
                <?php foreach ($coa as $key => $d) { ?>
                  <option <?php if($kode_akun == $d->kode_akun){ echo "selected"; } ?> value="<?php echo $d->kode_akun; ?>"><?php echo $d->kode_akun; ?> | <?php echo $d->nama_akun; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="mb-3">
              <div class="row">
                <div class="col-md-6">
                  <div class="input-icon">
                    <input type="text" value="<?php echo $dari; ?>" id="dari" name="dari" class="datepicker form-control date" placeholder="Dari" data-error=".errorTxt19" />
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
                    <input type="text" value="<?php echo $sampai; ?>" id="sampai" name="sampai" class="datepicker form-control date" placeholder="Sampai" data-error=".errorTxt19" />
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
          <a href="<?php echo base_url(); ?>accounting/input_jurnal_umum" class="btn btn-danger mb-3">Tambah Data</a>
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover" id="datatable">
              <thead class="thead-dark">
                <tr>
                  <th>No</th>
                  <th>Nobukti</th>
                  <th>Tanggal</th>
                  <th>Keterangan</th>
                  <th>Kode Akun</th>
                  <th>Nama Akun</th>
                  <th>Debet</th>
                  <th>Kredit</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no  = 1;
                foreach ($data as $d) {
                ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $d->no_bukti; ?></td>
                    <td><?php echo DateToIndo2($d->tanggal); ?></td>
                    <td><?php echo $d->kode_akun; ?></td>
                    <td><?php echo $d->nama_akun; ?></td>
                    <td><?php echo $d->keterangan; ?></td>
                    <td align="right"><?php echo number_format($d->debet); ?></td>
                    <td align="right"><?php echo number_format($d->kredit); ?></td>
                    <td>Aksi</td>
                  </tr>
                <?php
                  $no++;
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <?php $this->load->view('menu/menu_accounting_administrator.php'); ?>
    </div>
  </div>
</div>

<script>
  $(function() {
    $('.selectoption').selectize({});
  });
</script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    flatpickr(document.getElementById('dari'), {});
    flatpickr(document.getElementById('sampai'), {});
  });
</script>

<script type="text/javascript">
  $(function() {

    $('.detail').click(function(e) {
      e.preventDefault();
      var kode_saldoawal_bb = $(this).attr('data-kode_saldoawal_bb');
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>accounting/detail_saldoawal',
        data: {
          kode_saldoawal_bb: kode_saldoawal_bb
        },
        cache: false,
        success: function(respond) {
          $("#loaddetailsaldoawal").html(respond);
          $("#detailsaldoawal").modal("show");
        }
      });
    });

    $(".hapus").click(function(e) {
      e.preventDefault();
      var getLink = $(this).attr('data-href');
      swal({
        title: 'Alert',
        text: 'Hapus Data ?',
        html: true,
        confirmButtonColor: '#d43737',
        showCancelButton: true,
      }, function() {
        window.location.href = getLink
      });
    });

  });
</script>