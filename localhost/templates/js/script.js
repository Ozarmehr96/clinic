$(document).ready(function () {
	//функция начало календаря
	$(function () {
		$('#datetimepicker1').datetimepicker({
			locale: 'ru',
			stepping: 10,
			format: 'DD-MM-YYYY',
			//defaultDate: moment().toDate(),
			//daysOfWeekDisabled: [0]
		});
	});

	$("[data-toggle=tooltip]").tooltip();
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
				$('#date_born_record_pacient').datetimepicker({
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
			//minDate: moment().toDate(),
			daysOfWeekDisabled: [6, 0]
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
	});




	/**
	 * Метод для установки времени по умолчанию, то есть для вставки собственной даты
	 **/
	/*function SetOwnDate(date, idDatetime_picker) {
		if (date != null) {
			var dateParts = date.split("-");
			ownDate = "'" + dateParts[2] + ", " + dateParts[1] + "," + dateParts[0] + "'";
			$(idDatetime_picker).datetimepicker({
				locale: 'ru',
				stepping: 10,
				format: 'DD-MM-YYYY',
				defaultDate: new Date(ownDate),
				useCurrent: false,
			});
		}
	}*/


	/**
	 * Очистка полей формы
	 **/
	function ClearModalFormInputs(formID) {
		$("#" + formID)[0].reset();
	}

	/**
	 * Событие при открытие модального окна 
	 **/
	$("#selectedPacientModalBox").on('show.bs.modal', function () {
		ClearModalFormInputs("operator_add_patient");
	});

	$("#selectedPacientModalBox").on('hide.bs.modal', function () {});



	// для сохранение id нажатого пациента
	/*$('body').on('click', '.open-modal-pacient-data', function () {
		alert($(this).data("id"));
		ShowUserDatasOnModal(".open-modal-pacient-data");
	});
	$('body').on('click', '#searchRows', function () {
		ShowUserDatasOnModal(".pacientSearchTable");
	});*/
	// Выбор id пользователья из строки при нажатии и показ модального окна для отображения данных пациента
	//
	//тутттттттттттттттт






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


	/*Disable_user_inputs1();
	$.fn.Disable_user_inputs = function () { //Сделать НЕдоступным поля ввода выбранного пользователя
		$(".addPlaceholder").each(function () {
			$(this).find("input").prop("disabled", false);
			$(this).find("select").prop("disabled", false);
		});
		isEnableUserInputs = false;
	};
	$.fn.Enable_user_inputs = function () { // Сделать доступным поля ввода выбранного пользователя
		$(".addPlaceholder").each(function () {
			$(this).find("input").prop("disabled", true);
			$(this).find("select").prop("disabled", true);
		});
		isEnableUserInputs = true;
	};*/

	//КНОКА СОХРАНИТЬ ИЗМЕНЕНИЯ


	//	*********** Вкладка журнал регистрации ***********************************

	// Функция добавления класс актив для выбранного врача
	$(".doctor-pills-name").click(function () {
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

/*function timeNow(i) {
	var d = new Date(),
		h = (d.getHours() < 10 ? '0' : '') + d.getHours(),
		m = (d.getMinutes() < 10 ? '0' : '') + d.getMinutes();
	i.value = h + ':' + m;
}*/
var current = 'schedule';



var current_tab = 'basic-information';

/*
 * Метод для открытии соответсвующее окно для выбранной вкладки модально окна пациента
 */
function ShowUser_Data(id) {
	document.getElementById(current_tab).style.display = 'none';
	document.getElementById(id).style.display = 'block';
	current_tab = id;
}

/**
 * Метод для активации вкладки Основное, чтоб после закрытии не осталась предыдущая вкладка активной 
 */
function ActivateFirstLiOfPatientModal() {
	ShowUser_Data('basic-information'); // Активируем
	$(".user_tabs>li").each(function () {
		$(this).removeClass('active');
	});
	$(".user_tabs>li:first").addClass('active');
}

//alert("result");
/*$.ajax({
	type: "POST",
	url: "/operator/get/pacietn/by/id/" + get_pacient_data_id_from_table,
	success: function (result) {
		alert(result);
	},
	error: function (xhr, ajaxOptions, thrownError) {}
});*/



/**
 * Метод изменение название action, где formClassName-название класса формы
 * action = путь
 */
function ChangeFormActionByClassName(formClassName, action) {
	$(formClassName).prop("action", action);
}

/**
 * Поиск пациентов
 **/
function SearchPatients() {
	$("#search_table_body").empty();

	var name = $("#name").val() || 'undefined';
	var surname = $("#surname").val() || 'undefined';
	var patronymic = $("#fullname").val() || 'undefined';
	var date_of_birth = $("#datetimepicker1").val() || '1996-09-09';
	var date1 = date_of_birth.split("-");
	var date = date1[2] + "-" + date1[1] + "-" + date1[0] || '1996-09-09';
	var inn = $("#inn").val() || '0101';
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
				alert("По Вашему запросу ничего не найдено!");
			}
			$("#search_table_body").append(receivedArr);
			console.log(receivedArr);
		}
	};
	console.log(date);
	var sendValues = "name=" + encodeURIComponent(name) + "&surname=" + encodeURIComponent(surname) + "&patronymic=" + encodeURIComponent(patronymic) + "&date_of_birth=" + encodeURIComponent(date) + "&inn=" + encodeURIComponent(inn) + "&passport_num=" + encodeURIComponent(passport_num) + "&patient_card_num=" + encodeURIComponent(patient_card_num);
	console.log(sendValues);
	xhttp.send("search=a&" + sendValues);
}

/**
 * Метод форматирование даты 
 * Текущий формат (год, месяц,день)
 * Вернет в формате день, месяц год
 **/
function toDateFormat(date) {
	var dateParts = date.split("-"); // разбив на - сохраним в массив
	dateIs = dateParts[2] + "-" + dateParts[1] + "-" + dateParts[0];
	return dateIs;
}

/*$(".open-modal-pacient-data").click(function () {
		$(".add-new-pacient").css("display", "none"); // блокируем кнопку добавить
		$("#save-user-selected-info").css("display", "inline-block"); // показываем кнопки сохранить и изменить
		$("#selectedPacientModalBox").modal('show');
		get_pacient_data_id_from_table = $(this).data("id");
		alert(get_pacient_data_id_from_table);
		$(".selected_PacientModalBoxTitle").text("Карточка пациента: " + $(this).text());
		if ($(this).hasClass('pacientSearchTable')) {
			var title = $(this).find("td.pacientFIO").text();
			$(".selected_PacientModalBoxTitle").text("Карточка пациента: " + title);
		} else $(".selected_PacientModalBoxTitle").text("Карточка пациента: " + $(this).text());

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
	});*/

/*
 * Открытие модального окна для просмотра данные выбранного пациента
 */
var patient_id_from_search = "";

function ShowUserDatasOnModal(elem) {
	ActivateFirstLiOfPatientModal();
	var get_pacient_data_id_from_table = "";
	var visibleZapisatButton = "";
	get_pacient_data_id_from_table = $(elem).data("id");
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
	get_pacient_data_id_from_table = 0;
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
/**
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
	$("#datetimepickerZapicDataPriema").val(dayOfPriem.toString());
	$(nachaloPriema).val(timeOfPriem);


	$("#pacientpassportnumber").change(function () {
		passportNum = $(this).val();
	});
	$("#medicine-cart-number").change(function () {
		medicineCartNum = $(this).val();
	});

	if (idOfSelectedPatientFromSearch == "") { // если пациаент не выбран с другой страницы
		$("#medicine-cart-number,#pacientpassportnumber").blur(function () {
			if (passportNum != "" && medicineCartNum != "") {
				var xhttp = new XMLHttpRequest();
				xhttp.open("POST", "/operator/register-journal-record", true);
				xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				xhttp.onreadystatechange = function () {
					if (this.readyState == 4 && this.status == 200) {
						var myObj = JSON.parse(this.responseText);
						if (myObj == "") {
							$("#patient-fio-label").css("color", "red");
							$("#patient-fio-label").text("Пациент не найден! Проверьте введенные данные!");
							$("#patient-fio").val("ФИО пациента");
						} else {
							$("#patient-fio-label").css("color", "black");
							$("#patient-fio-label").text("ФИО пациента");
							var fullname = myObj.surname + " " + myObj.name + " " + myObj.patronymic; //Основные сведения
							$("#patient-fio").val(fullname);
							console.log(myObj.id_pacient);
							patientIDEnd = myObj.id_pacient;
							$("#patientID").val(patientIDEnd);

						}
					}
				};
				xhttp.send("getUserByPassportAndMedCart=1&" + "medicineCartNum=" + encodeURIComponent(medicineCartNum) + "&passportNum=" + encodeURIComponent(passportNum));
				//xhttp.send("getUserByPassportAndMedCart=1&" + "medicineCartNum=456456&passportNum=400340250");

			}
		});
	} else {
		var xhttp = new XMLHttpRequest();
		xhttp.open("POST", "/operator/patients", true);
		xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				var myObj = JSON.parse(this.responseText);
				$("#pacientpassportnumber").val(myObj.passport_num);
				$("#medicine-cart-number").val(myObj.patient_card_num);
				fio = myObj.surname + " " + myObj.name + " " + myObj.patronymic;
				$("#patient-fio").val(fio);
				patientIDEnd = myObj.id_pacient;
				$("#patientID").val(patientIDEnd);
			}
		};
		xhttp.send("id=" + encodeURIComponent(idOfSelectedPatientFromSearch));
	}

}
$("#recordPatientForm").submit(function () {
	dayOfPriem = toDateFormat(dayOfPriem);
	$("#datetimepickerZapicDataPriema").val(dayOfPriem);
});

/**
 * Удаление ФИО пациента из меню
 */
function RemoveIdPatientFromUlLi() {
	$("#idSelectedPatientFromSearchUl").remove();
	window.location.href = '/operator/register-journal';
}

/**
 * Отпрака ID пациента на страницу записи пациента
 */
function RedirectForRecord() {

	$(".forAddingNewform").append('<input type="hidden" name="patient_id" value="' + patient_id_from_search + '">');
	//alert(patient_id_from_search);
	$(".forAddingNewform").submit();
}

/**
 * Метод для показа расписание работы выбранного доктора
 **/
function ShowDoctorSchedule(elem) {
	var datePri = $(".data-priema").val();
	var date = toDateFormat(datePri);
	console.log(date);
	$('#doctor-schedule-table tbody tr').html('');
	var doctorID = $(elem).data("id");

	xhttp = new XMLHttpRequest();
	xhttp.open("POST", "/operator/register-journal", true);
	xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var receivedArr = this.responseText;
			/*if (receivedArr == false) {
				alert("По Вашему запросу ничего не найдено!");
			} else {
				$('#doctor-schedule-table tr:last').after(receivedArr);
			}*/
			$('#doctor-schedule-table tr:last').after(receivedArr);
		}
	};
	xhttp.send("scheduleSubmit=1&date=" + encodeURIComponent(date) + "&id_doctor=" + encodeURIComponent(doctorID));

}
