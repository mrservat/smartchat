<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="Smart Logic  Open Source Chat System">
        <meta name="author" content="Coderthemes">
        <link rel="shortcut icon" href="<?=base_url();?>assets/images/favicon_1.ico">
        <title>ჩეთის ადმინისტრატორი</title>
        <link href="<?=base_url();?>assets/plugins/nestable/jquery.nestable.css" rel="stylesheet">
        <link href="<?=base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?=base_url();?>assets/css/core.css" rel="stylesheet" type="text/css">
        <link href="<?=base_url();?>assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="<?=base_url();?>assets/css/components.css" rel="stylesheet" type="text/css">
        <link href="<?=base_url();?>assets/css/pages.css" rel="stylesheet" type="text/css">
        <link href="<?=base_url();?>assets/css/menu.css" rel="stylesheet" type="text/css">
        <link href="<?=base_url();?>assets/css/responsive.css" rel="stylesheet" type="text/css">
        <script src="<?=base_url();?>assets/js/modernizr.min.js"></script>
		<link href="<?=base_url();?>assets/plugins/notifications/notification.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="<?=base_url();?>assets/js/jquery.min.js"></script>
        <script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){
          $('.update_ban').click(function() {
                data = {};
                data['val'] = $(this).attr('id');  

                if(confirm('დავბლოკოთ მომხმარებელი ?'))
                         {
                          $.ajax({
                          type: "POST",  
                          url: "<?=base_url()."blacklist/confutation_banlist";?>",  
                          cache:false,  
                          data: data,
                          dataType: "json",       
                          success: function(response)  
                          {   
                                //$("#loading").hide();
                                if(response.status) {
                                  $.Notification.notify('success','top center', 'ყურადღება', response.msg);
                                  setTimeout(function(){window.location.reload(1); }, 3000);		
                                } else {
                                  $.Notification.notify('success','top center', 'ყურადღება', response.msg);
                                  setTimeout(function(){window.location.assign("<?=base_url();?>blacklist"); }, 3000);		
                                }
                          }   
                        });
                        }
                });
        });

        </script>
    </head>


    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
            <!-- Top Bar Start -->
			<?php require_once('components/admin_topbar.php');?>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        <div class="pull-left">
                            <img src="<?=base_url();?>assets/images/users/girl.png" alt="" class="thumb-md img-circle">
                        </div>
                        <div class="user-info">
                         <?php require_once 'components/user_info.php'; ?>
                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                     <?php require_once('components/admin_menu.php'); ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End --> 
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <!-- Start Widget -->
 <div class="row">
<div class="col-md-12">
<div class="panel panel-default">
    <div class="panel-heading bg-warning">
        <h3 class="panel-title">დასტურის მოლოდინში</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>მომხმარებელი</th>
                                <th>IP მისამართი</th>
                                <th>ოპერატორი</th>
                                <th>შენიშვნა</th>
                                <th>ისტორია</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if(!empty($get_banlist))
                            {
                                foreach ($get_banlist as $banlist):


                            ?>
                            <tr>
                                <td></td>
                                <td><?=$banlist['online_users_name'];?>&nbsp;<?=$banlist['online_users_lastname'];?></td>
                                <td><?=$banlist['ip_address'];?></td>
                                <td><?=$banlist['first_name'];?>&nbsp;<?=$banlist['last_name'];?></td>
                                <td><?=$banlist['ban_comment'];?></td>
                                <td>
                                <a href="<?=base_url();?>blacklist/blacklist_chat/<?=$banlist['chat_id'];?>" class="btn btn-primary btn-rounded waves-effect waves-light m-b-5">საუბრის ისტორია</a>
                               
                                </td>

                            </tr>
                           <?php
                                endforeach; }
                           ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
             <div class="row">
<div class="col-lg-4">

</div>
</div>
        </div>
    </div>
</div>
</div> <!-- End row -->
 <div class="row">
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading bg-inverse">
            <h3 class="panel-title">მომხმარებლის შავი სია</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>მომხმარებელი</th>
                                    <th>ოპერატორი</th>
                                    <th>შენიშვნა</th>
                                    <th>ქმედება</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                
                                if(!empty($get_blocklist))
                                {
                                    foreach ($get_blocklist as $blocklist):
                                      
                                
                                ?>
                                <tr>
                                    <td></td>
                                    <td><?=$blocklist['online_users_name'];?>&nbsp;<?=$blocklist['online_users_lastname'];?></td>
                                    <td><?=$blocklist['first_name'];?><?=$blocklist['last_name'];?></td>
                                    <td><?=$blocklist['ban_comment'];?></td>
                                    <td>                                    
                                    <button type="button" class="btn btn-danger btn-custom waves-effect waves-light m-b-5 update_ban" id="<?=$blocklist['chat_id'];?>">ბანის მოხსნა</button>
                                    </td>
                                   
                                </tr>
                               <?php
                                    endforeach; }
                               ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

                    </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer text-right">
                    2016 © Smart Logic.
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
			<?php require_once('components/admin_online_chatlist.php');?>
            <!-- /Right-bar -->

        </div>
        <!-- END wrapper -->


    
  
         <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        
      
        <script src="<?=base_url();?>assets/js/detect.js"></script>
        <script src="<?=base_url();?>assets/js/fastclick.js"></script>
        <script src="<?=base_url();?>assets/js/jquery.slimscroll.js"></script>
        <script src="<?=base_url();?>assets/js/jquery.blockUI.js"></script>
        <script src="<?=base_url();?>assets/js/waves.js"></script>
        <script src="<?=base_url();?>assets/js/wow.min.js"></script>
        <script src="<?=base_url();?>assets/js/jquery.nicescroll.js"></script>
        <script src="<?=base_url();?>assets/js/jquery.scrollTo.min.js"></script>

        <script src="<?=base_url();?>assets/js/jquery.app.js"></script>
     
		<script src="<?=base_url();?>assets/plugins/notifyjs/dist/notify.min.js"></script>
        <script src="<?=base_url();?>assets/plugins/notifications/notify-metro.js"></script>
        <script src="<?=base_url();?>assets/plugins/notifications/notifications.js"></script>
      
        <!--script for this page only-->
        <script src="<?=base_url();?>assets/plugins/nestable/jquery.nestable.js"></script>
       
    
    </body>

</html>
