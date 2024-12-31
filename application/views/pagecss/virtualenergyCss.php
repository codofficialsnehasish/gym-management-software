<link href="<?= base_url('assets/admin/libs/select2/css/select2.min.css');?>" rel="stylesheet" type="text/css">
        <!-- Sweet Alert-->
        <link href="<?= base_url('assets/admin/libs/sweetalert2/sweetalert2.min.css');?>" rel="stylesheet" type="text/css" />
<style>
              .enquiry-form-section {
                  padding-top: 20px;
                  min-height: 100vh;
                  position: relative;
                  background: #f5f6f8;
              }
              
              .enquiry-form-section.step1 {
                  background-position: 30% 71px, 72% 150px, 15% 300px, 85% 380px, 25% 561px, 55% 751px;
                  animation: animateClouds-step1 1s linear forwards;
              }

              /*=====Calender====*/
              
              .custom_calender_container {
                  float: left;
                  width: 100%;
                  background: #ffffff;
                  border-radius: 6px;
                  padding: 15px;
                  box-shadow: 0 6px 10px #e1e1e1;
                  margin-bottom: 15px;
                  margin-left:10px;
              }
              
              .custom_calender_container .calender_inner {
                  padding: 0 25px;
              }
              
              .custom_calender_container .calender_inner .calender_header {
                  float: left;
                  width: 100%;
              }
              
              .custom_calender_container .calender_inner .calender_header a.prev {
                  position: absolute;
                  left: 0;
                  top: 15px;
                  z-index: 10;
              }
              
              .custom_calender_container .calender_inner .calender_header {
                  position: relative;
                  text-align: center;
                  margin-bottom: 29px;
              }
              
              .custom_calender_container .calender_inner .calender_header a.next {
                  position: absolute;
                  right: 0;
                  top: 15px;
                  z-index: 10;
              }
              
              .custom_calender_container .calender_inner .calender_header h4.width-100 {
                  width: 100%;
                  /* border-bottom: 3px solid #cccccc; */
              }
              
              .custom_calender_container .calender_inner .calender_header h4 {
                  text-align: center;
                  font-size: 24px;
                  color: #666;
                  display: inline-block;
                  margin-top: 11px;
                  padding: 0;
                  border-bottom: 0;
              }
              
              .custom_calender_container .calender_inner .calender_body {
                  float: left;
                  width: 100%;
              }
              
              .custom_calender_container .calender_inner .calender_body .calender_day {
                  float: left;
                  width: 100%;
                  background: #626ed4;
                  border-radius: 4px;
                  border: 1px solid #bdbdbd;
                  box-shadow: 0px 0px 10px -5px #666;
                  padding: 5px 0;
              }
              
              .cal_row {
                  float: left;
                  width: 100%;
                  margin-bottom: 15px;
              }
              
              .cal_col {
                  float: left;
                  text-align: center;
                  width: 14.12%;
              }
              
              .calender_day {}
              
              .calender_day .cal_row {
                  margin-bottom: 0;
              }
              
              .custom_calender_container .calender_inner .calender_body .calender_day_time {
                  float: left;
                  width: 100%;
                  margin-top: 10px;
              }
              
              .custom_calender_container .calender_inner .calender_body .calender_day_time h4.time {
                  color: #626ed4;
                  font-weight: 500;
                  font-size: 15px;
                  border-bottom: 0;
                  margin-bottom: 0;
                  padding-bottom: 0;
                  border-radius: 20px;
                  transition: all ease 0.3s;
              }
              
              .custom_calender_container .calender_inner .calender_body .calender_day h5.day {
                  font-size: 18px;
                  color: #fff;
              }
              
              .custom_calender_container .calender_inner .calender_body .calender_day span.date {
                  color: #fff;
              }
               
              .calender_body .active {
                  background: #626ed4;
                  color: #ffffff !important;
              }
              .custom_calender_container .calender_inner .calender_body .calender_day_time h4.time:hover {
                  background: #626ed4;
                  color: #ffffff;
                  cursor: pointer;
              }
              
              .booked {
                  color: #ccc !important;
                  pointer-events: none;
              }
              
              .custom_calender_container .calender_inner .calender_header a {
                  background: #626ed4;
                  border-radius: 20px;
                  color: #ffffff;
                  padding: 0 10px;
              }
              
              .search-panel-audit.st_one .skip_btn {
                  border-radius: 0;
                  color: white;
                  line-height: 45px;
                  height: 48px;
              }
              
              .calender_conty .nxt_btn {
                  width: auto;
                  display: inline-flex;
                  float: right;
                  margin-right: 100px;
              }
              .custom_calender_container .calender_inner .calender_body .cal_row {
                  float: left;
                  width: 14.28%;
                  margin-bottom: 15px;
              }
              
              .custom_calender_container .calender_inner .calender_body .cal_row .header {
                  float: left;
                  width: 100%;
                  background: #626ed4;
                  padding: 5px 0;
                  text-align: center;
              }
              
              .custom_calender_container .calender_inner .calender_body {
                  border-radius: 6px;
                  overflow: hidden;
              }
              
              .custom_calender_container .calender_inner .calender_body .cal_row .header h5.day {
                  font-size: 18px;
                  color: #fff;
              }
              
              .custom_calender_container .calender_inner .calender_body .cal_row .header span.date {
                  color: #ffffff;
              }
              
              .custom_calender_container .calender_inner .calender_body .cal_row .body {
                  float: left;
                  width: 100%;
                  background: #fff;
                  padding: 5px 0;
                  text-align: center;
              }
              
              .custom_calender_container .calender_inner .calender_body .cal_row .body .cal_col {
                  width: 100%;
                  margin-bottom: 15px;
              }
              
              .custom_calender_container .calender_inner .calender_body .cal_row .body .cal_col h4.time {
                  border: 0;
                  color: #626ed4;
                  font-weight: 500;
                  font-size: 15px;
                  border-bottom: 0;
                  margin-bottom: 0;
                  padding-bottom: 0;
                  border-radius: 20px;
                  transition: all ease 0.3s;
              }
              
              .custom_calender_container .calender_inner .calender_body .cal_row .body .cal_col h4.time:hover {
                  background: #626ed4;
                  color: #ffffff;
                  cursor: pointer;
              }
 .div-center {display: inline-block;width: 86%;}
  .loading {
                  height: 100%;
                  width: 100%;
                  text-align: center;
                  left: auto !important;
                  top: auto !important;
                  align-items: center;
                  justify-content: center;
                  position: absolute;
                  /*background: #6161611a;*/
                  z-index: 999999;
              }
</style>
