<body class="no-skin">
  <div id="navbar" class="navbar navbar-red">
	<script type="text/javascript">
	  try{ace.settings.check('navbar' , 'fixed')}catch(e){}
	</script>

		<div class="navbar-container" id="navbar-container">
		  <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
		    <span class="sr-only">Toggle sidebar</span>

				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
		  </button>

		  <div class="navbar-header pull-left">
		    <a href="<?php echo site_url('student/dashboard'); ?>" class="navbar-brand">
				  <small>
				    <i class="fa fa-user"></i>
				      <span class="red">The</span> Evaluator
				  </small>
				</a>
		  </div><!-- navbar-header -->

		  <div class="navbar-buttons navbar-header pull-right" role="navigation">
		    <ul class="nav ace-nav">
					<?php extract($acc_dtls); ?>
		      <li class="red">
		        <a data-toggle="dropdown" href="#" class="dropdown-toggle">
		          <?php if ($photo): ?>
		          	<img class="nav-user-photo" src="<?php echo base_url('assets/uploads/profile/'.$photo); ?>" height="36" width="36" />
		          <?php else: ?>
		          	<img class="nav-user-photo" src="<?php echo base_url('assets/avatars/user.jpg'); ?>" />
		          <?php endif; ?>
							<span class="user-info">
							  <small>Welcome</small>
							  <?php echo $fname.' '.$lname; ?>
							 </span>
				  		<i class="ace-icon fa fa-caret-down"></i>
		        </a>

		        <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
						  <li>
						    <a href="<?php echo site_url('student/account_settings/edit_profile'); ?>">
							  <i class="ace-icon fa fa-cog"></i>
							  Account Settings
							</a>
						  </li>

						  <li>
							<a href="<?php echo site_url('student/dashboard'); ?>">
							  <i class="ace-icon fa fa-user"></i>
							  Profile
							</a>
						  </li>

						  <li class="divider"></li>

						  <li>
							<a href="<?php echo site_url('user/logout'); ?>">
							  <i class="ace-icon fa fa-power-off"></i>
							  Logout
							</a>
						  </li>
						</ul><!-- user-menu -->
		      </li><!-- red -->
		    </ul><!-- nav ace-nav -->
		  </div><!-- navbar-buttons -->

		</div><!-- navbar-container -->
  </div><!-- navbar -->

  <div class="main-container" id="main-container">
    <script type="text/javascript">
		  try{ace.settings.check('main-container' , 'fixed')}catch(e){}
		</script>

	<div id="sidebar" class="sidebar responsive">
	  <script type="text/javascript">
	    try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
	  </script>

	  <ul class="nav nav-list">
			<li class="active">
			  <a href="<?php echo site_url('student/dashboard'); ?>">
			    <i class="menu-icon fa fa-home"></i>
				<span class="menu-text"> Dashboard</span>
			  </a>

			  <b class="arrow"></b>
			</li><!-- dashboard -->

			<li class="">
			  <a href="<?php echo site_url('student/evaluate'); ?>">
			    <i class="menu-icon fa fa-pencil"></i>
				<span class="menu-text"> Evaluate</span>
			  </a>

			  <b class="arrow"></b>
			</li><!-- evaluate -->

			<li class="">
			  <a href="<?php echo site_url('student/evaluation_logs'); ?>">
			    <i class="menu-icon fa fa-folder-open-o"></i>
				<span class="menu-text"> Review Evaluation</span>
			  </a>

			  <b class="arrow"></b>
			</li><!-- review evaluation -->
	  </ul>

	  <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
			<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
	  </div>

	  <script type="text/javascript">
	    try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
	  </script>
	</div><!-- sidebar -->

	<div class="main-content">
	  <div class="main-content-inner">
			<div class="breadcrumbs" id="breadcrumbs">
			  <script type="text/javascript">
			    try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
			  </script>

			  <ul class="breadcrumb">
					<li>
					  <i class="ace-icon fa fa-home home-icon"></i>
					  <a href="<?php echo site_url('student/dashboard'); ?>">Dashboard</a>
					</li>
					<li class="active"></li>
			  </ul><!-- /.breadcrumb -->
			</div><!-- breadcrumbs -->

			<div class="page-content">
			  <div class="page-header">
			    <h1>
			      Dashboard
			      <small>
			        <i class="ace-icon fa fa-angle-double-right"></i>
							User Profile
			      </small>
			    </h1>
			  </div><!-- page-header -->

			  <div class="row">
			  	<div class="col-xs-12">
			      <?php if($this->session->flashdata('error')): ?>
			      	<span class="help-block">
			      	  <?php
				      	  echo '<div class="alert alert-success">
				      	  	<button type="button" class="close" data-dismiss="alert">
										  <i class="ace-icon fa fa-times"></i>
										</button>
										<strong>
										  <i class="ace-icon fa fa-check"></i>
										  Success!
										</strong>
									'.$this->session->flashdata('error').'
									</div><!-- alert -->';
			      	  ?>
			      	</span>
			      <?php endif; ?>
			      <?php if($this->session->flashdata('error_2')): ?>
			      	<span class="help-block">
			      	  <?php
				      	  echo '<div class="alert alert-info">
				      	  	<button type="button" class="close" data-dismiss="alert">
										  <i class="ace-icon fa fa-times"></i>
										</button>
										<strong>
										  <i class="ace-icon fa fa-info"></i>
										  Please be advise!
										</strong>
										'.$this->session->flashdata('error_2').'
							      </div><!-- alert -->';
			      	  ?>
			      	</span>
			      <?php endif; ?>

			      <?php if($pword == '8d53f06c37248ba47128d1b304dc8704'): ?>
			      	<div class="alert alert-warning">
			      		<i class="ace-icon fa fa-warning"></i>
			      		<span>You are currently using system provided password, security of your account is not guaranteed. 
			      			However, your can change you password <a href="<?php echo site_url('student/account_settings/change_pass'); ?>">here.</a></span>
			      	</div>
			   		<?php endif; ?>

					  <div id="profile-content" class="user-profile">
					  	<div class="tabbable">
					  	  <ul class="nav nav-tabs padding-18">
					  	  	<li class="active">
					  	  	  <a data-toggle="tab" href="#profile">
											<i class="green ace-icon fa fa-user bigger-120"></i>
											Profile
									  </a>
					  	  	</li>
					  	  </ul><!-- nav-tabs -->

					  	  <div class="tab-content no-border padding-24">
					  	    <div id="profile" class="tab-pane fade in active">
					  	      <div class="row">
					  	      	<div class="col-xs-12 col-sm-3 center">
											  <span class="profile-picture">
											    <?php if ($photo): ?>
											    	<img class="editable img-responsive" src="<?php echo base_url('assets/uploads/profile/'.$photo); ?>" />
											  	<?php else: ?>
											  		<img class="editable img-responsive" src="<?php echo base_url('assets/avatars/profile-pic.jpg'); ?>" />
											  	<?php endif; ?>
											  </span>

											  <div class="space space-4"></div>

											  <a href="<?php echo site_url('student/account_settings/edit_profile'); ?>" class="btn btn-sm btn-block btn-inverse">
											  	<i class="ace-icon fa fa-pencil bigger-120"></i>
											  	<span class="bigger-110"> Edit Profile</span>
											  </a>
											</div><!-- profile-picture -->

											<div id="details" class="col-xs-12 col-sm-9">
											  <h4 class="blue">
											    <?php echo $lname.', '.$fname.' '.$mname; ?>
											  	<?php if($is_active): ?>
											  	  <span class="label label-success arrowed-right">
													    <i class="ace-icon fa fa-circle smaller-80 align-middle"></i>
															Online
													  </span>
													<?php else: ?>
												  	<span class="label label-default arrowed-right">
													    <i class="ace-icon fa fa-circle smaller-80 align-middle"></i>
															Offline
													  </span>
											  	<?php endif; ?>
											  </h4>

											  <div class="profile-user-info">
											    <div class="profile-info-row">
													  <div class="profile-info-name"> Student ID </div>

													  <div class="profile-info-value">
													    <span><?php echo $stud_id; ?></span>
													  </div>
													</div>

													<?php if($this->session->userdata('user_type') == 15): ?>
													<div class="profile-info-row">
													  <div class="profile-info-name"> Course </div>

													  <div class="profile-info-value">
													    <span><?php echo $course; ?></span>
													  </div>
													</div>
											    <?php endif; ?>

													<div class="profile-info-row">
													  <div class="profile-info-name"> Year &amp; Section </div>

													  <div class="profile-info-value">
													    <span><?php echo $yr_lvl.' - '.$section; ?></span>
													  </div>
													</div>

													<div class="profile-info-row">
													  <div class="profile-info-name"> Date Created </div>

													  <div class="profile-info-value">
													    <span><?php echo date('M d, Y', $date_created); ?></span>
													  </div>
													</div>

													<div class="profile-info-row">
													  <div class="profile-info-name"> Last Modified </div>

													  <div class="profile-info-value">
													    <span><?php echo ($last_mod) ? date('M d, Y', $last_mod) : 'Never'; ?></span>
													  </div>
													</div>

													<div class="profile-info-row">
													  <div class="profile-info-name"> Last Online </div>

													  <div class="profile-info-value">
													    <span><?php echo ($last_seen) ? date('M d, Y', $last_seen) : 'Never'; ?></span>
													  </div>
													</div>
											  </div><!-- profile-user-info -->
											</div><!-- details -->
					  	      </div><!-- row -->
					  	    </div><!-- profile -->
					  	  </div><!-- tab-content -->
					  	</div><!-- tabbable -->
					  </div><!-- user-profile -->
			    </div><!-- col-xs-12 -->
			  </div><!-- row -->
			</div><!-- page-content -->
	  </div><!-- main-content-inner -->
	</div><!-- main-content -->

	<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
	  <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
	</a>
  </div><!-- main-container -->

  <!-- basic scripts -->

	<!--[if !IE]> -->
	<script src="<?php echo base_url('assets/js/jquery.2.1.1.min.js'); ?>"></script>
	<!-- <![endif]-->

	<!--[if IE]>
	  <script src="<?php echo base_url('assets/js/jquery.1.11.1.min.js'); ?>"></script>
	<![endif]-->

	<!--[if !IE]> -->
	<script type="text/javascript">
	  window.jQuery || document.write("<script src='<?php echo base_url('assets/js/jquery.min.js'); ?>'>"+"<"+"/script>");
	</script>
	<!-- <![endif]-->

	<!--[if IE]>
	  <script type="text/javascript">
 	    window.jQuery || document.write("<script src='<?php echo base_url('assets/js/jquery1x.min.js'); ?>'>"+"<"+"/script>");
	  </script>
	<![endif]-->
		
	<script type="text/javascript">
	  if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url('assets/js/jquery.mobile.custom.min.js'); ?>'>"+"<"+"/script>");
	</script>
	
	<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>

	<!-- page specific plugin scripts -->

	<!--[if lte IE 8]>
	  <script src="assets/js/excanvas.min.js"></script>
	<![endif]-->
	<script src="<?php echo base_url('assets/js/jquery-ui.custom.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.ui.touch-punch.min.js.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.flot.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.flot.pie.min.js'); ?>"></script>

	<!-- ace scripts -->
	<script src="<?php echo base_url('assets/js/ace-elements.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/ace.min.js'); ?>"></script>

	<!-- inline scripts related to this page -->
	<script type="text/javascript">
	  jQuery(function($) {
	  	//Upload avatar
	  	$('#avatar2').on('click', function(){
		  var modal = 
		    '<div class="modal fade">\
			   <div class="modal-dialog">\
			     <div class="modal-content">\
				   <div class="modal-header">\
				     <button type="button" class="close" data-dismiss="modal">&times;</button>\
					 <h4 class="blue">Change Avatar</h4>\
				   </div>\
						\
				   <form class="no-margin">\
				     <div class="modal-body">\
					   <div class="space-4"></div>\
					     <div style="width:75%;margin-left:12%;"><input type="file" name="file-input" /></div>\
					   </div>\
						\
					   <div class="modal-footer center">\
						 <button type="submit" class="btn btn-sm btn-success"><i class="ace-icon fa fa-check"></i> Submit</button>\
						 <button type="button" class="btn btn-sm" data-dismiss="modal"><i class="ace-icon fa fa-times"></i> Cancel</button>\
					   </div>\
				   </form>\
				 </div>\
			   </div>\
			 </div>';
					
					
					var modal = $(modal);
					modal.modal("show").on("hidden", function(){
						modal.remove();
					});
			
					var working = false;
			
					var form = modal.find('form:eq(0)');
					var file = form.find('input[type=file]').eq(0);
					file.ace_file_input({
						style:'well',
						btn_choose:'Click to choose new avatar',
						btn_change:null,
						no_icon:'ace-icon fa fa-picture-o',
						thumbnail:'small',
						before_remove: function() {
							//don't remove/reset files while being uploaded
							return !working;
						},
						allowExt: ['jpg', 'jpeg', 'png', 'gif'],
						allowMime: ['image/jpg', 'image/jpeg', 'image/png', 'image/gif']
					});
			
					form.on('submit', function(){
						if(!file.data('ace_input_files')) return false;
						
						file.ace_file_input('disable');
						form.find('button').attr('disabled', 'disabled');
						form.find('.modal-body').append("<div class='center'><i class='ace-icon fa fa-spinner fa-spin bigger-150 orange'></i></div>");
						
						var deferred = new $.Deferred;
						working = true;
						deferred.done(function() {
							form.find('button').removeAttr('disabled');
							form.find('input[type=file]').ace_file_input('enable');
							form.find('.modal-body > :last-child').remove();
							
							modal.modal("hide");
			
							var thumb = file.next().find('img').data('thumb');
							if(thumb) $('#avatar2').get(0).src = thumb;
			
							working = false;
						});
						
						
						setTimeout(function(){
							deferred.resolve();
						} , parseInt(Math.random() * 800 + 800));
			
						return false;
					});
							
				});

	  	//Android's default browser somehow is confused when tapping on label which will lead to dragging the task
		//so disable dragging when clicking on label
		var agent = navigator.userAgent.toLowerCase();
		  if("ontouchstart" in document && /applewebkit/.test(agent) && /android/.test(agent))
			$('#tasks').on('touchstart', function(e){
			  var li = $(e.target).closest('#tasks li');
			  if(li.length == 0)return;
			  var label = li.find('label.inline').get(0);
			  if(label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation() ;
			});
			
			$('#tasks').sortable({
			  opacity:0.8,
			  revert:true,
			  forceHelperSize:true,
			  placeholder: 'draggable-placeholder',
			  forcePlaceholderSize:true,
			  tolerance:'pointer',
			  stop: function( event, ui ) {
			    //just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
			    $(ui.item).css('z-index', 'auto');
			  }
			});
			$('#tasks').disableSelection();
			$('#tasks input:checkbox').removeAttr('checked').on('click', function(){
			  if(this.checked) $(this).closest('li').addClass('selected');
			  else $(this).closest('li').removeClass('selected');
			});
			
			
			//show the dropdowns on top or bottom depending on window height and menu position
			$('#task-tab .dropdown-hover').on('mouseenter', function(e) {
			  var offset = $(this).offset();
			
			  var $w = $(window)
			  if (offset.top > $w.scrollTop() + $w.innerHeight() - 100) 
			    $(this).addClass('dropup');
			  else $(this).removeClass('dropup');
			});
	  });
	</script>
</body>