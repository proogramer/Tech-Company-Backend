<script>
    //-----Start Validation---//
    $().ready(function(){
        $("#add_payment").validate({
            rules:
                {
                    project_name:
                        {
                            required:true,
                            maxlength:50,
                        },
                    client_name:
                        {
                            required:true,
                            maxlength:50,
                        },
                    payment:
                        {
                            required:true,
                            number:true,
                        }
                },
            messages:
                {
                    payment:
                        {
                            number:"Please enter the valid payment amount",
                        }
                }
        });
    });
    //----End Validation----//

    // start Insertion values in Database//
    $.validator.setDefaults({
        submitHandler: function()
        {
            var proceed=true;
            if(proceed)
            {
                var form = $('form')[0];
                var f_data= new FormData(form);
                f_data.append('project_name', $('input[name=project_name]').val());
                f_data.append('client_name', $('input[name=client_name]').val());
                f_data.append('payment', $('input[name=payment]').val());
                $.ajax
                ({
                    url: '<?php echo base_url(); ?>payment/edit_payment_action',
                    data:f_data,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    dataType:'json',
                    success: function(response)
                    {
                        if (response.type == 'success') {
                            $('#myDiv_contact_add').show().delay(5000).fadeOut();
                            $('body,html').animate({
                                scrollTop: 100
                            }, 600);
                            setTimeout(function () {
                                window.location.href = "<?php echo base_url()?>admin/payment/view_all_payment"
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
        <div class="messge_style_contact" id="myDiv_contact_add" style="color: green;font-size: 17px; margin: auto; text-align: center; display:none"> <font>Edit Payment Sucessfully </font> </div>
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Edit Payment</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            ADD PAYMENT
                        </div>
                        <div class="panel-body">
                            <?php
                            $attributes=array('id' => 'add_payment');
                            echo form_open('',$attributes);
                            ?>
                            <div class="form-group">
                                <label>Project Name</label>
                                <input type="hidden" id="hidden_id" name="hidden_id"  value="<?php echo $data['id']; ?>" >
                                <input class="form-control" value="<?php echo $data['project_name']; ?>"  name="project_name" id="project_name" type="text">
                            </div>
                            <div class="form-group">
                                <label>Client Name</label>
                                <input class="form-control" value="<?php echo $data['client_name']; ?>" name="client_name" id="client_name" type="text">
                            </div>
                            <div class="form-group">
                                <label>Payment</label>
                                <input class="form-control" value="<?php echo $data['payment']; ?>" name="payment" id="payment" type="text">
                            </div>
                            <input type="submit"  class="btn btn-info" value="Edit Payment">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>