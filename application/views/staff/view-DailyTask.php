<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Daily Task Management
      </h1>
      <ol class="breadcrumb">
      
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url(); ?>view-Dailytask">View Daily Tasks </a></li>
       
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
              <h3 class="box-title">View Daily Task</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Job Title</th>
                    <th>Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Status</th>
                    <th>Description</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                    if(isset($content)):
                    $i=1; 
                    foreach($content as $cnt): 
                  ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $cnt['jobTitle']; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($cnt['jobDate'])); ?></td>
                        <td><?php echo $cnt['startTime']; ?></td>
                        <td><?php echo $cnt['endTime']; ?></td>
                        <td>
                          <?php if($cnt['status']==0): ?>
                          <span class="label label-info">Pending</span>
                          <?php elseif($cnt['status']==1): ?>
                          <span class="label label-success">Approved</span>
                          <?php elseif($cnt['status']==2): ?>
                          <span class="label label-danger">Rejected</span>
                          <?php endif; ?>
                        </td>
                        <td><?php echo $cnt['description']; ?></td>
                      
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

    