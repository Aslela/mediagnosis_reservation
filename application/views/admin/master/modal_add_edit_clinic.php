<!--Modal ADD-->
<div class="modal fade" id="clinic-modal-add" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-title-add">Add New Clinic</h4>
            </div><!--modal header-->

            <div class="modal-body">
                <div class="alert alert-danger hidden" id="err-msg">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                </div>
                <form id="clinic-form-add" action="">
                    <div class="form-group">
                        <label for="master-place-add" class="control-label cd-name">Place ID :</label>
                        <span class="cd-error-message label label-danger" id="err-master-place-add"></span>
                        <input type="text" class="form-control" id="master-place-add"
                               placeholder="ID" data-label="#err-master-place-add" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="master-name-add" class="control-label cd-name">Clinic Name :</label>
                        <span class="cd-error-message label label-danger" id="err-master-name-add"></span>
                        <input type="text" class="form-control" id="master-name-add" name="clinic_name"
                               placeholder="Name" data-label="#err-master-name-add">
                    </div>
                    <div class="form-group">
                        <label for="master-address-add" class="control-label cd-name">Clinic Address :</label>
                        <span class="cd-error-message label label-danger" id="err-master-address-add"></span>
                        <input type="text" class="form-control" id="master-address-add"
                               placeholder="Address" data-label="#err-master-address-add">
                    </div>
                    <div class="form-group">
                        <label for="master-long-add" class="control-label cd-name">Longitude :</label>
                        <span class="cd-error-message label label-danger" id="err-master-long-add"></span>
                        <input type="text" class="form-control" id="master-long-add"
                               placeholder="Longitude" data-label="#err-master-long-add">
                    </div>
                    <div class="form-group">
                        <label for="master-lat-add" class="control-label cd-name">Latitude :</label>
                        <span class="cd-error-message label label-danger" id="err-master-lat-add"></span>
                        <input type="text" class="form-control" id="master-lat-add"
                               placeholder="Latitude" data-label="#err-master-lat-add">
                    </div>
                </form>
            </div><!--modal body-->

            <div class="modal-footer">                
                <button type="submit" class="btn btn-primary" id="btn-save">Save</button>
            </div><!--modal footer-->

        </div><!--modal content-->
    </div><!--modal dialog-->
</div>

<!--Modal EDIT-->
<div class="modal fade" id="clinic-modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-title-edit"></h4>
            </div><!--modal header-->

            <div class="modal-body">
                <div class="alert alert-danger hidden" id="err-msg">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                </div>
                <form id="clinic-form-edit" action="">
                    <input type="hidden" class="form-control" id="master-id">
                    <div class="form-group">
                        <label for="master-place-edit" class="control-label cd-name">Place ID :</label>
                        <span class="cd-error-message label label-danger" id="err-master-place-edit"></span>
                        <input type="text" class="form-control" id="master-place-edit"
                               placeholder="ID" data-label="#err-master-place-edit" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="master-name-edit" class="control-label cd-name">Clinic Name :</label>
                        <span class="cd-error-message label label-danger" id="err-master-name-edit"></span>
                        <input type="text" class="form-control" id="master-name-edit"
                               placeholder="Name" data-label="#err-master-name-edit">
                    </div>
                    <div class="form-group">
                        <label for="master-address-edit" class="control-label cd-name">Clinic Address :</label>
                        <span class="cd-error-message label label-danger" id="err-master-address-edit"></span>
                        <input type="text" class="form-control" id="master-address-edit"
                               placeholder="Address" data-label="#err-master-address-edit">
                    </div>
                    <div class="form-group">
                        <label for="master-long-edit" class="control-label cd-name">Longitude :</label>
                        <span class="cd-error-message label label-danger" id="err-master-long-edit"></span>
                        <input type="text" class="form-control" id="master-long-edit"
                               placeholder="Longitude" data-label="#err-master-long-edit">
                    </div>
                    <div class="form-group">
                        <label for="master-lat-edit" class="control-label cd-name">Latitude :</label>
                        <span class="cd-error-message label label-danger" id="err-master-lat-edit"></span>
                        <input type="text" class="form-control" id="master-lat-edit"
                               placeholder="Latitude" data-label="#err-master-lat-edit">
                    </div>
                    <div class="form-group">
                        <label for="master-isactive-edit" class="control-label">Status :</label>
                        <input type="hidden" class="form-control" id="master-isactive-edit">
                        <br/>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-isactive" data-status="1" id="btn-status-active">ACTIVE</button>
                            <button type="button" class="btn btn-default btn-isactive" data-status="0" id="btn-status-no-active">NO ACTIVE</button>
                        </div>
                    </div>
                </form>
            </div><!--modal body-->

            <div class="modal-footer">
                <p id="created"></p>
                <p id="last_modified"></p>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="btn-update">Edit</button>
            </div><!--modal footer-->

        </div><!--modal content-->
    </div><!--modal dialog-->
</div>

<script>

    $(document).ready( function($) {

        $(".btn-isactive").click(function(){
            var $status = $(this).attr("data-status");
            if($status == 1){
                $("#btn-status-active").removeClass("btn-default").addClass("btn-success");
                $("#btn-status-no-active").removeClass("btn-danger").addClass("btn-default");
                $("#master-isactive-edit").val(1);
            }else if($status==0){
                $("#btn-status-active").removeClass("btn-success").addClass("btn-default");
                $("#btn-status-no-active").removeClass("btn-default").addClass("btn-danger");
                $("#master-isactive-edit").val(0);
            }
        });

        function validate() {
            var err = 0;

            if (!$('#master-place-add').validateRequired()) {
                err++;
            }
            if (!$('#master-name-add').validateRequired()) {
                err++;
            }
            if (!$('#master-address-add').validateRequired()) {
                err++;
            }
            if (!$('#master-long-add').validateRequired()) {
                err++;
            }
            if (!$('#master-lat-add').validateRequired()) {
                err++;
            }
            if (err != 0) {
                return false;
            } else {
                return true;
            }
        }
        function validateEdit() {
            var err = 0;

            if (!$('#master-place-edit').validateRequired()) {
                err++;
            }
            if (!$('#master-name-edit').validateRequired()) {
                err++;
            }
            if (!$('#master-address-edit').validateRequired()) {
                err++;
            }
            if (!$('#master-long-edit').validateRequired()) {
                err++;
            }
            if (!$('#master-lat-edit').validateRequired()) {
                err++;
            }

            if (err != 0) {
                return false;
            } else {
                return true;
            }
        }

        var saveDataEvent = function(e) {
            if (validate()) {
                var formData = new FormData();
                formData.append("place", $("#master-place-add").val());
                formData.append("name", $("#master-name-add").val());
                formData.append("address", $("#master-address-add").val());
                formData.append("long", $("#master-long-add").val());
                formData.append("lat", $("#master-lat-add").val());

                $(this).saveData({
                    url: "<?php echo site_url('ClinicAdmin/createClinic')?>",
                    data: formData,
                    locationHref: "<?php echo site_url('ClinicAdmin')?>",
                    hrefDuration : 1000
                });
            }
            e.preventDefault();
        };

        var updateDataEvent = function(e){
            if (validateEdit()) {
                var formData = new FormData();
                formData.append("place", $("#master-place-edit").val());
                formData.append("id", $("#master-id").val());
                formData.append("name", $("#master-name-edit").val());
                formData.append("address", $("#master-address-edit").val());
                formData.append("long", $("#master-long-edit").val());
                formData.append("lat", $("#master-lat-edit").val());
                formData.append("isActive", $("#master-isactive-edit").val());

                $(this).saveData({
                    url: "<?php echo site_url('ClinicAdmin/editClinic')?>",
                    data: formData,
                    locationHref: "<?php echo site_url('ClinicAdmin')?>",
                    hrefDuration : 1000
                });
            }
            e.preventDefault();
        };

        // SAVE DATA TO DB
        $('#btn-save').click(saveDataEvent);
        $("#Clinic-form-add").on("submit", saveDataEvent);

        // UPDATE DATA TO DB
        $('#btn-update').click(updateDataEvent);
        $("#Clinic-form-edit").on("submit", updateDataEvent);
    });

</script>