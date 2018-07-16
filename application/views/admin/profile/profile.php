<style type="text/css">
    .error
    {
        color: red;
    }
    div.container {
        margin: 5px;
        padding: 5px;
        display: none
    }
    div.container ol li {
        list-style-type: none;
        margin-left: 20px;
    }
</style>
<script type="text/javascript">
    $.validator.setDefaults({
        submitHandler: function()
        {
            var proceed=true;
            if(proceed)
            {
                var f_data= new FormData();
                f_data.append('current_password', $('input[name=current_password]').val());
                f_data.append('password', $('input[name=password]').val());
                f_data.append('confirm_password', $('input[name=confirm_password]').val());
                $.ajax
                ({
                    url: '<?php echo base_url();?>profile/change_password_action',
                    data:f_data,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    dataType:'json',
                    success: function(response)
                    {
                       if(response.type=='success')
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
        var container = $('.container');
        var validator = $("#change_password").validate({
            rules:
                {
                    current_password:
                        {
                            required:true,
                            remote:
                                {
                                    url:'<?php echo base_url()?>profile/exist_password',
                                    type:'POST',
                                }
                        },
                    password:
                        {
                            required:true,
                            minlength:3,
                        },
                    confirm_password:
                        {
                            required:true,
                            equalTo: "#password",
                        },
                },
            messages:
                {
                    current_password:
                        {
                            required:"Please Enter The Password",
                            remote:"Current Password is wrong",
                        },
                    password:
                        {
                            required:"Please Enter New The Password",
                            minlength:"Password must be atleast 3 Values"
                        },
                    confirm_password:
                        {
                            required:"Please Enter The Confirm Password",
                            equalTo:"Password is not Matching With The New Password"
                        },

                },
            errorContainer: container,
            errorLabelContainer: $("ol", container),
            wrapper: 'li'
        });
    });
</script>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="messge_style_contact" id="myDiv_contact_add" style="color: green;font-size: 17px; text-align: center; display:none"> <font>Password Change Sucessfully</font> </div>
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Profile</h1>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Profile

                        </div>

                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Admin Name </th>
                                        <th>E-mail</th>
                                        <th>Mobile</th>
                                        <th>Edit</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                            <tr>
                                               <td><?php echo $fetch['admin_name']; ?></td>
                                               <td><?php echo $fetch['admin_email']; ?></td>
                                               <td><?php echo $fetch['mobile']; ?></td>
                                                <td><a href="<?php echo base_url()?>admin/profile/edit_profile/<?php echo $fetch['id']; ?>"><button  class=btn btn-info >Edit</button></td>
                                            </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h2>Password Change</h2>
                    <hr>

                        <?php
                        $attributes=array('id'=>'change_password','class'=>'form-inline');
                        echo form_open('',$attributes);
                        ?>
                        <div class="form-group">
                            <label for="current_password">Current Password:</label>
                            <input type="password" class="form-control" id="current_password" placeholder="Current Password" name="current_password">
                        </div>
                        <div class="form-group">
                            <label for="pwd">New Password:</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Confirm Password:</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm password" name="pwd">
                        </div>
                        <button type="submit" name="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="container">
                        <h2>Error:</h2>
                        <hr>
                        <ol>
                            <li>
                                <label for="current_password" class="error"></label>
                            </li>
                            <li>
                                <label for="password" class="error"></b> </label>
                            </li>
                            <li>
                                <label for="confirm_password" class="error"></b> </label>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
