<link href=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
        rel="stylesheet">
    <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js">
    </script>
    <script src=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js">
    </script>
 
    <!-- Include Moment.js CDN -->
    <script type="text/javascript" src=
"https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js">
    </script>
 
    <!-- Include Bootstrap DateTimePicker CDN -->
    <link
        href=
"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css"
        rel="stylesheet">
 
    <script src=
"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js">
        </script>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Daily Task Management
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url(); ?>apply-Daily-Task">Task Management</a></li>
        <li class="active">Apply Task</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <?php echo validation_errors('<div class="col-md-12">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Failed!</h4>', '</div>
          </div>'); ?>

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

        <!-- column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Apply Task</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open('DailyTask/insert'); ?>
              <div class="box-body">
               
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Task Title</label>
                    <input type="text" name="jobTitle" class="form-control" placeholder="Title">
                    <font color="#FF0000"><?php echo form_error('Title'); ?></font>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Task Date</label>
                    <input type="date" name="jobDate" class="form-control" placeholder="Date">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Start Time</label>
                    <input type="text" name="StartTime" class="form-control" id="datetime1" placeholder="Start Time">
                  </div>
                </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">End Time</label>
                    <input type="text" name="EndTime" class="form-control" id="datetime2" placeholder="End Time">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea name="txtdescription" class="form-control" placeholder="Description"></textarea>
                  </div>
                </div>

                
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-success pull-right">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <script>
 
        // Below code sets format to the
        // datetimepicker having id as
        // datetime
        $('#datetime1').datetimepicker({
            format: 'hh:mm:ss a'
        });
        $('#datetime2').datetimepicker({
            format: 'hh:mm:ss a'
        });
    </script>