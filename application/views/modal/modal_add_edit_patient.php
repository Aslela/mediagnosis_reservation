<!--Modal ADD-->
<div class="modal fade" id="patient-modal-add" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-title-add">Tambah Pasien Baru</h4>
            </div><!--modal header-->

            <div class="modal-body">
                <div class="alert alert-danger hidden" id="err-msg">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                </div>
                <form id="patient-form-add" action="">
                    <div class="form-group">
                        <label for="master-patient-name-add" class="control-label cd-patient-name-add">Nama Pasien :</label>
                        <span class="cd-error-message label label-danger" id="err-patient-name-add"></span>
                        <input type="text" class="form-control" id="patient-name-add" placeholder="Name" data-label="#err-patient-name-add" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="no-ktp-add" class="control-label cd-no-ktp-add">No. KTP :</label>
                        <span class="cd-error-message label label-danger" id="err-no-ktp-add"></span>
                        <input type="text" class="form-control" id="no-ktp-add" placeholder="No. KTP [16 Digit]" data-label="#err-no-ktp-add">
                    </div>
                    <div class="form-group">
                        <label for="no-bpjs-add" class="control-label cd-no-bpjs-add">No. BPJS :</label>
                        <span class="cd-error-message label label-danger" id="err-no-bpjs-add"></span>
                        <input type="text" class="form-control" id="no-bpjs-add" placeholder="No. BPJS [13 Digit]" data-label="#err-no-bpjs-add">
                    </div>
					<div class="form-group">
                        <label for="no-mris-add" class="control-label cd-no-mris-add">No. MRIS :</label>
                        <span class="cd-error-message label label-danger" id="err-no-mris-add"></span>
                        <input type="text" class="form-control" id="no-mris-add" placeholder="No. MRIS" data-label="#err-no-mris-add">
                    </div>
					<div class="form-group">
                        <label for="address-add" class="control-label cd-address-add">Alamat :</label>
                        <span class="cd-error-message label label-danger" id="err-address-add"></span>
                        <textarea class="form-control" id="address-add" placeholder="Alamat" data-label="#err-address-add"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="gender-add" class="control-label cd-gender-add">Jenis Kelamin :</label>
                      <span class="cd-error-message label label-danger" id="err-gender-add"></span>
                      <select class="form-control" id="gender-add" data-label="#err-gender-add">
                        <option value="Laki-laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="participant-status-add" class="control-label cd-participant-status-add">Status Partisipan :</label>
                      <span class="cd-error-message label label-danger" id="err-participant-status-add"></span>
                      <select class="form-control" id="participant-status-add" data-label="#err-participant-status-add">
                        <option value="AKTIF">AKTIF</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="participant-type-add" class="control-label cd-participant-type-add">Tipe Partisipan :</label>
                      <span class="cd-error-message label label-danger" id="err-participant-type-add"></span>
                      <select class="form-control" id="participant-type-add" data-label="#err-participant-type-add">
                        <option value="Karyawan Swasta">Karyawan Swasta</option>
                      </select>
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
<div class="modal fade" id="patient-modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-title-edit">Edit Pasien</h4>
            </div><!--modal header-->

            <div class="modal-body">
                <div class="alert alert-danger hidden" id="err-msg">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                </div>
                <form id="patient-form-edit" action="">
                    <input type="hidden" class="form-control" id="patient-id-edit">
                    <div class="form-group">
                        <label for="master-patient-name-edit" class="control-label cd-patient-name-edit">Nama Pasien :</label>
                        <span class="cd-error-message label label-danger" id="err-patient-name-edit"></span>
                        <input type="text" class="form-control" id="patient-name-edit" placeholder="Name" data-label="#err-patient-name-edit" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="no-ktp-edit" class="control-label cd-no-ktp-edit">No. KTP :</label>
                        <span class="cd-error-message label label-danger" id="err-no-ktp-edit"></span>
                        <input type="text" class="form-control" id="no-ktp-edit" placeholder="No. KTP [16 Digit]" data-label="#err-no-ktp-edit">
                    </div>
                    <div class="form-group">
                        <label for="no-bpjs-edit" class="control-label cd-no-bpjs-edit">No. BPJS :</label>
                        <span class="cd-error-message label label-danger" id="err-no-bpjs-edit"></span>
                        <input type="text" class="form-control" id="no-bpjs-edit" placeholder="No. BPJS [13 Digit]" data-label="#err-no-bpjs-edit">
                    </div>
					<div class="form-group">
                        <label for="no-mris-edit" class="control-label cd-no-mris-edit">No. MRIS :</label>
                        <span class="cd-error-message label label-danger" id="err-no-mris-edit"></span>
                        <input type="text" class="form-control" id="no-mris-edit" placeholder="No. MRIS" data-label="#err-no-mris-edit">
                    </div>
					<div class="form-group">
                        <label for="address-edit" class="control-label cd-address-edit">Alamat :</label>
                        <span class="cd-error-message label label-danger" id="err-address-edit"></span>
                        <textarea class="form-control" id="address-edit" placeholder="Alamat" data-label="#err-address-edit"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="gender-edit" class="control-label cd-gender-edit">Jenis Kelamin :</label>
                        <span class="cd-error-message label label-danger" id="err-gender-edit"></span>
                        <select class="form-control" id="gender-edit" data-label="#err-gender-edit">
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="participant-status-edit" class="control-label cd-participant-status-edit">Status Partisipan :</label>
                        <span class="cd-error-message label label-danger" id="err-participant-status-edit"></span>
                        <select class="form-control" id="participant-status-edit" data-label="#err-participant-status-edit">
                            <option value="AKTIF">AKTIF</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="participant-type-edit" class="control-label cd-participant-type-edit">Tipe Partisipan :</label>
                        <span class="cd-error-message label label-danger" id="err-participant-type-edit"></span>
                        <select class="form-control" id="participant-type-edit" data-label="#err-participant-type-edit">
                            <option value="Karyawan Swasta">Karyawan Swasta</option>
                        </select>
                    </div>
                </form>
            </div><!--modal body-->

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="btn-update">Edit</button>
            </div><!--modal footer-->

        </div><!--modal content-->
    </div><!--modal dialog-->
</div>

<script>

    $(document).ready( function() {

        function validate() {
            var err = 0;

            if (!$('#patient-name-add').validateRequired()) {
                err++;
            }else if (!$('#patient-name-add').validateAlphaPlusSpaceForm()) {
                err++;
            }else if(!$('#patient-name-add').validateLengthRange({minLength:3,maxLength:50})){
				err++;
			}else if (!$('#no-ktp-add').validateRequired()) {
                err++;
            }else if (!$('#no-ktp-add').validateNumberForm()) {
                err++;
            }else if(!$('#no-ktp-add').validateLengthRange({minLength:16,maxLength:16,errMsg:"No KTP harus 16 digit"})){
				err++;
			}else if (!$('#no-bpjs-add').validateRequired()) {
                err++;
            }else if (!$('#no-bpjs-add').validateNumberForm()) {
                err++;
            }else if(!$('#no-bpjs-add').validateLengthRange({minLength:13,maxLength:13,errMsg:"No BPJS harus 13 digit"})){
				err++;
			}else if(!$('#no-mris-add').validateRequired()){
				err++;
			}else if(!$('#no-mris-add').validateNumberForm()){
				err++;
			}else if(!$('#no-mris-add').validateLengthRange({minLength:6,maxLength:9,errMsg:"No MRIS minimal 6 digit, maximal 9 digit"})){
				err++;
			}else if (!$('#address-add').validateRequired()) {
                err++;
            }else if(!$('#address-add').validateLengthRange({minLength:8,maxLength:250})){
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

            if (!$('#patient-name-edit').validateRequired()) {
                err++;
            }else if (!$('#patient-name-edit').validateAlphaPlusSpaceForm()) {
                err++;
            }else if(!$('#patient-name-edit').validateLengthRange({minLength:3,maxLength:50})){
				err++;
			}else if (!$('#no-ktp-edit').validateRequired()) {
                err++;
            }else if (!$('#no-ktp-edit').validateNumberForm()) {
                err++;
            }else if(!$('#no-ktp-edit').validateLengthRange({minLength:16,maxLength:16,errMsg:"No KTP harus 16 digit"})){
				err++;
			}else if (!$('#no-bpjs-edit').validateRequired()) {
                err++;
            }else if (!$('#no-bpjs-edit').validateNumberForm()) {
                err++;
            }else if(!$('#no-bpjs-edit').validateLengthRange({minLength:13,maxLength:13,errMsg:"No BPJS harus 13 digit"})){
				err++;
			}else if(!$('#no-mris-edit').validateRequired()){
				err++;
			}else if(!$('#no-mris-edit').validateNumberForm()){
				err++;
			}else if(!$('#no-mris-edit').validateLengthRange({minLength:6,maxLength:9,errMsg:"No MRIS minimal 6 digit, maximal 9 digit"})){
				err++;
			}else if (!$('#address-edit').validateRequired()) {
                err++;
            }else if(!$('#address-edit').validateLengthRange({minLength:8,maxLength:250})){
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
                formData.append("patientName", $("#patient-name-add").val());
                formData.append("ktpID", $("#no-ktp-add").val());
                formData.append("bpjsID", $("#no-bpjs-add").val());
				formData.append("mrisNumber", $("#no-mris-add").val());
                formData.append("gender", $("#gender-add").find(":selected").val());
				formData.append("address", $("#address-add").val());
                formData.append("participantStatus", $("#participant-status-add").find(":selected").val());
                formData.append("participantType", $("#participant-type-add").find(":selected").val());


                $(this).saveData({
                    url: "<?php echo site_url('Register/doInsertPatientOffline')?>",
                    data: formData,
                    locationHref: "<?php echo site_url('Register/registerOfflinePatient')?>",
                    hrefDuration : 1000
                });
            }
            e.preventDefault();
        };

        var updateDataEvent = function(e){
			
            if (validateEdit()) {
                var formData = new FormData();
                formData.append("patientID", $("#patient-id-edit").val());
                formData.append("patientName", $("#patient-name-edit").val());
                formData.append("ktpID", $("#no-ktp-edit").val());
                formData.append("bpjsID", $("#no-bpjs-edit").val());
				formData.append("mrisNumber", $("#no-mris-edit").val());
                formData.append("gender", $("#gender-edit").find(":selected").val());
				formData.append("address", $("#address-edit").val());
                formData.append("participantStatus", $("#participant-status-edit").find(":selected").val());
                formData.append("participantType", $("#participant-type-edit").find(":selected").val());

                $(this).saveData({
                    url: "<?php echo site_url('Register/doUpdatePatientOffline')?>",
                    data: formData,
                    locationHref: "<?php echo site_url('Register/registerOfflinePatient')?>",
                    hrefDuration : 1000
                });
            }
            e.preventDefault();
        };

        // SAVE DATA TO DB
        $('#btn-save').click(saveDataEvent);
        $("#patient-form-add").on("submit", saveDataEvent);

        // UPDATE DATA TO DB
        $('#btn-update').click(updateDataEvent);
        $("#patient-form-edit").on("submit", updateDataEvent);
    });

</script>