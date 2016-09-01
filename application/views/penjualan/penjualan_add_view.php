<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/bootstrap-editable/css/bootstrap-editable.css">

 <style>
     .table-hover tbody tr:hover{
         background-color: #C3F0ED;
     }
     .td-right{
         text-align: right;
     }
     .td-center{
         text-align: center;
     }
     .float-right{
         float: right;
     }
     .required{
         color: #dd4b39 !important;
     }
     #container-result{
         margin-top: 10px;
     }
     #container-result span.form-control{
        padding-bottom: 38px;
     }
     #discount, #total-result{
         font-size: 20px;
         font-weight: bold;
     }
 </style>

 <!--Lookup Master -->
 <?php $this->load->view('lookup/lookup_barang')?>

 <!-- Content Header (Page header) -->
 <section class="content-header">
     <h1>
         Penjualan
         <small>Form New Penjualan </small>
     </h1>
     <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Penjualan</a></li>
         <li class="active">Form New Penjualan </li>
     </ol>
 </section>

 <!--Error Container-->
 <div class="error-container hidden" id="error-msg">
     <div class="btn-closed">
         <button type="button" class="btn btn-default btn-lg">
             <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
         </button>
     </div>

 </div>

 <section class="content">

     <div class="box" id="content-container" >
         <div class="box-header">
             <h3 class="box-title">Form New Penjualan </h3>
         </div>
         <!-- form start -->
         <div class="box-body">
            <div class="well well-sm">
                <button type="button" class="btn btn-primary" id="btn-save">
                    <span class="glyphicon glyphicon-floppy-save"></span>&nbsp Save
                </button>
                <a class="main-nav" href="#">
                    <button type="button" class="btn btn-success" id="add-detail"
                            data-toggle="modal" data-target="#lookup-barang-modal">
                        <span class="glyphicon glyphicon-plus"></span>&nbsp Add Item
                    </button>
                </a>
                <a href="<?=site_url('Penjualan/index')?>">
                    <button type="button" class="btn btn-default">
                        <span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp Back to List
                    </button>
                </a>
            </div>

            <div class="row">
                <form class='form-horizontal'>
                    <div class="col-md-6"><!-- side 1 -->
                        <div class="form-group" id="lbl-kode">
                            <label class="col-sm-3 control-label heading-label">Kode BON <span class="required"><i class="fa fa-dot-circle-o"></i></span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="kode_bon" name="kode_bon"
                                    placeholder="Kode BON" maxlength="15" data-label="#err-kode-bon">
                                <span class="label label-danger" id="err-kode-bon"></span>
                            </div>
                        </div>

                        <div class="form-group" id="lbl-customer">
                            <label class="col-sm-3 control-label heading-label">Nama Pembeli </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama_customer" name="nama_customer"
                                    placeholder="Nama Pembeli" maxlength="150">
                            </div>
                        </div>

                        <div class="form-group" id="lbl-tgl-beli">
                            <label class="col-sm-3 control-label heading-label">Tanggal Penjualan <span class="required"><i class="fa fa-dot-circle-o"></i></span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="tgl_penjualan" name="tgl_penjualan"
                                    placeholder="" maxlength="150" data-label="#err-tgl-penjualan">
                                <span class="label label-danger" id="err-tgl-penjualan"></span>
                            </div>
                        </div>
                    </div><!-- side 1 -->

                    <div class="col-md-6"><!-- side 2 -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label heading-label">Status <span class="required"><i class="fa fa-dot-circle-o"></i></span></label>
                              <div class="col-sm-9">
                              <select class="form-control status" id="stat" name="stat">
                                <option value="CASH" selected="selected">CASH</option>
                                <option value="HUTANG">HUTANG</option>
                              </select>
                              </div>
                        </div>

                        <div class="form-group hutang">
                            <label class="col-sm-3 control-label heading-label">Harga Hutang <span class="required"><i class="fa fa-dot-circle-o"></i></span></label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" id="harga_htg" name="harga_htg"
                                placeholder="xxx" maxlength="150" data-label="#err-harga-hutang">
                                  <span class="label label-danger" id="err-harga-hutang"></span>
                              </div>
                        </div>

                        <div class="form-group hutang" id="lbl-tgl-beli">
                            <label class="col-sm-3 control-label heading-label">Tanggal Jatuh Tempo <span class="required"><i class="fa fa-dot-circle-o"></i></span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="tgl_jth_tmp" name="tgl_jth_tmp"
                                    placeholder="" maxlength="150" data-label="#err-tgl-jatuhTempo">
                                <span class="label label-danger" id="err-tgl-jatuhTempo"></span>
                            </div>
                        </div>

                    </div>
                </form>
            </div>

            <br/>
            <table class="table table-bordered table-striped table-hover" id="tbl-detail">
                <thead>
                <tr>
                    <th width="15%" style = "text-align:left;">Kode Barang</th>
                    <th width="20%" style = "text-align:left;">Barang</th>
                    <th width="20%" style = "text-align:left;">Info</th>
                    <th width="15%" style = "text-align:right;">Harga</th>
                    <th width="10%" style = "text-align:right;">Qty</th>
                    <th width="15%" style = "text-align:right;">Total</th>
                    <th width="5%" style = "text-align:center;">Option</th>
                </tr>
                </thead>

                <tbody id="detail-content">

                </tbody>

            </table>

            <div id="container-result">
                <div class="row">
                    <div class="col-lg-5 float-right td-right">
                        <div class="input-group">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default btn-lg" aria-label="Bold">
                                    <span class="glyphicon glyphicon-gift"></span> Discount
                                </button>
                            </div>
                           <span class="form-control"><a href="#" id="discount" data-value="0">0</a></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 float-right td-right">
                        <div class="input-group">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default btn-lg" aria-label="Bold">
                                    <span class="glyphicon glyphicon-shopping-cart"></span> Total
                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                </button>
                            </div>
                            <span class="form-control" id="total-result" data-value="0"></span>
                        </div>
                    </div>
                </div>
            </div><!-- div Container-result -->
         </div>
     </div>
</section><!-- div container -->

 <script src="<?php echo base_url();?>assets/plugins/jquery.maskMoney.js" type="text/javascript"></script>
 <script src="<?php echo base_url();?>assets/plugins/bootstrap-editable/js/bootstrap-editable.min.js" type="text/javascript"></script>
 <script src="<?php echo base_url();?>assets/custom/penjualan.js" type="text/javascript"></script>

 <script type="text/javascript">
     $(function(){
         // Jquery draggable
         $('.modal-dialog').draggable({
             handle: ".modal-header"
         });

         $(".hutang").hide();

         //set jquery datepicker
         $('#tgl_penjualan').datepicker({
             format: 'dd-MM-yyyy'
         });
         $('#tgl_jth_tmp').datepicker({
             format: "dd-MM-yyyy"
         });
         //show hide status hutang
         $( ".status" ).change(function() {

             var value = $( "#stat" ).val();
             if(value=='CASH'){
                 $(".hutang").hide();
             }else{
                 $(".hutang").show();
             }
         });

         //SAVE
         $("#btn-save" ).click(function(){
             if(!validatePenjualanInput()){

             }else{
                 $('#error-msg').addClass("hidden");
                 var header_data_penjualan = new Object();
                 header_data_penjualan.kode = $("#kode_bon").val(); ;
                 header_data_penjualan.customer  = $("#nama_customer").val();
                 header_data_penjualan.tgl_penjualan = $("#tgl_penjualan").data('datepicker').getFormattedDate('yyyy-mm-dd');
                 header_data_penjualan.status = $('#stat option:selected').val();
                 header_data_penjualan.discount = $("a#discount").attr("data-value");
                 header_data_penjualan.harga_total = $('span#total-result').attr("data-value");
                 if(status!=1){
                     header_data_penjualan.tgl_jth_tempo =$("#tgl_jth_tmp").data('datepicker').getFormattedDate('yyyy-mm-dd');
                     header_data_penjualan.harga_hutang =$("#harga_htg").val();
                 }else{
                     header_data_penjualan.tgl_jth_tempo =null;
                     header_data_penjualan.harga_hutang =null;
                 }
                 var data_penjualan = new Array();
                 data_penjualan.push(header_data_penjualan);
                 data_penjualan.push(detailItemPenjualan);

                 var data_post = {
                     data :data_penjualan
                 }
                 //alert(JSON.stringify(data_penjualan));
                 // ajax mulai disini
                 $.ajax({
                     url: "<?php echo site_url('Penjualan/createPenjualan')?>",
                     data: data_post,
                     type: "POST",
                     dataType: 'json',
                     success: function(msg){
                         if(msg.status=='error'){
                             alertify.error(msg.msg);
                         }else{
                             alertify.success(msg.msg);
                             location.href = "<?= site_url("penjualan")?>";
                         }
                     },
                     error:function(msg){
                         alertify.error('Failed to response server!');
                     }
                 });
             }
         });

         $.fn.editable.defaults.mode = 'inline';
         $('#discount').editable({
             type: 'text',
             title : 'Enter New Value',
             display: function(value) {
                 // set Total-discount
                 var old_discount =  parseInt($(this).attr("data-value"));
                 var discount  = parseInt(value);
                 var result = 0-(discount-old_discount);
                 //alert(result);
                 countResult(result);

                 // set Discount value
                 $(this).attr("data-value",value);
                 var k = discount.format(0, 3, '.', ',');
                 $(this).text(k);
             }
         });
     });

     // change format currency
     Number.prototype.format = function(n, x, s, c) {
         var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\D' : '$') + ')',
             num = this.toFixed(Math.max(0, ~~n));

         return (c ? num.replace('.', c) : num).replace(new RegExp(re, 'g'), '$&' + (s || ','));
     };
 </script>