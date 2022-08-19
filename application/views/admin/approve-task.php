<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Daily Task Management
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url(); ?>approve-DailyTask">Daily Task Management</a></li>
        <li class="active">Approve Daily Task</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <?php if($this->session->flashdata('success')): ?>
          <div class="col-md-12">
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Success!</h4>
                  <?php echo $this->session->flashdata('success'); ?>
            </div>
          </div>
        <?php elseif($this->session->flashdata('error')):?>
        <div class="col-md-12">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Failed!</h4>
                  <?php echo $this->session->flashdata('error'); ?>
            </div>
          </div>
        <?php endif;?>

        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Approve Daily Task</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Staff</th>
                    <th>Photo</th>
                   
                    <th>Job Title</th>
                    <th>Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Hours</th>
                    <th>Description</th>
                    
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php $datetime1 = new DateTime($cnt['startTime']);
$datetime2 = new DateTime($cnt['endTime']);
$interval = $datetime1->diff($datetime2);

                    if(isset($content)):
                    $i=1; 
                    foreach($content as $cnt): 
                  ?>
                  
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $cnt['staff_name']; ?></td>
                        <td><img src="<?php echo base_url(); ?>uploads/profile-pic/<?php echo $cnt['pic'] ?>" class="img-circle" width="50px" alt="User Image"></td>
                        <td><?php echo $cnt['jobTitle']; ?></td>
                        <td><?php echo date('Y-m-d', strtotime($cnt['jobDate'])); ?></td>
                        <td><?php echo $cnt['startTime']; ?></td>
                       <td><?php echo $cnt['endTime']; ?></td>
                       <td><?php echo $interval->format('%hh %im')?></td>
                        <td><?php echo $cnt['description']; ?></td>
                        
                        <td>
                          <a href="<?php echo base_url(); ?>task-approved/<?php echo $cnt['dailyTaskId']; ?>" class="btn btn-success">Approve</a>
                          <a href="<?php echo base_url(); ?>task-rejected/<?php echo $cnt['dailyTaskId']; ?>" class="btn btn-danger">Reject</a>
                        </td>
                      </tr>
                    <?php 
                      $i++;
                      endforeach;
                      endif; 
                    ?> 
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

    