/*!
 * Поиск врачей
 **/
function SearchDoctors() {
    $("#search_table_body").empty();

    var name = $("#name").val() || 'undefined';
    var surname = $("#surname").val() || 'undefined';
    var patronymic = $("#fullname").val() || 'undefined';
    var date_of_birth = $("#datetimepicker1").val() || '1700-09-09';
    var date1 = date_of_birth.split("-");
    var date = date1[2] + "-" + date1[1] + "-" + date1[0] || '1700-09-09';
    var passport_num = $("#passport").val() || '0001';
    var special = $("#specialities").val();
    var cabinet = $("#doctor-cabinet").val();
    //var array = [name, surname, patronymic, date_of_birth, inn, passport_num, patient_card_num];
    xhttp = new XMLHttpRequest();
    xhttp.open("POST", "/heads-doctor/searchDoctor", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var receivedArr = this.responseText;
            if (receivedArr == false) {
                // BeautyAlert("Уведомления", " По Вашему запросу ничего не найдено");
                alert("По Вашему запросу ничего не найдено");
            }
            $("#search_table_body").append(receivedArr);
            console.log(receivedArr);
        }
    };
    console.log(date);
    var sendValues = "name=" + encodeURIComponent(name) + "&surname=" + encodeURIComponent(surname) + "&patronymic=" + encodeURIComponent(patronymic) + "&date_of_birth=" + encodeURIComponent(date) + "&cabinet=" + encodeURIComponent(cabinet) + "&passport_num=" + encodeURIComponent(passport_num) + "&special=" + encodeURIComponent(special);
    console.log(sendValues);
    xhttp.send("searchDoctor=true&" + sendValues);
}

$(document).ready(function () {

});
var list = "";

function CreateScheduleText() {
    list = "";
    $("#sheduleBody tr td").each(function () {
        list += $(this).find("input:first").val() + "-" + $(this).find("input:last").val() + ",";
    });
    $("#text").val(list.slice(0, -1));
}
$("#addDoctorForm").submit(function (e) {
    CreateScheduleText();
});
