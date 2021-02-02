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
          DATA RETUR
        </h2>
      </div>
    </div>
  </div>
  <!-- Content here -->
  <div class="row">
    <div class="col-md-10 col-xs-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">DATA RETUR</h4>

        </div>
        <div class="card-body">
          <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>gudangbahan/retur" autocomplete="off">
            <div class="mb-3">
              <input type="text" value="<?php echo $nobukti; ?>" id="nobukti" name="nobukti" class="form-control" placeholder="No Bukti Retur" data-error=".errorTxt19" />
            </div>
            <div class="mb-3">
              <div class="row">
                <div class="col-md-12">
                  <div class="input-icon">
                    <input type="text" value="<?php echo $tgl_retur; ?>" id="tgl_retur" name="tgl_retur" class="datepicker form-control date" placeholder="Tanggal" data-error=".errorTxt19" />
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
          <a href="<?php echo base_url(); ?>gudangbahan/input_retur" class="btn btn-danger mb-3">Tambah Data</a>
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover" id="datatable">
              <thead class="thead-dark">
                <tr>
                  <th width="10px">No</th>
                  <th width="150px">No Bukti</th>
                  <th>Tanggal Masuk</th>
                  <th>Tanggal Diterima</th>
                  <th>Supplier</th>
                  <th>Jenis Retur</th>
                  <th width="190px">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no  = $row + 1;
                foreach ($result as $d) {
                  $nobukti = str_replace("/", ".", $d['nobukti_retur']);
                ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $d['nobukti_retur']; ?></td>
                    <td><?php echo DateToIndo2($d['tgl_retur']); ?></td>
                    <td><?php if (!empty($d['tgl_approve'])) {
                          echo DateToIndo2($d['tgl_approve']);
                        } ?></td>
                    <td><?php echo $d['nama_supplier']; ?></td>
                    <td><?php echo $d['jenis_retur']; ?></td>
                    <td>
                      <a href="#" data-nobukti="<?php echo $d['nobukti_retur']; ?>" class="btn btn-sm btn-primary detail">Detail</a>
                      <a href="#" data-href="<?php echo base_url(); ?>gudangbahan/hapusretur/<?php echo $nobukti; ?>" class="btn btn-sm btn-danger hapus">Hapus</a>
                      <!-- <a href="<?php echo base_url(); ?>gudangbahan/edit_retur/<?php echo $nobukti; ?>" class="btn btn-xs btn-warning">Edit</a> -->
                    </td>
                  </tr>
                <?php
                  $no++;
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
      <?php $this->load->view('menu/menu_gudangbahan_administrator'); ?>
    </div>
  </div>
</div>

<div class="modal modal-blur fade" id="detailretur" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl  modal-dialog-centered" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title">Detail</h5>
      </div>
      <div class="modal-body">
        <div id="loaddetailretur"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white mr-auto" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    flatpickr(document.getElementById('tgl_retur'), {});
  });
</script>

<script type="text/javascript">
  $(function() {

    $('.detail').click(function(e) {
      e.preventDefault();
      var nobukti = $(this).attr('data-nobukti');
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>gudangbahan/detail_retur',
        data: {
          nobukti: nobukti
        },
        cache: false,
        success: function(respond) {
          $("#loaddetailretur").html(respond);
          $("#detailretur").modal("show");
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