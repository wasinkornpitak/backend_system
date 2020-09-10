	<div class="layout-wrapper layout-2">
		<div class="layout-container">
			<!-- [ Layout footer ] Start -->
			<nav class="layout-footer footer footer-light">
				<div class="container-fluid d-flex flex-wrap justify-content-between text-center container-p-x pb-3">
					<div class="pt-3">
						<span class="float-md-right d-none d-lg-block">&copy; Exclusive on Themeforest | Hand-crafted &amp; Made with <i class="fas fa-heart text-danger mr-2"></i></span>
					</div>
					<div>
						<a href="javascript:" class="footer-link pt-3">About Us</a>
						<a href="javascript:" class="footer-link pt-3 ml-4">Help</a>
						<a href="javascript:" class="footer-link pt-3 ml-4">Contact</a>
						<a href="javascript:" class="footer-link pt-3 ml-4">Terms &amp; Conditions</a>
					</div>
				</div>
			</nav>
			<!-- [ Layout footer ] End -->
		</div>
		<!-- Overlay -->
		<div class="layout-overlay layout-sidenav-toggle"></div>
	</div>

	<!-- Core scripts -->
    <script src="<?=base_url()?>assets/js/pace.js"></script>
	<!-- <script src="<?=base_url()?>assets/js/jquery-3.3.1.min.js"></script> -->
	<!-- <script src="<?=base_url()?>assets/js/jquery-3.2.1.min.js"></script> -->
    <script src="<?=base_url()?>assets/libs/popper/popper.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.js"></script>
    <script src="<?=base_url()?>assets/js/sidenav.js"></script>
    <script src="<?=base_url()?>assets/js/layout-helpers.js"></script>
    <script src="<?=base_url()?>assets/js/material-ripple.js"></script>

    <!-- Libs -->
	<script src="<?=base_url()?>assets/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
	<script src="<?=base_url()?>assets/libs/moment/moment.js"></script>
	<script src="<?=base_url()?>assets/libs/bootstrap-datepicker/bootstrap-datepicker.js"></script>
	<script src="<?=base_url()?>assets/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js"></script>
	<script src="<?=base_url()?>assets/libs/bootstrap-material-datetimepicker/bootstrap-material-datetimepicker.js"></script>
	<script src="<?=base_url()?>assets/libs/timepicker/timepicker.js"></script>
    <script src="<?=base_url()?>assets/libs/minicolors/minicolors.js"></script>
	<script src="<?=base_url()?>assets/libs/datatables/datatables.js"></script>
	<script src="<?=base_url()?>assets/libs/smartwizard/smartwizard.js"></script>
    <script src="<?=base_url()?>assets/libs/validate/validate.js"></script>

    <!-- Demo -->
	<script src="<?=base_url()?>assets/js/demo.js"></script>
	<script src="<?=base_url()?>assets/js/analytics.js"></script>

	<? 
	if(!empty($js)){
		foreach($js as $value) {?>
			<script type="text/javascript" src="<?=base_url()?>assets/<?=$value?>"></script>
		<?}
	}?>

</body>


<?php
	$jsVar = array();
	$jsVar['base_url'] = base_url();
	$jsVar['ajax_url'] = $this->config->item('ajax_url');
?>

	<script type="text/javascript">
		var jsVar = <?=json_encode($jsVar)?>;
	</script>

</html>
