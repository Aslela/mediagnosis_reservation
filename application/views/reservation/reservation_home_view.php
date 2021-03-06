<style>
    .current-queue-box{
        min-height: 180px;
    }
    .small-box>.inner {
        padding: 10px;
    }
    .small-box .icon {
        top:10px;
        right: 20px;
    }
    .small-box h3{
        font-size: 36px;
    }
    .small-box p{
        font-size: 20px;
    }
    #button-confirm-queue{
        padding-top: 10px;
    }

    /*Small box list*/
    .small-box-list{
        border-radius: 2px;
        position: relative;
        display: block;
        margin-bottom: 10px;
        box-shadow: 0 1px 1px rgba(0,0,0,0.1);
    }
    .small-box-list>.inner{
        padding: 5px;
        padding-left: 20px;
    }
    .small-box-list .icon {
        top:12px;
        right: 20px;
        -webkit-transition: all .3s linear;
        -o-transition: all .3s linear;
        transition: all .3s linear;
        position: absolute;
        z-index: 0;
        font-size: 60px;
        color: rgba(0,0,0,0.15);
    }
    .small-box-list h3{
        font-size: 30px;
        font-weight: bold;
        margin: 5px 0 1px 0;
        white-space: nowrap;
        padding: 0;
    }
    .small-box-list p{
        font-size: 16px;
    }

    #next-queue-box-list{
        max-height: 600px;
        overflow-x: scroll;
    }

    /*Overlay*/
    .overlay h3{
        top: 57px;
        position: relative;
    }
    .test{
        /* background: #1a86b9; */
        background: -moz-linear-gradient(80deg, #1a86b9 51%, #0078b1 51%);
        /* background: -webkit-gradient(linear, left bottom, right top, color-stop(51%,#1a86b9), color-stop(51%,#0078b1)); */
        /* background: -webkit-linear-gradient(80deg, #1a86b9 51%,#0078b1 51%); */
        background: -o-linear-gradient(80deg, #1a86b9 51%,#0078b1 51%);
        background: -ms-linear-gradient(80deg, #1a86b9 51%,#0078b1 51%);
        background: linear-gradient(80deg, #1a86b9 51%,#0078b1 51%);
    }
	.small-box-list{
		cursor : pointer;
	}
	.right-align{
		text-align : right;
	}
	.hide-assign-button{
		display: none;
	}
	.checkbox{
		text-align: right;
		margin-bottom: 0px;
	}
	.inner{
		overflow :hidden;
	}

</style>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Reservasi
        <small>Hari ini</small>

    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Reservasi</a></li>
        <li class="active">Hari Ini</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                <i class="fa fa-hospital-o"></i> <?php echo $reversation_clinic_data->clinicName;?> - <?php echo date("l, j F Y");?>
                <?php if($this->session->userdata('role')=="super_admin"){?>
                    <a href="<?=site_url('Reservation/index')?>">
                        <button class="btn btn-primary pull-right" type="button">
                            <span class="glyphicon glyphicon-circle-arrow-left"></span> Kembali
                        </button>
                    </a>
                <?php } ?>
                <input type="hidden" value="<?php echo $reversation_clinic_data->clinicID;?>" id="clinic-header-value">
            </h2>
        </div>
        <!-- /.col -->
    </div>
    <div class="row">

        <div class="col-lg-6">
            <div class="box">
                <div class="box-header">
					<div class="col-md-5">
						<h3 class="box-title">Antrian Berikutnya</h3>
					</div>
					<div class="col-md-7 right-align">
						<select class="w3-select" name="doctor_poli_assign" id="doctor-poli-assign" disabled>
							<?php foreach($doctor_poli_list as $row) { ?>
							<option value="<?php echo $row["doctorID"]; ?>"><?php echo $row["doctorName"]."/".$row["poliName"];?></option>
							<?php }?>
						</select>
						<button class="hide-assign-button" id="assign-button">Assign</button>
					</div>
                </div>

                <div class="box-body" id="next-queue-box-list">
                    <?php foreach($reservation_latest_queue as $row) { ?>
                        <?php if($row['status'] == "waiting"){ ?>
							<div class="col-lg-12 col-xs-12 queue-manageable-waiting" id="next-queue-<?php echo $row['detailReservationID'];?>">
								<div class="small-box-list bg-red">
									<div class="inner">
										<h3><?php echo $row['noQueue'];?> - <?php echo substr($row['patientName'],0,20)."...";?></h3>
										<p class="col-lg-11"><?php echo strtoupper($row['poliName']);?></p>
										<input type="hidden" class="detailID col-lg-1" value="<?php echo $row['detailReservationID'];?>"/>
									</div>
									
								</div>
							</div>
						<?php }else if($row['status'] == "examine"){ ?>
							<div class="col-lg-12 col-xs-12" id="next-queue-<?php echo $row['detailReservationID'];?>">
								<div class="small-box-list bg-yellow">
									<div class="inner">
										<h3><?php echo $row['noQueue'];?> - <?php echo substr($row['patientName'],0,20)."...";?></h3>
										<p class="col-lg-11"><?php echo strtoupper($row['poliName']);?></p>
										<input type="checkbox" name="check-assignment" class="check-assignment checkbox col-lg-1" value="<?php echo $row['detailReservationID'];?>" />
									</div>
									
								</div>
							</div>
						<?php }else if($row['status'] == "confirm"){?>
							<div class="col-lg-12 col-xs-12" id="next-queue-<?php echo $row['detailReservationID'];?>">
								<div class="small-box-list bg-green">
									<div class="inner">
										<h3><?php echo $row['noQueue'];?> - <?php echo substr($row['patientName'],0,20)."...";?></h3>
										<p class="col-lg-11"><?php echo strtoupper($row['poliName']);?></p>
										<span></span>
									</div>
									
								</div>
							</div>
						<?php }?>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <?php foreach($poli_list as $row){?>
                <div class="box box-poli" data-poli="<?php echo $row['poliID'];?>">
                    <div class="box-header">
                        <h3 class="box-title"><?php echo strtoupper($row['poliName']);?></h3>
                    </div>
                    <div class="box-body">
                        <div class="box box-primary">
                            <div class="box-body box-profile current-queue-box" id="current-queue-box-<?php echo $row['poliID'];?>" data-queue="0">
                                <!--<div class="row hide" id="button-confirm-queue-<?php echo $row['poliID'];?>">
                                    <div class="col-lg-6">
                                        <a href="#" class="btn btn-lg btn-danger btn-block btn-reservation-confirmation" data-poli="<?php echo $row['poliID'];?>" data-value="reject">
                                            <i class="fa fa-remove"></i><b> TIDAK ADA</b></a>
                                    </div>
                                    <div class="col-lg-6">
                                        <a href="#" class="btn btn-lg btn-success btn-block btn-reservation-confirmation" data-poli="<?php echo $row['poliID'];?>" data-value="confirm">
                                            <i class="fa fa-check-circle"></i><b> ADA</b></a>
                                    </div>
                                </div>-->

                                <input type="hidden" id="detail-reservation-value-<?php echo $row['poliID'];?>" value="0" />
                                <div id="current-queue-info-<?php echo $row['poliID'];?>" data-queue-number="" data-queue-poli="" data-queue-doctor=""></div>

                                <div class="overlay loading-screen-queue" id="loading-screen-queue-<?php echo $row['poliID'];?>">
                                    <i class="fa fa-user-times"></i>
                                    <br/>
                                    <h3 class="text-center">TIDAK ADA ANTRIAN</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- /.box-body -->
            <div class="hide">
                <audio id="loading-beep">
                    <source src="<?php echo base_url();?>/assets/custom/audio.mp3" type="audio/mp3"/>
                </audio>

            </div>
        </div>
    </div>
</section>

<script>
    $(function(){
		var assignmentCheckFlag = 0;
        var count = 1;
        var $detailID,$headerID;
        var $poliList = [];
		
		$(".sidebar-menu").find(".active").removeClass("active");
		$(".mediagnosis-navigation-reservation").addClass("active");

        getPoliList();
        function getPoliList(){
            $('.box-poli').each(function(){
                var $poli= $(this).attr("data-poli");
                $poliList.push($poli);
            });
        }
        function getCurrentQueueEachPoli(poli){
            var $base_url = "<?php echo site_url();?>/";
            var $currQueue = $("#current-queue-box-"+poli).attr("data-queue");
            var $clinic = $("#clinic-header-value").val();
            if($currQueue == 0) {
                $.ajax({
                    url: $base_url+"reservation/getQueueCurrent",
                    data: {clinic : $clinic, poli : poli},
                    type: "POST",
                    dataType: 'json',
                    cache:false,
                    beforeSend:function(){
                        //SHOW LOADING SCREEN
                        $("#loading-screen-queue-"+poli).removeClass("hide");
                        $("#loading-screen-queue-"+poli).show();
                    },
                    success:function(data){
                        if(data.status != "error"){
                            //RENDER QUEUE BOX
                            if(data.output['poliID'] == poli){
                                renderQueueBox(data.output['noQueue'],data.output['poliName'],data.output['doctorName'], data.output['patientName'],data.output['poliID']);
                                //SET DATA RESERVATION
                                $detailID = data.output['detailID'];
                                $poliID = data.output['poliID'];
                                $("#detail-reservation-value-"+$poliID).val($detailID);
                                //SET COUNTER QUEUE
                                $("#current-queue-box-"+poli).attr("data-queue",1);
                                // REMOVE NEXT QUEUE ON LIST
                                //$("#next-queue-"+$detailID).remove();
                                //HIDE LOADING SCREEN
                                $("#loading-screen-queue-"+poli).hide();
                                alertSound();
                            }
                        }
                    },
                    error: function(xhr, status, error) {
                        //var err = eval("(" + xhr.responseText + ")");
                        //alertify.error(xhr.responseText);
                        //HIDE LOADING SCREEN
                        $("#loading-screen-queue-"+poli).hide();
                    }
                });
            }
        }

        function loopGetCurrentQuery(){
			
				$.each($poliList, function( index, value ) {
					getCurrentQueueEachPoli(value);
				});
			if(assignmentCheckFlag == 0){
				getNextQueueList();
			}
        }

        setInterval(loopGetCurrentQuery, 3000);

        function renderQueueBox(q_number,poli_name, doctor_name, patient_name, poli){
            var patient_name = patient_name.substring(0, 20);
            var $small_box = $("<div>", {class: "small-box bg-green", "data-value": "0"});
            var $inner = $("<div>", {class: "inner", "data-value": "0"});
            var $queue_number = $("<h3>", {class: "text-center"}).html(q_number+" - "+patient_name+"...");
            var $poli_doctor = $("<p>", {class: "text-center"}).html(poli_name+" - "+doctor_name);

            $queue_number.appendTo($inner);
            $poli_doctor.appendTo($inner);
            $inner.appendTo($small_box);
            $("#current-queue-box-"+poli).prepend($small_box);

            $("#current-queue-info-"+poli).attr("data-queue-number",q_number);
            $("#current-queue-info-"+poli).attr("data-queue-poli",poli_name);
            $("#current-queue-info-"+poli).attr("data-queue-doctor",doctor_name);

            $("#button-confirm-queue-"+poli).removeClass("hide");
            $("#button-confirm-queue-"+poli).show();
        }

        function alertSound(){
            var audio = $("#loading-beep")[0];
            audio.play();
        }

        // CONFIRM ANTRIAN SEKARANG
        $(".btn-reservation-confirmation").click(function(){
            var $value = $(this).attr("data-value");
            var $poli = $(this).attr("data-poli");

            var $msg = "";
            var $detailID = $("#detail-reservation-value-"+$poli).val();

            if($value=="confirm"){
                $msg="Pasien Ada ?";
                $data = {
                    status : "examine",
                    detailID : $detailID
                };
                confirmReservation($msg, $detailID, $poli);
            }else if($value=="reject"){
                $msg="Pasien Tidak Ada ?";
                $data = {
                    status : "late",
                    detailID : $detailID
                };
                rejectReservation($msg, $data, $poli);
            }
        });

        //REJECT ANTRIAN SEKARANG
        function confirmReservation($msg, $detailID, $poli){
            var $title = "Konfirmasi";
            var $base_url = "<?php echo site_url();?>/";
            alertify.confirm($msg,
                function(){
                    //SET COUNTER QUEUE
                    $("#current-queue-box-"+$poli).attr("data-queue",0);
                    //HIDE LOADING SCREEN
                    $("#loading-screen-queue-"+$poli).hide();

                    //REMOVE BOX
                    $("#current-queue-box-"+$poli).children(".small-box").html("");
                    $("#button-confirm-queue-"+$poli).hide();
                    window.open($base_url+"Reservation/goToPhysicalExamination/"+$detailID);
                }
            ).setHeader($title);
        }

        function rejectReservation($msg, $data, $poli){
            var $title = "Konfirmasi";
            var $base_url = "<?php echo site_url();?>/";
            alertify.confirm($msg,
                function(){
                    $.ajax({
                        url: $base_url+"Reservation/saveCurrentQueue",
                        data: $data,
                        type: "POST",
                        dataType: 'json',
                        cache:false,
                        beforeSend:function(){
                            //SHOW LOADING SCREEN
                            $("#loading-screen-queue-"+$poli).removeClass("hide");
                            $("#loading-screen-queue-"+$poli).show();
                        },
                        success:function(data){
                            if(data.status != "error"){
                                alertify.success(data.msg);
                                //SET COUNTER QUEUE
                                $("#current-queue-box-"+$poli).attr("data-queue",0);
                                //HIDE LOADING SCREEN
                                $("#loading-screen-queue-"+$poli).hide();

                                //REMOVE BOX
                                $("#current-queue-box-"+$poli).children(".small-box").html("");
                                $("#button-confirm-queue-"+$poli).hide();
                            }else{
                                alertify.error(data.msg);
                                $("#loading-screen-queue-"+$poli).hide();
                            }
                        },
                        error: function(xhr, status, error) {
                            //var err = eval("(" + xhr.responseText + ")");
                            //alertify.error(xhr.responseText);
                            //HIDE LOADING SCREEN
                            alertify.error("Cannot response server !");
                            $("#loading-screen-queue-"+$poli).hide();
                        }
                    });
                }
            ).setHeader($title);
        }

        function getNextQueueList(){
            var $clinic = $("#clinic-header-value").val();
            var $base_url = "<?php echo site_url();?>/";
            $.ajax({
                url: $base_url+"reservation/getQueueNext",
                data: {clinic : $clinic},
                type: "POST",
                dataType: 'json',
                cache:false,
                beforeSend:function(){

                },
                success:function(data){
                    if(data.status != "error"){
                        $("#next-queue-box-list").html("");
                        $queue_data = data.output;

                        $.each($queue_data, function( key, value ) {
                            renderNextQueue(value.detailReservationID, value.noQueue,value.poliName,value.patientName,value.poliID, value.status);
                        });
                    }
                },
                error: function(xhr, status, error) {
                    //HIDE LOADING SCREEN
                }
            });
        }

        function renderNextQueue(detailID,q_number,poli_name, patient_name, poli, status){
            var $qnumber = $("#current-queue-info").attr("data-queue-number");
            var $poli = $("#current-queue-info").attr("data-queue-poli");
            var $doctor =  $("#current-queue-info").attr("data-queue-doctor");

            var patient_name = patient_name.substring(0, 20);

            var $div;
			if(status == "waiting"){
				$div = $("<div>", {class: "col-lg-12 col-xs-12 queue-manageable-waiting"});
			}else{
				$div = $("<div>", {class: "col-lg-12 col-xs-12"});
			}
            var $small_box; 
			if(status == "waiting"){
				$small_box= $("<div>", {class: "small-box-list bg-red", "data-value": "0"});
			}else if(status == "examine"){
				$small_box= $("<div>", {class: "small-box-list bg-yellow", "data-value": "0"});
			}else if(status == "confirm"){
				$small_box= $("<div>", {class: "small-box-list bg-green", "data-value": "0"});
			}
            var $inner = $("<div>", {class: "inner", "data-value": "0"});
			var $custom_section;
			if(status == "waiting"){
				$custom_section = $("<input>").attr({type: "hidden", class:"detailID col-lg-1", value: detailID});
			}else if(status == "examine"){
				$custom_section = $("<input>").attr({type: "checkbox", class:"check-assignment checkbox col-lg-1", name:"check-assignment", value: detailID});
			}else if(status == "confirm"){
				$custom_section = $("<span>").html("");
			}
            var $queue_number = $("<h3>").html(q_number+" - "+patient_name+"...");
            var $poli_doctor = $("<p>").attr({class:"col-lg-11"}).html(poli_name);

			$queue_number.appendTo($inner);
            $poli_doctor.appendTo($inner);
			$custom_section.appendTo($inner);
            $inner.appendTo($small_box);
            $small_box.appendTo($div);
            $("#next-queue-box-list").append($div);
        }

		$("#next-queue-box-list").on('click', "div.queue-manageable-waiting",function(){			
            var $title = "Konfirmasi";
            var $base_url = "<?php echo site_url();?>/";
			var $detailID = $(this).children(".small-box-list").children(".inner").children(".detailID").val();
			var $patient_name = $(this).children(".small-box-list").children(".inner").children("h3").html();
			$msg="Lanjutkan pasien ["+ $patient_name+"] untuk pengisian data physical ?";
            alertify.confirm($msg,
                function(){
                    window.open($base_url+"Reservation/goToPhysicalExamination/"+$detailID);
                }
            ).setHeader($title);
        });
		
		$("#next-queue-box-list").on('change', 'input.check-assignment', function(){
			if($(this).is(":checked")){
				assignmentCheckFlag++;
			}else{
				assignmentCheckFlag--;
				if(assignmentCheckFlag < 0){
					assignmentCheckFlag = 0;
				}
			}
			
			if(assignmentCheckFlag > 0){
				$("#assign-button").removeClass("hide-assign-button");
				$('#doctor-poli-assign').prop("disabled", false);
			}else{
				$("#assign-button").addClass("hide-assign-button");
				$('#doctor-poli-assign').prop("disabled", true);
			}
		});
		
		$("#assign-button").on('click', function(){
			var $patients = [];
			var $doctor;
			
			$('.check-assignment:checkbox:checked').each(function(){
				$patients.push(this.value);
			});
			$doctor = $("#doctor-poli-assign").find("option:selected").val();
			//console.log($patients);
			//console.log($doctor);
			var $base_url = "<?php echo site_url();?>/";
            $.ajax({
                url: $base_url+"reservation/doAssignPatients",
                data: {
					patients : $patients,
					doctorID : $doctor
				},
                type: "POST",
                dataType: 'json',
                cache:false,
                beforeSend:function(){

                },
                success:function(data){
                    if(data.status != "error"){
                        alertify.success(data.msg);
						location.reload();
                    }else{
						alertify.error(data.msg);
					}
                },
                error: function(xhr, status, error) {
                    
                }
            });
		});
    });
</script>


