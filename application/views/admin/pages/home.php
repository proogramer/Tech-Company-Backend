<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">DASHBOARD</h1>
                        <h1 class="page-subhead-line">Overview of Admin Panel </h1>

                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="main-box mb-red">
                            <a href="<?php echo base_url()?>admin/view_all_vendor">

                                <h5>Total Vendor</h5>
                                <h1>
                                    <?php
                                        $this->db->select('');
                                        $this->db->where('is_delete','1');
                                        $query=$this->db->get('vendor_details');
                                        echo $query->num_rows();

                                    ?>
                                </h1>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="main-box mb-dull">
                            <a href="<?php echo base_url()?>admin/project/view_all_project">

                                <h5>Total Project</h5>
                                <h1>
                                    <?php
                                    $this->db->select('');
                                    $this->db->where('is_delete','1');
                                    $query=$this->db->get('project');
                                    echo $query->num_rows();

                                    ?>
                                </h1>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="main-box mb-pink">
                            <a href="<?php echo base_url()?>admin/payment/view_all_payment">

                                <h5>Total Payment</h5>
                                <h1>
                                    <?php
                                    $this->db->select('');
                                    $this->db->where('is_delete','1');
                                    $query=$this->db->get('payment');
                                    echo $query->num_rows();

                                    ?>
                                </h1>
                            </a>
                        </div>
                    </div>

                </div>
                <!-- /. ROW  -->


    </div>
</div>