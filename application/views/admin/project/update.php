<script type="text/javascript">
    $().ready(function(){
        $("#edit_form").validate({
            rules: {
                project_name: {
                    required: true,

                },
                client_name: {
                    required: true,

                },
                owner_name: {
                    required: true,

                },
                start_date: {
                    required: true,
                },
                end_date: {
                    required: true
                },
                responsible: {
                    required: true,

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
                f_data.append('id', $('input[name=hidden_id]').val());

                $.ajax
                ({
                    url: '<?php echo base_url()?>project/edit_project_action',
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
        <div class="messge_style_contact" id="myDiv_contact_add" style="color: green;font-size: 17px; margin: auto; text-align: center; display:none"> <font>Edit Project Sucessfully </font> </div>
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Edit Project</h1>
              	<div class="row">
            	<div class="col-md-12">
               		<div class="panel panel-info">
                    	<div class="panel-heading">
                        	EDIT PROJECT
                    	</div>
                    	<div class="panel-body">
                         	<?php echo validation_errors(); ?>
 							<?php
                            $arrtibutes=array('id'=>'edit_form');
                            echo form_open('',$arrtibutes); ?>
                            	<div class="form-group">
                                	<label>Project Name</label>
                                    <input type="hidden" value="<?php echo $data['id']; ?>" name="hidden_id" id="hidden_id">
                                	<input class="form-control" value="<?php echo $data['project_name'];?>"  name="project_name" id="project_name" type="text">
                            	</div>
                            	<div class="form-group">
                                	<label>Client Name</label>
                                	<input class="form-control" value="<?php echo $data['client_name'];?>"  name="client_name" id="client_name" type="text">
                            	</div>
                            	<div class="form-group">
                                	<label>Owner Name</label>
                                	<input class="form-control" value="<?php echo $data['owner_name'];?>"  name="owner_name" id="owner_name" type="text">
                            	</div>
                            	<div class="form-group">
                                	<label>Start Date</label>
                                	<input class="form-control" value="<?php echo $data['start_date'];?>"  name="start_date" id="start_date" type="Date">
                            	</div>
                            	<div class="form-group">
                                	<label>End Date</label>
                                	<input class="form-control" value="<?php echo $data['end_date'];?>"  name="end_date" id="end_date" type="Date">
                            	</div>
                            	<div class="form-group">
                                	<label>Responsible</label>
                                	<input class="form-control" value="<?php echo $data['responsible'];?>"  name="responsible" id="responsible" type="text">
                            	</div>
                            	<div class="form-group">
                                	<label>Status</label>
                                	<select class="form-control" name="status">
                                		<?php
                                		if($data['status']=='0')
                                		{
                                			?>
                                			<option value="0">Processing</option>
                                        	<option value="1">Hold</option>
                                			<option value="2">Complete</option>
                                			<?php
                                		}
                                		if($data['status']=='1')
                                		{
                                			?>
                                			
                                        	<option value="1">Hold</option>
                                			<option value="2">Complete</option>
                                			<option value="0">Processing</option>
                                			<?php
                                		}
                                		if($data['status']=='2')
                                		{
                                			?>
                                			<option value="2">Complete</option>
                                        	<option value="1">Hold</option>
                                			<option value="0">Processing</option>
                                			<?php
                                		}
                                		?>



                                	</select>
                                	   
                            	</div>
                            	<input type="submit"  class="btn btn-info" value="Edit project">
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