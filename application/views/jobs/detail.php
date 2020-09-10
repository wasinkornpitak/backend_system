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
							<li class="breadcrumb-item active">Jobs detail</li>
						</ol>
					</div>

					<!-- Status employee -->
					<div id="smartwizard-3" class="smartwizard-example sw-main sw-theme-default">
						<ul class="card px-4 pt-3 mb-3 nav nav-tabs step-anchor">
							<li class="nav-item active">
								<a href="#smartwizard-3-step-1" class="mb-3 nav-link">
									<span class="sw-done-icon ion ion-md-checkmark"></span>
									<span class="sw-number">1</span>
									<div class="text-muted small">ขั้นตอน</div>แจ้งงาน
								</a>
							</li>
							<li class="nav-item">
								<a href="#smartwizard-3-step-2" class="mb-3 nav-link">
									<span class="sw-done-icon ion ion-md-checkmark"></span>
									<span class="sw-number">2</span>
									<div class="text-muted small">ขั้นตอน</div>ช่างเลือกงาน
								</a>
							</li>
							<li class="nav-item">
								<a href="#smartwizard-3-step-3" class="mb-3 nav-link">
									<span class="sw-done-icon ion ion-md-checkmark"></span>
									<span class="sw-number">3</span>
									<div class="text-muted small">ขั้นตอน</div>เลือกช่าง
								</a>
							</li>
							<li class="nav-item">
								<a href="#smartwizard-3-step-1" class="mb-3 nav-link">
									<span class="sw-done-icon ion ion-md-checkmark"></span>
									<span class="sw-number">4</span>
									<div class="text-muted small">ขั้นตอน</div>นัดวันเข้าทำ
								</a>
							</li>
							<li class="nav-item">
								<a href="#smartwizard-3-step-2" class="mb-3 nav-link">
									<span class="sw-done-icon ion ion-md-checkmark"></span>
									<span class="sw-number">5</span>
									<div class="text-muted small">ขั้นตอน</div>ช่างเข้าทำ
								</a>
							</li>
							<li class="nav-item">
								<a href="#smartwizard-3-step-3" class="mb-3 nav-link">
									<span class="sw-done-icon ion ion-md-checkmark"></span>
									<span class="sw-number">6</span>
									<div class="text-muted small">ขั้นตอน</div>ช่างปิดงาน
								</a>
							</li>
						</ul>

					</div>
					<!-- / Status employee -->

					<div class="row">
						
						<!-- Tasks start -->
						<div class="col-xl-8 col-md-12">
							<div class="card ui-task mb-4">
								<h5 class="card-header">หมวดหมู่ปัญหา</h5>
								<div class="card-body">
									<div class="row">
										<div class="form-group col-sm-4">
											<label class="form-label">หมวดหมู่หลัก :</label>
											<p><?=$job_data['main_category_title']?></p>
											<div class="clearfix"></div>
										</div>
										<div class="form-group col-sm-4">
											<label class="form-label">หมวดหมู่ย่อย :</label>
											<p><?=$job_data['sub_category_title']?></p>
											<div class="clearfix"></div>
										</div>
										<div class="form-group col-sm-4">
											<label class="form-label">อาการ :</label>
											<p><?=$job_data['sub_category_title']?></p>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							</div>

							<?if(!empty($employee_data)){?>
								<div class="card ui-task mb-4">
									<h5 class="card-header">ผู้ให้บริการ</h5>
									<div class="card-body">
										<div class="row">
											<div class="form-group col-sm-4">
												<label class="form-label">ชื่อ :</label>
												<p><?=$employee_data['name']?></p>
												<div class="clearfix"></div>
											</div>
											<div class="form-group col-sm-4">
												<label class="form-label">เบอร์โทร :</label>
												<p><?=$employee_data['contact_number']?></p>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
								</div>
							<?}?>

							<div class="card ui-task mb-4">
								<h5 class="card-header">รายละเอียดงาน</h5>
								<div class="card-body">
									<div class="row">
										<div class="form-group col-sm-4">
											<label class="form-label">รหัสงาน :</label>
											<p><?=$job_data['code']?></p>
											<div class="clearfix"></div>
										</div>
										<div class="form-group col-sm-4">
											<label class="form-label">สถานะงาน :</label>
											<p><?=$job_data['job_status']['html']?></p>
											<div class="clearfix"></div>
										</div>
										<div class="form-group col-sm-4">
											<label class="form-label">ชื่อผู้ติดต่อ :</label>
											<p><?=$job_data['sub_category_title']?></p>
											<div class="clearfix"></div>
										</div>
										<div class="form-group col-sm-4">
											<label class="form-label">วันที่เรียก :</label>
											<p><?=$job_data['created_date']?></p>
											<div class="clearfix"></div>
										</div>
										<div class="form-group col-sm-4">
											<label class="form-label">วันนัดเข้าบริการ :</label>
											<p><?=$job_data['appointment_date']?></p>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							</div>

							<div class="card ui-task mb-4">
								<h5 class="card-header">ระยะเวลาการเข้าทำงาน (SLA)</h5>
								<div class="card-body">
									<div class="row">
										<div class="form-group col-sm-4">
											<label class="form-label">SLA in :</label>
											<p><?=$job_data['sla_in']?></p>
											<div class="clearfix"></div>
										</div>
										<div class="form-group col-sm-4">
											<label class="form-label">SLA out :</label>
											<p><?=$job_data['sla_out']?></p>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							</div>

							<div class="card ui-task mb-4">
									<h5 class="card-header">สินค้า</h5>
									<div class="card-body">
										<div class="row">
											<div class="form-group col-sm-4">
												<label class="form-label">ชื่อสินค้า :</label>
												<p><?=$job_data['main_category_title']?></p>
												<div class="clearfix"></div>
											</div>
											<div class="form-group col-sm-4">
												<label class="form-label">Serial No. :</label>
												<p><?=$job_data['sub_category_title']?></p>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
							</div>
						</div>

						<div class="col-xl-4 col-md-12">
							<div class="card ui-task mb-4">
								<h5 class="card-header">ผู้เรียกงาน</h5>
								<div class="card-body">
									<div class="row">
										<div class="form-group col-sm-6">
											<label class="form-label">ชื่อ :</label>
											<p><?=$customers_data['name']?></p>
											<div class="clearfix"></div>
										</div>
										<div class="form-group col-sm-6">
											<label class="form-label">เบอร์โทร :</label>
											<p><?=$customers_data['contect_number']?></p>
											<div class="clearfix"></div>
										</div>
										<div class="form-group col-sm-12">
											<label class="form-label">อีเมล :</label>
											<p><?=$customers_data['email']?></p>
											<div class="clearfix"></div>
										</div>
										<div class="form-group col-sm-12">
											<label class="form-label">ที่อยู่ :</label>
											<p><?=$customers_data['email']?></p>
											<div class="clearfix"></div>
										</div>
										<div class="form-group col-sm-12">
											<label class="form-label">จุดสังเกต :</label>
											<p><?=$customers_data['email']?></p>
											<div class="clearfix"></div>
										</div>
										<div class="form-group col-sm-12">
											<label class="form-label">รายละเอียดเพิ่มเติม :</label>
											<p><?=$customers_data['email']?></p>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Tasks end -->
						
					</div>


					

				</div>
				<!-- [ content ] End -->

			</div>
			<!-- [ Layout content ] End -->

		</div>
		<!-- [ Layout container ] End -->
	</div>

</div>
<!-- [ Layout wrapper] end -->


