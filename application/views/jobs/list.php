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
							<li class="breadcrumb-item active">Job list</li>
						</ol>
					</div>

					<!-- Filters -->
					<div class="card mb-4">
						<div class="card-body">
							<div class="form-row align-items-center">
								<div class="col-md-4 my- 2">
									<label class="form-label">หมวดหมู่หลัก</label>
									<select class="custom-select" id="first_category" name="first_category" onchange="get_sub_category(this.value, 'category')">
										<option value="">เลือก</option>
										<?foreach($category as $val){?>
											<option value="<?=(string)$val['_id']?>"><?=$val['title']->th?></option>
										<?}?>
									</select>
								</div>
								<div class="col-md-4 my-2">
									<label class="form-label">หมวดหมู่ย่อย</label>
									<select class="custom-select" id="category" name="category">
										<option value="">เลือก</option>
									</select>
								</div>
								<div class="col-md-4 my-2">
									<label class="form-label">สถานะงาน</label>
									<select class="custom-select" id="job_status" name="job_status">
										<option value="">เลือก</option>
										<?foreach($status as $key => $val){?>
											<option value="<?=(string)$key?>"><?=$key?></option>
										<?}?>
									</select>
								</div>
								<!-- <div class="col-md-3 my-2">
									<label class="form-label">SLA</label>
									<select class="custom-select">
										<option>Any</option>
										<option>Active</option>
										<option>Banned</option>
										<option>Deleted</option>
									</select>
								</div> -->
								<!-- <div class="col-md-3 my-2">
									<label class="form-label">ทีมช่าง</label>
									<select class="custom-select">
										<option>Any</option>
										<option>Active</option>
										<option>Banned</option>
										<option>Deleted</option>
									</select>
								</div> -->

								<!-- <div class="col-md-3 my-2">
									<label class="form-label">พื้นที่ให้บริการ</label>
									<select class="custom-select">
										<option>Any</option>
										<option>Active</option>
										<option>Banned</option>
										<option>Deleted</option>
									</select>
								</div> -->
								<div class="col-md-10 my-2">
									<label class="form-label">ค้นหา</label>
									<input type="text" id="text_search" name="text_search" class="form-control" placeholder="รหัสงาน, ชื่อ, เบอร์โทร, อีเมล">
								</div>

								<div class="col-md col-xl-2 my-2">
									<label class="form-label d-none d-md-block">&nbsp;</label>
									<button type="button" class="btn btn-primary btn-block" onclick="get_jobs_list(1)">Show</button>
								</div>
							</div>
						</div>
					</div>
					<!-- / Filters -->

					<div class="card">
						<div class="card-datatable table-responsive">
							<div class="col-md col-xl-2" style="float: right; margin-bottom: 20px;">
								<button type="button" class="btn btn-success btn-block" onclick="window.open('add')">+ เพิ่มงาน</button>
							</div>
							<table id="jobs-list" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th width="15%">รหัสงาน</th>
										<th width="20%">SLA</th>
										<th width="15%">หมวดงาน</th>
										<th width="20%">สถานที่</th>
										<th width="15%">ผู้ให้บริการ</th>
										<th width="10%"></th>
									</tr>
								</thead>
								<tbody></tbody>
							</table>
							<div class="row">
								<div class="col-sm-12 col-md-5">
									<!-- <div class="dataTables_info" id="user-list_info" role="status" aria-live="polite">แสดงผล 1 ถึง 20 ของ 100 รายการ</div> -->
									<span class="page-detail">กำลังโหลด..</span>
								</div>
								<div class="col-sm-12 col-md-7">
									<div class="dataTables_paginate paging_simple_numbers" style="float: right;">
										<ul class="pagination pagination-sm">
										</ul>
									</div>
								</div>
							</div>
						</div>
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


