<script type="text/javascript">
    $().ready(function(){
        $("#add_project").validate({
            rules: {
                project_name: {
                    required: true,
                    maxlength: 20,
                },
                client_name: {
                    required: true,
                    maxlength: 20,
                },
                owner_name: {
                    required: true,
                    maxlength: 20,
                },
                start_date: {
                    required: true,
                },
                end_date: {
                    required: true
                },
                responsible: {
                    required: true,
                    maxlength: 20,
                },
                status: {
                    required: true,

                }
            }
        });
    });
</script>
<script type="text/javascript">
    $.validator.setDefaults({
        submitHandler: function () {
            var proceed=true;
            if(proceed)
            {
                var form = $('form')[0];
                var f_data= new FormData(form);
                f_data.append('project_name', $('input[name=project_name]').val());
                f_data.append('client_name', $('input[name=client_name]').val());
                f_data.append('owner_name', $('input[name=owner_name]').val());
                f_data.append('start_date', $('input[name=start_date]').val());
                f_data.append('end_date', $('input[name=end_date]').val());
                f_data.append('responsible', $('input[name=responsible]').val());
                f_data.append('status', $('select[name=status]').val());

                $.ajax
                ({
                    url: '<?php echo base_url()?>project/add_project_action',
                    data: f_data,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    dataType: 'json',
                    success: function (response) {
                        if (response.type == 'success') {
                            $('#myDiv_contact_add').show().delay(5000).fadeOut();
                            $('body,html').animate({
                                scrollTop: 100
                            }, 600);
                            setTimeout(function () {
                                window.location.href = "<?php echo base_url()?>admin/project/view_all_project"
                            }, 5000);
                            2
                        }
                    }
                });
            }

        }
    });


</script>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="messge_style_contact" id="myDiv_contact_add" style="color: green;font-size: 17px; margin: auto; text-align: center; display:none"> <font>Add  Sucessfully </font> </div>
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Add Project</h1>
              	<div class="row">
            	<div class="col-md-12">
               		<div class="panel panel-info">
                    	<div class="panel-heading">
                        	ADD PROJECT
                    	</div>
                    	<div class="panel-body">
                         	<?php echo validation_errors(); ?>

 							<?php
                            $attributes=array('id'=>'add_project');
                            echo form_open('',$attributes); ?>
                            	<div class="form-group">
                                	<label>Project Name</label>
                                	<input class="form-control" name="project_name" id="project_name" type="text">    
                            	</div>
                            	<div class="form-group">
                                	<label>Client Name</label>
                                	<input class="form-control"  name="client_name" id="client_name" type="text">    
                            	</div>
                            	<div class="form-group">
                                	<label>Owner Name</label>
                                	<input class="form-control" name="owner_name" id="owner_name" type="text">    
                            	</div>
                            	<div class="form-group">
                                	<label>Start Date</label>
                                	<input class="form-control" name="start_date" id="start_date" type="Date">    
                            	</div>
                            	<div class="form-group">
                                	<label>End Date</label>
                                	<input class="form-control"  id="end_date" name="end_date" type="Date">
                            	</div>
                            	<div class="form-group">
                                	<label>Responsible</label>
                                	<input class="form-control" name="responsible" id="responsible" type="text">    
                            	</div>
                            	<div class="form-group">
                                	<label>Status</label>
                                	<select class="form-control" name="status">
                                        <option value="">Status</option>
                                		<option value="0">Processing</option>
                                        <option value="1">Hold</option>
                                		<option value="2">Complete</option>
                                	</select>
                                	   
                            	</div>
                            	<input type="submit"  class="btn btn-info" value="Add project">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        $("#end_date").on('change', function(){
            end_date=document.getElementById('end_date').value;
            start_date=document.getElementById('start_date').value;
            if(start_date > end_date)
            {
                alert('End Date should be greater than start date');
                end_date=document.getElementById('end_date').value='';
            }
        })

    });
</script>