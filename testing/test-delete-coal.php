<?php require_once( '../couch/cms.php' ); ?>
<cms:php>
		set_time_limit(300);
	</cms:php>
	<cms:no_cache />
<cms:embed 'header.html' />
	<cms:set current_year="<cms:date format='Y' />" "global" />
		<cms:repeat '36' startcount='0' >
		   	<cms:set my_year_month="<cms:date "last day of april +<cms:show k_count /> months -2 years" format='Y-M' />" "global" />
		</cms:repeat>

	   <table border="1" style="margin: 1%;">
			<thead>
				<tr>
					<th class="text-center" rowspan="2">Month</th>
					<th class="text-center" rowspan="2"><cms:date "-2 year" format='Y' />-<cms:date "-1 year" format='Y' /> <br><small>(Total)</small></th>
					<th class="text-center" colspan="11"><cms:date "-1 year" format='Y' />-<cms:show current_year /></th>
					<th class="text-center" colspan="11"><cms:show current_year />-<cms:date "+1 year" format='Y' /></th>
					<th class="text-center" rowspan="2">Diff</th>
				</tr>
				<tr>
					<th class="text-center">WCL</th>
					<cms:pages masterpage='loading-pt.php' folder=k_folder_name custom_field="ld_cmdt=Coal">	
						<cms:if k_page_foldername eq '' >
							<th class="text-center">
								<cms:show k_page_title />
							</th>
						</cms:if>
					</cms:pages>
					<th class="text-center">Total</th>
					<th class="text-center">WCL</th>
					<cms:pages masterpage='loading-pt.php' folder=k_folder_name custom_field="ld_cmdt=Coal">	
						<cms:if k_page_foldername eq '' >
							<th class="text-center">
								<cms:show k_page_title />
							</th>
						</cms:if>
					</cms:pages>
					<th class="text-center">Total</th>
				</tr>
			</thead>
			<tbody>
				<cms:repeat '12' startcount='1' >
	   			<cms:set my_year_month_col_1="<cms:date "last day of march +<cms:show k_count /> months" format='Y-M' />" "global" />
	   			<cms:set my_month = "<cms:date format='Y-M' />" scope="global" />
				<!-- Current Month Upto -->
				<cms:if my_month eq my_year_month_col_1>
				<cms:repeat '3' startcount='1' >
				<tr>
					<th class="gxcpl-padding">
						<cms:if k_count eq '1'>
							<cms:date my_month format='M' /> upto <strong><cms:date 'yesterday' format='d' /></strong>
						<cms:else_if k_count eq '2' />
							Apr-<cms:date my_month format='M' /> upto <strong><cms:date 'yesterday' format='d' /></strong>
						<cms:else_if k_count eq '3' />
							Abs. var.
						</cms:if>
					</th>
					<th class="text-center">
						<cms:show my_ly_monthly_load_grand_total />
					</th>
					<th class="text-center">
						<cms:show my_cy_monthly_load_grand_total />
					</th>
					<th class="text-center">
						<cms:show ly_april_year_load_grand_total />
					</th>
					<th class="text-center" >
						<cms:show cy_april_year_load_grand_total />
					</th>
					<th class="text-center"></th>
					<th class="text-center"></th>
					<th class="text-center"></th>
					<th class="text-center"></th>
					<th class="text-center"></th>
					<th class="text-center"></th>
					<th class="text-center"></th>
					<th class="text-center"></th>
					<th class="text-center"></th>
					<th class="text-center"></th>
					<th class="text-center"></th>
					<th class="text-center"></th>
					<th class="text-center"></th>
					<th class="text-center"></th>
					<th class="text-center"></th>
					<th class="text-center"></th>
					<th class="text-center"></th>
					<th class="text-center"></th>
					<th class="text-center"></th>
					<th class="text-center"></th>
				</tr>
				</cms:repeat>
				</cms:if>
				<!-- Current Month Upto -->
				<tr>
					<!-- Month -->
					<td>
						<cms:date my_year_month_col_1 format='M' />
					</td>
					<!-- Month -->
					<!-- Monthwise last to last year and last year total -->
					<td class="text-center">
						<cms:set total_month = "0" scope="global" />
						<cms:pages masterpage="coal.php" custom_field="tdate >= <cms:date "first day of march +<cms:show k_count /> months -2 year" format="Y-m-d 00:00:00" /> | tdate <= <cms:date "last day of march +<cms:show k_count /> months -2 year" format="Y-m-d 23:59:59" />">
							<cms:set total_month = "<cms:add total_month hlf_ful />" scope="global" />
						</cms:pages>
						<cms:show total_month />
					</td>
					<!-- Monthwise last to last year and last year total -->
					<!-- Monthwise last year and current year WCL Total -->
					<td class="text-center">
						<cms:set total_month_lst_yr = "0" scope="global" />
						<cms:pages masterpage='loading-pt.php' folder=k_folder_name custom_field="ld_cmdt=Coal">
						<cms:if k_page_foldername ne '' >
						<cms:reverse_related_pages masterpage='coal.php' custom_field="tdate >= <cms:date "first day of <cms:show my_year_month_col_1 /> last year " format="Y-m-d 00:00:00" /> | tdate <= <cms:date "last day of <cms:show my_year_month_col_1 /> last year" format="Y-m-d 23:59:59" />">
							<cms:set total_month_lst_yr = "<cms:add total_month_lst_yr hlf_ful />" scope="global" />
						</cms:reverse_related_pages>
						</cms:if>
						</cms:pages>
						<cms:show total_month_lst_yr />
					</td>
					<!-- Monthwise last year and current year WCL Total -->
					<!-- Monthwise last year and current year loading points Total -->
					<cms:pages masterpage='loading-pt.php' folder=k_folder_name custom_field="ld_cmdt=Coal">
					<cms:set my_total_month = "0" "global" />
					<cms:if k_page_foldername eq '' >
					<cms:reverse_related_pages masterpage='coal.php' custom_field="tdate >= <cms:date "first day of <cms:show my_year_month_col_1 /> last year " format="Y-m-d 00:00:00" /> | tdate <= <cms:date "last day of <cms:show my_year_month_col_1 /> last year" format="Y-m-d 23:59:59" />">
						<cms:set my_total_month = "<cms:add my_total_month hlf_ful />" scope="global" />
					</cms:reverse_related_pages>
					<td class="text-center">
						<cms:show my_total_month />
					</td>
					</cms:if>
					</cms:pages>
					<!-- Monthwise last year and current year loading points Total -->
					<!-- Monthwise last year and current year Total -->
					<td class="text-center">
						<cms:set all_total_month = "0" scope="global" />
						<cms:pages masterpage="coal.php" custom_field="tdate >= <cms:date "first day of march +<cms:show k_count /> months " return="-1 year" format="Y-m-d 00:00:00" /> | tdate <= <cms:date "last day of march +<cms:show k_count /> months " return="-1 year" format="Y-m-d 23:59:59" />">
							<cms:set all_total_month = "<cms:add all_total_month hlf_ful />" scope="global" />
						</cms:pages>
						<cms:show all_total_month />
					</td>
					<!-- Monthwise last year and current year Total -->
					<cms:if my_month ne my_year_month_col_1 >
					<!-- Monthwise current year and next year WCL Total -->
					<td class="text-center">
						<cms:set total_month_curr_yr = "0" scope="global" />
						<cms:pages masterpage='loading-pt.php' folder=k_folder_name custom_field="ld_cmdt=Coal">
						<cms:if k_page_foldername ne '' >
						<cms:reverse_related_pages masterpage='coal.php' custom_field="tdate >= <cms:date "first day of <cms:show my_year_month_col_1 />" format="Y-m-d 00:00:00" /> | tdate <= <cms:date "last day of <cms:show my_year_month_col_1 />" format="Y-m-d 23:59:59" />">
							<cms:set total_month_curr_yr = "<cms:add total_month_curr_yr hlf_ful />" scope="global" />
						</cms:reverse_related_pages>
						</cms:if>
						</cms:pages>
						
						<cms:show total_month_curr_yr />
					</td>
					<!-- Monthwise current year and next year WCL Total -->
					<!-- Monthwise current year and next year loading points Total -->
					<cms:pages masterpage='loading-pt.php' folder=k_folder_name custom_field="ld_cmdt=Coal">
					<cms:set my_total_curr_month = "0" "global" />
					<cms:if k_page_foldername eq '' >
					<cms:reverse_related_pages masterpage='coal.php' custom_field="tdate >= <cms:date "first day of <cms:show my_year_month_col_1 />" format="Y-m-d 00:00:00" /> | tdate <= <cms:date "last day of <cms:show my_year_month_col_1 />" format="Y-m-d 23:59:59" />">
						<cms:set my_total_curr_month = "<cms:add my_total_curr_month hlf_ful />" scope="global" />
					</cms:reverse_related_pages>
					<td class="text-center">
						<cms:show my_total_curr_month />
					</td>
					</cms:if>
					</cms:pages>
					<!-- Monthwise current year and next year loading points Total -->
					<!-- Monthwise current year and next year Total -->
					<td class="text-center">
						<cms:set all_total_curr_month = "0" scope="global" />
						<cms:pages masterpage="coal.php" custom_field="tdate >= <cms:date "first day of march +<cms:show k_count /> months" format="Y-m-d 00:00:00" /> | tdate <= <cms:date "last day of march +<cms:show k_count /> months" format="Y-m-d 23:59:59" />">
							<cms:set all_total_curr_month = "<cms:add all_total_curr_month hlf_ful />" scope="global" />
						</cms:pages>
						<cms:show all_total_curr_month />
					</td>
					<!-- Monthwise current year and next year Total -->
					</cms:if>
					<cms:if my_month ne my_year_month_col_1 >
					<td class="text-center">
						<cms:if all_total_curr_month ne '0'>
							<cms:sub all_total_curr_month all_total_month />
						<cms:else_if all_total_curr_month eq '0' />
							0
						</cms:if>
					</td>
					</cms:if>
					<cms:if my_month eq my_year_month_col_1 >
					<td class="text-center">0</td>
					<td class="text-center">0</td>
					<td class="text-center">0</td>
					<td class="text-center">0</td>
					<td class="text-center">0</td>
					<td class="text-center">0</td>
					<td class="text-center">0</td>
					<td class="text-center">0</td>
					<td class="text-center">0</td>
					<td class="text-center">0</td>
					<td class="text-center">0</td>
					<td class="text-center">0</td>
					</cms:if>
				</tr>
				</cms:repeat>
				<!-- Total Yearly -->
			
					<cms:set grnd_total_month = "0" scope="global" />
					<cms:set grnd_total_month_lst_yr = "0" scope="global" />
					<cms:set all_grnd_total_month = "0" scope="global" />
					<cms:repeat '12' startcount='1' >
					<cms:set my_year_month_col_1="<cms:date "last day of march +<cms:show k_count /> months" format='Y-M' />" "global" />
						<!-- Monthwise last to last year and last year Grand Total -->
						<cms:pages masterpage="coal.php" custom_field="tdate >= <cms:date "first day of march +<cms:show k_count /> months -2 year" format="Y-m-d 00:00:00" /> | tdate <= <cms:date "last day of march +<cms:show k_count /> months -2 year" format="Y-m-d 23:59:59" />">
							<cms:set grnd_total_month = "<cms:add grnd_total_month hlf_ful />" scope="global" />
						</cms:pages>
						<!-- Monthwise last to last year and last year Grand Total -->
						<!-- Monthwise last year and current year WCL Grand Total -->
						<cms:pages masterpage='loading-pt.php' folder=k_folder_name custom_field="ld_cmdt=Coal">
							<cms:if k_page_foldername ne '' >
							<cms:reverse_related_pages masterpage='coal.php' custom_field="tdate >= <cms:date "first day of <cms:show my_year_month_col_1 /> last year " format="Y-m-d 00:00:00" /> | tdate <= <cms:date "last day of <cms:show my_year_month_col_1 /> last year" format="Y-m-d 23:59:59" />">
								<cms:set grnd_total_month_lst_yr = "<cms:add grnd_total_month_lst_yr hlf_ful />" scope="global" />
							</cms:reverse_related_pages>
							</cms:if>
						</cms:pages>
						<!-- Monthwise last year and current year WCL Grand Total -->
						<!-- Monthwise last year and current year Grand Total -->
						<cms:pages masterpage="coal.php" custom_field="tdate >= <cms:date "first day of march +<cms:show k_count /> months " return="-1 year" format="Y-m-d 00:00:00" /> | tdate <= <cms:date "last day of march +<cms:show k_count /> months " return="-1 year" format="Y-m-d 23:59:59" />">
							<cms:set all_grnd_total_month = "<cms:add all_grnd_total_month hlf_ful />" scope="global" />
						</cms:pages>
						<!-- Monthwise last year and current year Grand Total -->
					</cms:repeat>

					<tr>
						<td>
							Total Yearly
						</td>
						<!-- Monthwise last to last year and last year Grand Total -->
						<td class="text-center">
							<cms:show grnd_total_month />
						</td>
						<!-- Monthwise last to last year and last year Grand Total -->
						<!-- Monthwise last year and current year WCL Grand Total -->
						<td class="text-center">
							<cms:show grnd_total_month_lst_yr />
						</td>
						<!-- Monthwise last year and current year WCL Grand Total -->
						<!-- Monthwise last year and current year Loading Point Grand Total -->
						<cms:capture into="my_output" >
						<cms:pages masterpage='loading-pt.php' folder=k_folder_name custom_field="ld_cmdt=Coal">
							<cms:if k_page_foldername eq '' >
							<cms:set my_grnd_total_month = "0" "global" />
							<cms:reverse_related_pages 'loading_point' masterpage='coal.php' custom_field="tdate >= <cms:date "first day of april last year " format="Y-m-d 00:00:00" /> | tdate <= <cms:date "last day of march this year" format="Y-m-d 23:59:59" />">
								<cms:set my_grnd_total_month = "<cms:add my_grnd_total_month hlf_ful />" scope="global" />
							</cms:reverse_related_pages>
							<td class="text-center">
								<cms:show my_grnd_total_month />
							</td>
							</cms:if>
						</cms:pages>
						</cms:capture>
						<cms:show my_output />
						<!-- Monthwise last year and current year Loading Point Grand Total -->
						<!-- Monthwise last year and current year Grand Total -->	
						<td class="text-center">
							<cms:show all_grnd_total_month />
						</td>
						<!-- Monthwise last year and current year Grand Total -->
						<td class="text-center">0</td>
						<td class="text-center">0</td>
						<td class="text-center">0</td>
						<td class="text-center">0</td>
						<td class="text-center">0</td>
						<td class="text-center">0</td>
						<td class="text-center">0</td>
						<td class="text-center">0</td>
						<td class="text-center">0</td>
						<td class="text-center">0</td>
						<td class="text-center">0</td>
						<td class="text-center">0</td>
					</tr>
					<cms:php >
						function cal_days_in_year($year){
						$days=0; 
						for($month=1;$month<=12;$month++){ 
						    $days = $days + cal_days_in_month(CAL_GREGORIAN,$month,$year);
						 }
						return $days;
						}
					</cms:php>
					<cms:set number_days = "<cms:php >echo cal_days_in_year(<cms:date format="Y" />);</cms:php>" "global" />
					<tr>
						<td>
							Avg/day
						</td>
						<td class="text-center">
							<cms:set avg_l_l_total = "<cms:div grnd_total_month number_days />" "global" />
							<cms:number_format avg_l_l_total decimal_precision="2" />
						</td>
						<td class="text-center">
							<cms:set avg_lst_yr_total = "<cms:div grnd_total_month_lst_yr number_days />" "global" />
							<cms:number_format avg_lst_yr_total decimal_precision="2" />
						</td>
							[<cms:div "<cms:show my_output />" number_days />]
							<cms:set avg_ld_pt_total = "<cms:div "<cms:show my_output />" number_days />" "global" />
							<cms:number_format avg_ld_pt_total decimal_precision="2" />
						
						<td class="text-center">
							<cms:set avg_grnd_total = "<cms:div all_grnd_total_month number_days />" "global" />
							<cms:number_format avg_grnd_total decimal_precision="2" />
						</td>
					</tr>
				<!-- Total Yearly -->
			</tbody>
		</table>
	<div class="gxcpl-ptop-50"></div>
	<div class="gxcpl-ptop-50"></div>
<cms:embed 'footer.html' />
<?php COUCH::invoke( ); ?>