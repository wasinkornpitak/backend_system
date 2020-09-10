<!-- [ Layout wrapper ] Start -->
<div class="layout-wrapper layout-2">
	<div class="layout-inner">
		
		<!-- [ Layout container ] Start -->
		<div class="layout-container">

			<!-- [ Layout content ] Start -->
			<div class="layout-content">

				<!-- [ content ] Start -->
				<div class="container-fluid flex-grow-1 container-p-y">
					<h4 class="font-weight-bold py-3 mb-0">Ecommerce</h4>
					<div class="text-muted small mt-0 mb-4 d-block breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
							<li class="breadcrumb-item ">Dashboard</li>
							<li class="breadcrumb-item active">Ecommerce</li>
						</ol>
					</div>

					<div class="row">
						<div class="col-sm-6 col-xl-3">
							<div class="card mb-4 bg-primary text-white">
								<div class="card-body">
									<div class="d-flex align-items-center">
										<div class="ion ion-ios-wallet display-4"></div>
										<div class="ml-4">
											<div class="text-white small">Wallet Balance</div>
											<div class="text-large">$2362</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-xl-3">
							<div class="card mb-4 bg-success text-white">
								<div class="card-body">
									<div class="d-flex align-items-center">
										<div class="ion ion-ios-card display-4"></div>
										<div class="ml-4">
											<div class="text-white small">Referral Earnings</div>
											<div class="text-large">$586</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-xl-3">
							<div class="card mb-4 bg-danger text-white">
								<div class="card-body">
									<div class="d-flex align-items-center">
										<div class="ion ion-md-cart display-4"></div>
										<div class="ml-4">
											<div class="text-white small">New order</div>
											<div class="text-large">$2568</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-xl-3">
							<div class="card mb-4 bg-warning text-white">
								<div class="card-body">
									<div class="d-flex align-items-center">
										<div class="ion ion-md-pulse display-4"></div>
										<div class="ml-4">
											<div class="text-white small">Estimate Sales</div>
											<div class="text-large">$478</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- chart cards start -->
						<div class="col-xl-6">
							<div class="card mb-4">
								<div class="card-header with-elements">
									<h6 class="card-header-title mb-0">Sale Order</h6>
									<div class="card-header-elements ml-auto">
										<label class="text m-0">
											<span class="text-light text-tiny font-weight-semibold align-middle">SHOW STATS</span>
											<span class="switcher switcher-sm d-inline-block align-middle mr-0 ml-2">
												<input type="checkbox" class="switcher-input" checked>
												<span class="switcher-indicator">
													<span class="switcher-yes"></span>
													<span class="switcher-no"></span>
												</span>
											</span>
										</label>
									</div>
								</div>
								<div class="row no-gutters row-bordered">
									<div class="col-md-5 col-lg-12 col-xl-5">
										<div class="card-body">
											<div class="pb-4">
												Order
												<div class="float-right">
													<span class="text-muted small">$590,47</span><i class="feather icon-arrow-down text-danger"></i>
												</div>
												<div class="progress mt-1" style="height:6px;">
													<div class="progress-bar bg-primary" style="width: 45%;"></div>
												</div>
											</div>
											<div class="pb-4">
												Stock
												<div class="float-right">
													<span class="text-muted small">486 Qt</span><i class="feather icon-arrow-up text-success"></i>
												</div>
												<div class="progress mt-1" style="height:6px;">
													<div class="progress-bar bg-success" style="width: 90%;"></div>
												</div>
											</div>
											<div class="pb-4">
												Profit
												<div class="float-right">
													<span class="text-muted small">$486,490.00</span><i class="feather icon-arrow-up text-success"></i>
												</div>
												<div class="progress mt-1" style="height:6px;">
													<div class="progress-bar bg-danger" style="width: 30%;"></div>
												</div>
											</div>
											<div class="pb-0">
												Sale
												<div class="float-right">
													<span class="text-muted small">540 Kg</span><i class="feather icon-arrow-down text-danger"></i>
												</div>
												<div class="progress mt-1" style="height:6px;">
													<div class="progress-bar bg-warning" style="width: 55%;"></div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-7 col-lg-12 col-xl-7">
										<div class="card-body">
											<div id="chart-pie-moris" style="height:200px"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-6">
							<div class="card d-flex w-100 mb-4">
								<div class="row no-gutters row-bordered row-border-light h-100">
									<div class="d-flex col-sm-6 col-md-6 col-lg-6 align-items-center">
										<div class="card-body media align-items-center text-dark">
											<i class="lnr lnr-diamond display-4 d-block text-primary"></i>
											<span class="media-body d-block ml-3">
												<span class="text-big mr-1 text-primary">$1584.78</span>
												<br>
												<small class="text-muted">Earned this month</small>
											</span>
										</div>
									</div>
									<div class="d-flex col-sm-6 col-md-6 col-lg-6 align-items-center">
										<div class="card-body media align-items-center text-dark">
											<i class="lnr lnr-clock display-4 d-block text-warning"></i>
											<span class="media-body d-block ml-3">
												<span class="text-big"><span class="mr-1 text-warning">152</span>Working Hours</span>
												<br>
												<small class="text-muted">Spent this month</small>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="card mb-4 bg-pattern-2-dark">
										<div class="card-body">
											<div class="d-flex align-items-center">
												<div class="lnr lnr-cart display-4 text-primary"></div>
												<div class="ml-3">
													<div class="text-muted small">Monthly sales</div>
													<div class="text-large">2362</div>
												</div>
											</div>
											<div id="ecom-chart-1" class="mt-4 chart-shadow-primary" style="height:55px"></div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="card mb-4 bg-pattern-2-dark">
										<div class="card-body">
											<div class="d-flex align-items-center">
												<div class="lnr lnr-gift display-4 text-danger"></div>
												<div class="ml-3">
													<div class="text-muted small">Products</div>
													<div class="text-large">985</div>
												</div>
											</div>
											<div id="ecom-chart-3" class="mt-4 chart-shadow-danger" style="height:55px"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- chart cards end -->

						<!-- Data card 8 Start -->
						<div class="col-xl-8 col-md-12">
							<div class="card mb-4">
								<h5 class="card-header">Latest Order</h5>
								<div class="table-responsive">
									<table class="table table-hover table-borderless">
										<thead>
											<tr>
												<th>Customer</th>
												<th>Order ID</th>
												<th>Photo</th>
												<th>Product</th>
												<th>Quantity</th>
												<th>Date</th>
												<th>Status</th>
												<th class="text-right">Action</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>John Deo</td>
												<td>#81412314</td>
												<td><img src="assets/img/uikit/adidas.jpg" alt="" class="img-fluid ui-w-40"></td>
												<td>Adidas</td>
												<td>10</td>
												<td>17-2-2017</td>
												<td><label class="label label-warning">Pending</label></td>
												<td class="text-right"><a href="javascript:"><i class="lnr lnr-pencil mr-2"></i></a><a href="javascript:"><i class="lnr lnr-trash text-danger"></i></a></td>
											</tr>
											<tr>
												<td>Jenny William</td>
												<td>#68457898</td>
												<td><img src="assets/img/uikit/backpack.jpg" alt="" class="img-fluid ui-w-40"></td>
												<td>Backpack</td>
												<td>16</td>
												<td>20-2-2017</td>
												<td><label class="label label-primary">Paid</label></td>
												<td class="text-right"><a href="javascript:"><i class="lnr lnr-pencil mr-2"></i></a><a href="javascript:"><i class="lnr lnr-trash text-danger"></i></a></td>
											</tr>
											<tr>
												<td>Lori Moore</td>
												<td>#45457898</td>
												<td><img src="assets/img/uikit/sunglasses.jpg" alt="" class="img-fluid ui-w-40"></td>
												<td>Sunglasses</td>
												<td>20</td>
												<td>17-2-2017</td>
												<td><label class="label label-success">Success</label></td>
												<td class="text-right"><a href="javascript:"><i class="lnr lnr-pencil mr-2"></i></a><a href="javascript:"><i class="lnr lnr-trash text-danger"></i></a></td>
											</tr>
											<tr>
												<td>Austin Pena</td>
												<td>#62446232</td>
												<td><img src="assets/img/uikit/iwatch.jpg" alt="" class="img-fluid ui-w-40"></td>
												<td>Iwatch</td>
												<td>15</td>
												<td>25-4-2017</td>
												<td><label class="label label-danger">Failed</label></td>
												<td class="text-right"><a href="javascript:"><i class="lnr lnr-pencil mr-2"></i></a><a href="javascript:"><i class="lnr lnr-trash text-danger"></i></a></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-md-12">
							<div class="card mb-4">
								<h5 class="card-header">Anual Sales Report</h5>
								<div class="table-responsive">
									<table class="table table-hover mb-0">
										<thead>
											<tr>
												<th></th>
												<th>Country</th>
												<th>Sales</th>
												<th class="text-right">Average</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><img src="assets/img/avatars/9-small.png" alt="" class="img-fluid rounded-circle ui-w-40"></td>
												<td>Germany</td>
												<td>3,562</td>
												<td class="text-right">56.23%</td>
											</tr>
											<tr>
												<td><img src="assets/img/avatars/8-small.png" alt="" class="img-fluid rounded-circle ui-w-40"></td>
												<td>USA</td>
												<td>2,650</td>
												<td class="text-right">25.23%</td>
											</tr>
											<tr>
												<td><img src="assets/img/avatars/7-small.png" alt="" class="img-fluid rounded-circle ui-w-40"></td>
												<td>Australia</td>
												<td>956</td>
												<td class="text-right">12.45%</td>
											</tr>
											<tr>
												<td><img src="assets/img/avatars/6-small.png" alt="" class="img-fluid rounded-circle ui-w-40"></td>
												<td>United Kingdom</td>
												<td>689</td>
												<td class="text-right">8.65%</td>
											</tr>

										</tbody>
									</table>
								</div>
							</div>
						</div>
						<!-- Data card 8 End -->

					</div>
				</div>
				<!-- [ content ] End -->

			</div>
			<!-- [ Layout content ] End -->

		</div>
		<!-- [ Layout container ] End -->
	</div>

</div>
<!-- [ Layout wrapper] End -->
