<?php $this->load->view("admin/_partials/head.php")?>
<?php $this->load->view("admin/_partials/sidebar.php")?>
<?php $this->load->view("admin/_partials/navbar.php")?>
	<!-- Begin Page Content -->
		<div class="container-fluid">
	<!-- Page Heading -->
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800">
<?php $this->load->view("admin/_partials/breadcrumb.php")?>
			</h1>
		</div>
	<!-- Data Tables -->
	<div class="card mb-3">
			<div class="card-header">
				<a class="btn btn-primary" href="<?php echo site_url('admin/masuk/add') ?>"><i class="fas fa-plus"></i> Tambah </a>
			</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-hover" id="dataTable" width="100%"
			cellspacing="0">
			<thead>
			<tr>
			<th>No Pendapatan</th>
			<th>Tanggal Pendapatan</th>
			<th>Keterangan</th>
			<th>Jumlah Pendapatan</th>
			<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($pendapatan as $masuk): ?>
				<tr>
				<td width="150">
				<?php echo $masuk->no_pendapatan ?>
				</td>
				<td>
				<?php echo $masuk->tgl_pendapatan ?>
				</td>
				<td>
				<?php echo $masuk->keterangan ?>
				</td>
				<td>
				<?php echo $masuk->jumlah_pendapatan ?>
				</td>
				<td>
				<a href="<?php echo site_url('admin/masuk/edit/'.$masuk->pendapatan_id) ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit </a>
				<a href="<?php echo site_url('admin/masuk/delete/'.$masuk->pendapatan_id) ?>" class="btn btn-small
				text-danger"><i class="fas fa-trash"></i> Hapus </a>
				</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
</div>
</div>
</div>
	<!-- End of Main Content -->

	<!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Kelompok 7 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

<?php $this->load->view("admin/_partials/js.php")?>