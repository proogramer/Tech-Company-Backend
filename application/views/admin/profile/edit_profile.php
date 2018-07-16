<script type="text/javascript">
    $.validator.setDefaults({
        submitHandler: function()
        {
            var proceed=true;
            if(proceed)
            {
                var f_data= new FormData();
                f_data.append('hidden_id', $('input[name=hidden_id]').val());
                f_data.append('name', $('input[name=name]').val());
                f_data.append('email', $('input[name=email]').val());
                f_data.append('mobile', $('input[name=mobile]').val());
                $.ajax
                ({
                    url: '<?php echo base_url();?>profile/edit_profile_action',
                    data:f_data,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    dataType:'json',
                    success: function(response)
                    {
                        if(response.type == 'success')
                        {
                                $('#myDiv_contact_add').show().delay(5000).fadeOut();
                                $('body,html').animate({
                                    scrollTop: 100
                                }, 600);
                                setTimeout(function(){window.location.href="<?php echo base_url()?>admin/profile"},5000);
                                2
                        }
                    }
                });
            }
        }
    });
    $().ready(function(){
        $("#edit_profile").validate({
            rules:
                {
                    name:
                        {
                            required:true,
                        },
                    email:
                        {
                            required:true,
                            email:true,
                        },
                    mobile:
                        {
                            required:true,
                            number:true,
                            minlength:10,
                            maxlength:10,
                        }
                },
            messages:
                {
                    name:
                        {
                            required:"Please Enter The Name ",
                        },
                    email:
                        {
                            required:"Please Enter The Email",
                            email:"Please Enter The Valid Email Id",
                        },
                    mobile:
                        {
                            required:"Please Enter The Mobile Number",
                            minlength:"Please Enter The Valid Mobile Number",
                            maxlength:"Please Enter The Valid Mobile Number"
                        }
                },
        });
    });
</script>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="messge_style_contact" id="myDiv_contact_add" style="color: green;font-size: 17px; margin: auto; text-align: center; display:none"> <font>Edit Profile Sucessfully </font> </div>
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Edit Profile</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Edit Profile
                        </div>
                        <div class="panel-body">
                           <?php
                           $attributes=array('id'=>'edit_profile');
                           echo form_open('',$attributes)?>
                                <div class="form-group">
                                    <label>Enter Name</label>
                                    <input type="hidden" name="hidden_id" value="<?php echo $fetch['id']; ?>">
                                    <input class="form-control" value="<?php echo $fetch['admin_name']; ?>"  name="name" id="name" type="text">
                                </div>
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input class="form-control" value="<?php echo $fetch['admin_email']; ?>"  name="email" id="email" type="text">
                                </div>
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input class="form-control" value="<?php echo $fetch['mobile']; ?>" name="mobile" id="mobile" type="text">
                                </div>
                                <input type="submit"  class="btn btn-info" value="Edit Profile">
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>