<div class="container-fluid">
  <!-- Page title -->
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col-auto">
        <h2 class="page-title">
          Cetak Jurnal Umum
        </h2>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-10">
      <div class="row">
        <div class="col-md-12">
          <!-- Content here -->
          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header bg-dark text-white">
                  <h4 class="card-title"> Cetak Jurnal Umum</h4>
                </div>
                <div class="card-body">
                  <form class="formValidate" autocomplete="off" id="formValidate" method="POST" action="<?php echo base_url(); ?>laporanaccounting/cetak_jurnalumum" target="_blank">

                    <div class="mb-3 form-group">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="input-icon">
                            <input type="text" id="dari" name="dari" class="form-control datepicker" placeholder="Dari" data-error=".errorTxt19" />
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

                        <div class="col-md-6 mb-3">
                          <div class="input-icon">
                            <input type="text" id="sampai" name="sampai" class="form-control datepicker" placeholder="Sampai" data-error=".errorTxt19" />
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

                    <!-- <div class="mb-3">
                      <select class="form-control selectoption" id="kode_akun" name="kode_akun">
                        <option value="">AKUN</option>
                        <?php foreach ($coa as $key => $d) { ?>
                          <option value="<?php echo $d->kode_akun; ?>"><?php echo $d->kode_akun; ?> | <?php echo $d->nama_akun; ?></option>
                        <?php } ?>
                      </select>
                    </div> -->

                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-6">
                          <button type="submit" name="cetak" class="btn btn-primary btn-block">
                            <i class="fa fa-print mr-2"></i>
                            CETAK
                          </button>
                        </div>
                        <div class="col-md-6">
                          <button type="submit" name="cetak" class="btn btn-success btn-block">
                            <i class="fa fa-download mr-2"></i>
                            EXPORT EXCEL
                          </button>
                        </div>
                      </div>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <?php $this->load->view('menu/menu_accounting_administrator'); ?>
    </div>
  </div>
</div>
<script>
  $(function() {
    $('.selectoption').selectize({});
  });
</script>
<script>
  flatpickr(document.getElementById('dari'), {});
  flatpickr(document.getElementById('sampai'), {});
</script>