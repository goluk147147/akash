/*
 TRUNCATE TABLE course_test_series_report;
 TRUNCATE TABLE course_test_series_report_question_dump;
 */


/*
 * Some validations running on model
 * 100-course is not available
 * 101-course is upcoming
 * 102-course is expired
 * 103-course is not purchased
 * 104-test series is not available for this course
 * 105-test series request is invalid
 * 106-test is available only for ERP logged in students
 * 107-test is available only for ERP logged in students
 * 108-invalid user
 */
var running_language = {};
var test_lang = {
    question_loading: "Questions are downloading.",
    error_codes: {
        100: "course is not available.",
        101: "course is upcoming.",
        102: "course is expired. renew it.",
        103: "course is not purchased.",
        104: "this test is not available for this course.",
        105: "test series request is invalid.",
        106: "test is available only for ERP logged in students.",
        107: "test is available only for ERP logged in students.",
        108: "invalid user.",
        109: "Exact number of questions is not found.",
        110: "Sections Not Found",
        111: "Test is upcoming. Please wait for time."
    },
    server_response: "Invalid server response",
    test_state: "Test preparation started.",
    internet: "Please check your internet connection or try again later.",
    candidate_name: "Candidate name",
    remaining_time: "Remaining Time",
    question_index_text: "Question No",
    question_index_type: "Question Type",
    answered: "Answered",
    unanswered: "Unanswered",
    not_visited: "Not visited",
    marked_for_review: "Marked for review",
    answered_marked_for_review: "Answered and mark for review (will be considered for evaluation)",
    explanation: "View Solution",
    correct: "Correct",
    incorrect: "Incorrect",
    coins: "Coins",
    window_warning: "Your current progress will not be saved.",
    quiz_back_message: "Are you sure you want to pause the quiz ? Don't worry your progress will be saved. You can resume it later.",
    test_back_message: "Are you sure you want to pause the test ? Don't worry your progress will be saved. You can resume it later.",
    complete_message: "You have reached the last question. Do you want to submit?",
    confirm_proceed: "Do you want to submit the test ?",
    my_performance: "My Performance",
    cancel: "Cancel",
    section: "section",
    marking: "Marks",
    time_left: "Time Left",
    legends: "Legends",
    act_submit: "Submit",
    act_save_and_next: "Save & Next",
    act_clear_response: "Clear",
    act_save_mark_for_review: "Save & Mark For Review",
    test_preparation: "Test preparation completed successfully.",
    not_available: "Test Is not Available on this screen.",
    play_paused: "Test paused",
    finish_test: "Test time is over save test",
    section_time_exhaust: "Current section time is over. Please continue for next section.",
    submission_wait: "Please wait.. We are saving your progress.",

    continue_test: "Continue Test",
    yes: "Yes",
    no: "No",
};
// var test_lang_hindi = {
//     question_loading: "परशन डाउनलोड हो रहे हैं।",
//     error_codes: {
//         100: "पाठयकरम उपलबध नहीं है।",
//         101: "पाठयकरम आगामी है।",
//         102: "पाठयकरम की समय सीमा समापत हो गई है। इसे नवीनीकृत करें।",
//         103: "पाठयकरम खरीदा नहीं है।",
//         104: "इस कोरस के लि यह परीकषा उपलबध नहीं है।",
//         105: "परीकषण शरृंखला अनरोध अमानय है।",
//         106: "परीकषण केवल ईआरपी लॉग इन छातरों के लि उपलबध है।",
//         107: "परीकषण केवल ईआरपी लॉग इन छातरों के लि उपलबध है।",
//         108: "अमानय उपयोगकरता।",
//         109: "सटीक परशन नहीं मिले।",
//         110: "अनभाग नहीं मिले"
//     },
//     server_response: "अमानय सरवर परतिकरिया",
//     test_state: "टेसट तैयार हो रहा है ।",
//     internet: "कृपया अपना इंटरनेट कनेकशन जांचें या बाद में पनः परयास करें।",
//     candidate_name: "परतयाशी का नाम",
//     remaining_time: "बचा हआ समय",
//     question_index_text: "परशन सं",
//     question_index_type: "Question Type",
//     answered: "उततर दिया गया है",
//     unanswered: "बिना उततर",
//     not_visited: "नहीं देखा",
//     marked_for_review: "समीकषा के लि चिहनित करें",
//     answered_marked_for_review: "जवाब दिया और समीकषा के लि मारक (विकास के लि विचार किया जागा)",
//     explanation: "समाधान और सपसटीकरण",
//     correct: "सही",
//     incorrect: "ग़लत",
//     coins: "चिनहित",
//     window_warning: "आपकी वरतमान गतिविधि नहीं सहेजी जागी।",
//     quiz_back_message: "कया आप वाकई कविज़ को रोकना चाहते हैं? चिंता न करें कि आपकी परगति बच जागी। आप इसे बाद में फिर से शरू कर सकते हैं।",
//     test_back_message: "कया आप वाकई परीकषण को रोकना चाहते हैं? चिंता न करें कि आपकी परगति बच जागी। आप इसे बाद में फिर से शरू कर सकते हैं।",
//     complete_message: "आप अंतिम परशन पर पहच ग हैं। कया आप सबमिट करना चाहते हैं?",
//     confirm_proceed: "कया आप आगे बढ़ना चाहते हैं ?",
//     my_performance: "मेरा परिणाम",
//     cancel: "रदद करें",
//     section: "अनभाग",
//     marking: "अंक",
//     time_left: "शेष समय",
//     legends: "चिनह",
//     act_submit: "जमा करें",
//     act_save_and_next: "सहेजें और अगला",
//     act_clear_response: "स्पष्ट",
//     act_save_mark_for_review: "समीकषा के लि सहेजें और चिहनित करें",
//     test_preparation: "परीकषण की तैयारी सफलतापूरवक पूरी हई।",
//     not_available: "इस सकरीन पर टेसट उपलबध नहीं है।",
//     play_paused: "परीकषण रोक दिया गया",
//     finish_test: "टेसट का टाइम खतम हो चका है टेसट को सेव करें",
//     section_time_exhaust: "वरतमान अनभाग का समय समापत हो गया है। कृपया अगले भाग के लि जारी रखें।",
//     submission_wait: "कृपया परतीकषा करें .. हम आपकी परगति को सहेज रहे हैं।",
//     continue_test: "टेसट जारी रखें",
//     yes: "हा",
//     no: "नहीं"
// };

var test_lang_hindi = {
    question_loading: "Questions are downloading.",
    error_codes: {
        100: "course is not available.",
        101: "course is upcoming.",
        102: "course is expired. renew it.",
        103: "course is not purchased.",
        104: "this test is not available for this course.",
        105: "test series request is invalid.",
        106: "test is available only for ERP logged in students.",
        107: "test is available only for ERP logged in students.",
        108: "invalid user.",
        109: "Exact number of questions is not found.",
        110: "Sections Not Found",
        111: "Test is upcoming. Please wait for time."
    },
    server_response: "Invalid server response",
    test_state: "Test preparation started.",
    internet: "Please check your internet connection or try again later.",
    candidate_name: "Candidate name",
    remaining_time: "Remaining Time",
    question_index_text: "Question No",
    question_index_type: "Question Type",
    answered: "Answered",
    unanswered: "Unanswered",
    not_visited: "Not visited",
    marked_for_review: "Marked for review",
    answered_marked_for_review: "Answered and mark for review (will be considered for evaluation)",
    explanation: "View Solution",
    correct: "Correct",
    incorrect: "Incorrect",
    coins: "Coins",
    window_warning: "Your current progress will not be saved.",
    quiz_back_message: "Are you sure you want to pause the quiz ? Don't worry your progress will be saved. You can resume it later.",
    test_back_message: "Are you sure you want to pause the test ? Don't worry your progress will be saved. You can resume it later.",
    complete_message: "You have reached the last question. Do you want to submit?",
    confirm_proceed: "Do you want to submit the test ?",
    my_performance: "My Performance",
    cancel: "Cancel",
    section: "section",
    marking: "Marks",
    time_left: "Time Left",
    legends: "Legends",
    act_submit: "Submit",
    act_save_and_next: "Save & Next",
    act_clear_response: "Clear",
    act_save_mark_for_review: "Save & Mark For Review",
    test_preparation: "Test preparation completed successfully.",
    not_available: "Test Is not Available on this screen.",
    play_paused: "Test paused",
    finish_test: "Test time is over save test",
    section_time_exhaust: "Current section time is over. Please continue for next section.",
    submission_wait: "Please wait.. We are saving your progess.",

    continue_test: "Continue Test",
    yes: "Yes",
    no: "No",
};

var owl = $('#owl');
var countdown_control = false;
var warning_counter = 3;


//Global variables for use for test setting
var user_info = {};
var test_info = {};
var sections = {};
var question_eng = {};
var question_hindi = {};
var question_bank = {};
var temp =[];
var not_answered_count = 0,
        mark_for_review_count = 0,
        not_visited_count = 0,
        answered_count = 0,
        bookmarked_count = 0,
        booked_count = 0,
        practice_coins = 0,
        practice_correct = 0,
        practice_incorrect = 0,
        user_answers = [];
var total_spent_time_on_question = 0;
//Global variables for use for test setting
var current_section = 0;
var is_data_submitted = 0;
var mark_for_review = [];

function cl(p) {
    console.log(p);
}

function loader(config) {
   if(sections.length >1){
    $(".section_move").removeClass('hide');
   }else{
    $(".section_move").addClass('hide');    
   }
    if (!$(".close_screen").is(":visible")) {
        if (config.message != undefined)
            $(".loader p").text(config.message);
        (config.state == true) ? $(".loader").show() : $(".loader").hide();
        (config.full_screen != undefined && config.full_screen == true) ? $(".toggleFullScreen").show() : $(".toggleFullScreen").hide();
        (config.close_screen != undefined && config.close_screen == true) ? $(".close_screen").show() : $(".close_screen").hide();
        (config.test_modal != undefined && config.test_modal == true) ? $("#test-modal").modal('show') : $("#test-modal").modal('hide');
        (config.continue_test != undefined && config.continue_test == true) ? $(".continue_test").show() : $(".continue_test").hide();
    }
}

var app = angular.module('myApp', []);

app.directive('mathjax',function(){
    return {
        restrict: 'EA',
        link: function(scope, element, attrs) {
            scope.$watch(attrs.ngModel, function () {
                MathJax.Hub.Queue(['Typeset',MathJax.Hub,element.get(0)]);
            });
        }
    };
});

app.controller('body_controller', function ($scope, $http, $timeout) {
    //language changer of test series
    var change_lang = function (lang) {
        if (lang == 1) {
            running_language = test_lang;
            question_bank = question_eng;
        } else {
            running_language = test_lang_hindi;
            question_bank = question_hindi;
        }
    };
    change_lang(lang);

    var refresh_legend_counter = function () {
        $scope.not_answered_count = not_answered_count;
        $scope.mark_for_review_count = mark_for_review_count;
        $scope.not_visited_count = not_visited_count;
        $scope.answered_count = answered_count;
        $scope.bookmarked_count = bookmarked_count;
        $scope.booked_count = booked_count;
        $scope.practice_correct = practice_correct;
        $scope.practice_incorrect = practice_incorrect;
        $scope.practice_coins = practice_coins;

        //Setting question count section wise start
        let COUNTER_CONFIG = {
            not_visited: 0,
            mark_for_review: 0,
            not_answered: 0,
            answered: 0,
            bookmarked: 0
        };

        $.each(user_answers, function (index, value) {
            if (value.section_id == current_section) {
                switch (value.state) {
                    case "not_visited":
                        ++COUNTER_CONFIG.not_visited;
                        break;
                    case "mark_for_review":
                        ++COUNTER_CONFIG.mark_for_review;
                        break;
                    case "not_answered":
                        ++COUNTER_CONFIG.not_answered;
                        break;
                    case "answered":
                        ++COUNTER_CONFIG.answered;
                        break;
                    case "bookmarked":
                        ++COUNTER_CONFIG.bookmarked;
                        break;
                }
            }
        });
        let active_section = $(document).find("a[section_id=" + current_section + "]").siblings("ul");
        active_section.find("li:eq(0)").find("span").text(COUNTER_CONFIG.not_visited);
        active_section.find("li:eq(1)").find("span").text(COUNTER_CONFIG.mark_for_review);
        active_section.find("li:eq(2)").find("span").text(COUNTER_CONFIG.answered);
        active_section.find("li:eq(3)").find("span").text(COUNTER_CONFIG.not_answered);
        active_section.find("li:eq(4)").find("span").text(COUNTER_CONFIG.bookmarked);
        //Setting question count section wise end
    }

    var init_test = function () {
        test_configuration();
        //palette setting start
        $scope.legends = running_language.legends;
//       cl(temp); cl(temp[0]);return false;
//        temp = [{"config_id":"4371592557369","section_id":"1","index":"0","state":"answered","on_screen":"3","is_bookmarked":"0","answers":["1","0","0","0"],"0":"object:5"},{"config_id":"9101592551680","section_id":"1","index":"1","state":"answered","on_screen":"2","is_bookmarked":"0","answers":["0","0","1","0"],"0":"object:6"},{"config_id":"5741592542167","section_id":"1","index":"2","state":"answered","on_screen":"2","is_bookmarked":"0","answers":["0","1","0","0"],"0":"object:7"},{"config_id":"3301592542564","section_id":"1","index":"3","state":"answered","on_screen":"2","is_bookmarked":"0","answers":["0","1","0","0"],"0":"object:8"},{"config_id":"7951592541913","section_id":"1","index":"4","state":"not_answered","on_screen":"2","is_bookmarked":"0","0":"object:9"},{"config_id":"8751592541651","section_id":"1","index":"5","state":"not_visited","on_screen":"0","is_bookmarked":"0","0":"object:10"},{"config_id":"2681593150142","section_id":"1","index":"6","state":"not_visited","on_screen":"0","is_bookmarked":"0","0":"object:11"},{"config_id":"5471593149813","section_id":"1","index":"7","state":"not_visited","on_screen":"0","is_bookmarked":"0","0":"object:12"},{"config_id":"5221593149529","section_id":"1","index":"8","state":"not_visited","on_screen":"0","is_bookmarked":"0","0":"object:13"},{"config_id":"9051593149114","section_id":"1","index":"9","state":"not_visited","on_screen":"0","is_bookmarked":"0","0":"object:14"},{"config_id":"9671593148952","section_id":"1","index":"10","state":"not_visited","on_screen":"0","is_bookmarked":"0","0":"object:15"},{"config_id":"6971593075082","section_id":"1","index":"11","state":"not_visited","on_screen":"0","is_bookmarked":"0","0":"object:16"},{"config_id":"5061593149037","section_id":"1","index":"12","state":"not_visited","on_screen":"0","is_bookmarked":"0","0":"object:17"}];
//        cl(temp);
        
//        cl(temp);
        if(temp.length >0){
            change_lang(resume.lang_used);
        angular.forEach(question_bank, function (value, index) {
            cl(temp[index].config_id);
            let object = {
                config_id: value.config_id,
                section_id: value.section_id,
                index: index,
                state:temp[index].state,// "answered",
                on_screen: temp[index].on_screen,
                is_bookmarked:temp[index].is_bookmarked,
                answers: (temp[index].answers)?temp[index].answers:{}
            };
            
            //for resume 
            switch (temp[index].state) {
            case "not_visited":
                        ++not_visited_count;
                        break;
                    case "answered":
                        ++answered_count
                        break;
                    case "not_answered":
                        ++not_answered_count
                        break;
                    case "bookmarked":
                        ++bookmarked_count;
                        break;
                    default :
                        ++mark_for_review_count;
                        break;
                }
            if (user_answers[index] == undefined)
                user_answers.push(object);
        });
    }else{
        angular.forEach(question_bank, function (value, index) {
            let object = {
                config_id: value.config_id,
                section_id: value.section_id,
                index: index,
                state: "not_visited",
                on_screen: 0,
                is_bookmarked:0,
                answers: {}
            };
            if (user_answers[index] == undefined)
                user_answers.push(object);
        });
    }
        not_visited_count = (not_answered_count == "") ? user_answers.length : not_visited_count;
        $scope.palette_basic = user_answers;
        //palette setting start

        //setting palette legends start
        $scope.not_answered = running_language.unanswered;
        $scope.mark_for_review = running_language.marked_for_review;
        $scope.not_visited = running_language.not_visited;
        $scope.answered = running_language.answered;
        $scope.bookmarked = running_language.answered_marked_for_review;
        refresh_legend_counter();
        //setting palette legends end

        //section management start
        angular.forEach(sections, function (value, index) {
//            sections[index].title = value.name + " (" + value.section_part + ")";in case of section part
            sections[index].title = value.name + " (" + "+"+value.marks_per_question +",-"+value.negative_marks+ ")";
            sections[index].state = (index == 0) ? "active" : "";
            // sections[index].section_boundation = (index == 0 || test_info.time_boundation == 0) ? "" : "disabled";

            if (index == 0) {
                current_section = value.id;
                $scope.active_section = sections[index].title;
            }
            
            var sec
        });
        $scope.sections = sections;
        //section management end

        //super header setting start
        $scope.candidate_name_title = running_language.candidate_name;
        $scope.candidate_name = user_info.name;
        $scope.user_image = (user_info.profile_picture != "") ? user_info.profile_picture : base_url + "web_assets/test_web/images/user.png";
        $scope.subject_name = "";
        $scope.remaining_time = running_language.remaining_time;
        count_down_configuration();
        //super header setting end

        //header setting start
        $scope.test_image = test_info.image;
        $scope.test_name = test_info.test_series_name;
        //header setting end

        //loader setting start
        $scope.continue_test = running_language.continue_test;
        //loader setting end

        //action items setting start
        $scope.act_submit = running_language.act_submit;
        $scope.act_save_and_next = running_language.act_save_and_next;
        $scope.act_clear_response = running_language.act_clear_response;
        $scope.act_save_mark_for_review = running_language.act_save_mark_for_review;
        $scope.correct = running_language.correct;
        $scope.incorrect = running_language.incorrect;
        $scope.coins = running_language.coins;
        $scope.complete_message = running_language.complete_message;
        $scope.confirm_proceed = running_language.confirm_proceed;
        //action items setting end

        //modal action button start
        $scope.modal_yes = running_language.yes;
        $scope.modal_no = running_language.no;
        //modal action button end

        //questionnaire setting for owl start
        $scope.question_index_text = running_language.question_index_text;
        $scope.question_index_type =  running_language.question_index_type;
        let question_html = "";
        let matching_options = {};

        // console.log(question_bank);
        
        angular.forEach(question_bank, function (value, index) {
            question_html += '<div section_id="' + value.section_id + '" question_type="' + value.question_type + '" config_id="' + value.config_id + '" class="item bg_test container pt-2 pb-2">';
            //paragraph setting start
            if (value.paragraph_text != undefined && value.paragraph_text != '')
                question_html += '<div class="bg-white mb-2 col-12"><strong>Paragraph: </strong>' + removeTags(value.paragraph_text) + '</div>';
            //set question start
            question_html += '<div class="bg-white"><div class="row m-0 bg-white"><div class="col-12"></div><div class="col-12"><strong>' + ($scope.question_index_text) + ' ' + (index + 1) + '</strong>/' + question_bank.length + '</div></div>';
            if (value.question_type == "FIB") {
                let question = (value.question);
                let input_exist_count = (question.match(new RegExp("FIB", "g")) || []).length
                for (i = 1; i <= input_exist_count; i++) {
                    if(value["option_" + i]){
                        let option = JSON.parse(value["option_" + i]);
                        let answered = (user_answers[index].answers[i - 1] != undefined && user_answers[index].answers[i - 1] != 0) ? user_answers[index].answers[i - 1] : "";
                        question = question.replace("FIB", "<input value='" + answered + "' class='" + ((option.type == "number") ? "numericKeypad" : "alphabeticKeypad") + "' min='" + option.min + "' max='" + option.max + "' answer='" + option.answer + "'>")
                    }
                    
                }
                question_html += '<div class="row m-0 mt-2"><div class="col-12"><div class="input-container fib_question">' + question + '</div></div>';
            } else {
                question_html += '<div class="row m-0 mt-2"><div class="col-12">' + removeTags(value.question) + '</div>'
            }
            question_html += '</div></div>';
            //set question end

            let answers = [];
            if (value.answer != undefined)
                answers = value.answer.split(',');
            
            var temp_question = value;
            var question_length = "";
            
            //option setting start
            switch (value.question_type) {
                case "SC":
                case "MC":
                case "TF":
                    question_html += '<div class="q-opt mb-5">';

                    //count question length
                    for( temp_question in temp_question ) {
                        if( temp_question.indexOf( "option_" ) > -1 ) {
                            question_length++;
                        }
                    }
                    for (let i = 1; i <= question_length; i++) {
                        if (value["option_" + i] != "") {

                            //Character Option

                            // let is_answered = (user_answers[index].answers[i - 1] != undefined && user_answers[index].answers[i - 1] != 0) ? "active" : "";
                            // question_html += '<div is_true="' + ((($.inArray(parseInt(i).toString(), answers) != -1) ? 1 : 0)) + '" class="bg-white mt-2 p-2 attempt_answer ' + is_answered + '"><span class="q_no">' + String.fromCharCode(64 + i) + '</span><p>' + removeTags(value["option_" + i]) + '</p></div>';

                            //Number option

                            let is_answered = (user_answers[index].answers[i - 1] != undefined && user_answers[index].answers[i - 1] != 0) ? "active" : "";
                            question_html += '<div is_true="' + ((($.inArray(parseInt(i).toString(), answers) != -1) ? 1 : 0)) + '" class="bg-white mt-2 p-2 attempt_answer ' + is_answered + '"><span class="q_no">' + i + '</span><p>' + removeTags(value["option_" + i]) + '</p></div>';
                        }
                    }
                    question_html += '</div>';
                    break;
                case "MT":
                    question_html += '<div class="dragger_content"><div class="left_side_dragger"> </div><div class="right_side_dragger"> </div></div>';
                    let option = {};
                    //count question length
                    for( temp_question in temp_question ) {
                        if( temp_question.indexOf( "option_" ) > -1 ) {
                            question_length++;
                        }
                    }
                    for (let i = 1; i <= question_length; i++) {
                        if (value["option_" + i] != "##") {
                            option[i] = (value["option_" + i]).split('##');
                        }
                    }
                    matching_options[index] = option;
                    break;
                case "FIB":
                    break;
            }
            //option setting end
            if (test_type == 'practice' && value.description != undefined && value.description != '')
                question_html += '<div class="bg-white mb-2 col-12 question_solution" style="display:none;"><a class="btn btn-link" data-toggle="collapse" href="#collapse_' + value.id + '" role="button" aria-expanded="false" aria-controls="collapse_' + value.id + '">Solution: </a><div class="collapse" id="collapse_' + value.id + '"><div class="card card-body">' + removeTags(value.description) + '</div></div></div>';
            question_html += '</div></div>';
        });
        owl.owlCarousel('destroy');
        owl.removeClass('owl-loaded');
        owl.html(question_html);

        //reload math js
        MathJax.Hub.Queue(["Typeset", MathJax.Hub]);

        init_carousel();
        matching_question_init(matching_options);
        $scope.question_bank = question_bank;

        if(localStorage.getItem('disable_sec_click')) {
            $scope.section_disabled = "disabled";
        } else {
            $scope.section_disabled = "";
        }

        //questionnaire setting for owlend
    };

    var count_down_configuration = function () {
        // cl(current_section);
        //  if (test_info.time_boundation == 1) {
             let timer = 0;
             $.each(sections, function (index, value) {
                 if (value.id == current_section) {
                     timer = value.section_timing;
                     return false;
                 }
                
                timer = timer ? parseInt(timer) + parseInt(value.section_timing) : parseInt(value.section_timing);
             });
             
             var sessionTime = sessionStorage.getItem("test_time");
             var currentTime = getDateTime();


            // comment by mahipal start//


             // if(first_attempt == 1){
             //    currentTime = (parseDate(currentTime))/ 1000;
             //    if(sessionTime){
             //    if(sessionTime > currentTime){
             //        $scope.count_down = sessionTime - currentTime;
             //        if($scope.count_down > (timer * 60)){
             //            $scope.count_down = "";
             //        }
             //    }
             //    }
                
             //    $scope.count_down = ($scope.count_down != undefined && $scope.count_down != 0) ? $scope.count_down : (timer * 60);
    
             //    $scope.count_down = $scope.count_down;
             // } else {
             //     $scope.count_down = ($scope.count_down != undefined && $scope.count_down != 0) ? $scope.count_down : (timer * 60);
     
             //     $scope.count_down = $scope.count_down;
             // }


             //mahipal comment End//

             

             $scope.count_down = ($scope.count_down != undefined && $scope.count_down != 0) ? $scope.count_down : (timer * 60);
     
             $scope.count_down = $scope.count_down;
             //console.log($scope.count_down);
         //     if(temp.length >0){
         //         // resume_time = resume.time_remain;
         //         // $scope.count_down = resume_time;
         //         $scope.count_down = $scope.count_down
         //     }
         // } else {
         //         $scope.count_down = ($scope.count_down != undefined) ? $scope.count_down : (test_info.time_in_mins * 60);
         //         if(temp.length >0){
         //         resume_time = resume.time_remain;
         //         $scope.count_down = resume_time;
         // }

        //  }
         
         updateCounter();
     }

    var test_configuration = function () {
        if (test_info.test_type == 1)
            $(".play_pause").hide();
        if (test_info.lang_id.length == 1) {
            change_lang(test_info.lang_id[0]);
            $("select[ng-model='Lang']").hide();
        }
        if (test_info.is_calc_allowed == 1) {
            $('div.night_owl, div.no_mini').Calculator();
            calculator({state: false});
        } else
            $(".calculator_toggle").hide();

        if (test_type == 'practice') {
            $('.legends,.footer_action').hide();
            $(".footer_counter").show();
        } else {
            $(".footer_counter").hide();
        }
    };

    loader({message: running_language.question_loading, state: true});
    $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded; charset=UTF-8;";
    var csrf = $(`input[name = 'csrf_name']`).val();
    var url = base_url + "web/LiveTest/get_test_series_with_id?pro_data=1";
    var FormData = {
        user_id: user_id,
        test_id: test_id,
        csrf_name: csrf,
        course_id: course_id
    };
    $http({
        url: url,
        method: "Post",
        data: $.param(FormData),
        dataType: 'json',
        headers: {
            'Jwt': jwt,
            'Device_Type':4,
            'Userid':user_id
        }
        
    }).then(function successCallback(response) {
        try {
            var data = response.data;

            // $("input[name = 'csrf_name']").val(response.data.token);

            // if(response.auth_code && response.auth_code.error_code && response.auth_code.error_code == 111){
            //     loader({message: running_language.error_codes[response.auth_code.error_code], state: true});
            // }
            
            if (data.auth_code == "100100") {
                loader({message: "Session Expired", state: true});
                window.location.hash = 'back_true';
            } else if (data.status == false) {
                var error_code = data.auth_code.error_code;
                loader({message: running_language.error_codes[error_code], state: true});
            } else {
                loader({message: running_language.test_state, state: true});
                /*
                 * preparing global lang array
                 */
                data = data.data;
                user_info = data.user_details;
                test_info = data.test_basic;
                // sessionStorage.setItem('time_boundation', test_info.time_boundation);
                sections = data.test_sections;
                question_eng = data.questions;
                question_hindi = data.questions_hindi;
                question_bank = (lang == 1) ? data.questions : data.questions_hindi;
                
                // cl(isEmpty(data.resume_dump));
//                if ( data.resume_dump) {
                if (isEmpty(data.resume_dump) !=true ) { 
                    resume = data.resume_dump;
                    temp = JSON.parse(resume.question_dump);
                    localStorage.setItem("active_question_index_in_owl", resume.last_view);
                }else{
                    localStorage.setItem("active_question_index_in_owl", 0)
                }
                
                init_test();
                if(question_bank.length == 0){
                    loader({message: "Question Not Found", state: true});
                    return false;
                }
//                loader({message: "", state: false});
                loader({message: running_language.test_preparation, state: true, full_screen: true});
            }
        } catch (exception) {
            // $("input[name = 'csrf_name']").val(response.data.token);
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

    /* count down */
    let time_out;
    var updateCounter = function () {
         if (countdown_control == true) {
            --$scope.count_down;
            ++total_spent_time_on_question;
            if ($scope.count_down < 30 && $scope.count_down % 2 === 0) {
                $('.user_info h5:eq(1)').css({"color": "#dc3545 !important", "font-weight": "bold"});
            } else {
                $('.user_info h5:eq(1)').css({"color": "", "font-weight": ""});
            }
        }
        if ($scope.count_down == undefined || $scope.count_down > 0) {
            if (time_out != undefined)
                $timeout.cancel(time_out);
            time_out = $timeout(updateCounter, 1000);
        }else if ($scope.count_down == 0) {
           
            let section_id_cur = parseInt($(".active").attr("section_id"));
            let section_id = section_id_cur+1;
            let index = $(".owl-stage").find("div[section_id=" + section_id + "]").parent().index();
            owl.trigger('to.owl.carousel', [index, 10]);
            current_section = section_id;


            let timer = 0;
             $.each(sections, function (index, value) {
                 if (value.id == current_section) {
                     timer = value.section_timing;
                     $scope.count_down = timer*60;
                     //return false;
                 }
                
                timer = timer ? parseInt(timer) + parseInt(value.section_timing) : parseInt(value.section_timing);
             });



            let activeHtml = $(`.section_${current_section}`).html();
            $("#tb_title").html(`${activeHtml}<i class="fa fa-sort-desc" aria-hidden="true"></i>`);

            $('.fa.fa-star').css("color","black");
            $('.quePrevbt').removeClass('disabled');
            $('.queNextbt').removeClass('disabled');
            if($('.owl-prev').hasClass('disabled')){
                $('.quePrevbt').addClass('disabled');
            }
            if($('.owl-next').hasClass('disabled')){
                $('.queNextbt').addClass('disabled');
            }

            count_down_configuration();
            //countdown_control = false;

            //return false;


        }
         else {
            let active_section_index = $(".subject_section_tab a.active").parent().index();
            if (test_info.time_boundation == 1 && (active_section_index + 1) != sections.length) {
                // loader({message: running_language.section_time_exhaust, state: true, continue_test: true});
                // $(".subject_section_tab a.active").addClass("disabled");
                // $(".nav_pointer_" + $(".subject_section_tab a.active").attr("section_id")).addClass('questionaire_overlay');
                $(".subject_section_tab a.active").parent().next().find("a").removeClass('disabled').click();
                current_section = $(".subject_section_tab a.active").attr("section_id");
                $(".nav_pointer_" + current_section).removeClass('questionaire_overlay');
                let index = $(".owl-stage").find("div[section_id=" + current_section + "]").parent().index();
                owl.trigger('to.owl.carousel', [index, 300]);
                count_down_configuration();
                countdown_control = false;
            } else {
                loader({message: running_language.finish_test, state: true});
                if(is_admin_access == 0){
                    $scope.submit_data();
                }
            }
        }
    };

    /*Language Setting*/
    $scope.lang_code = [
        {name: 'English', value: '1'},
        {name: 'Hindi', value: '2'},
    ];
    $scope.Lang = $scope.lang_code[lang - 1]; // red
    $scope.language_change_detected = function (lang_code) {
        // MathJax.typesetPromise();
        if (lang_code == 1)
            lang = 2;
        else
            lang = 1;
        change_lang(lang);
        init_test();
    };

    //Owl Carousel Activities Management start
    owl.on('translated.owl.carousel', function (event) {
        let active_question_index_in_owl = localStorage.getItem("active_question_index_in_owl");
        /*Checking Per question spent time*/
        user_answers[active_question_index_in_owl].on_screen = user_answers[active_question_index_in_owl].on_screen + total_spent_time_on_question;
        total_spent_time_on_question = 0;
        if (user_answers[active_question_index_in_owl] != undefined && user_answers[active_question_index_in_owl].state == "not_visited") {
            user_answers[active_question_index_in_owl].state = "not_answered";
            ++not_answered_count;
            --not_visited_count;
            $scope.palette_basic = user_answers;
        }
        refresh_legend_counter();
//        let is_nav_triggered = localStorage.getItem("nav_triggered");
//        if (is_nav_triggered == "1" && test_type != 'practice') {
//            $scope.ng_action(3);
//            localStorage.setItem("nav_triggered", "0");
//        }
        localStorage.setItem("active_question_index_in_owl", event.item.index);
        let section_id = $(".owl-stage").find('.owl-item.active').find("div").attr("section_id");
        $(".sections").removeClass("active");
        $(".section_" + section_id).addClass("active");

        let activeHtml = $(`.section_${section_id}`).html();
        $("#tb_title").html(`${activeHtml}<i class="fa fa-sort-desc" aria-hidden="true"></i>`);
    });
    //Owl Carousel Activities Management end

    //Answer Management start
    $scope.clear_response = function () {
        let selector = $(".owl-stage").find('.owl-item.active').find("div");
        let return_ans = [];
        switch (selector.attr("question_type")) {
            case "SC":
            case "MC":
            case "TF":
                selector.find("div.q-opt").children().removeClass("active");
                break;
            case "MT":
                selector.find(".ui-draggable-handle").attr({number: "", style: "z-index:1;"});
                break;
            case "FIB":
                selector.find("input").val("");
                break;
            default:

                break;
        }
        return return_ans;
    }

    $scope.answer_collection = function (return_flag) {
        let selector = $(".owl-stage").find('.owl-item:eq(' + localStorage.getItem("active_question_index_in_owl") + ')').find("div");
        let return_ans = [];
        let flag = false;
        switch (selector.attr("question_type")) {
            case "SC":
            case "MC":
            case "TF":
                $.each(selector.find("div.q-opt").children(), function () {
                    if (return_flag == true && $(this).hasClass("active")) {
                        flag = true;
                        return;
                    } else
                        return_ans.push(($(this).hasClass("active")) ? 1 : 0);
                });
                break;
            case "MT":
                $.each(selector.find("div.left_side_dragger").children(), function () {
                    if (return_flag == true && $(this).attr("number") != undefined) {
                        flag = true;
                        return;
                    } else
                        return_ans.push(($(this).attr("number") != undefined) ? $(this).attr("number") : 0);
                });
            case "FIB":
                $.each(selector.find("div.fib_question").find("input"), function () {
                    if (return_flag == true && $(this).val() != '') {
                        flag = true;
                        return;
                    } else
                        return_ans.push($(this).val());
                });
            default:

                break;
        }
        if (return_flag == true)
            return flag;
        else
            return return_ans;
    };
    //Answer Management end



    //action buttons management start
    $scope.ng_action = function (type) {
        if (test_type != "practice" && (type == 2 || type == 4) && $scope.answer_collection(true) == false) {
            // Swal.fire({
            //     title: 'Please give an answer.',
            //     showClass: {
            //         popup: 'animated fadeInDown faster'
            //     },
            //     hideClass: {
            //         popup: 'animated fadeOutUp faster'
            //     }
            // });
            return false;
        }
        let active_question_index_in_owl = localStorage.getItem("active_question_index_in_owl");
        
        switch (type) {
            case 1:
                if($scope.answer_collection(true) == false) {
                    switch (user_answers[active_question_index_in_owl].state) {
                        case "not_visited":
                            --not_visited_count;
                            break;
                        case "answered":
                            --answered_count
                            break;
                        case "not_answered":
                            --not_answered_count
                            break;
                        case "bookmarked":
                            --bookmarked_count;
                            break;
                        default :
                            --mark_for_review_count;
                            break;
                    }
                    ++mark_for_review_count;
                    user_answers[active_question_index_in_owl].state = "mark_for_review";
                    mark_for_review.push(active_question_index_in_owl);
                    user_answers[active_question_index_in_owl].answers = $scope.answer_collection(false);
                    $('.fa.fa-star').css("color","#dc3545");
                    show_toast('success','Marked for review','');
                    break;
                } else {
                    switch (user_answers[active_question_index_in_owl].state) {
                        case "not_visited":
                            --not_visited_count;
                            break;
                        case "answered":
                            if(jQuery.inArray(active_question_index_in_owl, mark_for_review) != -1) {
                                --bookmarked_count;
                            } else {
                                --answered_count
                            }
                            break;
                        case "mark_for_review":
                            --bookmarked_count;
                            break;
                        case "not_answered":
                            --not_answered_count
                            break;
                        default :
                            --bookmarked_count;
                            break;
                    }
                    ++bookmarked_count;
                    user_answers[active_question_index_in_owl].state = "answered";

                    if(jQuery.inArray(active_question_index_in_owl, mark_for_review) == -1){
                        mark_for_review.push(active_question_index_in_owl);
                    }
                    user_answers[active_question_index_in_owl].answers = $scope.answer_collection(false);

                    show_toast('success','Marked for review','');
                    $('.fa.fa-star').css("color","#dc3545");
                    $(".nav_pointer_" + current_section).eq(active_question_index_in_owl).addClass('bookmarked');
                    break;
                }

            case 2:
                switch (user_answers[active_question_index_in_owl].state) {
                    case "not_visited":
                        --not_visited_count;
                        break;
                    case "answered":
                        if(jQuery.inArray(active_question_index_in_owl, mark_for_review) != -1){
                            --bookmarked_count;
                        } else {
                            --answered_count
                        }
                        break;
                    case "mark_for_review":
                        --mark_for_review_count;
                        break;
                    case "not_answered":
                        --not_answered_count
                        break;
                    case "bookmarked":
                        --bookmarked_count;
                        break;
                    default :
                        --answered_count;
                        break;
                }
                user_answers[active_question_index_in_owl].state = "answered";
                if(user_answers[active_question_index_in_owl].state == "mark_for_review"){
                    if($scope.answer_collection(true) == false) {
                        ++mark_for_review_count;
                    } else {
                        ++bookmarked_count;
                        $(".nav_pointer_" + current_section).eq(active_question_index_in_owl).addClass('bookmarked');
                    }
                }else if(user_answers[active_question_index_in_owl].state == "answered" && jQuery.inArray(active_question_index_in_owl, mark_for_review) != -1){
                    if($scope.answer_collection(true) == false) {
                        ++mark_for_review_count;
                    } else {
                        ++bookmarked_count;
                        $(".nav_pointer_" + current_section).eq(active_question_index_in_owl).addClass('bookmarked');
                    }
                    user_answers[active_question_index_in_owl].state = "answered";
                } else if(user_answers[active_question_index_in_owl].state == "answered") {
                    ++answered_count;
                    user_answers[active_question_index_in_owl].state = "answered";
                }
                user_answers[active_question_index_in_owl].answers = $scope.answer_collection(false);
                if (parseInt(active_question_index_in_owl) + 1 == question_bank.length) {
                    $scope.ng_action(5);
                    
                }
                    
                else if (!$(".subject_section_tab").find(".section_" + question_bank[parseInt(active_question_index_in_owl) + 1].section_id).hasClass('disabled'))
                owl.trigger('to.owl.carousel',[index, 300]);
                    
                break;
            case 3:
                switch (user_answers[active_question_index_in_owl].state) {
                    case "not_visited":
                        --not_visited_count;
                        break;
                    case "answered":
                        if(jQuery.inArray(active_question_index_in_owl, mark_for_review) != -1){
                            --bookmarked_count;
                        } else {
                            --answered_count
                        }
                        break;
                    case "mark_for_review":
                        if($scope.answer_collection(true) == false) {
                            --mark_for_review_count;
                        } else {
                            --bookmarked_count;
                        }
                        
                        break;
                    case "not_answered":
                        --not_answered_count
                        break;
                    case "bookmarked":
                        --bookmarked_count;
                        break;
                    default :
                        --not_answered_count;
                        break;
                }
                ++not_answered_count;
                $scope.clear_response();
                user_answers[active_question_index_in_owl].state = "not_answered";

                mark_for_review = mark_for_review.filter((value)=>value!=active_question_index_in_owl);

                $('.fa.fa-star').css("color","black");
                $(".nav_pointer_" + current_section).eq(active_question_index_in_owl).removeClass('bookmarked ');
                $(".nav_pointer_" + current_section).eq(active_question_index_in_owl).addClass('not_answered');
                user_answers[active_question_index_in_owl].answers = {};//$scope.answer_collection(false);
                break;
            case 4:
                switch (user_answers[active_question_index_in_owl].state) {
                    case "not_visited":
                        --not_visited_count;
                        break;
                    case "answered":
                        if(jQuery.inArray(active_question_index_in_owl, mark_for_review) != -1) {
                            --bookmarked_count;
                        } else {
                            --answered_count
                        }
                        break;
                    case "mark_for_review":
                        --mark_for_review_count;
                        break;
                    case "not_answered":
                        --not_answered_count
                        break;
                    default :
                        --bookmarked_count;
                        break;
                }
                ++bookmarked_count;
                user_answers[active_question_index_in_owl].state = "answered";
//                user_answers[active_question_index_in_owl].is_bookmarked = "0";
                user_answers[active_question_index_in_owl].answers = $scope.answer_collection(false);
                break;
            case 5:
                if (parseInt(active_question_index_in_owl) + 1 == question_bank.length)
                    $(".complete_message_dialogue").show();
                loader({state: false, test_modal: true});
                break;
            case 6:
//                switch (user_answers[active_question_index_in_owl].state) {
//                    case "not_visited":
//                        --not_visited_count;
//                        break;
//                    case "answered":
//                        --answered_count
//                        break;
//                    case "mark_for_review":
//                        --mark_for_review_count;
//                        break;
//                    case "not_answered":
//                        --not_answered_count
//                        break;
//                    default :
//                        --bookmarked_count;
//                        break;
//                }
                ++booked_count;
                user_answers[active_question_index_in_owl].is_bookmarked = 1;
                 show_toast('success', 'Question Bookmarked Successfully', '');
//                cl(user_answers[active_question_index_in_owl].is_bookmarked);
                break;
                case 7:
                    switch (user_answers[active_question_index_in_owl].state) {
                    case "mark_for_review":
                        if($scope.answer_collection(true) == false) {
                            // user_answers[active_question_index_in_owl].state = "not_answered";
                            --mark_for_review_count;
                        } else {
                            // user_answers[active_question_index_in_owl].state = "answered";
                            --bookmarked_count;
                        }

                    // user_answers[active_question_index_in_owl].state = "not_answered";
                    // $('.mark_for_review').show();
                    // $('.unmarked_for_review').hide();
                    show_toast('success', 'Unmarked for review', '');
                    break;
                }
            default:

                break;
        }
        refresh_legend_counter();
    };
    //action buttons management start

    //play pause test start
    $scope.play_pause = function () {
//        $("#test-resume-modal").modal('show');
        if (countdown_control == true) {
            countdown_control = false;
            $(".play_pause").html("<i class='fa fa-play fa-2x'></i>");
            $(".pause_loader").show();
        } else {
            countdown_control = true;
            $(".pause_loader").hide();
            $(".play_pause").html("<i class='fa fa-pause fa-2x'></i>");
        }
    }


    $scope.section_move = function (){
    if (test_info.allow_user_move == 0)
    {

        if($(".section_move").hasClass("last_section")==true){
            Swal.fire({
                icon: 'warning',
                text : "This is the last section. Do you want to submit the test?",
                showClass: {
                    popup: 'animated fadeInDown faster'
                },
                hideClass: {
                    popup: 'animated fadeOutUp faster'
                }
            });
            return false;
        }

        Swal.fire({  
          ///title: 'Do you want to switch the next section?',  
          text:'Do you want to switch the next section? After this, you will not be able to access the previous one.',
          showDenyButton: true,
          showCancelButton: true,  
          confirmButtonText: `Yes`,  
          denyButtonText: `No`,
          icon:'warning'
        }).then((result) => {  
            if (result.value===true) {    
                let section_id_cur = parseInt($(".active").attr("section_id"));
                let section_id = section_id_cur+1;
                let index = $(".owl-stage").find("div[section_id=" + section_id + "]").parent().index();
                owl.trigger('to.owl.carousel', [index, 10]);
                current_section = section_id;
                let timer = 0;
                 $.each(sections, function (index, value) {
                     if (value.id == current_section) {
                         timer = value.section_timing;
                         $scope.count_down = timer*60;
                         return false;
                     }
                    
                    timer = timer ? parseInt(timer) + parseInt(value.section_timing) : parseInt(value.section_timing);
                 });
                
                let activeHtml = $(`.section_${current_section}`).html();
                $("#tb_title").html(`${activeHtml}<i class="fa fa-sort-desc" aria-hidden="true"></i>`);

                $('.fa.fa-star').css("color","black");
                $('.quePrevbt').removeClass('disabled');
                $('.queNextbt').removeClass('disabled');
                if($('.owl-prev').hasClass('disabled')){
                    $('.quePrevbt').addClass('disabled');
                }
                if($('.owl-next').hasClass('disabled')){
                    $('.queNextbt').addClass('disabled');
                }
                count_down_configuration();
                console.log($(".section_move").hasClass("last_section"))
                if(sections[sections.length-1].id==current_section){
                if($(".section_move").hasClass("last_section")==true){
                    Swal.fire({
                        icon: 'warning',
                        text : "This is the last section. Do you want to submit the test?",
                        showClass: {
                            popup: 'animated fadeInDown faster'
                        },
                        hideClass: {
                            popup: 'animated fadeOutUp faster'
                        }
                    });
                    return false;
                }
                $(".section_move").addClass("last_section");
                
                    
                 }  
            } else{    
               return false; 
            }
        });

  
    }
  }
    
    $scope.grep_question_type = function (type) {
    
        let html = "";
        switch (type) {
            case "SC":
                html = "MCQ"//"Single Choice";
                break;
            case "MC":
                html = "MSQ";//Multiple Choice";
                break;
            case "TF":
                html = "True/False";
                break;
            case "MT":
                html = "Matching";
                break;
            case "FIB":
                html = "NAT";//"Fill In The Blank";
                break;
        }
        return html;
    
    }

    //play pause test end

    $scope.submit_data = function (is_submitted) {
        /*
         * If Time over then last question on screen time configuration setting
         */
        
        let active_question_index_in_owl = localStorage.getItem("active_question_index_in_owl");
        user_answers[active_question_index_in_owl].on_screen = user_answers[active_question_index_in_owl].on_screen + total_spent_time_on_question;

        if (is_data_submitted == 1)
            return false;
        is_data_submitted = 1;
//        console.log(user_answers);return false; 
//        let state = (is_submitted != 1 && test_info.set_type == 1 && $scope.count_down != 0) ? 0 : 1;
        let state = (is_submitted != 1  && $scope.count_down != 0) ? 0 : 1;
//        cl('submit state'+is_submitted+state);return false;
        var url = base_url + "web/LiveTest/save_test";
        loader({message: running_language.submission_wait, state: true});
        var FormData = {
            user_id: user_id,
            test_series_id: test_id,
            course_id: course_id,
            question_dump: JSON.stringify(user_answers),
            last_view: localStorage.getItem("active_question_index_in_owl"),
            lang_used: lang,
            // state: state, //0-pending,1-complete
            state: 1, //0-pending,1-complete
            time_remain: $scope.count_down,
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
            
            localStorage.removeItem('active_question_index_in_owl');
            $('input[name = "csrf_name"]').val(response.data.token);
            try {
                var data = response.data;
                if (data.auth_code == "100100") {
                    loader({message: "Session Expired", state: true});
                    window.location.hash = 'back_true';
                } else if (data.status == true) {
                    data = data.data;

                    let result_input = {'course_id': course_id, 'test_id': test_id, 'first_attempt': data.first_attempt, state : 1};
                    result_input = btoa(JSON.stringify(result_input));
                    
//                    if (data.result_page == 1) {
                        window.location.href = base_url + "web/LiveTest/result?inshow_result=" +result_input;
//                    } else {
//                        loader({message: data.result_date, state: true, close_screen: true});
//                    }
                } else {
                    loader({message: running_language.test_state, state: true});
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
            localStorage.removeItem('active_question_index_in_owl');
            if (response.data == null || !navigator.onLine) {
                loader({message: running_language.internet, state: true});
            } else {
                loader({message: running_language.server_response, state: true});
            }
        });
    }
    return;
});

app.filter('secondsToDateTime', function () {
    return function (countdown) {
        var d = new Date(0, 0, 0, 0, 0, 0, 0);
        d.setSeconds(countdown);
        return d;
    };
});



// app.filter('check_questionaire', function () {
//     return function (section_id) {
//         return (test_info.time_boundation == 1 && question_bank[localStorage.getItem("active_question_index_in_owl")].section_id != section_id) ? "questionaire_overlay" : "";
//     };
// });


$("#close-sidebar").click(function () {
    $(".page-wrapper").removeClass("toggled");
});
$("#show-sidebar").click(function () {
    $(".page-wrapper").addClass("toggled");
});

function init_carousel() {
    let owl_configuration = {
        loop: false,
        margin: 0,
        nav: true,
        items: 1,
        dots: false,
        touchDrag: false,
        mouseDrag: false,
        //animateIn: 'fadeIn',
        //animateOut: 'fadeOut',
        smartSpeed: 100,
        slideSpeed: 300,
        // navText: [$('.quePrevbt'),$('.queNextbt')]
    };
    owl_configuration.startPosition = localStorage.getItem("active_question_index_in_owl");
    owl.owlCarousel(owl_configuration);


    //bind keyboard to inputs start
    $(document).find('.numericKeypad').each(function () {
        $(this).keypad();
    });
    $(document).find('.alphabeticKeypad').each(function () {
        $(this).accentKeyboard({
            layout: 'accent',
            active_shift: true,
            active_caps: false,
            is_hidden: true,
            open_speed: 300,
            close_speed: 100,
            show_on_focus: true,
            hide_on_blur: true,
            trigger: undefined,
            enabled: true
        });
    });
    //bind keyboard to inputs end
}

// Show When apply


$('.queNextbt').click(function() {
    let current_question_section = $(".owl-stage").find(".active").next(".owl-item").children().attr('section_id');
    $('.fa.fa-star').css("color","black");
    
    if(current_section == current_question_section){
        owl.trigger('next.owl.carousel');
    }else{
       Swal.fire({
            title: 'Section switching is not allowed.',
            showClass: {
                popup: 'animated fadeInDown faster'
            },
            hideClass: {
                popup: 'animated fadeOutUp faster'
            }
        });
        return false; 
    }
    
    $('.quePrevbt').removeClass('disabled');
    $('.queNextbt').removeClass('disabled');
    if($('.owl-next').hasClass('disabled')){
        $('.queNextbt').addClass('disabled');
    }
});
$('.quePrevbt').click(function() {
    let current_question_section = $(".owl-stage").find(".active").prev().children().attr('section_id');
    // console.log('cur_question '+current_question_section);
    //     console.log('section '+current_section);

    $('.fa.fa-star').css("color","black");
    if(current_section == current_question_section){
        owl.trigger('prev.owl.carousel', [100]);
    }else{
        Swal.fire({
            title: 'Section switching is not allowed.',
            showClass: {
                popup: 'animated fadeInDown faster'
            },
            hideClass: {
                popup: 'animated fadeOutUp faster'
            }
        });
        return false;
    }
    
    $('.quePrevbt').removeClass('disabled');
    $('.queNextbt').removeClass('disabled');
    if($('.owl-prev').hasClass('disabled')){
        $('.quePrevbt').addClass('disabled');
    }
})

$(document).on('click','.owl-next', function(e){
    debugger;
    console.log(sections);
    console.log('|');
    console.log(current_section);
    console.log('|');

    let current_question_section = $(".owl-stage").find(".active").next(".owl-item").children().attr('section_id');
    console.log(current_question_section);
    console.log('|');
    if(current_section != current_question_section){
        $('.owl-next').addClass('disabled');
        Swal.fire({
            title: 'Section switching is not allowed.',
            showClass: {
                popup: 'animated fadeInDown faster'
            },
            hideClass: {
                popup: 'animated fadeOutUp faster'
            }
        });
        return false;
        
    }else{
        $('.owl-next').removeClass('disabled');
    }
    $('.fa.fa-star').css("color","black");
    $('.fa.fa-star').css("color","black");
    $('.quePrevbt').removeClass('disabled');
    $('.queNextbt').removeClass('disabled');
    if($('.owl-next').hasClass('disabled')){
        $('.queNextbt').addClass('disabled');
    }
});

$(document).on('click','.owl-prev', function(e){
    let current_question_section = $(".owl-stage").find(".active").prev().children().attr('section_id');
    if(current_section != current_question_section){
        $('.owl-prev').addClass('disabled');
        Swal.fire({
            title: 'Section switching is not allowed.',
            showClass: {
                popup: 'animated fadeInDown faster'
            },
            hideClass: {
                popup: 'animated fadeOutUp faster'
            }
        });
        return false;
        
    }else{
        $('.owl-prev').removeClass('disabled');
    }
    $('.fa.fa-star').css("color","black");
    $('.fa.fa-star').css("color","black");
    $('.quePrevbt').removeClass('disabled');
    $('.queNextbt').removeClass('disabled');
    if($('.owl-prev').hasClass('disabled')){
        $('.quePrevbt').addClass('disabled');
    }
});

// $('.queNextbt').click(function() {
//     $('.pressme').click();
//     owl.trigger('next.owl.carousel');
// })


// Go to the previous item

//change question in owl from pallete
$(document).on("click", ".question_nav_pointer", function () { 
        var checkSection  = $(this).hasClass(current_section);
        if (test_info.allow_user_move == 0 && checkSection===false) {
            $('.queNextbt').addClass('disabled');
        Swal.fire({
            title: 'Section switching is not allowed.',
            showClass: {
                popup: 'animated fadeInDown faster'
            },
            hideClass: {
                popup: 'animated fadeOutUp faster'
            }
        });
        return false;
    }else{
        $('.queNextbt').removeClass('disabled');
    } 
    if (!$(this).hasClass("questionaire_overlay")) {
        var slide_index = $(this).find("span").html();
        owl.trigger('to.owl.carousel', [(parseInt(slide_index) - 1), 10]);
        localStorage.setItem("active_question_index_in_owl", parseInt(slide_index) - 1);

        $('.fa.fa-star').css("color","black");
        $('.quePrevbt').removeClass('disabled');
        $('.queNextbt').removeClass('disabled');
        if($('.owl-prev').hasClass('disabled')){
            $('.quePrevbt').addClass('disabled');
        }
        if($('.owl-next').hasClass('disabled')){
            $('.queNextbt').addClass('disabled');
        }
    }
});

$(document).on("click", ".attempt_answer", function () {
    let selector = $(this); 
    switch (selector.parent().parent().attr("question_type")) {
        case "SC":
        case "TF":
            if (test_type == 'practice') {
                if (selector.siblings().hasClass("active") || selector.siblings().hasClass("error")) {
                    let css = selector.css("border-color");
                    selector.animate({'border-color': 'red'}).delay(600).animate({"border-color": css});
                } else if (!selector.hasClass("evaluated")) {
                    selector.addClass("evaluated");
                    if (selector.attr("is_true") == '1') {
                        selector.addClass("active");
                        ++practice_correct;
                        ++practice_coins;
                    } else {
                        ++practice_incorrect;
                        selector.addClass("error");
                    }
                    $(".owl-stage").find('.owl-item.active').find(".question_solution").show();
                    angular.element('body').scope().ng_action(2);
                    angular.element('body').scope().refresh_legend_counter();
                }
            } else {
                selector.siblings().removeClass("active");
                selector.addClass("active");
            }
            break;
        case "MC":
            if (selector.hasClass("active")) {
                selector.removeClass("active");
            } else {
                selector.addClass("active");
            }
            break;
        default:
            break;
    }
});

$(document).on("click", ".sections", function (e) {

    if(test_info.allow_user_move == 0){
        $(this).removeClass("active");
    }
   if ($(this).hasClass("active") && $(this).hasClass("disabled"))
       $(this).removeClass("disabled");

    if (!$(e.target).hasClass("fa-info"))
        if (test_info.allow_user_move != 0) { 
            $(".subject_section_tab a").attr("aria-selected", false).removeClass('active');
            $(this).attr("aria-selected", true).addClass("active");
            let section_id = $(this).attr("section_id");
            let index = $(".owl-stage").find("div[section_id=" + section_id + "]").parent().index();
            owl.trigger('to.owl.carousel', [index, 10]);
            current_section = section_id;

            let activeHtml = $(`.section_${current_section}`).html();
            $("#tb_title").html(`${activeHtml}<i class="fa fa-sort-desc" aria-hidden="true"></i>`);

            $('.fa.fa-star').css("color","black");
            $('.quePrevbt').removeClass('disabled');
            $('.queNextbt').removeClass('disabled');
            if($('.owl-prev').hasClass('disabled')){
                $('.quePrevbt').addClass('disabled');
            }
            if($('.owl-next').hasClass('disabled')){
                $('.queNextbt').addClass('disabled');
            }

        } else 
        if (!$(this).hasClass("active")) {
            Swal.fire({
                title: 'Section switching is not allowed.',
                showClass: {
                    popup: 'animated fadeInDown faster'
                },
                hideClass: {
                    popup: 'animated fadeOutUp faster'
                }
            });
            $(".subject_section_tab a.active").removeClass("disabled");
        }
}).on('click', '.sections i', function (e) {
    if ($(this).parent().siblings("ul").is(":visible"))
        $(this).parent().siblings("ul").hide();
    else
        $(this).parent().siblings("ul").show();
});

//hiding from global section info
$('body').not('.dropdown-menu').click(function (e) {
    if ($(e.target).closest("ul.dropdown-menu").length)
        return false
    else
        $(".dropdown-menu").hide();
});


localStorage.setItem("full_screen_flag", false);
function toggleFullScreen(elem) {
    if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
        if (elem.requestFullScreen) {
            elem.requestFullScreen();
        } else if (elem.mozRequestFullScreen) {
            elem.mozRequestFullScreen();
        } else if (elem.webkitRequestFullScreen) {
            elem.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
        } else if (elem.msRequestFullscreen) {
            elem.msRequestFullscreen();
        }
        loader({message: "", state: false});
        angular.element('body').scope().play_pause();
        localStorage.setItem("full_screen_flag", true);
    } else {
        if (document.cancelFullScreen) {
            document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
            document.webkitCancelFullScreen();
        } else if (document.msExitFullscreen) {
            document.msExitFullscreen();
        }
        loader({message: running_language.not_available, state: true, full_screen: true});
        localStorage.setItem("full_screen_flag", false);
    }
}

$(".continue_test").click(function () {
    loader({message: "", state: false});
    localStorage.setItem("full_screen_flag", false);
    countdown_control = true;
});

if (document.addEventListener) {
    document.addEventListener('fullscreenchange', exitHandler, false);
    document.addEventListener('mozfullscreenchange', exitHandler, false);
    document.addEventListener('MSFullscreenChange', exitHandler, false);
    document.addEventListener('webkitfullscreenchange', exitHandler, false);
}

function exitHandler() {
    var elem = document.getElementById('full_screen');
    if (document.webkitIsFullScreen || document.mozFullScreen || document.msFullscreenElement !== null) {
        if (localStorage.getItem("full_screen_flag") == "true") {
            localStorage.setItem("full_screen_flag", false);
        } else {
            
            if(angular.element('body').scope().count_down == 0){
                angular.element('body').scope().submit_data();
            } else {
                angular.element('body').scope().ng_action(5);
            }
            // loader({message: running_language.not_available, state: true, full_screen: true});
            // countdown_control = false;
        }
    }
}

$('#test-modal').on('hidden.bs.modal', function () {
    var elem = document.getElementById('full_screen');
    if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
        
        if (elem.requestFullScreen) {
            elem.requestFullScreen();
        } else if (elem.mozRequestFullScreen) {
            elem.mozRequestFullScreen();
        } else if (elem.webkitRequestFullScreen) {
            elem.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
        } else if (elem.msRequestFullscreen) {
            elem.msRequestFullscreen();
        }
        loader({message: "", state: false});
        // angular.element('body').scope().play_pause();
        localStorage.setItem("full_screen_flag", true);
    }
})

//Only for admin check
if(is_admin_access == 0){
    // $(window).blur(function () {
    //     if (countdown_control == true) {
    //         loader({message: running_language.window_warning + "\nRemaining Chance:" + warning_counter, state: true, continue_test: true});
    //         if (warning_counter == 0) {
    //             angular.element('body').scope().submit_data(0);
    //         }
    //         --warning_counter;
    //     }
    // });
}

if(is_admin_access == 0){
    $(window).on('beforeunload', function (event) {
    //    let message = 'Are you sure you want to leave?';
    //    event.returnValue = message;
    //    return message;
        //save in local or on server event will called ever
        angular.element('body').scope().submit_data(0);
        window.top.close();
    });
    $(window).on('unload', function () {
        //save in local or on server event will called ever
        angular.element('body').scope().submit_data(0);
    });
}


$(".close_screen").click(function () {
//    alert();
    window.top.close();
});



function isEmpty(obj) {
    for(var key in obj) {
        if(obj.hasOwnProperty(key))
            return false;
    }
    return true;
}

/* Matching Question Section */
function matching_question_init(matching_options) {
    $.each(matching_options, function (index, value) {
        let selector = $(".owl-stage").find('.owl-item:eq(' + index + ')');

        // Reset the option
        let dragger_content = selector.find('.dragger_content');
        let left_dragger = selector.find('.left_side_dragger');
        let right_dragger = selector.find('.right_side_dragger');
        left_dragger.html('');
        right_dragger.html('');

        $.each(value, function (opt_index, opt_value) {
            $('<div class="">' + opt_value[0] + '</div>').data('number', opt_value[0]).attr({'answer': ""}).appendTo(left_dragger).draggable({
                containment: dragger_content,
                stack: '.left_side_dragger div',
                accept: '.left_side_dragger div',
                cursor: 'move',
                revert: true,
                start: resetAttr
            });

            $('<div>' + opt_value[1] + '</div>').data('number', opt_index).appendTo(right_dragger).droppable({
                accept: '.left_side_dragger div',
                hoverClass: 'hovered',
                drop: handleCardDrop
            });
        });
    });

}

/*Calculator Show/Hide Configuration*/
$(".calculator_toggle").click(function () {
    let selector = $(this);
        if($('#calc2').css('display') == 'none'){
        $('#calc2').css('display','block');
    }else{
        $('#calc2').css('display','none');
    }
//    if (selector.hasClass("active")) {
////        calculator({state: false});
//        selector.removeClass("active");
//    } else {
//        calculator({state: true});
////        selector.addClass("active");
//    }
});

function calculator(config_calc) {
    if (config_calc.state != undefined) {
        if (config_calc.state == true) {
            $(".calculator_section").show();
            $(".calculator_section").css({top: '10%', left: '30%'});
        } else {
            $(".calculator_section").hide();
        }
    }
}

function resetAttr(event, ui) {
    $(this).removeAttr('number');
}

function handleCardDrop(event, ui) {
    var slotNumber = $(this).data('number');
    var cardNumber = ui.draggable.data('number');

    if (slotNumber && cardNumber) {
        ui.draggable.attr('number', slotNumber);
//        ui.draggable.draggable('disable');
//        $(this).droppable('disable');
        ui.draggable.position({
            of: $(this),
            my: 'left top',
            at: 'left top'
        });
        ui.draggable.draggable('option', 'revert', false);
    }
}



function removeTags(text){
    const span = document.createElement('span');
    return text
    .replace(/&[#A-Za-z0-9]+;/gi, (entity,position,text)=> {
        span.innerHTML = entity;
        if(text != span.innerText) {
            return span.innerText;
        } else {
            return text;
        }
        
    });
}

// function removeTags(text){
//     const span = document.createElement('span');
//     return text
//     .replace(/&[#A-Za-z0-9]+;/gi, (entity,position,text)=> {
//         span.innerHTML = entity;
//         if(text != span.innerText) {
//             return span.innerText;
//         } else {
//             return text;
//         }
        
//     });
// }

function getDateTime() {
    var now     = new Date(); 
    var year    = now.getFullYear();
    var month   = now.getMonth()+1; 
    var day     = now.getDate();
    var hour    = now.getHours();
    var minute  = now.getMinutes();
    var second  = now.getSeconds(); 
    if(month.toString().length == 1) {
            month = '0'+month;
    }
    if(day.toString().length == 1) {
            day = '0'+day;
    }   
    if(hour.toString().length == 1) {
            hour = '0'+hour;
    }
    if(minute.toString().length == 1) {
            minute = '0'+minute;
    }
    if(second.toString().length == 1) {
            second = '0'+second;
    }   
    var dateTime = year+'-'+month+'-'+day+' '+hour+':'+minute+':'+second;   
        return dateTime;
}

function parseDate(date) {
    const parsed = Date.parse(date);
    if (!isNaN(parsed)) {
      return parsed;
    }
  
    return Date.parse(date.replace(/-/g, '/').replace(/[a-z]+/gi, ' '));
  }

  
// function removeTags(str) {
//     if ((str===null) || (str===''))
//         return false;
//     else 
//     console.log(htmlentities.decode(str));
//     htmlentities.decode(str);
//     return htmlentities.decode(str);

    

//     //     str = str.toString();
          
//     // // Regular expression to identify HTML tags in 
//     // // the input string. Replacing the identified 
//     // // HTML tag with a null string.
//     // return str.replace( /&[a-z]+;/, '');
// }


/* Matching Question Section End */