<?php $this->load->view('partials/main');?>

    <head> 
        <?php $this->load->view('partials/title-meta');?>

        <?php PageSpecCss($pagecss);?>
        
        <?php $this->load->view('partials/head-css');?>
       
    
    </head>
    <?php $this->load->view('partials/body');?>

        <!-- Begin page -->
        <div id="layout-wrapper">
        <?php $this->load->view('partials/menu');?>
        
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">