$(document).ready(function () {
    $('#doctors').change(function () {
        $('#updatenachaloPriema option:last').insertBefore('#updatenachaloPriema option:first');
    });
    //функция начало календаря
    $(function () {
        $('#datetimepicker1').datetimepicker({
            locale: 'ru',
            stepping: 10,
            format: 'DD-MM-YYYY',
            //defaultDate: moment().toDate(),
            //daysOfWeekDisabled: [0]
        });
        /*$('#updatedatetimepickerZapicDataPriema').datetimepicker({
        	locale: 'ru',
        	stepping: 10,
        	//format: 'DD-MM-YYYY',
        	format: 'YYYY-MM-DD',
        	//defaultDate: moment().toDate(),
        	//daysOfWeekDisabled: [0]
        	minDate: moment().toDate(),
        	useCurrent: true,
        });*/
    });
    $('table tbody tr').click(function (event) {
        $(this).addClass('highlight').siblings().removeClass('highlight');
    });
    /*!
     * 	Событие при изменение даты приема (При редактирование записи)
     */
    $('#updatedatetimepickerZapicDataPriema').datetimepicker({
        locale: 'ru',
        stepping: 10,
        useCurrent: true,
        format: 'YYYY-MM-DD',
        daysOfWeekDisabled: [0],
        widgetPositioning: {
            horizontal: "left",
            vertical: "bottom"
        }
    }).on('dp.change', function (event) {
        $("#specialities").val("");
        $("#doctors").val("");
        $("#updatenachaloPriema").val("");
        //alert("Изменился дата приема");
    });

    $("#op").on("click", function () {
        //$("#Modal").modal('show');
        RemoveConfirmModal("При удалении данные удаляются без возможности восстанвления");
    });
    $("[data-toggle=tooltip]").tooltip();
    $("#confirm-remove-modal").on('hide.bs.modal', function () {
        $(".modal").css("overflow-y", "scroll");
    });
    $(document).on('show.bs.modal', '.modal', function (event) {

        var zIndex = 1040 + (10 * $('.modal:visible').length);
        $(this).css('z-index', zIndex);
        setTimeout(function () {
            $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
        }, 0);

    });
    $("#selectedPacientModalBox").on('show.bs.modal', function () {
        $(this).css("overflow-y", "hidden");
    });
    $("#warning-modal").on('hide.bs.modal', function () {
        $("#recordPacientAppointmentModalBox").css("overflow-y", "scroll");
        $("#updaterecordPacientAppointmentModalBox").css("overflow-y", "scroll");
        $("body").css("overflow-y", "hidden");
    });
    /*$(function () {
    			$('#datetimepicker33').datetimepicker({
    				locale: 'ru',
    				stepping: 10,
    				format: 'DD-MM-YYYY',
    				//defaultDate: moment().toDate(),
    				//daysOfWeekDisabled: [0]
    			});
    		});
    		$(function () {
    			$('#datetimepicker2').datetimepicker({
    				locale: 'ru',
    				stepping: 10,
    				format: 'DD-MM-YYYY',
    				minDate: moment().toDate(),

    				//defaultDate: moment().toDate(),
    				//daysOfWeekDisabled: [0]
    			});
    		});
    		$(function () { //дата приема
    			$('#dataPriema').datetimepicker({
    				locale: 'ru',
    				stepping: 10,
    				format: 'DD-MM-YYYY',
    				//defaultDate: moment().toDate(),
    				minDate: moment().toDate(),
    				//daysOfWeekDisabled: [0]
    			});
    		});
    		$(function () { //начало приема
    			$('#nachaloPriema').datetimepicker({
    				locale: 'ru',
    				stepping: 15,
    				format: 'HH:mm'
    			});
    		});
    		$(function () { //дата приема
    			$('#updatedatetimepickerZapicDataPriema').datetimepicker({
    				locale: 'ru',
    				stepping: 10,
    				format: 'DD-MM-YYYY',
    				defaultDate: new Date('2000, 09, 09'),
    				maxDate: moment().toDate(),
    			});
    		});

    		$(function () { //дата приема
    			$('#datetimepicker_for_doctor_get').datetimepicker({
    				locale: 'ru',
    				stepping: 10,
    				format: 'DD-MM-YYYY',
    				//defaultDate: moment().toDate(),
    				minDate: moment().toDate(),
    				daysOfWeekDisabled: [0]
    			});
    		});


    		// открыть блок календарь при нажатии на поле
    		$('#datetimepicker2 input').click(function (event) {
    			$('#datetimepicker2 ').data("DateTimePicker").show();
    		});

	
    		/*$('#fixing_date').click(function (event) {
    			$('#fixing_date').data("DateTimePicker").show();
    		})*/

    // --------------------------------------------Конец календаря-------------------------------------------------------------------
    $(function () { //дата приема
        $('#datetimepicker_for_doctor_get').datetimepicker({
            locale: 'ru',
            stepping: 10,
            format: 'DD-MM-YYYY',
            //defaultDate: moment().toDate(),
            minDate: moment().toDate(),
            daysOfWeekDisabled: [0]
        });
    });
    $("#medicine-cart-number").tooltip();
    var isEnableUserInputs = true; // доступны ли поля

    // Сделать Недоступными поля
    /*function Disable_user_inputs1() {
    	$(".addPlaceholder").each(function () {
    		$(this).find("input").prop("disabled", true);
    		$(this).find("select").prop("disabled", true);
    	});
    	isEnableUserInputs = true;
    }*/

    // *****************************		Все действие регистратора			*****************************
    $('ul.operator-menu > li').click(function () {

        $('ul.operator-menu > li').removeClass('active');
        $(this).addClass('active');
    });
    // добавление class active для выбранной вкладки, и удаление старой активной вкладки модальное окно
    $('ul.user_tabs > li').click(function (e) {
        e.preventDefault();
        $('ul.user_tabs > li').removeClass('active'); // удаляем все активные вкладки
        $(this).addClass('active'); // добавляем класс active для текущей вкладки
    });

    // Добавление нового пациента				КНОПКА ДОБАВЛЕНИЯ НОВОГО ПАЦИЕНТА
    $("#addPacient").click(function () {
        ClearModalFormInputs("operator_add_patient");
        ChangeFormActionByClassName(".selected-user-form", "add/patient");

        $("#zapicat").css("display", "none");
        $("#remove-patient-button").css("display", "none");
        $("#save-user-selected-info").css("display", "none");
        $(".add-new-pacient").css("display", "inline-block");
        clickedButtonId = $(this).attr('id');
        $("#selectedPacientModalBox").modal('show');
        $(".selected_PacientModalBoxTitle").text("Добавление нового пациента");
        $(".addPlaceholder").each(function () {
            $(this).find("input").val('');
            $(this).find("input").prop("disabled", false);
            $(this).find("select").prop("disabled", false);
        });
        GetMaxIdFromPatientTableAdnSet("selected-user-patient_card_num");
    });

    /*!
     * Событие при открытие модального окна 
     **/
    $("#selectedPacientModalBox").on('show.bs.modal', function () {
        ClearModalFormInputs("operator_add_patient");
    });

    $("#selectedPacientModalBox").on('hide.bs.modal', function () {});

    var get_doctor_data_id_from_table = ""; // для сохранение id нажатого врача

    //	Отображать даннные выбранного  врача в модальном окне при нажатии на 
    // строку таблицы
    // РАБОЧЕЕ МЕСТО ВРАЧА					ОТКРЫТИЕ МОДАЛЬНОГО ОКНА
    $(".open-modal-doctor-data").click(function () {
        clickedButtonId = $(this).attr("id");
        $("#selectedDoctorModalBox").modal("show");
        get_doctor_data_id_from_table = $(this).data("id");
        $("#doctor_workModalBoxTitle").text("Рабочее место: " + $(this).text());
    });

    //функция автоматической встаки placeholder для input
    var label_val = "";
    $(".addPlaceholders").each(function () {
        label_val = $(this).find("label").html();
        $(this).find("input").attr('placeholder', label_val);
    });

    //	*********** Вкладка журнал регистрации ***********************************

    // Функция добавления класс актив для выбранного врача
    $(".doctor-pills-name").click(function (e) {
        if (e.target.nodeName !== "A")
            return;
        $(".menu-second-level").each(function () {
            $("li").removeClass('active-second-level');
        });
        $(this).addClass('active-second-level');
    });


    // Функция нажатии кнопки записать, когда откроется модальное окно данных пациента
    $("#zapicat").click(function () {
        $("#recordPacientAppointmentModalBox").modal('show');
    });

    $("#operator_add_patient").submit(function () {
        //$("#selected-user-sex").attr("value") = $("#selected-user-sex").attr("selected").val();
    });
});


/*!
 * Авторизация
 */
$("#loginForm").submit(function (e) {
    var result = Authorization();
    if (result > 1 || result == 0) {
        OpenWarningModal("Ошибка", "Неправильный пароль или логин");
        return false;
    }
});

/*! 
 * Проверка логина и пароля
 */
var Authorization = function () {
    var login = $("#login").val();
    var pass = $("#password").val();
    var rowCount = "";
    $.ajax({
        'async': false,
        type: "POST",
        url: "/authorization",
        dataType: 'html',
        //data: {'b': val }, // Можно вот так указать, только внутри фигурных скобках!!!
        data: 'authorization=true&login=' + login + '&password=' + pass, // Можно еще вот так, без фигурных скобок
        success: function (result) {
            rowCount = result;
        }
    });
    return rowCount;
};

/*!
 * Очистка полей формы
 **/
function ClearModalFormInputs(formID) {
    $("#" + formID)[0].reset();
}
/*function timeNow(i) {
	var d = new Date(),
		h = (d.getHours() < 10 ? '0' : '') + d.getHours(),
		m = (d.getMinutes() < 10 ? '0' : '') + d.getMinutes();
	i.value = h + ':' + m;
}*/
var current = 'schedule';
/*! при */
/*!
 * Метод для создание номер медицинской карты для пациента
 */
function CreateMedicineCardNumberForPatient(max_id_from_db) {
    var randomVal = Math.floor((Math.random() * 100) + 10); // рандомное число от 10 для 100
    var day = new Date();
    var year = day.getFullYear();
    var patient_card_num = year * 120 + parseInt(max_id_from_db) + randomVal;
    return patient_card_num;
}

var maxIdFromPatientTable = "1";
/*!
 * Метод для выбора максимальное значения ID таблицы пациентов
 * для создания медицинской карты пациента
 */
function GetMaxIdFromPatientTableAdnSet(inputID) {
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "/operator/patients", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            maxIdFromPatientTable = this.responseText;
            var maxID = CreateMedicineCardNumberForPatient(maxIdFromPatientTable);
            var result = SearchUserByParamsReturnRowCount('patient', 'patient_card_num', maxID);
            do {
                maxID = 0;
                maxID = CreateMedicineCardNumberForPatient(maxIdFromPatientTable);
            }
            while (result != 0)
            $("#" + inputID).val(maxID);
        }
    };
    xhttp.send("getMaxPatientId=1");
}

var current_tab = 'basic-information';

/*!
 * Метод для открытии соответсвующее окно для выбранной вкладки модально окна пациента
 */
function ShowUser_Data(id) {
    document.getElementById(current_tab).style.display = 'none';
    document.getElementById(id).style.display = 'block';
    current_tab = id;
}

/*!
 * Метод для активации вкладки Основное, чтоб после закрытии не осталась предыдущая вкладка активной 
 */
function ActivateFirstLiOfPatientModal() {
    ShowUser_Data('basic-information'); // Активируем
    $(".user_tabs>li").each(function () {
        $(this).removeClass('active');
    });
    $(".user_tabs>li:first").addClass('active');
}

/*!
 * Метод проверяет, не записан ли пациент или же не записывается ли повторно к одному и тому же доктору в одно время
 */
var SearchIsNotRecordedPatientBeforeRecord = function (articul) {
    var rowCount = null;
    $.ajax({
        'async': false,
        type: "POST",
        url: "/operator/register-journal-record",
        dataType: 'html',
        //data: {'b': val }, // Можно вот так указать, только внутри фигурных скобках!!!
        data: 'checkisnotrecordedpatient=1&articul=' + articul, // Можно еще вот так, без фигурных скобок
        success: function (result) {
            rowCount = result;
        }
    });
    return rowCount;
};
/*!
 * Метод проверяет, свободен ли доктор в указанное время
 */
var SearchIsFreeDoctorBeforeRecordPatient = function (date, time, idDoctor) {
    var rowCount = null;
    $.ajax({
        'async': false,
        type: "POST",
        url: "/operator/register-journal-record",
        dataType: 'html',
        //data: {'b': val }, // Можно вот так указать, только внутри фигурных скобках!!!
        data: 'seachisfreedoctor=1&date=' + date + '&time=' + time + '&iddoctor=' + idDoctor, // Можно еще вот так, без фигурных скобок
        success: function (result) {
            rowCount = result;
        }
    });
    return rowCount;
};
/*!
 * Метод для поиска пользователя с помощью указанного параметра
 * param - параметр, по которому нужно поискать (id,passport, phone)
 * val значение
 * Возвращает количество затронутных строк
 */
var SearchUserByParamsReturnRowCount = function (db, param, val) {
    var rowCount = null;
    $.ajax({
        'async': false,
        type: "POST",
        url: "/operator/patients",
        //data: {'b': val }, // Можно вот так указать, только внутри фигурных скобках!!!
        data: 'seachByParams=1&db=' + db + '&param=' + param + '&val=' + val, // Можно еще вот так, без фигурных скобок
        success: function (result) {
            rowCount = result;
        }
    });
    return rowCount;
};
//alert(SearchUserByParamsReturnRowCount('patient', 'passport_num', "452121215"));
/*alert(SearchUserByParamsReturnRowCount('passport_num', "452121215"));
alert(SearchUserByParamsReturnRowCount('police_number', "5"));*/

/*!
 * Метод изменение название action, где formClassName-название класса формы
 * action = путь
 */
function ChangeFormActionByClassName(formClassName, action) {
    $(formClassName).prop("action", action);
}


/*!
 * Поиск пациентов
 **/
function SearchPatients() {
    $("#search_table_body").empty();

    var name = $("#name").val() || 'undefined';
    var surname = $("#surname").val() || 'undefined';
    var patronymic = $("#fullname").val() || 'undefined';
    var date_of_birth = $("#datetimepicker1").val() || '1700-09-09';
    var date1 = date_of_birth.split("-");
    var date = date1[2] + "-" + date1[1] + "-" + date1[0] || '1700-09-09';
    var inn = $("#police_number").val() || '0101';
    var passport_num = $("#passport").val() || '0001';
    var patient_card_num = $("#medicine-cart-number").val() || '0001';
    //var array = [name, surname, patronymic, date_of_birth, inn, passport_num, patient_card_num];
    xhttp = new XMLHttpRequest();
    xhttp.open("POST", "/operator/patients", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var receivedArr = this.responseText;
            if (receivedArr == false) {
                BeautyAlert("Уведомления", " По Вашему запросу ничего не найдено");
            }
            $("#search_table_body").append(receivedArr);
            console.log(receivedArr);
        }
    };
    console.log(date);
    var sendValues = "name=" + encodeURIComponent(name) + "&surname=" + encodeURIComponent(surname) + "&patronymic=" + encodeURIComponent(patronymic) + "&date_of_birth=" + encodeURIComponent(date) + "&police_number=" + encodeURIComponent(inn) + "&passport_num=" + encodeURIComponent(passport_num) + "&patient_card_num=" + encodeURIComponent(patient_card_num);
    console.log(sendValues);
    xhttp.send("search=a&" + sendValues);
}

/*!
 * Метод форматирование даты 
 * Текущий формат (год, месяц,день)
 * Вернет в формате день, месяц год
 **/
function toDateFormat(date) {
    var dateParts = date.split("-"); // разбив на - сохраним в массив
    dateIs = dateParts[2] + "-" + dateParts[1] + "-" + dateParts[0];
    return dateIs;
}

function ConvertToYYMMDDDateFormat(date) {
    var dateParts = date.split("-"); // разбив на - сохраним в массив
    dateIs = dateParts[2] + "-" + dateParts[1] + "-" + dateParts[0];
    return dateIs;
}
/*!
 * Открытие модального окна для просмотра данные выбранного пациента
 */
var patient_id_from_search = "";
var selectedPatient;

function ShowUserDatasOnModal(elem) {
    ActivateFirstLiOfPatientModal();
    LoadSpinner(function () {
        $("#forPass").empty();
        $("#forTimer").empty();
        clearTimeout(timer);
        // $("#id_doctor option:first").attr("selected", "selected");
        $("#remove-patient-button").css("display", "inline-block");
        $("#printPassword").css("display", "none");
        var get_pacient_data_id_from_table = "";
        var visibleZapisatButton = "";
        get_pacient_data_id_from_table = $(elem).data("id");
        selectedPatient = get_pacient_data_id_from_table;
        $("#remove-patient-button").data("id", get_pacient_data_id_from_table);
        patient_id_from_search = get_pacient_data_id_from_table;
        visibleZapisatButton = $(elem).data("zapicat");
        if (visibleZapisatButton == true) {
            $("#zapicat").css("display", "block");
        }
        ChangeFormActionByClassName(".selected-user-form", "/operator/update/patient/" + get_pacient_data_id_from_table);
        $(".add-new-pacient").css("display", "none"); // блокируем кнопку добавить
        $("#save-user-selected-info").css("display", "inline-block"); // показываем кнопки сохранить и изменить

        $("#selectedPacientModalBox").modal('show');

        //alert(get_pacient_data_id_from_table);
        //$(".selected_PacientModalBoxTitle").text("Карточка пациента: " + $(className).text());

        var fio = "";
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "/operator/patients", true);
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var myObj = JSON.parse(this.responseText);

                $("#selected-user-name").val(myObj.name); //Основные сведения
                $("#selected-user-surname").val(myObj.surname);
                $("#selected-user-patronymic").val(myObj.patronymic);
                $("#selected-user-sex").val(myObj.sex);
                $("#date_of_birth").val(myObj.date_of_birth);
                $("#selected-user-phone").val(myObj.phone);
                $("#selected-user-patient_card_num").val(myObj.patient_card_num);
                $("#forLogin").text("Логин: " + myObj.patient_card_num);

                $("#selected-user-invalidnost").val(myObj.invalidnost);
                $("#selected-user-adress").val(myObj.adress);
                $("#selected-user-ss").val(myObj.social_status);
                $("#selected-pacientdoctor").val(myObj.id_doctor);
                $("#fixing_date").val(myObj.fixing_date);

                $("#selected-user-id_citizenship").val(myObj.id_citizenship); //Контакты
                $("#selected-user-region").val(myObj.id_region);
                $("#selected-user-email").val(myObj.email);

                $("#selected-user-type_medical_policy").val(myObj.type_medical_policy); //Страховой полис
                $("#datetimepicker-policy-start").val(myObj.start_medical_policy);
                $("#selected-user-police_number").val(myObj.police_number);
                $("#datetimepicker-policy-end").val(myObj.end_medical_policy);
                $("#selected-user-comp").val(myObj.Id_insurance_company);
                $("#selected-user-snils").val(myObj.snils);

                $("#selected-user-university").val(myObj.id_university); //Документы
                $("#selected-user-work").val(myObj.work_place);
                $("#selected-user-passport").val(myObj.passport_num);
                $("#selected-user-passportDateStart").val(myObj.data_vidachi_pass);
                $("#selected-user-inn").val(myObj.inn);

                fio = myObj.surname + " " + myObj.name + " " + myObj.patronymic;
                $(".selected_PacientModalBoxTitle").text("Карточка пациента: " + fio);
            }
        };
        xhttp.send("id=" + encodeURIComponent(get_pacient_data_id_from_table));
    }, 200);

    get_pacient_data_id_from_table = 0;
}


/**
 * Создание пароля 
 */
function CreatePass() {
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "/operator/patients", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var result = this.responseText;
            $("#forPass").text("Пароль: " + result);
            Timer(120, "#forTimer");

        }
    };
    xhttp.send("createpass=true&userid=" + encodeURIComponent(selectedPatient));
}
var timer = "";

function Timer(seconds, inputIdORClass) {
    $(inputIdORClass).text("Пароль исчезнет через " + seconds + " сек...");
    $("#printPassword").css("display", "block");
    seconds--;
    timer = setTimeout('Timer(' + seconds + ',"' + inputIdORClass + '")', 1000);
    if (seconds < -1) {
        clearTimeout(timer);
        $(inputIdORClass).empty();
        $("#forPass").empty();
        $("#printPassword").css("display", "none");
    }
}


function ShowPatientDatasOnModalForPatient(elem) {
    ActivateFirstLiOfPatientModal();
    var get_pacient_data_id_from_table = "";
    var visibleZapisatButton = "";

    LoadSpinner(function () {
        get_pacient_data_id_from_table = $(elem).data("id");
        $("#remove-patient-button").data("id", get_pacient_data_id_from_table);
        patient_id_from_search = get_pacient_data_id_from_table;
        visibleZapisatButton = $(elem).data("zapicat");
        if (visibleZapisatButton == true) {
            $("#zapicat").css("display", "block");
        }
        var actionName = "/patient/update/" + get_pacient_data_id_from_table; //actionName.replace(/\s/g, '')
        ChangeFormActionByClassName(".selected-user-form", actionName);
        $(".add-new-pacient").remove(); // блокируем кнопку добавить
        $("#remove-patient-button").remove(); // блокируем кнопку добавить
        $("#save-user-selected-info").css("display", "inline-block"); // показываем кнопки сохранить и изменить
        $("#selectedPacientModalBox").modal('show');

        //alert(get_pacient_data_id_from_table);
        //$(".selected_PacientModalBoxTitle").text("Карточка пациента: " + $(className).text());

        var fio = "";
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "/patient", true);
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var myObj = JSON.parse(this.responseText);

                $("#selected-user-name").val(myObj.name); //Основные сведения
                $("#selected-user-surname").val(myObj.surname);
                $("#selected-user-patronymic").val(myObj.patronymic);
                $("#selected-user-sex").val(myObj.sex);
                $("#date_of_birth").val(myObj.date_of_birth);
                $("#selected-user-phone").val(myObj.phone);
                $("#selected-user-patient_card_num").val(myObj.patient_card_num);
                $("#forLogin").text(myObj.patient_card_num);

                $("#selected-user-invalidnost").val(myObj.invalidnost);
                $("#selected-user-adress").val(myObj.adress);
                $("#selected-user-ss").val(myObj.social_status);
                $("#selected-pacientdoctor").val(myObj.id_doctor);
                $("#fixing_date").val(myObj.fixing_date);

                $("#selected-user-id_citizenship").val(myObj.id_citizenship); //Контакты
                $("#selected-user-region").val(myObj.id_region);
                $("#selected-user-email").val(myObj.email);

                $("#selected-user-type_medical_policy").val(myObj.type_medical_policy); //Страховой полис
                $("#datetimepicker-policy-start").val(myObj.start_medical_policy);
                $("#selected-user-police_number").val(myObj.police_number);
                $("#datetimepicker-policy-end").val(myObj.end_medical_policy);
                $("#selected-user-comp").val(myObj.Id_insurance_company);
                $("#selected-user-snils").val(myObj.snils);

                $("#selected-user-university").val(myObj.id_university); //Документы
                $("#selected-user-work").val(myObj.work_place);
                $("#selected-user-passport").val(myObj.passport_num);
                $("#selected-user-passportDateStart").val(myObj.data_vidachi_pass);
                $("#selected-user-inn").val(myObj.inn);

                fio = myObj.surname + " " + myObj.name + " " + myObj.patronymic;
                $(".selected_PacientModalBoxTitle").text("Карточка пациента: " + fio);

            }
        };
        xhttp.send("id=" + encodeURIComponent(get_pacient_data_id_from_table));
    }, 200);

    get_pacient_data_id_from_table = 0;
}


/*!
 * Метод проверяет, существует ли такой пациент с таким номером пасспорта в БД
 */
function CheckDBBeforeAddNewPatient() {
    var Exist = false;
    var maxID = $("#selected-user-patient_card_num").data("maxId");
    var actionName = $(".selected-user-form").attr("action");
    var passportNum = $("#selected-user-passport").val();
    var medCardNum = $("#selected-user-patient_card_num").val();
    if (actionName == "add/patient") {
        if (passportNum == "") {
            alert("Все указанные поля обязательны для заполнения!");
        } else {
            var result = SearchUserByParamsReturnRowCount('patient', 'passport_num', passportNum);
            var resultMed = SearchUserByParamsReturnRowCount('patient', 'patient_card_num', medCardNum);
            if (result == 0) {
                //alert(result);
                Exist = false;
            } else {
                OpenWarningModal("Ошибка", "Такой пользователь уже зарегистрирован");
                Exist = true;
            }
            if (resultMed != 0) {
                var randomVal = Math.floor((Math.random() * 100) + 10); // рандомное число от 10 для 100
                $("#selected-user-patient_card_num").val(parseInt(medCardNum) + randomVal);
            }
        }
    }
    return Exist;
}


/*!
 * Событие перед добавлением нового пользоватля
 */

$(".selected-user-form").submit(function (e) {
    if (CheckDBBeforeAddNewPatient() == false) { // Если все ок, проверка прошла, номер паспорта нет, то добавить
        //alert("yes");
        //e.preventDefault();
        alert($("#selected-user-patient_card_num").val());
        $(".selected-user-form").submit();
    } else { // иначе ничего не делать
        e.preventDefault();
    }
});

var removePatientOrNo;
/*!
 * Метод для удаление пациента
 */
function RemovePatientFromDB(elem) {
    var patientID = $(elem).data("id");
    $("#remove-modal-comments").text("Данные удаляются без возможности восстановления");
    modalRemoveConfirm(function (confirm) {
        if (confirm) {
            removePatientOrNo = true;

            //Acciones si el usuario no confirma

        } else {
            removePatientOrNo = false;
        }
        if (removePatientOrNo) {
            var xhttp = new XMLHttpRequest();
            xhttp.open("POST", "/operator/remove/patient", true);
            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    window.location.reload();
                }
            };
            xhttp.send("removepatient=true&id=" + encodeURIComponent(patientID));
            confirm = false;
        }
    });


}

function UpdateUserData() {

    //alert(sessionStorage.getItem("user_id"));
}
var active_doctor = "";

var passportNum = "";
var medicineCartNum = "";
var patientIDEnd = "";
var dayOfPriem = "";
var idOfSelectedPatientFromSearch = $("#idSelectedPatientFromSearch").data("id") || "";
/*!
 * функция запись на прием к врачам
 */
function ZapicPatient(elem) {
    $("#recordPatientForm")[0].reset();

    var doctorID = $(".active-second-level").data("id");
    $("#doctorID").val(doctorID);
    $("#patient-fio-label").css("color", "black");
    $("#patient-fio-label").text("ФИО пациента");

    var id_patient = $(elem).data('id') || ''; // id пациента кото
    var timeOfPriem = $(elem).text();
    $("#recordPacientAppointmentModalBox").modal('show');
    active_doctor = $("li.active-second-level").text();
    $("#recordPacientModalTitle").text("Запись на прием к " + active_doctor);
    dayOfPriem = $(".data-priema").val();
    dayOfPriem = ConvertToYYMMDDDateFormat(dayOfPriem);
    $("#datetimepickerZapicDataPriema").val(dayOfPriem.toString());
    $(nachaloPriema).val(timeOfPriem);
    $("#pacientpassportnumber").change(function () {
        passportNum = $(this).val();
    });
    $("#medicine-cart-number").change(function () {
        medicineCartNum = $(this).val();
    });

    if (idOfSelectedPatientFromSearch == "") { // если пациаент не выбран с другой страницы
        $("#medicine-cart-number,#pacientpassportnumber").change(function () {
            if (passportNum != "" || medicineCartNum != "") {
                var xhttp = new XMLHttpRequest();
                xhttp.open("POST", "/operator/register-journal-record", true);
                xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        var myObj = JSON.parse(this.responseText);
                        if (myObj == "") {
                            OpenWarningModal("Ошибка", "Пациент не найден! Проверьте введенные данные!");
                            $("#patient-fio").val("ФИО пациента");
                            $("#patientID").data('find', false);
                        } else {
                            var fullname = myObj.surname + " " + myObj.name + " " + myObj.patronymic; //Основные сведения
                            $("#patient-fio").val(fullname);
                            $("#pacientpassportnumber").val(myObj.police_number);
                            $("#medicine-cart-number").val(myObj.patient_card_num);
                            console.log(myObj.id_pacient);
                            var patientIDEn = myObj.id_pacient;
                            $("#patientID").val(patientIDEn);
                            $("#patientID").data('find', true);
                        }
                    }
                };
                xhttp.send("getUserByPassportAndMedCart=1&" + "medicineCartNum=" + encodeURIComponent(medicineCartNum) + "&passportNum=" + encodeURIComponent(passportNum));
                //xhttp.send("getUserByPassportAndMedCart=1&" + "medicineCartNum=456456&passportNum=400340250");

            }
        });
    } else {
        GetUSerdatasByIdAndSetDatasToModalZapisInputs(idOfSelectedPatientFromSearch);
    }
}

/*!
 * Метод для создания значения для столбца uniqueIndex
 * Для того, чтобы проверить, записан ли человек, или свободен ли врач в это время
 * суммируется год + месяц + день + IDдоктора + IDпациента 
 * в таблице не повторяется это значение
 */
function CreateUniqueIndex(date, time, doctorID, patientID) {

    var dateTime = new Date(date);
    var year = dateTime.getFullYear();
    console.log("Год->" + year);
    var month = dateTime.getMonth() + 1; // Потому что январь начинается с 0, а не с одного
    var day = dateTime.getDate();
    var timeForSplit = time.slice(0, 5);
    var time = timeForSplit.split(":");
    time = time[0] + time[1];
    var space = "";
    var uniqueIndex = year + space + month + space + day + space + time + space + doctorID + space + patientID;
    return uniqueIndex;
    //console.log(uniqueIndex);
}
//CreateUniqueIndex("2018-05-15", "08:00:00", "11", "12");

function CheckIsPatientRecordedBeforeRecord() {
    SearchUserByParamsReturnRowCount('schedule', 'articul', "452121215");
}
var isDoctorFree = "";
var isPatientNotRecorder = "";
/*!
 * Событие перед записью пациента
 * Изменение формат даты перед отправкой данных (перед нажатием кнопки записать)
 */
$("#recordPatientForm").submit(function (event) {

    var date = $("#datetimepickerZapicDataPriema").val();
    var time = $("#nachaloPriema").val();
    var doctorID = $("#doctorID").val();
    var patientID = $("#patientID").val();
    var articul = CreateUniqueIndex(date, time, doctorID, patientID);
    $("#articul-for-add").val(articul);
    alert("ID пациента->" + patientID);
    alert("ID доктора->" + doctorID);
    alert("Артикул->" + $("#articul-for-add").val());
    alert("Дата->" + date);
    var isFindPatient = $("#patientID").data('find');
    var isExistArticulInBD = SearchIsNotRecordedPatientBeforeRecord(articul);
    var isFreeDoctor = SearchIsFreeDoctorBeforeRecordPatient(date, time, doctorID);
    if (isFindPatient != true) {
        OpenWarningModal("Ошибка", "Пациент не найден. Проверьте введенные данные");
    } else {
        if (parseInt(isExistArticulInBD) != 0) {
            OpenWarningModal("Ошибка", "Пациент уже записан к выбранному доктору в указанное время!");
            isPatientNotRecorder = false;
            isDoctorFree = 0;
            isExistArticulInBD = "";
            //isExistArticulInBD = "";
            //isDoctorFree = 0;
            return false;
        } else if (parseInt(isFreeDoctor) != 0) {
            OpenWarningModal("Ошибка", "Доктор занят в указанное время");
            isPatientNotRecorder = false;
            isDoctorFree = "";
            return false;
        }
    }


    //alert(isFindPatient);
    if (isDoctorFree != true && isPatientNotRecorder != true && isFindPatient != true) {
        return false;
    }
    //dayOfPriem = toDateFormat(dayOfPriem); // год-месяц-день
    //$("#datetimepickerZapicDataPriema").val(date);
    //event.preventDefault();
});
//alert(SearchIsFreeDoctorBeforeRecordPatient("2018-05-05", "08:00:00", "57"));
$(document).on('show.bs.modal', '#recordPacientAppointmentModalBox', function (event) {
    dayOfPriem = toDateFormat(dayOfPriem); // год-месяц-день
    $("#datetimepickerZapicDataPriema").val(dayOfPriem);
});

function UpdateZapicById(elem) {
    var schedule_id = $(elem).data("id");
    if (idOfSelectedPatientFromSearch != "") {

    } else {
        GetUSerdatasByIdAndSetDatasToModalZapisInputs(idOfSelectedPatientFromSearch);
    }
}
/*!
 * Метод для получения данных пользователя с помощью ID
 * И вставка полученных данных в модальное окно записи
 */
function GetUSerdatasByIdAndSetDatasToModalZapisInputs(patientID) {
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "/operator/patients", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var myObj = JSON.parse(this.responseText);
            $("#pacientpassportnumber").val(myObj.passport_num);
            $("#medicine-cart-number").val(myObj.patient_card_num);
            var fio = myObj.surname + " " + myObj.name + " " + myObj.patronymic;
            $("#patient-fio").val(fio);
            var patientIDEnd = myObj.id_pacient;
            $("#patientID").val(patientIDEnd);
        }
    };
    xhttp.send("id=" + encodeURIComponent(patientID));
}
/*!
 * Удаление ФИО пациента из меню
 */
function RemoveIdPatientFromUlLi() {
    $("#idSelectedPatientFromSearchUl").remove();
    window.location.href = '/operator/register-journal';
}

/*!
 * Отпрака ID пациента на страницу записи пациента
 */
function RedirectForRecord() {

    $(".forAddingNewform").append('<input type="hidden" name="patient_id" value="' + patient_id_from_search + '">');
    //alert(patient_id_from_search);
    $(".forAddingNewform").submit();
}

/*!
 * Метод для показа расписание работы выбранного доктора
 **/
function ShowDoctorSchedule(elem) {
    var datePri = $(".data-priema").val();
    if (CheckDateIsTrue(".data-priema") == true) {
        var doctorID = $(elem).data("id");
        var date = toDateFormat(datePri);

        $('#doctor-schedule-table tbody tr').html('');
        xhttp = new XMLHttpRequest();
        xhttp.open("POST", "/operator/register-journal", true);
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var receivedArr = this.responseText;
                LoadSpinner(function () {
                    $('#doctor-schedule-table tbody').append(receivedArr);
                }, 200);
            }
        };
        xhttp.send("scheduleSubmit=1&date=" + encodeURIComponent(date) + "&id_doctor=" + encodeURIComponent(doctorID));
    }

}
/*!
 *  Событие при нажатии на ФИО доктора для получении расписание выбранного доктора
 * Метод находится выше ShowDoctorSchedule
 */
$(".doctor-pills-name").click(function (e) {
    if (e.target.nodeName !== "A")
        return;
    ShowDoctorSchedule(this);
});
//*!********************************  CONFIRM MODALS				***************************************
function OpenWarningModal(title, comments) {
    $("#warning-modal").modal('show');
    $("#warning-modal-title").text(title);
    $("#warning-modal-comments").text(comments);
}

function Alert(className, info, comments) {
    $("body").append('<div class="alert alert-success"><strong>Success!</strong> Indicates a successful or positive actio</div>')
}

var shureForRemove = false;

function RemoveConfirmModal(comment) {
    $("#confirm-remove-modal").modal('show');
    $("#remove-modal-comments").text(comment);
    $("#remove-modal-remove-button").click(function () {
        shureForRemove = true;
        $("#confirm-remove-modal").modal('toggle');
        $(".modal").css("overflow-y", "scroll");
    });
    return shureForRemove;
}

/*!
 * Метод окно подтверждения, да или нет,
 */
var modalRemoveConfirm = function (callback, comment) {

    $("#confirm-remove-modal").modal('show');
    $("#remove-modal-comments").text(comment);

    $("#remove-modal-remove-button").on("click", function () {
        callback(true);
        $("#confirm-remove-modal").modal('hide');
    });

    $("#remove-modal-cancel-button").on("click", function () {
        callback(false);
        $("#confirm-remove-modal").modal('hide');
    });
};

var removePatientOrNo = false;

function RemoveZapicById(elem) {
    var schedule_id = $(elem).data("id");
    $("#remove-modal-comments").text("Данные удаляются без возможности восстановления");
    modalRemoveConfirm(function (confirm) {
        if (confirm) {
            removePatientOrNo = true;
        } else {
            removePatientOrNo = false;
        }
        if (removePatientOrNo) {
            var xhttp = new XMLHttpRequest();
            xhttp.open("POST", "/operator", true);
            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    window.location.reload();
                    //alert(this.responseText);
                }
            };
            xhttp.send("removeScheduleById=true&schedule_id=" + encodeURIComponent(schedule_id));
            confirm = false;
        }
    });
}


/*!*************************** 				Редактирование записи 		******************************************************/
/*!
 * Метод для открытия модального окна редактирование записи
 */
var scheduleIDForUpdate = "";
var patientForUpdateRecordID;

function UpdateRecordedPatient(elem) {
    $("#updaterecordPacientModalTitle").text('Редактирование записи');
    $("#updaterecordPacientAppointmentModalBox").modal('show');
    var patientID = $(elem).data("patient_id");
    patientForUpdateRecordID = patientID;
    var doctorID = $(elem).data("doctor_id");
    scheduleIDForUpdate = $(elem).data("id_schedule");
    console.log("patientID->" + patientID + "\ndoctorID->" + doctorID + "\nscheduleID->" + scheduleIDForUpdate);
    GetUserDatasById(patientID, "updatefullnamePatient"); /*! Получение ФИО пациента */
    GetScheduleByIdAndPast(scheduleIDForUpdate, doctorID); /*! Выбор данных о выбранном записи */
}

/*!
 * Событие перед редактирование записи
 */
$("#updaterecordPatientForm").submit(function (e) {
    var flag = false;
    var flag2 = false;
    var selectedOption = $("#updatenachaloPriema option:selected").text();
    var specialID = $("#specialities").val();
    var tex = "Не выбрано";
    var result = selectedOption.localeCompare(tex);
    var date = $("#updatedatetimepickerZapicDataPriema").val();
    var time = $("#updatenachaloPriema").val();
    var doctorID = $("#doctors").val();
    var patientID = patientForUpdateRecordID;
    if (result == 0) {
        OpenWarningModal("Ошибка", "Не указано начало приема");
        flag = false;
        return false;
    } else {
        if (CheckDateBeforeRecordAndSubmit("#updatedatetimepickerZapicDataPriema") != true) {
            e.preventDefault();
        } else {


            var isDoctorFree = CheckIsDoctorFreeBeforeUpdateRecordedPatient(date, time, doctorID, patientID);
            if (isDoctorFree > 0) {
                OpenWarningModal("Ошибка", "Доктор уже занят в указанное время");
                FillSelectionOptiontWithDoctorBySpeciality(specialID, "");
                return false;
            } else {
                if (isDoctorFree == 'recoded') {
                    OpenWarningModal("Ошибка", "Пациент уже записан в указанное время и дата");
                    FillSelectionOptiontWithDoctorBySpeciality(specialID, "");
                    return false;
                } else {
                    var articul = CreateUniqueIndex(date, time, doctorID, patientID);
                    $("#update-articul").val(articul);
                    $("#update-doctorID").val(doctorID);
                    $("#scheduleID").val(scheduleIDForUpdate);
                    // alert(articul);
                }
            }
        }
    }
    // e.preventDefault();
});

var CheckIsDoctorFreeBeforeUpdateRecordedPatient = function (date, time, idDoctor, idPatient) {
    var rowCount = null;
    $.ajax({
        'async': false,
        type: "POST",
        url: "operator/register-journal-record-update",
        dataType: 'html',
        //data: {'b': val }, // Можно вот так указать, только внутри фигурных скобках!!!
        // Можно еще вот так, без фигурных скобок
        data: 'checkisfreedoctorupdate=1&date=' + date + '&time=' + time + '&iddoctor=' + idDoctor + '&idpatient=' + idPatient,
        success: function (result) {
            rowCount = result;
        }
    });
    return rowCount;




    /*var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "/operator/patients", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function () {
    	if (this.readyState == 4 && this.status == 200) {
    		callback(this.responseText);
    	}
    };
    var textSend = 'checkisfreedoctorupdate=1&date=' + encodeURIComponent(date) + '&time=' + encodeURIComponent(time) + '&iddoctor=' + encodeURIComponent(idDoctor) + '&idpatient=' + encodeURIComponent(idPatient);
    xhttp.send(textSend));*/
};

/*!
 * Проверка указанной даты, не равняется ли дата меньше, чем сегодня
 */
function CheckDateBeforeRecordAndSubmit(inputID) {
    var flag = false;
    var currentDateOfInput = new Date($(inputID).val());
    var cur = new Date(currentDateOfInput.getFullYear(), currentDateOfInput.getMonth(), currentDateOfInput.getDate());
    var curAsNum = cur.getTime();
    var now = new Date();
    var today = new Date(now.getFullYear(), now.getMonth(), now.getDate());
    var todayAsNum = today.getTime();
    var weekend = cur.getDay();
    if (curAsNum < todayAsNum) {
        OpenWarningModal("Ошибка", "Дата приема недействительна");
        return flag = false;
    } else {
        if (weekend == 0) {
            OpenWarningModal("Ошибка", "На выходные дни прием не ведется");
            return flag = false;
        } else {
            return flag = true;
        }
    }
}

function CheckDateIsTrue(inputField) {
    var flag = false;

    var currentDateOfInput = new Date(ConvertToYYMMDDDateFormat($(inputField).val()));
    var cur = new Date(currentDateOfInput.getFullYear(), currentDateOfInput.getMonth(), currentDateOfInput.getDate());
    var curAsNum = cur.getTime();
    var now = new Date();
    var today = new Date(now.getFullYear(), now.getMonth(), now.getDate());
    var todayAsNum = today.getTime();
    var weekend = cur.getDay();
    if (curAsNum < todayAsNum) {
        OpenWarningModal("Ошибка", "Дата приема недействительна");
        return flag = false;
    } else {
        if (weekend == 0) {
            OpenWarningModal("Ошибка", "На выходные дни прием не ведется");
            return flag = false;
        } else {
            return flag = true;
        }
    }
}

/*!
 * Событие при изменение выбранного эклемента выпадающего списка 
 */
function SpecialityChangeFun(elem) {
    $("#doctors").val("");
    $("#updatenachaloPriema").val("");
    specialID = $(elem).val();
    if (specialID != "") { //Если выбранный элемент не равняется пустым
        FillSelectionOptiontWithDoctorBySpeciality(specialID, "");
    }
}

function DoctorChangeFun(elem) {
    $("#updatenachaloPriema").val("");
    var date = $("#updatedatetimepickerZapicDataPriema").val();
    doctorID = $(elem).val();
    if (doctorID != "") { //Если выбранный элемент не равняется пустым
        FillSelectOptionsWithDoctorTimeWorkWithouotAttrSelect(doctorID, date);
    }
}

function FillSelectOptions(sendVal, selectID, selectedOptionVal) {
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "/operator/patients", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var options = this.responseText;
            $(select).append(options);
        }
    };
    xhttp.send(sendVal + "=true");
}

/*!
 * Метод для выборки ФИО пациента с помощью ID
 * Вставляет данные записи в нужное метсто
 */
function GetUserDatasById(patientID, idfioInput) {
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "/operator/patients", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var myObj = JSON.parse(this.responseText);
            var fio = myObj.surname + " " + myObj.name + " " + myObj.patronymic;
            $("#" + idfioInput).val(fio);
            $("#" + idfioInput).data("id", myObj.id_pacient);
        }
    };
    xhttp.send("id=" + encodeURIComponent(patientID));
}


var oldDateOfPriema = "";
/*!
 * Метод для выборки ФИО пациента с помощью ID
 * Вставляет данные записи в нужное метсто
 */
function GetScheduleByIdAndPast(id_shedule, doctorID) {
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "/operator/register-journal-record-update", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //var myObj = this.responseText;
            //alert(myObj);
            var myObj = JSON.parse(this.responseText);
            console.log(myObj);
            $("#updatedatetimepickerZapicDataPriema").val(myObj.date_priema);
            oldDateOfPriema = new Date(myObj.date_priema);
            $("#specialities").val(myObj.id_special);
            FillSelectionOptiontWithDoctorBySpeciality(myObj.id_special, myObj.id_doctor);
            //$("#doctors").val(myObj.id_doctor);
            $("#updatenachaloPriema").val(myObj.time_priema);
            $("#uslugi").val(myObj.id_uslugi);
            $("#updatecost").val(myObj.cost);
            $("#update-notes").val(myObj.notes);
            var date = $("#updatedatetimepickerZapicDataPriema").val();
            SetOwnDate(date, 'updatedatetimepickerZapicDataPriema');
            FillSelectOptionsWithDoctorTimeWork(doctorID, date, myObj.time_priema);
        }
    };
    xhttp.send("getScheduleById=1&scheduleID=" + encodeURIComponent(id_shedule));
}

/*!
 * Метод заполнения выпадающего списка докторов
 */
function FillSelectionOptiontWithDoctorBySpeciality(speciality_id, selectedOption) {
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "/operator/register-journal-record-update", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            $("#doctors option").remove();
            var myObj = this.responseText;
            $("#doctors").append(myObj);
            $("#doctors").val(selectedOption);
        }
    };
    xhttp.send("fillDoctorBySpeciality=1&speciality_id=" + encodeURIComponent(speciality_id));
}

/*!
 * Метод заполнения выпадающего списка временами(начало приема)
 */
function FillSelectOptionsWithDoctorTimeWork(id_doctor, date, timePriemaOld) {

    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "/operator/register-journal-record-update", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            $("#updatenachaloPriema option").remove();
            $("#updatenachaloPriema").append($("<option></option>")
                .attr("selected", "selected")
                .text(timePriemaOld));

            var myObj = this.responseText;
            $("#updatenachaloPriema").append(myObj);
            SortSelectOptionsByText("updatenachaloPriema");
            $('#updatenachaloPriema option[value=""]').insertBefore('#updatenachaloPriema option:first');
            $('#updatenachaloPriema').val(timePriemaOld);
        }
    };
    xhttp.send("filldoctorwithtimes=1&date=" + encodeURIComponent(date) + "&id_doctor=" + encodeURIComponent(id_doctor));

}

function FillSelectOptionsWithDoctorTimeWorkWithouotAttrSelect(id_doctor, date) {
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "/operator/register-journal-record-update", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            $("#updatenachaloPriema option").remove();
            var myObj = this.responseText;
            if (myObj == '0') {
                OpenWarningModal("Ошибка", "Доктор не работает в указанный день");
                $("#updatenachaloPriema option").remove();
                $("#updatenachaloPriema").append("<option value selected>Не выбрано</option>");
            } else {
                $("#updatenachaloPriema").append(myObj);
                SortSelectOptionsByText("updatenachaloPriema");
                $('#updatenachaloPriema').val("");
            }
        }
    };
    xhttp.send("filldoctorwithtimes=1&date=" + encodeURIComponent(date) + "&id_doctor=" + encodeURIComponent(id_doctor));
}


/*!
 *  Метод сортировки выпадающего списка по альвафиту, либо по возрастанию
 */
function SortSelectOptionsByText(selectID) {
    var options = $('#' + selectID + ' option');
    var arr = options.map(function (_, o) {
        return {
            t: $(o).text(),
            v: o.value
        };
    }).get();
    arr.sort(function (o1, o2) {
        return o1.t > o2.t ? 1 : o1.t < o2.t ? -1 : 0;
    });
    options.each(function (i, o) {
        o.value = arr[i].v;
        $(o).text(arr[i].t);
    });
}

/*!
 * Метод для установки времени по умолчанию, то есть для вставки собственной даты
 **/
function SetOwnDate(date, idDatetime_picker) {
    $('#' + idDatetime_picker).datetimepicker({
        locale: 'ru',
        stepping: 10,
        useCurrent: true,
        format: 'YYYY-MM-DD',
        date: new Date(date),
    });
}

/*!
 * Вывод какой либо информации ALERT()
 */
function BeautyAlert(title, text) {
    $(".alert").removeClass("in").show();
    $(".alert").delay(800).addClass("in").fadeOut(500);
    $("#text-alert").text(text);
    $("#title-alert").text(title);
}

//[A-Z]+[a-z]+[0-9]+/
//'/^[A-Za-z0-9]+$/
/*!
 * Просмотр данные и график работы определенного доктора
 */
function ViewСertainDoctorSchedule(elem) {
    var doctorID = $(elem).data("id");
    for (i = 0; i < 6; i++) {
        $("#days" + i).empty();
    }
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "/operator/doctorView", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //$("#doctorScheduleModalBoxTitle").text(this.responseText);
            var myObj = JSON.parse(this.responseText);
            var title = myObj.title + ": " + myObj.fio;
            var cabinet = "Кабинет: " + myObj.cabinet;
            $("#doctorScheduleModalBoxTitle").text(title);
            $("#cabinetViewDoctorShedule").text(cabinet);
            var schedule = myObj.schedule;
            var days = schedule.split(",");
            for (i = 0; i < 6; i++) {
                if (days[i] == 'no') {
                    days[i] = '';
                }
            }
            $("#days0").text(days[0]);
            $("#days1").text(days[1]);
            $("#days2").text(days[2]);
            $("#days3").text(days[3]);
            $("#days4").text(days[4]);
            $("#days5").text(days[5]);
        }
    };
    xhttp.send("doctorView=true&id=" + encodeURIComponent(doctorID));
    // $(".loading").css("display", "block");
    LoadSpinner(function () {
        $("#doctorScheduleModalBox").modal('show');
    }, 200);
}

function AlertDoctorIsNotWork() {
    if (e.target !== this)
        return;
    OpenWarningModal("Ошибка", "Доктор не работает в указанный день");
}

/* if(time() - $_SESSION['timestamp'] > 900) { //subtract new timestamp from the old one
    echo"<script>alert('15 Minutes over!');</script>";
    unset($_SESSION['username'], $_SESSION['password'], $_SESSION['timestamp']);
    $_SESSION['logged_in'] = false;
    header("Location: " . index.php); //redirect to index.php
    exit;
} else {
    $_SESSION['timestamp'] = time(); //set new timestamp
}*/
function LoadSpinner(callback, seconds) {
    $(".loading").css("display", "block");
    setTimeout(function () {
        $(".loading").css("display", "none");
        callback();
    }, seconds);
}
