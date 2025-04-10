/*
 TRUNCATE TABLE course_test_series_report;
 TRUNCATE TABLE course_test_series_report_question_dump;
 */


/*
 * Some validations runiing on model
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
        109: "Exact number of questions is not found."
    },
    server_response: "Invalid server response",
    test_state: "Test preparation started.",
    internet: "Please check your internet connection or try again later.",
    candidate_name: "Candidate name",
    remaining_time: "Remaining Time",
    question_index_text: "Question No",
    answered: "Answersed",
    unanswered: "Unanswered",
    not_visited: "Not visited",
    mareked_for_review: "Marked for review",
    answered_mareked_for_review: "Answered and mark for review (will be considered for evolution)",
    explanation: "View Solution",
    correct: "Correct",
    incorrect: "Incorrect",
    coins: "Coins",
    window_warning: "Your current progress will not be saved.",
    quiz_back_message: "Are you sure you want to pause the quiz ? Don't worry your progress will be saved. You can resume it later.",
    test_back_message: "Are you sure you want to pause the test ? Don't worry your progress will be saved. You can resume it later.",
    quiz_complete_message: "You have reached the last question. Do you want to submit ? ",
    confirm_proceed: "Do you Do want to proceed ?",
    my_performance: "My Performance",
    cancel: "Cancel",
    section: "section",
    marking: "Marks",
    time_left: "Time Left",
    legends: "Legends",
    act_submit: "Submit",
    act_save_and_next: "Save & Next",
    act_clear_response: "Clear response",
    act_save_mark_for_review: "Save & Mark For Review",
    test_preparation: "Test preparation completed successfully.",
    not_available: "Test Is not Available on this screen.",
    play_paused: "Test paused",
    finish_test: "Test time is over save test"
};
var test_lang_hindi = {
    question_loading: "प्रश्न डाउनलोड हो रहे हैं।",
    error_codes: {
        100: "पाठ्यक्रम उपलब्ध नहीं है।",
        101: "पाठ्यक्रम आगामी है।",
        102: "पाठ्यक्रम की समय सीमा समाप्त हो गई है। इसे नवीनीकृत करें।",
        103: "पाठ्यक्रम खरीदा नहीं है।",
        104: "इस कोर्स के लिए यह परीक्षा उपलब्ध नहीं है।",
        105: "परीक्षण श्रृंखला अनुरोध अमान्य है।",
        106: "परीक्षण केवल ईआरपी लॉग इन छात्रों के लिए उपलब्ध है।",
        107: "परीक्षण केवल ईआरपी लॉग इन छात्रों के लिए उपलब्ध है।",
        108: "अमान्य उपयोगकर्ता।",
        109: "सटीक प्रश्न नहीं मिले।"
    },
    server_response: "अमान्य सर्वर प्रतिक्रिया",
    test_state: "टेस्ट तैयार हो रहा है ।",
    internet: "कृपया अपना इंटरनेट कनेक्शन जांचें या बाद में पुनः प्रयास करें।",
    candidate_name: "प्रत्याशी का नाम",
    remaining_time: "बचा हुआ समय",
    question_index_text: "प्रश्न सं",
    answered: "उत्तर दिया गया है",
    unanswered: "बिना उत्तर",
    not_visited: "नहीं देखा",
    mareked_for_review: "समीक्षा के लिए चिह्नित करें",
    answered_mareked_for_review: "जवाब दिया और समीक्षा के लिए मार्क (विकास के लिए विचार किया जाएगा)",
    explanation: "समाधान और स्पस्टीकरण",
    correct: "सही",
    incorrect: "ग़लत",
    coins: "चिन्हित",
    window_warning: "आपकी वर्तमान गतिविधि नहीं सहेजी जाएगी।",
    quiz_back_message: "क्या आप वाकई क्विज को रोकना चाहते हैं। चिंता मत करो आपकी प�?रगति सेव हो जा�?गी। आप इसे बाद में फिर से श�?रू कर सकते हैं।",
    test_back_message: "क्या आप वाकई प�?रश�?नोत�?तरी रोकना चाहते हैं? चिंता मत करो आपका प�?रयास बच जा�?गा। आप इसे फिर से श�?रू कर सकते हैं।",
    quiz_complete_message: "आप अंतिम प�?रश�?न पर पह�?�?च ग�? हैं। क�?या आप जमा करना चाहते हैं?",
    confirm_proceed: "क्या आप आगे बढ़ना चाहते हैं ?",
    my_performance: "मेरा परिणाम",
    cancel: "रद्द करें",
    section: "अनुभाग",
    marking: "अंक",
    time_left: "शेष समय",
    legends: "चिन्ह",
    act_submit: "जमा करें",
    act_save_and_next: "सहेजें और अगला",
    act_clear_response: "स्पष्ट प्रतिक्रिया",
    act_save_mark_for_review: "समीक्षा के लिए सहेजें और चिह्नित करें",
    test_preparation: "परीक्षण की तैयारी सफलतापूर्वक पूरी हुई।",
    not_available: "इस स्क्रीन पर टेस्ट उपलब्ध नहीं है।",
    play_paused: "परीक्षण रोक दिया गया",
    finish_test: "टेस्ट का टाइम खत्म हो चुका है टेस्ट को सेव करें"
};
var owl = $('#owl');
var countdown_control = false;


function cl(p) {
    console.log(p);
}

function loader(config) {
    $(".loader p").text(config.message);
    (config.state == true) ? $(".loader").show() : $(".loader").hide();
}

var app = angular.module('myApp', []);

app.controller('body_controller', function ($scope, $http, $timeout) {
    //Global variables for use for test setting
    var user_info = {};
    var test_info = {};
    var sections = {};
    var question_eng = {};
    var question_hindi = {};
    var question_bank = {};
    var not_answered_count = 0,
            mark_for_review_count = 0,
            not_visited_count = "",
            answered_count = 0,
            bookmarked_count = 0,
            user_answers = [];
    var total_spent_time_on_question = 0;
    //Global variables for use for test setting

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
    }

    var init_test = function () {
        //palette setting start
        $scope.legends = running_language.legends;
        angular.forEach(question_bank, function (value, index) {
            let object = {
                config_id: value.config_id,
                section_id: value.section_id,
                index: index,
                state: "not_visited",
                on_screen: 0,
                answers: {}
            };
            if (user_answers[index] == undefined)
                user_answers.push(object);
        });
        not_visited_count = (not_answered_count == "") ? user_answers.length : not_visited_count;
        $scope.palette_basic = user_answers;
        //palette setting start

        //setting palette legends start
        $scope.not_answered = running_language.unanswered;
        $scope.mark_for_review = running_language.mareked_for_review;
        $scope.not_visited = running_language.not_visited;
        $scope.answered = running_language.answered;
        $scope.bookmarked = running_language.answered_mareked_for_review;
        refresh_legend_counter();
        //setting palette legends end

        //super header setting start
        $scope.candidate_name_title = running_language.candidate_name;
        $scope.candidate_name = user_info.name;
        $scope.user_image = (user_info.profile_picture != "") ? user_info.profile_picture : base_url + "web_assets/test_web/images/user.png";
        $scope.subject_name = "";
        $scope.remaining_time = running_language.remaining_time;
        $scope.count_down = ($scope.count_down != undefined) ? $scope.count_down : (test_info.time_in_mins * 60);
        //super header setting end

        //header setting start
        $scope.test_image = test_info.image;
        $scope.test_name = test_info.test_series_name;
        //header setting end

        //action items setting start
        $scope.act_submit = running_language.act_submit;
        $scope.act_save_and_next = running_language.act_save_and_next;
        $scope.act_clear_response = running_language.act_clear_response;
        $scope.act_save_mark_for_review = running_language.act_save_mark_for_review;
        //action items setting end

        //section management start
        angular.forEach(sections, function (value, index) {
            sections[index].title = ((lang == 1) ? value.name : value.name_2) + " (" + value.section_part + ")";
            sections[index].state = (index == 0) ? "active" : "";
        });
        $scope.sections = sections;
        //section management end

        //questionnaire setting for owl start
        $scope.question_index_text = running_language.question_index_text;
        let question_html = "";
        let matching_options = {};
        angular.forEach(question_bank, function (value, index) {
            question_html += '<div section_id="' + value.section_id + '" question_type="' + value.question_type + '" config_id="' + value.config_id + '" class="item bg_test container pt-2 pb-2">';

            //set question start
            question_html += '<div class="bg-white"><div class="row m-0 bg-white"><div class="col-12"><strong>' + $scope.question_index_text + ' ' + (index + 1) + '</strong>/' + question_bank.length + '</div></div>';
            if (value.question_type == "FIB") {
                let question = value.question;
                let input_exist_count = (question.match(new RegExp("FIB", "g")) || []).length
                for (i = 1; i <= input_exist_count; i++) {
                    let option = JSON.parse(value["option_" + i]);
                    let answered = (user_answers[index].answers[i - 1] != undefined && user_answers[index].answers[i - 1] != 0) ? user_answers[index].answers[i - 1] : "";
                    question = question.replace("FIB", "<input value='" + answered + "' class='numericKeypad' min='" + option.min + "' max='" + option.max + "' answer='" + option.answer + "'>")
                }
                question_html += '<div class="row m-0 mt-2"><div class="col-12"><div class="input-container fib_question">' + question + '</div></div>';
            } else {
                question_html += '<div class="row m-0 mt-2"><div class="col-12">' + value.question + '</div>'
            }
            question_html += '</div></div>';
            //set question end

            //option setting start
            switch (value.question_type) {
                case "SC":
                case "MC":
                case "TF":
                    question_html += '<div class="q-opt mb-5 pb-5">';
                    for (let i = 1; i <= 10; i++) {
                        if (value["option_" + i] != "") {
                            let is_answered = (user_answers[index].answers[i - 1] != undefined && user_answers[index].answers[i - 1] != 0) ? "active" : "";
                            question_html += '<div class="bg-white mt-2 p-2 attempt_answer ' + is_answered + '"><span>' + String.fromCharCode(64 + i) + '</span><p>' + value["option_" + i] + '</p></div>';
                        }
                    }
                    question_html += '</div>';
                    break;
                case "MT":
                    question_html += '<div class="dragger_content"><div class="left_side_dragger"> </div><div class="right_side_dragger"> </div></div>';
                    let option = {};
                    for (let i = 1; i <= 10; i++) {
                        if (value["option_" + i] != "##") {
                            option[i] = value["option_" + i].split('##');
                        }
                    }
                    matching_options[index] = option;
                    break;
                case "FIB":
                    break;
            }
            //option setting end
            question_html += '</div></div>';
        });
        owl.owlCarousel('destroy');
        owl.removeClass('owl-loaded');
        owl.html(question_html);
        init_carousel();
        matching_question_init(matching_options);
        $scope.question_bank = question_bank;
        //questionnaire setting for owlend
    };

    loader({message: running_language.question_loading, state: true});
    $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded; charset=UTF-8;";
    var url = base_url + "index.php/data_model/courses/test_series_v2/get_test_data";
    var FormData = {
        user_id: user_id,
        test_id: test_id,
        course_id: course_id
    };
    $http({
        url: url,
        method: "Post",
        data: $.param(FormData),
        dataType: 'json',
        headers: {
            'Jwt': jwt
        }
    }).then(function successCallback(response) {
        try {
            var data = response.data;
            var error_code = data.error.error_code;
            if (data.auth_code == "100100") {
                loader({message: "Session Expired", state: true});
                window.location.hash = 'back_true';
            } else if (data.status == false && $.isNumeric(error_code)) {
                loader({message: running_language.error_codes[error_code], state: true});
            } else {
                loader({message: running_language.test_state, state: true});
                /*
                 * preparing global lang array
                 */
                data = data.data;
                user_info = data.user_details;
                test_info = data.test_basic;
                sections = data.test_sections;
                question_eng = data.questions;
                question_hindi = data.questions_hindi;
                question_bank = (lang == 1) ? data.questions : data.questions_hindi;
                init_test();
//                loader({message: "", state: false});
                loader({message:running_language.test_preparation, state:true});
            }
        } catch (exception) {
            cl(exception);
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
    var updateCounter = function () {
        if (countdown_control == true) {
            $scope.count_down--;
            ++total_spent_time_on_question;
            if ($scope.count_down < 30 && $scope.count_down % 2 === 0) {
                $('.user_info h5:eq(1)').css({"color": "#dc3545 !important", "font-weight": "bold"});
            } else {
                $('.user_info h5:eq(1)').css({"color": "", "font-weight": ""});
            }
        }
        if ($scope.count_down == undefined || $scope.count_down > 0) {
            $timeout(updateCounter, 1000);
        } else {
            loader({message: running_language.finish_test, state: true});
            $scope.submit_data();
        }
    };
    updateCounter();

    /*Language Setting*/
    $scope.lang_code = [
        {name: 'English', value: '1'},
        {name: 'Hindi', value: '2'},
    ];
    $scope.Lang = $scope.lang_code[lang - 1]; // red
    $scope.language_change_detected = function (lang_code) {
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
        if (user_answers[active_question_index_in_owl] != undefined && user_answers[active_question_index_in_owl].state == "not_visited") {
            user_answers[active_question_index_in_owl].state = "not_answered";
            ++not_answered_count;
            --not_visited_count;
            $scope.palette_basic = user_answers;
            refresh_legend_counter();
        }
        let is_nav_triggered = localStorage.getItem("nav_triggered");
        if (is_nav_triggered == "1") {
            $scope.ng_action(3);
            localStorage.setItem("nav_triggered", "0");
        }
        localStorage.setItem("active_question_index_in_owl", event.item.index);
        let section_id = $(".owl-stage").find('.owl-item.active').find("div").attr("section_id");
        $(".sections").removeClass("active");
        $(".section_" + section_id).addClass("active");
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
            default:

                break;
        }
        return return_ans;
    }

    $scope.answer_collection = function () {
        let selector = $(".owl-stage").find('.owl-item:eq(' + localStorage.getItem("active_question_index_in_owl") + ')').find("div");
        let return_ans = [];
        switch (selector.attr("question_type")) {
            case "SC":
            case "MC":
            case "TF":
                $.each(selector.find("div.q-opt").children(), function () {
                    return_ans.push(($(this).hasClass("active")) ? 1 : 0);
                });
                break;
            case "MT":
                $.each(selector.find("div.left_side_dragger").children(), function () {
                    return_ans.push(($(this).attr("number") != undefined) ? $(this).attr("number") : 0);
                });
            case "FIB":
                $.each(selector.find("div.fib_question").children(), function () {
                    return_ans.push($(this).val());
                });
            default:

                break;
        }
        return return_ans;
    };
    //Answer Management end

    //action buttons management start
    $scope.ng_action = function (type) {
        let active_question_index_in_owl = localStorage.getItem("active_question_index_in_owl");
        switch (type) {
            case 1:
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
                user_answers[active_question_index_in_owl].answers = $scope.answer_collection();
                break;
            case 2:
                switch (user_answers[active_question_index_in_owl].state) {
                    case "not_visited":
                        --not_visited_count;
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
                ++answered_count;
                user_answers[active_question_index_in_owl].state = "answered";
                user_answers[active_question_index_in_owl].answers = $scope.answer_collection();
                owl.trigger('next.owl.carousel', 500);
                break;
            case 3:
                switch (user_answers[active_question_index_in_owl].state) {
                    case "not_visited":
                        --not_visited_count;
                        break;
                    case "answered":
                        --answered_count
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
                        --not_answered_count;
                        break;
                }
                ++not_answered_count;
                user_answers[active_question_index_in_owl].state = "not_answered";
                user_answers[active_question_index_in_owl].answers = $scope.answer_collection();
                break;
            case 4:
                switch (user_answers[active_question_index_in_owl].state) {
                    case "not_visited":
                        --not_visited_count;
                        break;
                    case "answered":
                        --answered_count
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
                user_answers[active_question_index_in_owl].state = "bookmarked";
                user_answers[active_question_index_in_owl].answers = $scope.answer_collection();
                owl.trigger('next.owl.carousel', 500);
                break;
            default:

                break;
        }
        refresh_legend_counter();
    };
    //action buttons management start

    //play pause test start
    $scope.play_pause = function () {
        if (countdown_control == true) {
            countdown_control = false;
            $(".play_pause").html("<i class='fa fa-play fa-2x'></i>");
            loader(running_language.play_paused, true);
        } else {
            countdown_control = true;
            $(".play_pause").html("<i class='fa fa-pause fa-2x'></i>");
        }
    }
    //play pause test end

    $scope.submit_data = function (state) {
        var url = base_url + "index.php/data_model/courses/test_series_v2/save_test";
        var FormData = {
            user_id: user_id,
            test_series_id: test_id,
            course_id: course_id,
            question_dump: JSON.stringify(user_answers),
            last_view: localStorage.getItem("active_question_index_in_owl"),
            lang_used: lang,
            state:state//0-pending,1-complete
        };
        $http({
            url: url,
            method: "Post",
            data: $.param(FormData),
            dataType: 'json',
            headers: {
                'Jwt': jwt
            }
        }).then(function successCallback(response) {
            try {
                var data = response.data;
                var error_code = data.error.error_code;
                if (data.auth_code == "100100") {
                    loader({message: "Session Expired", state: true});
                    window.location.hash = 'back_true';
                } else if (data.status == false && $.isNumeric(error_code)) {
                    loader({message: running_language.error_codes[error_code], state: true});
                } else {
                    loader({message: running_language.test_state, state: true});
//                loader({message:running_language.test_preparation, state:true});
                }
            } catch (exception) {
                cl(exception);
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
    }
});

app.filter('secondsToDateTime', function () {
    return function (countdown) {
        var d = new Date(0, 0, 0, 0, 0, 0, 0);
        d.setSeconds(countdown);
        return d;
    };
});


$("#close-sidebar").click(function () {
    $(".page-wrapper").removeClass("toggled");
});
$("#show-sidebar").click(function () {
    $(".page-wrapper").addClass("toggled");
});

function init_carousel() {
    let carousel_start_from = 0;
    let owl_configuration = {
        loop: false,
        margin: 10,
        nav: true,
        items: 1,
        dots: false,
        touchDrag: false,
        mouseDrag: false
    };
    localStorage.setItem("active_question_index_in_owl", carousel_start_from);
    owl_configuration.startPosition = carousel_start_from;
    owl.owlCarousel(owl_configuration);

    //bind keyboard to inputs start
    $(document).find('.numericKeypad').each(function () {
        $(this).keypad();
    });
    //bind keyboard to inputs end
}

//change question in owl from pallete
$(document).on("click", ".question_nav_pointer", function () {
    var slide_index = $(this).find("div").html();
    owl.trigger('to.owl.carousel', [(parseInt(slide_index) - 1), 300]);
});

$(document).on("click", ".attempt_answer", function () {
    let selector = $(this);
    switch (selector.parent().parent().attr("question_type")) {
        case "SC":
        case "TF":
            selector.siblings().removeClass("active");
            selector.addClass("active");
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

$(document).on("click", ".sections", function () {
    let section_id = $(this).attr("section_id");
    let index = $(".owl-stage").find("div[section_id=" + section_id + "]").parent().index();
    owl.trigger('to.owl.carousel', [index, 300]);
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
        loader({message: running_language.not_available, state: true});
        localStorage.setItem("full_screen_flag", false);
    }
}
if (document.addEventListener) {
    document.addEventListener('fullscreenchange', exitHandler, false);
    document.addEventListener('mozfullscreenchange', exitHandler, false);
    document.addEventListener('MSFullscreenChange', exitHandler, false);
    document.addEventListener('webkitfullscreenchange', exitHandler, false);
}

function exitHandler() {
    if (document.webkitIsFullScreen || document.mozFullScreen || document.msFullscreenElement !== null) {
        if (localStorage.getItem("full_screen_flag") == "true") {
            localStorage.setItem("full_screen_flag", false);
        } else {
            loader({message:running_language.not_available, state:true});
        }
    }
}

// $(window).blur(function () {
//     loader({message:running_language.window_warning, state:true});
// });

//$(window).on('beforeunload', function () {
//    return 'Are you sure you want to leave?';
//});
$(window).on('unload', function () {
    //save in local or on server event will called ever
});






/* Matching Question Section */
function matching_question_init(matching_options) {
//    console.log(matching_options);
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
/* Matching Question Section End */