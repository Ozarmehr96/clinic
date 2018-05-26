$(document).ready(function () {;
    $("#updaterecordPacientAppointmentModalBox").on('show.bs.modal', function () {
        $(".modal-body").find("#patFIOcol-xs").remove();;
    });
    $(".scheduleLi").click(function () {
        $('.profile-usermenu .nav').find('li.active').removeClass('active');
        $(this).addClass("active");
        $(".records-table").css("display", "none");
        $("#dortor-schedule").css("display", "block");
    });
    $("#recordsLi").click(function () {
        $('.profile-usermenu .nav').find('li.active').removeClass('active');
        $(this).addClass("active");
        $("#dortor-schedule").css("display", "none");
        $(".records-table").css("display", "block");
    });
});

function GetPatientRecord() {
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "/patient/gets", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var myObj = this.responseText;
            $("#recordList").append(myObj);
        }
    };
    xhttp.send("getRecords=1");
}

function GetRecordList() {
    $("#recordList").empty();
    GetPatientRecord();
    $("#recordList").trigger('change'); // способ инициализирования
}
GetRecordList();

/*! Запись к врачу пациентом */
function PatientOwnRecord(elem) {
    patientForUpdateRecordID = $(elem).data("id");
    ChangeFormActionByClassName("#updaterecordPatientForm", "/patient/gets");
    ClearModalFormInputs("updaterecordPatientForm");
    $("#updaterecordPacientModalTitle").text("Запись к врачу");
    $("#recorePatientUpdate").val("Записаться");
    $("#recorePatientUpdate").removeClass("btn-info").addClass("btn-success");
    $("#updaterecordPacientAppointmentModalBox").modal('show');
}



function ShowDoctorsWorkSchedule() {

}
