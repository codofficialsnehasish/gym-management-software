        <!-- DataTables -->
        <link href="<?= base_url('assets/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css');?>" rel="stylesheet" type="text/css">
        <link href="<?= base_url('assets/admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css');?>" rel="stylesheet" type="text/css">
    
        <!-- Responsive datatable examples -->
        <link href="<?= base_url('assets/admin/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css');?>" rel="stylesheet" type="text/css">
        <!-- Sweet Alert-->
        <link href="<?= base_url('assets/admin/libs/sweetalert2/sweetalert2.min.css');?>" rel="stylesheet" type="text/css" />
<style>
  @include media-breakpoint-down(lg) {
      box-shadow: $box-shadow-lg;
      height: 100vh;
    }
.post-outer {
        /*background: #f5f5f5;*/
        padding: 5px 10px;
        border-bottom: solid 1px #CFCFCF;
        margin-top: 5px;
    }
    .post-title {
        border-left: solid 4px #304d49;
       /* background: #a7d4d2;*/
        padding: 5px;
        color: #304d49;
        margin: 0px;
        cursor: move;
    }
    
    .post-desc {
        line-height: 15px !important;
        font-size: 12px;
        padding: 10px;
        margin: 0px;
    }
    .panel-default {
        margin-bottom: 100px;
    }
    .post-data-list {
        max-height: 374px;
        overflow-y: auto;
    }
    .radio-inline {
        font-size: 20px;
        color: #c36928;
    }
    .progress, .progress-bar{ height: 40px; line-height: 40px; display: none; }

    #post_list li
   {
    box-shadow: 0 0 10px rgb(51 53 71);
    background: #fff;
    margin-top: 10px;
    border-radius: 4px;
    cursor: all-scroll;
    padding: 10px;
   }
   #post_list li.ui-state-highlight {
    padding: 20px;
    background-color: #eaecec;
    border: 1px dotted #ccc;
    cursor: move;
    margin-top: 12px;
    }

    .btn_move{
        display: inline-block;
        cursor: move;
        background: #ededed;
        border-radius: 2px;
        width: 30px;
        height: 30px;
        text-align: center;
        line-height: 30px;
    }
  .txtfld{
    background-color: #e9e9e9 !important;border: 1px solid #e9e9e9 !important;
  }
</style>