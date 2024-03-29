<?php require_once( 'couch/cms.php' ); ?>
<cms:template title="Location" clonable='1' routable='1' parent='_lctn_' order='1' >
<!-- Location: Custom Routes -->
	<cms:route name='list_lctn' path='' />
	<cms:route name='create_lctn' path='create' />
    <cms:route name='edit_lctn' path='{:id}/edit' >
    	<cms:route_validators id='non_zero_integer' />
	</cms:route>
	<cms:route name='delete_lctn' path='{:id}/delete' >
	    <cms:route_validators id='non_zero_integer' />
	</cms:route>
    <!-- Location: Custom Routes -->
</cms:template>
<cms:embed 'header.html' />

	<!-- Content Here -->
	<div class="container">
		<div class="row">
			<!-- Location -->
			<cms:match_route debug='0' />
			<cms:embed "location/<cms:show k_matched_route />.html" />
			<!-- Location -->

		</div>
	</div>
	<!-- Content Here -->
	<div class="gxcpl-ptop-50"></div>
<cms:embed 'footer.html' />
<?php COUCH::invoke( K_IGNORE_CONTEXT ); ?>