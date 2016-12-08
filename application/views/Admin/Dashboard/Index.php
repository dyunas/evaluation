<body class="no-skin">
  <div id="navbar" class="navbar navbar-red">
	<script type="text/javascript">
	  try{ace.settings.check('navbar' , 'fixed')}catch(e){}
	</script>
<style>
div.orgChart div.node {
    width: auto;
}
</style>
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
			<li class="active">
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

			<li class="">
			  <a href="#" class="dropdown-toggle">
			    <i class="menu-icon fa fa-file-o"></i>
			    <span class="menu-text"> Reports</span>

			    <b class="arrow fa fa-angle-down"></b>
			  </a>

			  <b class="arrow"></b>

			  <ul class="submenu">
			  	<li class="">
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
					  	
					  	<li class="">
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

			<!--<li class="">
			  <a href="<?php echo site_url('admin_panel/user_mngmnt'); ?>">
			    <i class="menu-icon fa fa-users"></i> 
			    <span class="menu-text"> User Management</span>
			  </a>

			  <b class="arrow"></b>
			</li>--><!-- user-management -->

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
			<li class="active"></li>
		  </ul><!-- /.breadcrumb -->
		</div><!-- breadcrumbs -->

		<div class="page-content">
		  <div class="page-header">
		    <h1>
		      Dashboard
		      <small>
		        <i class="ace-icon fa fa-angle-double-right"></i>
						overview
		      </small>
		    </h1>
		  </div><!-- page-header -->

		  <div class="row">
		    <div class="col-xs-3">
		      <div class="widget-box transparent">
		        <div class="widget-header widget-header-flat">
		          <h4 class="widget-title lighter">
							  Evaluation
							</h4>
							
						  <div class="widget-toolbar">
						    <label>
						      <?php $active = $this->Dashboard_model->check_eval_active(); ?>
						        <?php if($active): ?>
						        	<?php if ($active->is_active): ?>
						        		<a href="javascript:();" id="toggler_off" data-id="0" class="green">ONLINE</a>
							        <?php else: ?>
							        	<a href="javascript:();" id="toggler_on" data-id="1" class="red">OFFLINE</a>
							        <?php endif; ?>
							      <?php else: ?>
							      	<a href="javascript:();" id="toggler_on" data-id="1" class="red">OFFLINE</a>
						      	<?php endif; ?>
						      <span class="lbl middle"></span>
						    </label>
						  </div><!-- widget-toolbar -->
		        </div><!-- widget-header -->
		      </div><!-- widget-box -->
		    </div><!-- col-sm-5 -->

		    <div class="col-sm-4">
		      <div class="widget-box transparent">
		        <div class="widget-header widget-header-flat">
		          <h4 class="widget-title lighter">
							  Ended on:
							  <label>
						      <?php $last = $this->Dashboard_model->get_last_eval_session(); ?>
						      <?php if($last): ?>
						      	<?php echo date('m-d-y h:i:s A', $last->date); ?>
						      <?php else: ?>
						      	Never
						    	<?php endif; ?>
						      <span class="lbl middle"></span>
						    </label>
							</h4>
		        </div><!-- widget-header -->
		      </div><!-- widget-box -->
		    </div><!-- col-sm-5 -->

		    <div class="col-sm-5">
		      <div class="widget-box transparent">
		        <div class="widget-header widget-header-flat">
		          <h4 class="widget-title lighter">
		          	Progress:
							  <label>
						      <?php echo '<a href="'.site_url('admin_panel/evaluation/progress/'.$date->date).'">'.$progress.'</a> out of '. $total; ?>
									have evaluated
						      <span class="lbl middle"></span>
						    </label>
							</h4>
		        </div><!-- widget-header -->
		      </div><!-- widget-box -->
		    </div><!-- col-sm-5 -->
		  </div><!-- row -->

		  <div class="hr hr-18 hr-double dotted"></div><!-- hr -->
		  
		  <div class="row">
		    <div class="col-lg-12 col-sm-12 col-xs-12">
		      <div class="widget-box transparent">
		        <!-- <div class="widget-header widget-header-flat">
		          <h4 class="widget-title lighter">
								<i class="ace-icon fa fa-signal blue"></i>
						    Statistics(under construction)
						  </h4>
		        </div> --><!-- widget-header -->

		        <!-- <div class="widget-body">
		          <div class="widget-main no-padding">
						    <div id="statistics"></div>
						  </div>
		        </div> --><!-- widget-body -->
		        <div class="widget-header widget-header-flat">
		          <h4 class="widget-title lighter">
								<i class="ace-icon fa fa-signal blue"></i>
						    Organizational Chart
						  </h4>
						  
						  <div class='text-right' style="margin-bottom:15px;">
						  <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#sM">Appoint Personnel</button>
						  </div>
		        </div>

		        <div class="widget-body">
		          <div class="widget-main no-padding">
						    <div id="chart"></div>
						  </div>
		        </div>
		      </div><!-- widget-box -->
		    </div><!-- col-xs-12 -->
		  </div><!-- row -->

		  <div class="hr hr-18 hr-double dotted"></div><!-- hr -->
		</div><!-- page-content -->
	  </div><!-- main-content-inner -->

	  <ul id="big-nodes-source" class="hide">
			<?php echo $generated; ?>
		</ul>
	</div><!-- main-content -->

	<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
	  <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
	</a>
  </div><!-- main-container -->

  <div class="modal fade bs-example-modal-md" id="sM" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	  <div class="modal-dialog modal-md">
	    <div class="modal-content">
	    	<div class="moda-body">
	      <div class='row'>
	      	<div class='col-md-4'></div>
	      	<div class='col-md-4'>
	      <h4>Appoint Personnel</h4>
	      	</div>
	      	<div class='col-md-4'></div>
	      </div>

	      <div class='row' style="margin:20px">
	      	<div class='col-md-4'>
	      		<label>Select Personnel</label>
	      	</div>
	      	<div class='col-md-4'>
	      		<select id='head_node'>
	      			<option value="">---</option>
	      			<?=$head_node?>
	      		</select>
	      	</div>
	      	<div class='col-md-4'></div>
	      </div>
	      <div class='row' style="margin:20px">
	      	<div class='col-md-12'>
	      		<table class='table table-condensed' id='emp_node'>
	      			<tr>
	      				<th>Employee</th>
	      				<th>Position</th>
	      			</tr>
	      			<tbody id="tb"></tbody>
	      		</table>
	      	</div>
	      </div>
	      <div class='row' style="margin:20px">
	      	<div class='col-md-12 text-right' style=''>
	      		<button class='btn btn-lg btn-primary' id="confirm">Confirm</button>
	      	</div>
	      </div>
	    	</div>
	    </div>
	  </div>
	</div>

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
	<script src="<?php echo base_url('assets/js/jquery.orgchart.js'); ?>"></script>
	<script type="text/javascript">
		$(function() {
		  $("#big-nodes-source").orgChart({container: $("#chart")});
		  
		  $('#head_node').change(function(){
		  	var notEql = $(this).val();
		  $.get("<?=base_url('Admin/Dashboard/Dashboard/getListItem')?>",
		  	{ empNot : notEql},
		  	function(data){
		  		$('#tb').html(data);
		  });
		  });
		  $('#confirm').click(function(e){
		  	var parent_node = $('#head_node').val();
		  	$('.child_node').each(function(){
		  	if($(this).is(':checked')==true){
		  		var child_node = $(this).val();
		  		$.get("<?=base_url('Admin/Dashboard/Dashboard/appoint_child')?>",{
		  			cm_head : parent_node, cm_child : child_node
		  		},function(data){

		  		});
		  	}
		  	});
		  	location.reload();
		  })
		});

	</script>
	

	<!--[if lte IE 8]>
	  <script src="assets/js/excanvas.min.js"></script>
	<![endif]-->
	<script src="<?php echo base_url('assets/js/jquery-ui.custom.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.flot.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.flot.pie.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootbox.min.js'); ?>"></script>

	<!-- ace scripts -->
	<script src="<?php echo base_url('assets/js/ace-elements.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/ace.min.js'); ?>"></script>

	<!-- inline scripts related to this page -->
	<script type="text/javascript">
	//TestFunction Ginawa ko para kay Bravo
	function testFunction(id){
		var dm = confirm('Remove this from branch');
		if(dm){
			$.get('<?=base_url()?>Admin/Dashboard/Dashboard/removeBranch',{child:id},
			function(data){
				//alert(data);
				if(data==1){
					location.reload();
				}else{
					alert('Failed to Remove!');
				}
			});
		}
	}
	//Bravo
	  jQuery(function($) {
	  	// Toggler
	  	// $('#toggler').click(function() {
	  	// 	$('#form').submit();
	  	// });
		
	  	$("#toggler_on").on(ace.click_event, function() {
	  		bootbox.dialog({
	  		  message: "Turn on evaluation?",
	  		  title: "Confirm",
	  		  buttons: {
	  		    success: {
	  		      label: "<i class='ace-icon fa fa-check'></i> Confirm",
	  		      className: "btn btn-success bigger-110",
	  		      callback: function() {
	  		      	var id = $("#toggler_on").attr('data-id');
	  		        var link = "<?php echo site_url('admin_panel/evaluation_status/"+id+"'); ?>";
	  		        
	  		        document.location.assign(link);
	  		      }
	  		    },
	  		    cancel: {
	  		      label: "<i class='ace-icon fa fa-close'></i> Cancel",
	  		      className: "btn btn-danger bigger-110"
	  		    }
	  		  }
	  		});
	  	});

	  	$("#toggler_off").on(ace.click_event, function() {
	  		bootbox.dialog({
	  		  message: "Turn off evaluation?",
	  		  title: "Confirm",
	  		  buttons: {
	  		    success: {
	  		      label: "<i class='ace-icon fa fa-check'></i> Confirm",
	  		      className: "btn btn-success bigger-110",
	  		      callback: function() {
	  		      	var id = $("#toggler_off").attr('data-id');
	  		        var link = "<?php echo site_url('admin_panel/evaluation_status/"+id+"'); ?>";
	  		        
	  		        document.location.assign(link);
	  		      }
	  		    },
	  		    cancel: {
	  		      label: "<i class='ace-icon fa fa-close'></i> Cancel",
	  		      className: "btn btn-danger bigger-110"
	  		    }
	  		  }
	  		});
	  	});

	  	// Statistics
	  	var d1 = [];
		for (var i = 0; i < Math.PI * 2; i += 0.5) {
		  d1.push([i, Math.sin(i)]);
		}

		var d2 = [];
		for (var i = 0; i < Math.PI * 2; i += 0.5) {
		  d2.push([i, Math.cos(i)]);
		}

	  	var stats = $('#statistics').css({'width':'100%' , 'height':'220px'});
		$.plot("#statistics", [
		  { label: "High School", data: d1 },
		  { label: "College", data: d2 }
		],{
		    hoverable: true,
			shadowSize: 0,
			series: {
			  lines: { show: true },
			  points: { show: true }
			},
			xaxis: {
			  tickLength: 0
			},
			yaxis: {
			  ticks: 10,
			  min: -3,
			  max: 3,
			  tickDecimals: 0
			},
			grid: {
			  backgroundColor: { colors: [ "#fff", "#fff" ] },
			  borderWidth: 1,
			  borderColor:'#555'
			}
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