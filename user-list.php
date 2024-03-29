<?php require_once( 'couch/cms.php' ); ?>
<cms:template title='Employee List' parent='_users_' order='4' />
	<cms:embed 'header.html' />
		<div class="container">
			<div class="row">

				<!-- Section Title -->
				<div class="col-md-11 col-xs-9">
					<h4 class="gxcpl-no-margin">
						USER LIST
					</h4>
				</div>
				<div class="col-md-1 col-xs-3 text-center">
					<cms:if k_user_access_level gt '7'>
					<a class="btn btn-danger gxcpl-shadow-2 gxcpl-fw-700" type="button" data-toggle="tooltip" data-placement="top" title="ADD USER" href="<cms:show k_site_link />users/register.php">	
						<i class="fa fa-plus"></i>
					</a>
					</cms:if>
				</div>
			</div>
			<div class="gxcpl-ptop-10"></div>
			<div class="gxcpl-divider-dark"></div>
			<div class="gxcpl-ptop-20"></div>
			<!-- Section Title -->
			<!-- Table -->
			<div class="row">
				<div class="col-md-12">
					<!-- Card -->
					<div class="gxcpl-card">
						<!-- Body -->
						<div class="gxcpl-card-body tableFixHead gxcpl-padding-15" style="overflow-x: auto;">
							<table class="display table table-bordered gxcpl-table-hover" id="pt-icp" style="width: 100% !important;">
								<thead>
									<tr>
										<th>
											Sr. No.
										</th>
										<th>
											Name
										</th>
										<th>
											Designation
										</th>
										<th>
											Role
										</th>
										<th>
											Mobile Number
										</th>
										<th class="text-center">
											Action
										</th>
									</tr>
								</thead>
								<tbody>
									<cms:pages masterpage=k_user_template show_future_entries="1"  custom_field="extended_user_id > 1">
									<cms:no_results>
									<tr>
										<cms:if k_user_access_level gt '7'>
											<td colspan="6" class="text-center">
												- No Result -
											</td>
										</cms:if>
									</tr>
									</cms:no_results>
									<tr>
										<td>
											<cms:show k_absolute_count />
										</td>
										<td>
											<cms:show ipt_fname /> <cms:show ipt_lname />
										</td>
										<td>
											<cms:show ipt_desig />
										</td>
										<td>
											<cms:related_pages 'ipt_role' ><cms:show k_page_title /></cms:related_pages>
										</td>
										<td>
											<cms:show ipt_mobile_number />
										</td>
										<td class="text-center">
											<a href="<cms:show k_site_link />users/user-edit.php?id=<cms:show k_page_id />" class="btn btn-primary btn-xs gxcpl-fw-700" data-toggle="tooltip" data-placement="top" title="EDIT" style="margin-top: 5px;">
												<i class="fa fa-edit"></i>
											</a>
											<a href="<cms:show k_site_link />user-delete.php?id=<cms:show k_page_id />" class="btn btn-danger btn-xs gxcpl-fw-700" data-toggle="tooltip" data-placement="top" title="DELETE" style="margin-top: 5px;">
												<i class="fa fa-trash"></i>
											</a>
										</td>
									</tr>
									</cms:pages>
								</tbody>
							</table>
						</div>
						<!-- Body -->
					</div>
					<!-- Card -->
				</div>
				<!-- Table -->

			</div>
			<div class="gxcpl-ptop-50"></div>
		</div>
	<cms:embed 'footer.html' />
<?php COUCH::invoke(); ?>