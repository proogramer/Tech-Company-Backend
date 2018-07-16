<script type="text/javascript">
    $().ready(function(){
        $("#add_vendor").validate({
            rules:
                {
                    name:
                        {
                            required:true,
                            maxlength:20,

                        },
                    email:
                        {
                            required:true,
                            email:true
                        },
                    mobile:
                        {
                            required:true,
                            number:true,
                            mobile_number:true
                        },
                    permanent_address:
                        {
                            required:true,
                            maxlength:60,
                            minlength:2,

                        },
                    present_address:
                        {
                            required:true,
                            maxlength:60,
                            minlength:2,
                        },
                    pencard:
                        {
                            required:true,
                            pencard_validate:true
                        },
                    gst:
                        {
                            required:true,
                            gst_validate:true
                        },
                    company_type:
                        {
                            required:true
                        },
                    technology:
                        {
                            required:true
                        },
                    full_name:
                        {
                            required:true,

                        },
                    bank_name:
                        {
                            required:true,

                        },
                    branch_name:
                        {
                            required:true,

                        },
                    account_number:
                        {
                            required:true,
                            account_validate:true
                        },
                    ifsc_code:
                        {
                            required:true,
                            ifsc_validate:true
                        },
                    userfile:
                        {
                            required:true
                        }

                }
        });

        //mobile regexz
        jQuery.validator.addMethod("mobile_number", function(value, element){
            if (/^(\+\d{1,3}[- ]?)?\d{10}$/.test(value)) {
                return true;  // FAIL validation when REGEX matches
            } else {
                return false;   // PASS validation otherwise
            };
        }, "Please Enter Valid Mobile Number");
        //pen  regexz
        jQuery.validator.addMethod("pencard_validate", function(value, element){
            if (/^[A-Z0-9]{10}$/.test(value)) {
                return true;  // FAIL validation when REGEX matches
            } else {
                return false;   // PASS validation otherwise
            };
        }, "Please Enter Valid Pencard Number ");
        //gst regexz
        jQuery.validator.addMethod("gst_validate", function(value, element){
            if (/[0-9]{2}[(a-z)(A-Z)]{5}\d{4}[(a-z)(A-Z)]{1}\d{1}Z\d{1}/.test(value)) {
                return true;  // FAIL validation when REGEX matches
            } else {
                return false;   // PASS validation otherwise
            };
        }, "Please Enter Valid Pencard Number ");
//account regexz
        jQuery.validator.addMethod("account_validate", function(value, element){
            if (/^(?:[0-9]{11}|[0-9]{2}-[0-9]{3}-[0-9]{6})$/.test(value)) {
                return true;  // FAIL validation when REGEX matches
            } else {
                return false;   // PASS validation otherwise
            };
        }, "Please Enter Valid Valid Account Number ");
        // ifsc reges
        jQuery.validator.addMethod("ifsc_validate", function(value, element){
            if (/^[A-Za-z]{4}[a-zA-Z0-9]{7}$/.test(value)) {
                return true;  // FAIL validation when REGEX matches
            } else {
                return false;   // PASS validation otherwise
            };
        }, "Please Enter Valid Valid IFSC CODE ");
    });
</script>
<script type="text/javascript">
    $.validator.setDefaults({
        submitHandler: function()
        {
            var proceed=true;
            if(proceed)
            {
                var form = $('form')[0];
                var f_data= new FormData(form);
                f_data.append('first_name', $('input[name=first_name]').val());
                f_data.append('last_name', $('input[name=last_name]').val());
                f_data.append('email', $('input[name=email]').val());
                f_data.append('mobile', $('input[name=mobile]').val());
                f_data.append('permanent_address', $('input[name=permanent_address]').val());
                f_data.append('present_address', $('input[name=present_address]').val());
                f_data.append('pencard', $('input[name=pencard]').val());
                f_data.append('gst', $('input[name=gst]').val());
                f_data.append('technology', $('select[name=technology]').val());
                f_data.append('company_type', $('select[name=company_type]').val());
                f_data.append('full_name', $('input[name=full_name]').val());
                f_data.append('bank_name', $('input[name=bank_name]').val());
                f_data.append('branch_name', $('input[name=branch_name]').val());
                f_data.append('account_number', $('input[name=account_number]').val());
                f_data.append('ifsc_code', $('input[name=ifsc_code]').val());


                $.ajax
                ({
                    url: '<?php echo base_url()?>vendor/edit_vendor',
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
                            setTimeout(function(){window.location.href="<?php echo base_url()?>vendor/view_all_vendor"},5000);
                            2
                        }
                    }
                });
            }
        }
    });

</script>
<div id="page-wrapper">
    <div class="container">
        <div class="messge_style_contact" id="myDiv_contact_add" style="color: green;font-size: 17px; margin: auto; text-align: center; display:none"> <font>Edit Vendor Sucessfully </font> </div>

        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line">Edit Vendor</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            EDIT VENDOR
                        </div>
                        <div class="panel-body">
                            <?php
                            $attributs=array('id'=>'add_vendor');
                            echo form_open('',$attributs);
                            ?>

                            <div class="form-group">
                                <label>Name</label>
                                <input type="hidden" id="hidden_id" name="hidden_id" value="<?php echo $data['vendor_id'];?>">
                                <input class="form-control" value="<?php echo $data['name']; ?>"  name="name" id="name" type="text">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control"  value="<?php echo $data['email']; ?>" type="text" name="email" id="email">
                            </div>
                            <div class="form-group">
                                <label>Mobile</label>
                                <input class="form-control" value="<?php echo $data['mobile']; ?>"  type="text" name="mobile" id="mobile">
                            </div>
                            <div class="form-group">
                                <label>Permannent Address</label>
                                <input class="form-control" type="text" value="<?php echo $data['permanent_address']; ?>" name="permanent_address" id="permanent_address">
                            </div>
                            <div class="form-group">
                                <label>Present Address</label>
                                <input class="form-control" value="<?php echo $data['present_address']; ?>"  type="text" name="present_address" id="present_address">
                            </div>
                            <div class="form-group">
                                <label>Pan Card Number</label>
                                <input class="form-control" type="text" value="<?php echo $data['pencard']; ?>" name="pencard" id="pencard">
                            </div>
                            <div class="form-group">
                                <label>GST Number</label>
                                <input class="form-control" type="text" value="<?php echo $data['gst']; ?>" name="gst" id="gst">
                            </div>
                            <div class="form-group">
                                <label>Technology</label>
                                <select  class="form-control" name="technology">

                                    <option value="<?php echo $data['technology']?>"><?php echo $data['technology']?></option>
                                    <option value="PHP">PHP</option>
                                    <option value="ANDROID">ANDROID</option>
                                    <option value="IOS">IOS</option>
                                    <option value="PYTHON">PYTHON</option>
                                    <option value="JAVA">JAVA</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Company Type</label>
                                <select  class="form-control" name="company_type">
                                    <option value="<?php echo $data['technology']?>"><?php echo $data['company_type']?></option>
                                    <option value="Private Limited Company">Private Limited Company</option>
                                    <option value="Public Limited Company">Public Limited Company</option>
                                    <option value="Limited Liability Partnership (LLP)">Limited Liability Partnership (LLP)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Full Name</label>
                                <input class="form-control" value="<?php echo $data['full_name']; ?>" type="text" name="full_name" id="full_name">
                            </div>
                            <div class="form-group">
                                <label>Bank Name</label>
                                <input class="form-control" value="<?php echo $data['bank_name']; ?>" type="text" name="bank_name" id="bank_name">
                            </div>
                            <div class="form-group">
                                <label>Branch Name</label>
                                <input class="form-control" value="<?php echo $data['branch_name']; ?>" type="text" name="branch_name" id="branch_name">
                            </div>
                            <div class="form-group">
                                <label>Account Number</label>
                                <input class="form-control" value="<?php echo $data['account_no']; ?>" type="text" name="account_no" id="account_no">
                            </div>
                            <div class="form-group">
                                <label>IFSC Code</label>
                                <input class="form-control" value="<?php echo $data['ifsc_code']; ?>" type="text" name="ifsc_code" id="ifsc_code">
                            </div>
                            <input type="submit" class="btn btn-info" value="Edit Vendor" name="submit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


