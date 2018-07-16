<div id="page-wrapper">
    <div id="page-inner">
        <div class="messge_style_contact" id="myDiv_contact_add" style="color: green;font-size: 17px; margin: auto; text-align: center; display:none"> <font>Delete Payment Sucessfully </font> </div>
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Payments</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Basic Table
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Project Name</th>
                                    <th>Client Name</th>
                                    <th>Payment</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($data as $fetch):?>
                                    <tr>
                                        <td><?php echo $fetch['project_name']; ?></td>
                                        <td><?php echo $fetch['client_name']; ?></td>
                                        <td><?php echo $fetch['payment']; ?></td>
                                        <td><a href="<?php echo base_url(); ?>admin/payment/edit/<?php echo $fetch['id'];?>"><button  class=btn btn-info >Edit</button></a></td>
                                        <td><button onclick="delete_payment(<?php echo $fetch['id']; ?>)" class=btn btn-info >Delete</button></td>

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
    <script type="text/javascript">
        function delete_payment(id)
        {
            $.ajax
            ({
                url: '<?php echo base_url(); ?>payment/delete_payment',
                cache:false,
                data:{id:id},
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

    </script>