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
	    <a href="<?php echo site_url('admin_panel/dashboard'); ?>" class="navbar-brand">
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
			    <a href="<?php echo site_url('admin_panel/account_settings'); ?>">
				  <i class="ace-icon fa fa-cog"></i>
				  Account Settings
				</a>
			  </li>

			  <li>
				<a href="<?php echo site_url('admin_panel/profile'); ?>">
				  <i class="ace-icon fa fa-user"></i>
				  Profile
				</a>
			  </li>

			  <li class="divider"></li>

			  <li>
				<a href="<?php echo site_url('admin_panel/logout'); ?>">
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
		<li class="">
		  <a href="<?php echo site_url('admin_panel/dashboard'); ?>">
		    <i class="menu-icon fa fa-home"></i>
			<span class="menu-text"> Dashboard</span>
		  </a>

		  <b class="arrow"></b>
		</li><!-- dashboard -->

		<li class="">
		  <a href="#" class="dropdown-toggle">
		    <i class="menu-icon fa fa-list-alt"></i>
		    <span class="menu-text"> Records</span>

		    <b class="arrow fa fa-angle-down"></b>
		  </a>

		  <b class="arrow"></b>

		  <ul class="submenu">
		  	<li class="">
			  <a href="#" class="dropdown-toggle">
			    <i class="menu-icon fa fa-caret-right"></i>
			    <span class="menu-text"> Student Records</span>

			    <b class="arrow fa fa-angle-down"></b>
			  </a>

			  <b class="arrow"></b>

			  <ul class="submenu">
			  	<li class="">
				      <a href="<?php echo site_url('admin_panel/student_records/elem'); ?>">
				      	<i class="menu-icon fa fa-caret-right"></i> 
				      	Elementary
				      </a>

				      <b class="arrow"></b>
				    </li>
			  	
			    <li class="">
			      <a href="<?php echo site_url('admin_panel/student_records/hs'); ?>">
			      	<i class="menu-icon fa fa-caret-right"></i> 
			      	High School
			      </a>

			      <b class="arrow"></b>
			    </li>

			    <li class="">
			      <a href="<?php echo site_url('admin_panel/student_records/college'); ?>">
			      	<i class="menu-icon fa fa-caret-right"></i> 
			      	College
			      </a>

			      <b class="arrow"></b>
			    </li>
			  </ul>
			</li>

			<li class="">
			  <a href="<?php echo site_url('admin_panel/employee_records'); ?>">
			    <i class="menu-icon fa fa-caret-right"></i>
			    <span class="menu-text"> Employee Records</span>
			  </a>

			  <b class="arrow"></b>
			</li>
		  </ul><!-- submenu -->
		</li><!-- records -->

		<li class="">
		  <a href="#" class="dropdown-toggle">
		    <i class="menu-icon fa fa-question"></i>
		    <span class="menu-text"> Questionnaires</span>

		    <b class="arrow fa fa-angle-down"></b>
		  </a>

		  <b class="arrow"></b>

		  <ul class="submenu">
		  	<li class="">
			  <a href="<?php echo site_url('admin_panel/questionnaire/student'); ?>">
			    <i class="menu-icon fa fa-caret-right"></i>
			    <span class="menu-text"> For Students</span>
			  </a>

			  <b class="arrow"></b>
			</li>

				<li class="">
				  <a href="<?php echo site_url('admin_panel/questionnaire/employee'); ?>">
				    <i class="menu-icon fa fa-caret-right"></i>
				    <span class="menu-text"> For Employee</span>
				  </a>

				  <b class="arrow"></b>
				</li>

			<li class="">
			  <a href="<?php echo site_url('admin_panel/questionnaire/executive'); ?>">
			    <i class="menu-icon fa fa-caret-right"></i>
			    <span class="menu-text"> For Executives</span>
			  </a>

			  <b class="arrow"></b>
			</li>
		  </ul><!-- submenu -->
		</li><!-- questionnaires -->

		<li class="active open">
		  <a href="#" class="dropdown-toggle">
		    <i class="menu-icon fa fa-file-o"></i>
		    <span class="menu-text"> Reports</span>

		    <b class="arrow fa fa-angle-down"></b>
		  </a>

		  <b class="arrow"></b>

		  <ul class="submenu">
		  	<li class="active open">
		  	  <a href="#" class="dropdown-toggle">
			    <i class="menu-icon fa fa-caret-right"></i>
			    Evaluation Reports

			    <b class="arrow fa fa-angle-down"></b>
			  </a>

			  <b class="arrow"></b>

			  <ul class="submenu">
			  	<li class="">
					  <a href="<?php echo site_url('admin_panel/report/evaluation/elementary'); ?>">
					    <i class="menu-icon fa fa-caret-right"></i>
					    Elementary
					  </a>

					  <b class="arrow"></b>
					</li>
			  	
			  	<li class="active">
			  	  <a href="<?php echo site_url('admin_panel/report/evaluation/high_school'); ?>">
			  	    <i class="menu-icon fa fa-caret-right"></i>
			  	    High School
			  	  </a>

			  	  <b class="arrow"></b>
			  	</li>

			  	<li class="">
			  	  <a href="<?php echo site_url('admin_panel/report/evaluation/college'); ?>">
			  	    <i class="menu-icon fa fa-caret-right"></i>
			  	    College
			  	  </a>

			  	  <b class="arrow"></b>
			  	</li>

			  	<li class="">
					  <a href="<?php echo site_url('admin_panel/report/evaluation/employee'); ?>">
					    <i class="menu-icon fa fa-caret-right"></i>
					    Employee
					  </a>

					 <b class="arrow"></b>
					</li>

					<li class="">
					  <a href="<?php echo site_url('admin_panel/report/evaluation/executive'); ?>">
					    <i class="menu-icon fa fa-caret-right"></i>
					    Executive
					  </a>

					  <b class="arrow"></b>
					</li>
			  </ul><!-- submenu -->
		  	</li><!-- evaluation-report -->

		  	<!-- <li class="">
		  	  <a href="#" class="dropdown-toggle">
				  	<i class="menu-icon fa fa-caret-right"></i> 
				  	Statistics Report

				  	<b class="arrow fa fa-angle-down"></b>
				  </a>

				  <b class="arrow"></b>

				  <ul class="submenu">
				  	<li class="">
				  	  <a href="<?php echo site_url('admin_panel/report/statistics/high_school'); ?>">
				  	    <i class="menu-icon fa fa-caret-right"></i>
				  	    High School
				  	  </a>

				  	  <b class="arrow"></b>
				  	</li>

				  	<li class="">
				  	  <a href="<?php echo site_url('admin_panel/report/statistics/college'); ?>">
				  	    <i class="menu-icon fa fa-caret-right"></i>
				  	    College
				  	  </a>

				  	  <b class="arrow"></b>
				  	</li>

				  	<li class="">
						  <a href="<?php echo site_url('admin_panel/report/statistics/employee'); ?>">
						    <i class="menu-icon fa fa-caret-right"></i>
						    Employee
						  </a>

				  	  <b class="arrow"></b>
						</li>

						<li class="">
						  <a href="<?php echo site_url('admin_panel/report/statistics/executive'); ?>">
						    <i class="menu-icon fa fa-caret-right"></i>
						    Executive
						  </a>

						  <b class="arrow"></b>
						</li>
				  </ul>
		  	</li> --><!-- statistics-report -->

		  	<!-- <li class="">
		  	  <a href="#" class="dropdown-toggle">
				  	<i class="menu-icon fa fa-caret-right"></i> 
				  	Employee Ranking Report

				  	<b class="arrow fa fa-angle-down"></b>
				  </a>

			  	<b class="arrow"></b>

				  <ul class="submenu">
				  	<li class="">
				  	  <a href="<?php echo site_url('admin_panel/report/ranking/high_school'); ?>">
				  	    <i class="menu-icon fa fa-caret-right"></i> 
				  	    High School
				  	  </a>

				  	  <b class="arrow fa fa-angle-down"></b>
				  	</li>

				  	<li class="">
				  	  <a href="<?php echo site_url('admin_panel/report/ranking/college'); ?>">
				  	    <i class="menu-icon fa fa-caret-right"></i> 
				  	    College
				  	  </a>

				  	  <b class="arrow fa fa-angle-down"></b>
				  	</li>
				  </ul>
		  	</li> --><!-- employee-ranking -->
		  </ul><!-- submenu -->
		</li><!-- reports -->

		<li class="">
		  <a href="#" class="dropdown-toggle">
		    <i class="menu-icon fa fa-cogs"></i>
		    <span class="menu-text"> Settings</span>

		    <b class="arrow fa fa-angle-down"></b>
		  </a>

		  <b class="arrow"></b>

		  <ul class="submenu">
		  	<li class="">
		  	  <a href="<?php echo site_url('admin_panel/settings/course'); ?>">
		  	  	<i class="menu-icon fa fa-caret-right"></i> 
		  	  	Course
		  	  </a>

		  	  <b class="arrow"></b>
		  	</li>

		  	<li class="">
		  	  <a href="<?php echo site_url('admin_panel/settings/eval_logs'); ?>">
		  	  	<i class="menu-icon fa fa-caret-right"></i> 
		  	  	Evaluation Logs
		  	  </a>

		  	  <b class="arrow"></b>
		  	</li>

		  	<li class="">
		  	  <a href="<?php echo site_url('admin_panel/settings/positions'); ?>">
		  	  	<i class="menu-icon fa fa-caret-right"></i> 
		  	  	Positions
		  	  </a>

		  	  <b class="arrow"></b>
		  	</li>

		  	<li class="">
		  	  <a href="<?php echo site_url('admin_panel/settings/department'); ?>">
		  	  	<i class="menu-icon fa fa-caret-right"></i> 
		  	  	Department
		  	  </a>

		  	  <b class="arrow"></b>
		  	</li>

		  	<li class="">
		  	  <a href="<?php echo site_url('admin_panel/settings/subjects'); ?>">
		  	  	<i class="menu-icon fa fa-caret-right"></i> 
		  	  	Subjects
		  	  </a>

		  	  <b class="arrow"></b>
		  	</li>
		  </ul>
		</li><!-- settings -->

		<!-- <li class="">
		  <a href="<?php echo site_url('admin_panel/user_mngmnt'); ?>">
		    <i class="menu-icon fa fa-users"></i> 
		    <span class="menu-text"> User Management</span>
		  </a>

		  <b class="arrow"></b>
		</li> --><!-- user-management -->

		<li class="">
		  <a href="#" class="dropdown-toggle">
		  	<i class="menu-icon fa fa-folder-open-o"></i>
		  	<span class="menu-text"> Data Management</span>

		  	<b class="arrow fa fa-angle-down"></b>
		  </a>

		  <b class="arrow"></b>

		  <ul class="submenu">
		  	<li class="">
			    <a href="<?php echo site_url('admin_panel/data_mngmnt/restore'); ?>">
			    	<i class="menu-icon fa fa-caret-right"></i> 
			      Restore
			    </a>

			    <b class="arrow"></b>
			  </li><!-- restore -->

			  <li class="">
			    <a href="<?php echo site_url('admin_panel/data_mngmnt/backup'); ?>">
			    	<i class="menu-icon fa fa-caret-right"></i> 
			      Backup
			    </a>

			    <b class="arrow"></b>
			  </li><!-- backup -->
		  </ul>
		</li><!-- data-management -->
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
					  <a href="<?php echo site_url('admin_panel/dashboard'); ?>">Dashboard</a>
					</li>
					<li>
					  <a href="#">Reports</a>
					</li>
					<li>
					  <a href="#">Evaluation Reports</a>
					</li>
					<li class="">
						<a href="<?php echo site_url('admin_panel/report/evaluation/high_school'); ?>">High School</a>
					</li>
					<li class="active"><?php echo date('F d, Y', $date); ?></li>
			  </ul><!-- /.breadcrumb -->
			</div><!-- breadcrumbs -->

			<div class="page-content">
			  <div class="page-header">
			    <h1>
			      Reports
			      <small>
			        <i class="ace-icon fa fa-angle-double-right"></i>
							Evaluation Reports
							<i class="ace-icon fa fa-angle-double-right"></i>
							High School
							<i class="ace-icon fa fa-angle-double-right"></i>
							<?php echo date('F d, Y', $date); ?>
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

			      <div class="clearfix">
							<!-- <div class="pull-right tableTools-container"></div> -->
				  	</div><!-- clearfix -->

					  <div>
					  	<div class="text-right">
					  		<a href="#" id="print" class="btn btn-white btn-danger btn-bold">
									<i class="ace-icon fa fa-print bigger-120 red"></i>
								</a>
								<a href="<?php echo site_url('admin_panel/report/evaluation/high_school'); ?>" class="btn btn-white btn-danger btn-bold">
									<i class="ace-icon fa fa-arrow-left bigger-120 red"></i>
								</a>
					  	</div>
					  	<br/>
					  	<div id="printable">
					  		<h4>
					  			<small>
					  				Evaluaee: <?php echo $evlee->fname.' '.$evlee->mname.' '.$evlee->lname; ?>
					  				<span class="pull-right">Date: <?php echo date('F d, Y', $date); ?></span><br/>
					  			</small>
					  		</h4>
						    <table id="simple-table" class="table table-striped table-bordered table-hover">
						    	<thead>
						    		<tr>
						    			<th>Question</th>
						    			<th style="text-align:center">6</th>
						    			<th style="text-align:center">5</th>
						    			<th style="text-align:center">4</th>
						    			<th style="text-align:center">3</th>
						    			<th style="text-align:center">2</th>
						    			<th style="text-align:center">1</th>
						    			<th style="text-align:center">AVG.</th>
						    		</tr>
						    	</thead>
						      <tbody>
						      <?php $tavg = 0; ?>
						      <?php if ($reports): ?>
						        <?php foreach($reports as $item): ?>
						        <tr>
						        	<td class="col-xs-7 col-sm-7"><?php echo $item->question; ?></td>
						        	<td class="col-xs-1 col-sm-1" style="text-align:center"><?php echo $item->exlnt; ?></td>
						        	<td class="col-xs-1 col-sm-1" style="text-align:center"><?php echo $item->vry_good; ?></td>
						        	<td class="col-xs-1 col-sm-1" style="text-align:center"><?php echo $item->good; ?></td>
						        	<td class="col-xs-1 col-sm-1" style="text-align:center"><?php echo $item->stsfctry; ?></td>
						        	<td class="col-xs-1 col-sm-1" style="text-align:center"><?php echo $item->fair; ?></td>
						        	<td class="col-xs-1 col-sm-1" style="text-align:center"><?php echo $item->poor; ?></td>
						        	<?php $avg = ((intval(6) * $item->exlnt) + (intval(5) * $item->vry_good) + (intval(4) * $item->good) + (intval(3) * $item->stsfctry) + (intval(2) * $item->fair) + (intval(1) * $item->poor)) / ($item->exlnt + $item->vry_good + $item->good + $item->stsfctry + $item->fair + $item->poor); ?>
						        	<?php $total_avg = ($tavg += number_format((float)$avg, 2, '.', '')) / count($reports); ?>
						        	<td class="col-xs-1 col-sm-1" style="text-align:center"><?php echo number_format((float)$avg, 2, '.', ''); ?></td>
						       	</tr>
						       	<?php endforeach; ?>
						       	<tr>
						       		<td colspan="7"><b>TOTAL RATING:</b></td>
						       		<td class="col-xs-1 col-sm-1"><?php echo $total_avg; ?></td>
						       	</tr>
						      <?php else: ?>
						      	<tr>
						      		<td colspan="7">Table empty! No records to show.</td>
						      	</tr>
						    	<?php endif; ?>
						      </tbody>
						    </table>
						    <h5 class="help-block"><small><em><strong>Legend:</strong></em> <span class="blue">6 = Excellent</span> | <span class="light-blue">5 = Very Good</span> | <span class="green">4 = Good</span> | <span class="light-green">3 = Satisfactory</span> | <span class="orange">2 = Fair</span> | <span class="red">1 = Poor</span></small></h5>
						  </div>
					  </div>
			    </div><!-- col-xs-12 -->
			  </div><!-- row -->
			</div><!-- page-content -->
	  </div><!-- main-content-inner -->
	</div><!-- main-content -->

	<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
	  <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
	</a>

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

	<!--[if lte IE 8]>
	  <script src="assets/js/excanvas.min.js"></script>
	<![endif]-->
	<script src="<?php echo base_url('assets/js/jquery-ui.custom.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.ui.touch-punch.min.js.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootbox.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.flot.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.flot.pie.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/jQuery.print.js'); ?>"></script>

	<!-- ace scripts -->
	<script src="<?php echo base_url('assets/js/ace-elements.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/ace.min.js'); ?>"></script>

	<!-- page specific plugin scripts -->
	<script type="text/javascript">
		$(function(){
			$('#print').on('click', function() {
				$.print('#printable');
			});
		});
	</script>

	<script type="text/javascript">
	  jQuery(function($) {
	    //Confirm Dialog
	  	<?php foreach($courses as $item): ?>
	  	$("#confirm_<?php echo $item->id; ?>").on(ace.click_event, function() {
	  		bootbox.dialog({
	  		  message: "Are you sure you want to delete this data?",
	  		  title: "Confirm",
	  		  buttons: {
	  		    success: {
	  		      label: "<i class='ace-icon fa fa-trash-o'></i> Delete",
	  		      className: "btn btn-danger bigger-110",
	  		      callback: function() {
	  		      	var id = $("#confirm_<?php echo $item->id;?>").attr('data-id');
	  		        var link = "<?php echo site_url('admin_panel/settings/course/delete/"+id+"'); ?>";
	  		        
	  		        document.location.assign(link);
	  		      }
	  		    },
	  		    cancel: {
	  		      label: "<i class='ace-icon fa fa-close'></i> Cancel",
	  		      className: "btn btn-default bigger-110"
	  		    }
	  		  }
	  		});
	  	});
	  	<?php endforeach; ?>
	  });
	</script>

	<!-- inline scripts related to this page -->
	<script type="text/javascript">
	  jQuery(function($) {
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
  </div><!-- main-container -->
</body>