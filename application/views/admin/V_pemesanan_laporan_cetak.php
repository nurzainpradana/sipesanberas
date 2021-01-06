
<div class="card">
    <div class="card-header text-center">
		<h4>Toko Beras Sriwijaya</h4>
		<h2>Laporan Penjualan</h2>
		<?php
		if(isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])){
			$mulai = $_GET['tanggal_mulai'];
			$sampai = $_GET['tanggal_sampai'];
		?>
		<?="Periode ".$mulai." Sampai ".$sampai;}?>
    </div>
    <div class="card-body">
		<div class="table-responsive">
		<table class="table table-bordered table-striped table-hover ">
			<thead>
			<tr>
				<th width="1%">No</th>
				<th>ID</th>
				<th>Tanggal</th>
				<th>ID Pembeli</th>
				<th>Total</th>
				<th>Status</th>
			</tr>
			</thead>
			<tbody>
			<?php 
			$no = 1;
			foreach($pemesanan as $p){
				?>
				<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $p->id_pemesanan; ?></td>
				<td><?php echo date('d-m-Y',strtotime($p->tgl_pemesanan)); ?></td>
				<td><?php echo $p->id_pembeli; ?></td>
				<td><?= "Rp. ".number_format($p->total,2,',','.') ?></td>
				<td><?php echo $p->status; ?></td>
				
				</tr>
				<?php 
			}
			?>
			</tbody>
		</table>
		</div>
    </div>
  </div>
</div>
<script type="text/javascript">
  window.print();
</script>
