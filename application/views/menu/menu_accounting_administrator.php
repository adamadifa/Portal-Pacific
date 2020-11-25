<?php
$level = $this->session->userdata('level_user');
if ($level == "Administrator" || $level == "manager accounting" || $level == "spv accounting") {
?>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        Cost Ratio
      </a>

      <a href="<?php echo base_url(); ?>accounting/costratiobiaya" class="list-group-item list-group-item-action">
        <i class="fa  fa-file-text mr-2"></i>Cost Ratio Biaya
      </a>
    </div>
  </div>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        Buku Besar
      </a>
      <a href="<?php echo base_url(); ?>accounting/view_saldoawal" class="list-group-item list-group-item-action">
        <i class="fa fa-file-text mr-2"></i>Saldo Awal Buku Besar
      </a>
      <a href="<?php echo base_url(); ?>accounting/view_accounting" class="list-group-item list-group-item-action">
        <i class="fa fa-file-text mr-2"></i>Buku Besar
      </a>
      <a href="<?php echo base_url(); ?>laporanaccounting/frmbukubesar" class="list-group-item list-group-item-action">
        <i class="fa fa-print mr-2"></i>Cetak Buku Besar
      </a>
    </div>
  </div>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        Laporan
      </a>

      <a href="<?php echo base_url(); ?>laporanpenjualan/costratio" class="list-group-item list-group-item-action">
        <i class="fa  fa-file-text mr-2"></i>Cost Rasio
      </a>
    </div>
  </div>
<?php } else { ?>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        Cost Ratio
      </a>

      <a href="<?php echo base_url(); ?>accounting/costratiobiaya" class="list-group-item list-group-item-action">
        <i class="fa  fa-file-text mr-2"></i>Cost Ratio Biaya
      </a>
    </div>
  </div>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        Laporan
      </a>

      <a href="<?php echo base_url(); ?>laporanpenjualan/costratio" class="list-group-item list-group-item-action">
        <i class="fa  fa-file-text mr-2"></i>Cost Rasio
      </a>
    </div>
  </div>
<?php } ?>