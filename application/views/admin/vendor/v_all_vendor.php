<div id="page-wrapper">
    <div class="messge_style_contact" id="myDiv_contact_add" style="color: green;font-size: 17px; margin: auto; text-align: center; display:none"> <font>Delete Vendor Sucessfully </font> </div>
    <div class="container">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line">View All Vendor</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            VIEW ALL VENDOR
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Company Type</th>
                                    <th>Technology</th>
                                    <th>Date</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>

                                    <?php
                                        foreach($data as $v):
                                    ?>
                                            <tr>
                                                <td><?php echo $v['name']; ?></td>
                                                <td><?php echo $v['email']; ?></td>
                                                <td><?php echo $v['company_type']; ?></td>
                                                <td><?php echo $v['technology']; ?></td>
                                                <td><?php echo $v['date']; ?></td>
                                                <td><a class="openModal" data-id="<?php echo $v['id'] ?>" data-toggle="modal" href="#myModal"><button  class="btn btn-info">View</button></a> </td>
                                                <td><a href="<?php echo base_url()?>admin/vendor/edit/<?php echo $v['id']?>"> <button style="background: seagreen"   class="btn btn-info">Edit</button></a></td>
                                                <td ><button id="delete" data-id="<?php echo $v['id'] ?>" style="background: red" class="btn btn-info danger">Delete</button></td>
                                            </tr>

                                     <?php
                                         endforeach
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
<script>
    $('.openModal').click(function() {
            var id = $(this).attr('data-id');
        $.ajax
        ({
            url:"<?php echo base_url();?>vendor/model",
            cache:false,
            data:{id:id},
            type: 'POST',
            dataType:'json',
            success: function(response)
            {
                a=$('#name').val(response['name']);
                $('#email').val(response['email']);
                $('#mobile').val(response['mobile']);
                $('#permanent_address').val(response['permanent_address']);
                $('#present_address').val(response['present_address']);
                $('#pancard').val(response['pencard']);
                $('#gst').val(response['gst']);
                $('#technology').val(response['technology']);
                $('#company_type').val(response['company_type']);
                $('#full_name').val(response['full_name']);
                $('#bank_name').val(response['bank_name']);
                $('#branch_name').val(response['branch_name']);
                $('#account_no').val(response['account_no']);
                $('#ifsc_code').val(response['ifsc_code']);




            }
        });
        });
</script>
//Model
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Vendor Detail</h4>
            </div>
            <div class="modal-body">
                <table>
                    <tr>
                        <td>Name:</td>
                        <td><input type="text" id="name" name="" style="border: none;" readonly></td>
                    </tr>
                    <tr>
                        <td>E-mail:</td>
                        <td><input type="text" id="email" name="" style="border: none;" readonly></td>
                    </tr>
                    <tr>
                        <td>Mobile:</td>
                        <td><input type="text" id="mobile" name="" style="border: none;" readonly></td>
                    </tr>
                    <tr>
                        <td>Permanent Address:</td>
                        <td><input type="text" id="permanent_address" name="" style="border: none;" readonly></td>
                    </tr>
                    <tr>
                        <td>Present Address:</td>
                        <td><input type="text" id="present_address" name="" style="border: none;" readonly></td>
                    </tr>
                    <tr>
                        <td>Pan Crd Number:</td>
                        <td><input type="text" id="pancard" name="" style="border: none;" readonly></td>
                    </tr>
                    <tr>
                        <td>Gst Number:</td>
                        <td><input type="text" id="gst" name="" style="border: none;" readonly></td>
                    </tr>
                    <tr>
                        <td>Technology:</td>
                        <td><input type="text" id="technology" name="" style="border: none;" readonly></td>
                    </tr>
                    <tr>
                        <td>Company Type:</td>
                        <td><input type="text" id="company_type" name="" style="border: none;" readonly></td>
                    </tr>
                    <tr>
                        <td>Full Name:</td>
                        <td><input type="text" id="full_name" name="" style="border: none;" readonly></td>
                    </tr>
                    <tr>
                        <td>Bank Name:</td>
                        <td><input type="text" id="bank_name" name="" style="border: none;" readonly></td>
                    </tr>
                    <tr>
                        <td>Branch Name:</td>
                        <td><input type="text" id="branch_name" name="" style="border: none;" readonly></td>
                    </tr>
                    <tr>
                        <td>Account Number:</td>
                        <td><input type="text" id="account_no" name="" style="border: none;" readonly></td>
                    </tr>
                    <tr>
                        <td>IFSC Code:</td>
                        <td><input type="text" id="ifsc_code" name="" style="border: none;" readonly></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<script type="text/javascript">
    $('#delete').click(function() {
        var id = $(this).attr('data-id');
        $.ajax
        ({
            url:"<?php echo base_url();?>vendor/delete",
            cache:false,
            data:{id:id},
            type: 'POST',
            dataType:'json',
            success: function(response)
            {
                $('#myDiv_contact_add').show().delay(5000).fadeOut();
                $('body,html').animate({
                    scrollTop: 100
                }, 600);
                setTimeout(function(){window.location.href="<?php echo base_url()?>admin/view_all_vendor"},5000);
                2
            }
        });
    });
</script>