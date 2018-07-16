<div id="page-wrapper">
    <div id="page-inner">
        <div class="messge_style_contact" id="myDiv_contact_add" style="color: green;font-size: 17px; margin: auto; text-align: center; display:none"> <font>Delete Project Sucessfully </font> </div>
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Project</h1>
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
                                            <th>Owner Name</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Responsible</th>
                                            <th>Status</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                         <?php
                                    foreach ($data as $pr):



                                    ?>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <?php echo $pr['project_name']; ?>
                                            </td>
                                            <td>
                                                <?php echo $pr['client_name']; ?>
                                            </td>
                                            <td>
                                                <?php echo $pr['owner_name']; ?>
                                            </td>
                                            <td>
                                                <?php echo $pr['start_date']; ?>
                                            </td>
                                            <td>
                                                <?php echo $pr['end_date']; ?>
                                            </td>
                                            <td>
                                                <?php echo $pr['responsible']; ?>
                                            </td>
                                            <td>
                                                <?php
                                                if($pr['status']=='0')
                                                {
                                                    ?>
                                                    <button style="background-color: greenyellow; color: #0A0A0A; width: 100px;"   class="btn btn-info">Processing</button>
                                                <?php
                                                }
                                                if($pr['status']=='1')
                                                {
                                                    ?>
                                                    <button style="background-color: darkred; width: 100px;" class="btn btn-info">Hold</button>
                                                    <?php
                                                }
                                                if($pr['status']=='2')
                                                {
                                                    ?>
                                                    <button style="background-color: #00CC00; width: 100px;" class="btn btn-info">Complete</button>
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                            <td><a href="<?php echo base_url() ?>admin/project/edit/<?php echo $pr['id']; ?>"><button class="btn btn">Edit</button></a></td>
                                            <td> <button id="delete" onclick="deleter(<?= $pr['id'];?>)"  class="btn btn">Delete</button></td>
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
</div>
    <script type="text/javascript">
        function deleter(id)
        {
            $.ajax
            ({
                url:"<?php echo base_url();?>project/delete",
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
                    setTimeout(function(){window.location.href=""},5000);
                    2
                }
            });
        }

    </script>