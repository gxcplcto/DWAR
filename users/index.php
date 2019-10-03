<?php require_once( '../couch/cms.php' ); ?>
<cms:template clonable='1' title='Users' hidden='1' parent='_users_' order="1">       
	<cms:editable name="ipt_fname" label="First Name" type="text" order="1" required='1' />
	<cms:editable name="ipt_lname" label="Last Name" type="text" order="2" required='1' />
	<cms:editable name="ipt_desig" label="Designation" type="text" order="3" required='1' />
	<cms:editable name="ipt_mobile_number" label="Mobile Number" type="text" order="4" validator='exact_len=10 | non_negative_integer' required='1' />
	<cms:editable name="ipt_role" label="Employee Role" type="relation" has="one" masterpage="role.php" order="5" />

	<cms:config_list_view>
	    <cms:field 'k_selector_checkbox' />
	    <cms:field 'k_page_title' />
	    <cms:field 'k_user_access_level' header='Access Level' />
	    <cms:field 'k_comments_count' />
	    <cms:field 'ipt_role' header='Role' />
	    <cms:field 'k_page_date' />
	    <cms:field 'k_actions' />
	</cms:config_list_view> 

</cms:template>

<cms:if ipt_account_role=='90'>
	 <label for="f_admin_only_permissions11">
        <input type="checkbox" name="f_admin_only_permissions[]" id="f_admin_only_permissions11" value="pointwise-interchange.php" checked="checked"><span class="ctrl-option"></span>Pointwise Interchange                
    </label>
    <label for="f_admin_only_permissions12">
        <input type="checkbox" name="f_admin_only_permissions[]" id="f_admin_only_permissions12" value="interchange.php" checked="checked"><span class="ctrl-option"></span>Interchange                
    </label>
</cms:if>
<?php COUCH::invoke(); ?>