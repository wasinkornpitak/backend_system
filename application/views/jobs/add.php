<style>

	#search_result{
		list-style: none;
		padding: 0px;
		width: 99%;
		position: absolute;
		margin: 0;
		display: inline-block;
	}

	#search_result li{
		background: #ffffff;
		padding: 4px;
		border: 1px solid #d4d4d4;
		border-top: none;
		z-index: 99;
		top: 100%;
		left: 0;
		right: 0;
	}

	#search_result li:hover{
		cursor: pointer;
		background: #d4d4d4;
	}

</style>

<!-- [ Layout wrapper ] Start -->
<div class="layout-wrapper layout-2">
	<div class="layout-inner">

		<!-- [ Layout container ] Start -->
		<div class="layout-container">

			<!-- [ Layout content ] Start -->
			<div class="layout-content">
				
				<!-- [ content ] Start -->
				<div class="container-fluid flex-grow-1 container-p-y">
					<h4 class="font-weight-bold py-3 mb-0">Jobs list</h4>
					<div class="text-muted small mt-0 mb-4 d-block breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
							<li class="breadcrumb-item">Jobs</li>
							<li class="breadcrumb-item active">Add jobs</li>
						</ol>
					</div>

					<!-- Filters -->
					<div class="card mb-4">
						<div class="card-body">
							<div class="form-row align-items-center">
								<div class="col-md-10 my-2">
									<label class="form-label">ค้นหา</label>
									<input type="text" id="txt_search" name="txt_search" class="form-control" placeholder="ชื่อ, เบอร์โทร, อีเมล">
									<ul id="search_result" class="autocomplete"></ul>
								</div>
								
								<div class="col-md col-xl-2 my-2">
									<label class="form-label d-none d-md-block">&nbsp;</label>
									<button type="button" class="btn btn-primary btn-block" onclick="get_customer()">Show</button>
								</div>
							</div>
						</div>
					</div>
					<!-- / Filters -->
					<form id="add_job_form" method="POST" role="form" autocomplete="off" data-toggle="validator">
						<div class="row">
							
							<!-- Tasks start -->
							<div id="job_detail" class="col-xl-8 col-md-12" style="display: none;">
								<div class="card ui-task mb-4">
									<h5 class="card-header">หมวดหมู่ปัญหา</h5>
									<div class="card-body">
										<div class="row">
											<div class="form-group col-sm-6">
												<label class="form-label">หมวดหมู่หลัก :</label>
												<select class="custom-select" id="job_category" name="job_category">
													<option value="">เลือก</option>
												</select>
												<div class="clearfix"></div>
											</div>
											<div class="form-group col-sm-6">
												<label class="form-label">หมวดหมู่ย่อย :</label>
												<select class="custom-select" id="job_sub_category" name="job_sub_category">
													<option value="">เลือก</option>
												</select>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
								</div>

								<div id="job_sub_detail" class="card ui-task mb-4" style="display: none;">
									
								</div>

							</div>

							<div id="customer_detail" class="col-xl-4 col-md-12" style="display: none;">
								<div class="card ui-task mb-4">
									<h5 class="card-header">ผู้เรียกงาน</h5>
									<div class="card-body">
										<div class="row">
											<div class="form-group col-sm-6">
												<label class="form-label">ชื่อ :</label>
												<p name="customer_name" id="customer_name"></p>
												<div class="clearfix"></div>
											</div>
											<div class="form-group col-sm-6">
												<label class="form-label">เบอร์โทร :</label>
												<p name="customer_tel" id="customer_tel"></p>
												<div class="clearfix"></div>
											</div>
											<div class="form-group col-sm-12">
												<label class="form-label">อีเมล :</label>
												<p name="customer_email" id="customer_email"></p>
												<div class="clearfix"></div>
											</div>
											<div class="form-group col-sm-12">
												<label class="form-label">ที่อยู่ :</label>
												<select class="custom-select" id="customer_addr" name="customer_addr">
													<option value="">เลือก</option>
												</select>
												<div class="clearfix"></div>
											</div>
											<input type="hidden" name="customer_id" id="customer_id" value="">
											<!-- <div class="form-group col-sm-12">
												<label class="form-label">จุดสังเกต :</label>
												<p></p>
												<div class="clearfix"></div>
											</div>
											<div class="form-group col-sm-12">
												<label class="form-label">รายละเอียดเพิ่มเติม :</label>
												<p></p>
												<div class="clearfix"></div>
											</div> -->
										</div>
									</div>
								</div>
							</div>
							<!-- Tasks end -->
							
						</div>

						<div id="btn_div" name="btn_div" class="text-right mt-3">
						</div>
					</form>


				</div>
				<!-- [ content ] End -->

			</div>
			<!-- [ Layout content ] End -->

		</div>
		<!-- [ Layout container ] End -->
	</div>

</div>
<!-- [ Layout wrapper] end -->


