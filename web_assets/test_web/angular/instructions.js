
var running_language = {};
var test_info = {};
var sections = {};
var global_lang = 1;
var i_lang = {
    error_codes: {
        100: "Course is not available.",
        101: "Course is upcoming.",
        102: "Course is expired. renew it.",
        103: "Course is not purchased.",
        104: "This test is not available for this course.",
        105: "Test series request is invalid.",
        106: "Test is available only for ERP logged in students.",
        107: "Test is available only for ERP logged in students.",
        108: "Invalid user.",
        109: "Exact number of questions is not found.",
        110: "Sections Not Found",
        111: "Test is Upcoming"
    },
    server_response: "Invalid server response",
    total_questions_legend: "Total Questions",
    total_time_legend: "Total Time (Minutes)",
    maximum_marks_legend: "Total Marks",
    number_of_sections_legend: "Total Number Of Sections",
    instruction_text: " I have read, understood and agreed the instructions and disqualification rules of the exam.",
    start_test: "Start Test",
    select_language: "Select Language",
    section_name: "Section Name",
    mark_per_question: "Marks per question",
    negative_mark_per_question: "Negative marks per question",
    alert_condition: "Please accept the terms and conditions to continue!!"
}
var i_lang_hindi = {
    error_codes: {
        100: "पाठयकरम उपलबध नहीं है।",
        101: "पाठयकरम आगामी है।",
        102: "पाठयकरम की समय सीमा समापत हो गई है। इसे नवीनीकृत करें।",
        103: "पाठयकरम खरीदा नहीं है।",
        104: "इस कोरस के लि यह परीकषा उपलबध नहीं है।",
        105: "परीकषण शरृंखला अनरोध अमानय है।",
        106: "परीकषण केवल ईआरपी लॉग इन छातरों के लि उपलबध है।",
        107: "परीकषण केवल ईआरपी लॉग इन छातरों के लि उपलबध है।",
        108: "अमानय उपयोगकरता।",
        109: "सटीक परशन नहीं मिले।",
        110: "अनभाग नहीं मिले"
    },
    total_questions_legend: "कल सवाल",
    total_time_legend: "कल समय (मिनट)",
    maximum_marks_legend: "कल अंक",
    number_of_sections_legend: "अनभागों की कल संखया",
    instruction_text: "मैंने परीक्षा के निर्देशों और अयोग्यता नियमों को पढ़, समझ लिया है और उनसे सहमत हूं।",
    select_language: "भाषा का चयन करें",
    start_test : "टेस्ट शुरू करें",
    section_name: "अनभाग का नाम",
    mark_per_question: "परति परशन अंक",
    negative_mark_per_question: "परति परशन नकारातमक अंक",
    alert_condition: "जारी रखने के लि कृपया नियम और शरतें सवीकार करें !!"
}

var i_lang_hindi = {
    error_codes: {
        100: "Course is not available.",
        101: "Course is upcoming.",
        102: "Course is expired. renew it.",
        103: "Course is not purchased.",
        104: "This test is not available for this course.",
        105: "Test series request is invalid.",
        106: "Test is available only for ERP logged in students.",
        107: "Test is available only for ERP logged in students.",
        108: "Invalid user.",
        109: "Exact number of questions is not found.",
        110: "Sections Not Found",
        111: "Test is Upcoming"
    },
    server_response: "Invalid server response",
    total_questions_legend: "Total Questions",
    total_time_legend: "Total Time (Minutes)",
    maximum_marks_legend: "Total Marks",
    number_of_sections_legend: "Total Number Of Sections",
    instruction_text: " I have read, understood and agreed the instructions and disqualification rules of the exam.",
    start_test: "Start Test",
    select_language: "Select Language",
    section_name: "Section Name",
    mark_per_question: "Marks per question",
    negative_mark_per_question: "Negative marks per question",
    alert_condition: "Please accept the terms and conditions to continue!!"
}

// function loader(object) {
//     swal(object.message);
// }

function loader(config) {
    if (!$(".close_screen").is(":visible")) {
        if (config.message != undefined)
            $(".loader p").text(config.message);
        (config.state == true) ? $(".loader").show() : $(".loader").hide();
        (config.full_screen != undefined && config.full_screen == true) ? $(".toggleFullScreen").show() : $(".toggleFullScreen").hide();
        (config.close_screen != undefined && config.close_screen == true) ? $(".close_screen").show() : $(".close_screen").hide();
        (config.continue_test != undefined && config.continue_test == true) ? $(".continue_test").show() : $(".continue_test").hide();
    }
}

var app = angular.module('myApp', ['ngSanitize']);
app.controller('body_controller', function ($scope, $http, $timeout) {
    var change_lang = function (lang) {
        global_lang = lang;
        if (lang == 1)
            running_language = i_lang;
        else
            running_language = i_lang_hindi;
    };
    change_lang(lang);
    var init_data = function () {
        $scope.test_name = test_info.test_series_name;

        $scope.total_questions_legend = running_language.total_questions_legend;
        $scope.total_time_legend = running_language.total_time_legend;
        $scope.maximum_marks_legend = running_language.maximum_marks_legend;
        $scope.number_of_sections_legend = running_language.number_of_sections_legend;

        $scope.total_questions_count = test_info.total_questions;
        $scope.total_time_count = test_info.time_in_mins;
        $scope.maximum_marks_count = test_info.total_marks;
        $scope.number_of_sections_count = sections.length;
        $scope.section_name = running_language.section_name;

        $scope.mark_per_question = running_language.mark_per_question;
        $scope.negative_mark_per_question = running_language.negative_mark_per_question;

        if (sections.length > 0) {
            $(".section_detail").show();
            let my_sections = [];
            $.each(sections, function (index, value) {
                let inner = {
                    // name: ((lang == 1) ? value.name : value.name_2) + " (" + value.section_part + ")",
                    name: ((lang == 1) ? value.name : value.name),
                    total_questions: value.total_questions,
                    total_time: value.section_timing,
                    max_marks: (parseFloat(value.total_questions) * parseFloat(value.marks_per_question)),
                    marks_per_que: value.marks_per_question,
                    // negative_marks_per_que: parseFloat(value.negative_marks) * parseInt(value.marks_per_question)
                    negative_marks_per_que: parseFloat(value.negative_marks),

                };
                my_sections.push(inner);
            });
            $scope.sections = my_sections;
            $scope.instruction_text = running_language.instruction_text;
            $scope.start_test = running_language.start_test;
            $scope.general_info = test_info.description;

            loader({message: "", state: false});

            if(test_info.test_assets && test_info.test_assets.hide_inst_time == 0) {
                $scope.time_show_hide = "";
            } else {
                $scope.time_show_hide = "d-none";
            }

            if(test_info.test_assets && test_info.test_assets.disable_sec_click == 1) {
                localStorage.setItem('disable_sec_click', 1);
            } else {
                localStorage.removeItem('disable_sec_click');
            }
        }
    }
    
    /*Language Setting*/
    $scope.lang_code = [
        {name: 'English', value: '1'},
        {name: 'Hindi', value: '2'},
    ];
    $scope.Lang = $scope.lang_code[lang - 1] ? $scope.lang_code[lang - 1] : $scope.lang_code[0]; // red
    
    $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded; charset=UTF-8;";
    var url = base_url + "web/LiveTest/instruction_test";
    var FormData = {
        user_id: user_id,
        test_id: test_id,
        course_id: course_id,
        csrf_name : $("input[name = 'csrf_name']").val(),
    };
    $http({
        url: url,
        method: "Post",
        data: $.param(FormData),
        dataType: 'json',
        headers: {
            'Jwt': jwt,
            'Device_Type':0,
            'Userid':user_id
        }
    }).then(function successCallback(response) {
        try {
            var data = response.data;
            $("input[name = 'csrf_name']").val(response.data.token);
            
            if (data.auth_code == "100100") {
                loader({message: "Session Expired", state: true});
                window.location.hash = 'back_true';
            } else {
                /*
                 * preparing global lang array
                 */
                if (data.test_basic === null || data.test_sections === null) {
                    var error_code = data.error.error_code;
                    loader({message: running_language.error_codes['105']});
                    return false;
                }
                data = data.data;
                test_info = data.test_basic;
                sections = data.test_sections;

                // let lang_available = (test_info.lang_id).split(",");
                // if(lang_available.length==1){
                //     lang = lang_available[0];
                //     $(".displang").hide();
                //     change_lang(lang);
                // }

                if((test_info) && test_info.lang_id) {
                    let lang_available = (test_info.lang_id).split(",");
                    if(lang_available.length==1){
                        lang = lang_available[0];
                        $(".displang").hide();
                        change_lang(lang);
                    }
                }
                init_data();
            }
        } catch (exception) {
            $("input[name = 'csrf_name']").val(response.data.token);
            if (navigator.onLine) {
                loader({message: running_language.server_response, state: true});
            } else {
                loader({message: running_language.internet, state: true});
            }
        }
    }, function errorCallback(response) {
        if (response.data == null || !navigator.onLine) {
            loader({message: running_language.internet, state: true});
        } else {
            loader({message: running_language.server_response, state: true});
        }
    });

    $scope.language_change_detected = function (lang_code) {
        if (lang_code == 1)
            lang = 2;
        else
            lang = 1;
        change_lang(lang);
        init_data();
    };


});


$(document).on('click', '#start_test', (function (e) {
    var disclaimer = $('#disclaimer:checked');
    if (disclaimer.length == 0) {
        if (global_lang == 1) {
            sweet_alert(i_lang.alert_condition,"warning");
            // swal({
            //     icon: base_url + "assets/website_assets/img/ME_PRIME.png",
            //     title: i_lang.alert_condition
            // });
        } else {
            sweet_alert(i_lang_hindi.alert_condition,"warning");

            // swal({
            //     icon: base_url + "assets/website_assets/img/ME_PRIME.png",
            //     title: i_lang_hindi.alert_condition
            // });
        }
    } else {
        e.stopImmediatePropagation();
        $(this).closest('form').submit();
    }
})
);


function sweet_alert(message, status, action = 1){
    
    if(action == 0){
        Swal.fire({
        title: 'Are you sure?',
        text: `${message}`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                return true;
            } else {
                return false;
            }
        })
    } else {
        Swal.fire({
            icon:  `${status}`,
            title: '',
            text: `${message}`,
        });
    }
    
}