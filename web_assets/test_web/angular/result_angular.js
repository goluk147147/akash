function cl(p) {
    console.log(p);
}

var app = angular.module('myApp', ['ngSanitize']);

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

var question_dump = [];

function loader(config) {
    if (!$(".close_screen").is(":visible")) {
        if (config.message != undefined)
            $(".loader p").text(config.message);
        (config.state == true) ? $(".loader").show() : $(".loader").hide();
    }
}

loader({message: "Result is downloading", state: true});

app.controller('body_controller', function ($scope, $http, $timeout) {
    $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded; charset=UTF-8;";
    
    var url = base_url + "web/LiveTest/get_test_result";
    var FormData = {
        user_id: user_id,
        test_id: test_id,
        course_id: course_id,
        first_attempt: first_attempt,
        state: state,
        csrf_name : $('input[name = "csrf_name"]').val(),
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
    }).then(function (response) {
        console.log(response);
        res = response.data.data;
        // $("input[name = 'csrf_name']").val(response.token);

        if(!res){
            // window.location.href = '/';
            loader({message: "Invalid Server Response", state: true});
            $('body').css("overflow","hidden");
            $('body').css("height","100%");
            return;
        }

        if(!response.data.status){
            loader({message: "Result Not Found..", state: true});
            $('body').css("overflow","hidden");
            $('body').css("height","100%");
            return;
        }
        
        $scope.test_series_name = res.test_series_name;
        $scope.user_rank = res.user_rank;
        /*
         user coins
         */
        if (res.reward_points > 0) {
            $('.coins_viewer').show();
        }

        if(FormData.first_attempt == 0){
            $('.accuracy').hide();
            $('.percentile').hide();
        }
        $scope.reward_points = res.reward_points;
        $scope.correct_count = res.correct_count;
        $scope.incorrect_count = res.incorrect_count;
        $scope.result_date = timeConverter(res.result_date);
        $scope.total_attempt = res.total_user_attempt;
        $scope.total_un_attempt = res.non_attempt;
        $scope.score = res.marks;
        $scope.total_score = res.total_marks;
        $scope.total_user_attempt = res.total_user_attempt;
        $scope.cutoff = res.cutoff;
        $scope.cutoff_special_class = (res.cutoff != "0") ? "" : "hide";
        $scope.cutt_off_class = 'bg-success';
        $scope.cutt_off_h_class = ' text-success ';
        if ($scope.cutoff > $scope.score) {
            $scope.cutt_off_class = "bg-danger ";
            $scope.cutt_off_h_class = ' text-danger ';
        }
       var d = Math.floor(Date.now() / 1000); // for now
       $scope.thanks_message = '';
        if(res.result_date == 0 ){//instant
            $scope.solution_class = ' ';
            $scope.performance_class = 'show'
            $scope.questions_class = 'show';
            $scope.performance_owl = 'owl-carousel';
            $scope.result_statement = 'hide';
            $scope.thank_statement = 'hide';
            $scope.challenge_class = 'hide';
            $('.showHideContent').hide();
            cl('show reult instant');
        }else if(res.result_date == 1){
            $scope.solution_class = 'active ';
            $scope.performance_class = 'hide'
            $scope.questions_class = 'hide';
            $scope.performance_owl = '';
            $scope.result_statement = 'hide';
            $scope.thank_statement = 'show';
            $scope.thanks_message = 'Thank you. Your Test has been submitted successfully.';
            $scope.challenge_class = 'show';
            cl('never  reult');
        }else if(res.result_date > d){//greater date
            if(FormData.first_attempt == 0){
                $scope.performance_class = 'show';
                $scope.questions_class = 'show';
                $scope.result_statement = 'hide';
                $scope.users_rank = 'hide';
                $scope.performance_owl = 'owl-carousel';
                $('.result_notification').css('display','content');
                $('.solution_element').css('display','none');

            } else {
                $scope.solution_class = 'hide';
                $scope.performance_class = 'hide'
                $scope.questions_class = 'hide';
                $scope.performance_owl = '';
                $scope.result_statement = 'show';
                $scope.thank_statement = 'hide';
                $scope.challenge_class = 'show';
                $('#question_show').click();
                $('.solution_element').css('display','none');
                cl('show result date greater');
            }
            
        }else if(res.result_date < d){//greater date
            $scope.solution_class = ' ';
            $scope.performance_class = 'show';
            $scope.questions_class = 'show';
            $scope.performance_owl = 'owl-carousel';
            $scope.result_statement = 'hide';
            $scope.thank_statement = 'hide';
            $scope.challenge_class = 'hide';
            cl('show result date lesser');
        }else{
            $scope.solution_class = ' ';
            $scope.performance_class = 'show';
            $scope.questions_class = 'show';
            $scope.performance_owl = 'owl-carousel';
            $scope.result_statement = 'hide';
            $scope.thank_statement = 'hide';
            $scope.challenge_class = 'hide';
            cl('show result');
        }

        if(!res.state){
            loader({message: "", state: false});
        }

        if(res.user_rank == null) {
            $("#dynamicChange").hide();
            $('.solution_element').css('display','none');
        }

        $scope.percentile = (parseFloat(res.percentile)).toFixed(2);
        $scope.percentage = (parseFloat(res.percentage)).toFixed(2);
        $scope.best_score = parseFloat(res.best_score).toFixed(2);
        $scope.avg_score = (Math.abs(res.avg_score)).toFixed(2);

        if(($scope.percentage) && $scope.percentage <= 30){
            $scope.percentage_status = "Need to do work hard";
        } else if(($scope.percentage) && $scope.percentage >= 30 && $scope.percentage <= 70) {
            $scope.percentage_status = "You can improve yourself";
        } else if(($scope.percentage) && $scope.percentage >= 70 && $scope.percentage <= 90) {
            $scope.percentage_status = "Good work";
        }  else if(($scope.percentage) && $scope.percentage >= 90 && $scope.percentage <= 100) {
            $scope.percentage_status = "Excellent work";
        } else {
            $scope.percentage_status = "Not bad better luck next time";
        }
        if (res.avg_score < 0) {
            $scope.avg_score = "-" + $scope.avg_score;
        }
        $scope.toper_list = res.top_ten_list;
        if(res.question_dump){
            $scope.total_question_dump = res.question_dump.length;

        }
        $scope.total_answered = 0;
        $scope.test_total_time = parseFloat(res.time_in_mins);
        $scope.is_reattempt = (res.is_reattempt == "1") ? "" : "hide";
        
        //$scope.taken_total_time = (parseInt(res.time_in_mins) * 60) - parseInt(res.time_remain);
        $scope.taken_total_time = 0;
        question_dump = res.question_dump;
        $.each(res.question_dump, function (index, value) {
            if (value.state == "answered" || value.state == "bookmarked")
                ++$scope.total_answered;
        //$scope.taken_total_time += value.on_screen;
        });
        $scope.accuracy = ($scope.total_answered == 0) ? 0 : ((parseFloat(res.correct_count) / $scope.total_answered) * 100).toFixed(2);
        
        
        $.each(res.test_sections, function (index, value) { 
            $scope.taken_total_time += value.time_spent;
        });


        $scope.test_sections = res.test_sections;
        if($scope.test_sections) {
            $scope.selected_section_item = res.test_sections[0].id;

        }
        if (res.report_origin == "2") {
            $('#sectional_summery,.result-cuttoff').show();
        } else if (res.report_origin == "1") {
            $('#quick_summery, #result_navigation').show();
        }
        $scope.question_viewer = res.questions;
        
        $scope.question_view = function () {
            let correct = 0;
            let in_correct = 0;
            let un_attempt = 0;
            let attempt =0;
            let booked = 0;
            $.each($(".question-box-result").children(), function (index, div) {
                let state = $(this).find("span span.question_status").text();
                let bookmarked = $(this).find("span span.question_status_bookmark").text();
                $(this).show();
                let section = $(this).data('section');
                if (section == $scope.selected_section_item){
                    if(bookmarked == "|| BOOKMARKED"){
                        ++booked;
                    }
                }
                if (section == $scope.selected_section_item)
                    switch (state) {
                        case "UNATTEMPT":
                            ++un_attempt;
                            break;
                        case "CORRECT":
                            ++correct;
                            ++attempt;
                            break;
                        case "INCORRECT":
                            ++in_correct;
                            ++attempt;
                            break;
                    }
                else
                    $(this).hide();
            });
            $scope.subject_correct_count = correct;
            $scope.subject_in_correct_count = in_correct;
            $scope.subject_un_attempt_count = un_attempt;
            $scope.subject_attempt_count = attempt;
            $scope.subject_booked_count = booked;
        };
    });
    
});

app.filter('htmlToPlaintext', function () {
    return function (text) {
        var text = text.replace(/&nbsp;/, ' ');
        return  text ? String(text).replace(/<[^>]+>/gm, '') : '';
    };
});

app.filter('questionImage', function () {
    return function (text) {
        text = text.trim();
        return  text ? text : 'Contains Images';
    };
});

function seconds_to_time(seconds) {
    var time = parseInt(seconds);
    let hours = Math.floor(time / 60);
    return ((hours < 10) ? 0 + "" + hours : hours) + ':' + ('0' + Math.floor(time % 60)).slice(-2);
}

app.filter('secondsToMinutes', function () {
    return function (time) {
        return seconds_to_time(time);
    };
});

app.filter('find_on_screen_time', function () {
    return function (config_id) {
        let dump_object = question_dump.filter(function (question_dump) {
            return question_dump.config_id == config_id
        });
        return seconds_to_time(dump_object[0].on_screen);
    }
});

app.filter('show_state', function () {
    return function (v) {
        if (v.answers.length == 0) {
            return "<span class='question_status pl-2 text-default'>UNATTEMPT</span>";
        } else if (v.is_correct == 1) {
            return "<span class='question_status pl-2 text-success'>CORRECT</span>";
        } else if (v.is_correct == 0 && v.state == 'answered') {
            return "<span class='question_status pl-2 text-danger'>INCORRECT</span>";
        } else if (v.is_correct == 0 && v.state == 'mark_for_review') {
            return "<span class='question_status pl-2 text-danger'>MARK FOR REVIEW</span>";
        } else if (v.answers.length != 0) {
            return "<span class='question_status pl-2 text-danger'>ATTEMPT</span>";
        }
    };
});

app.filter('show_bookmarked',function(){
    return function(q){
       if (q.is_bookmarked == 1) {
            return "<span class='question_status_bookmark pl-2 text-default'>|| BOOKMARKED</span>";
        }else{
            return "<span class='question_status_bookmark pl-2 text-default'></span>";
        }
    }
});

app.filter('show_marks',function(){
    return function(q){
       if (q.marks_per_question) {
            return "<span class='question_marks pl-2 text-default'>|| Marks: ("+"+"+q.marks_per_question+",-"+q.negative_marks+")</span>";
        }
    }
});

app.filter('grep_options', function () {
    return function (question) {
        var html = "";
        let answers = question.answer.split(',');
        let userAnswer = question.answers;
        var temp_question = question;
        var question_length = "";

        switch (question.question_type) {
            case "SC":
            case "TF":
            case "MC":
                html += '<div class="bg-white mt-2 p-2">';

                //count question length
                for( temp_question in temp_question ) {
                    if( temp_question.indexOf( "option_" ) > -1 ) {
                        question_length++;
                    }
                }
                for (let i = 1; i <= question_length; i++) {
                    if (question["option_" + i] != "") {
                        let is_answered = "";
                        if ($.inArray(i.toString(), answers) !== -1) {
                            is_answered = "active";
                        } else {
                            if (userAnswer[i-1] > 0) {
                                is_answered = "wrong";
                            }
                        } 
                        // if ($.inArray(i.toString(), userAnswer) == 1) {
                        //     is_answered = "wrong";
                        // } 
                        
                        // Chracter
                        // html += '<div class="bg-white mt-2 p-2 attempt_answer ' + is_answered + '"><span class="q_no">' + String.fromCharCode(64 + i) + '</span><p>' + removeTags(question["option_" + i]) + '</p></div>';

                        html += '<div class="bg-white mt-2 p-2 attempt_answer ' + is_answered + '"><span class="q_no">' + i + '</span><p>' + removeTags(question["option_" + i]) + '</p></div>';
                    }
                }
                html += '</div>';
                break;
            case "MT":
                let option = {};
                //count question length
                for( temp_question in temp_question ) {
                    if( temp_question.indexOf( "option_" ) > -1 ) {
                        question_length++;
                    }
                }
                for (let i = 1; i <= question_length; i++) {
                    if (question["option_" + i] != "##") {
                        option[i] = question["option_" + i].split('##');
                    }
                }
                html += `<div class="dragger_content"><div class="left_side_dragger">`;
                $.each(option, function (index, value) {
                    html += `<div class="ui-draggable ui-draggable-handle">(` + parseFloat(index) + ") " + value[0] + `</div>`;
                });
                html += `</div><div class="right_side_dragger">`;
                $.each(option, function (index, value) {
                    html += `<div class="ui-droppable">(` + parseFloat(answers[parseFloat(index) - 1]) + ") " + value[1] + `</div>`;
                });
                html += `</div></div>`;
                break;
            case "FIB":
                html += '<div class="bg-white mt-2 p-2">';
                let input_exist_count = (question.question.match(new RegExp("FIB", "g")) || []).length;
                for (i = 1; i <= input_exist_count; i++) {
                    let option = JSON.parse(question["option_" + i]);
                    let answered = (answers[i - 1] != undefined && answers[i - 1] != 0) ? answers[i - 1] : "";
                    let is_correct = "";
                    if (option.type == "number") {
                        if (answered != "" && parseFloat(option.min) > parseFloat(answered) && parseFloat(option.min) < parseFloat(answered))
                            is_correct = "success";
                        else
                            is_correct = "active";
                        answered = "Min Value: " + option.min + " & Max Value: " + option.max;
                    } else if (option.type == "character") {
                        if (answered != "" && parseFloat(option.min) > answered.length && parseFloat(option.min) < answered.length)
                            is_correct = "success";
                        else
                            is_correct = "active";
                        answered = "Min Text Length: " + option.min + " & Max Text Length: " + option.max;
                    } else if (option.type == "answer") {
                        if (answered != "" && option.answer == answered)
                            is_correct = "success";
                        else
                            is_correct = "active";
                        answered = "Answer: " + option.answer;
                    }
                    html += '<div class="bg-white mt-2 p-2 attempt_answer ' + is_correct + '"><span class="q_no">' + i + '</span><p>' + answered + '</p></div>';
                }
                html += '</div>';
                break;
            default:
                "";
                break;
        }
        if (question.description != "") {
            html += '<div class="mt-2 mb-2 p-3"><h5>Solution</h5>' + removeTags(question.description) + '</p></div>';
        }
        loader({message: "", state: false});
        return html;
    }
});

app.filter('grep_question_type', function () {
    return function (type) {
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
    };
});

app.filter('your_answer', function () {
    return function (question) {
        let text = [];
//        console.log(question);
        switch (question.question_type) {
            case "SC":
            case "MC":
            case "TF":
                $.each(question.answers, function (index, value) {
                    if (value == 1)
                        text.push((index + 1));
                });
                break;
            case "MT":
                $.each(question.answers, function (index, value) {
                    if (parseFloat(value) != 0)
                        text.push(parseFloat(index) + 1 + ":" + 64 + parseFloat(value) + "; ");
                });
                html = "Matching";
                break;
            case "FIB":
                $.each(question.answers, function (index, value) {
                    if (value != "")
                        text.push(value);
                });
                break;
        }
        
        if (text.length == 0)
//            return "N/A";
    if(question.state == "not_answered" || question.state == "mark_for_review"){
        return "Not Answered";
    }else{
            return "Not Visited";
        }
        else
            return text.join(",");
    };
});

app.filter("html_fib", function () {
    return function (question) {
        let question_text = question.question;
        if (question.question_type == "FIB") {
            let input_exist_count = (question_text.match(new RegExp("FIB", "g")) || []).length;
            for (i = 1; i <= input_exist_count; i++) {
                question_text = question_text.replace("FIB", "..... ");
            }
        }
        return removeTags(question_text);
    }
});

$(".solutions-filter button").click(function () {
    let text = $(this).data('text');
    $.each($(".question-box-result").children(), function () {
        let selector = $(this);
//        cl(text);return false;
        if(text == "ATTEMPT"){
            if (selector.find("span.question_status").text() == "INCORRECT" && $(".subject_selector").val() == selector.data('section') || selector.find("span.question_status").text() == "CORRECT" && $(".subject_selector").val() == selector.data('section'))
            selector.show();
        else
            selector.hide();
        }else if(text == "ALL"){
            selector.show();
        }else if(text == "BOOKMARKED"){
           if (selector.find("span.question_status_bookmark").text() == "|| BOOKMARKED" && $(".subject_selector").val() == selector.data('section'))
            selector.show();
        else
            selector.hide();
        }else{
        if (selector.find("span.question_status").text() == text && $(".subject_selector").val() == selector.data('section'))
            selector.show();
        else
            selector.hide();
    }
    });
});

  $("body").on('click', '.challenge', addEditButton);

function addEditButton(){
    $('#challenge_form')[0].reset();
    let test_id = $(this).data('test');
    let question_id = $(this).data('question');
    let course_id = $(this).data('course');
    $("input[name='test_id']").val(test_id);
    $("input[name='course_id']").val(course_id);
    $("input[name='question_id']").val(question_id);
    console.log(test_id+'  '+course_id+' '+question_id);
    $('#challengeModal').modal();
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


// function timeConverter(UNIX_timestamp){
//   var a = new Date(UNIX_timestamp * 1000);
//   var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
//   var year = a.getFullYear();
//   var month = months[a.getMonth()];
//   var date = a.getDate();
//   var hour = a.getHours();
//   var min = a.getMinutes();
//   var sec = a.getSeconds();
//   var time = date + ' ' + month + ' ' + year + ' ' + hour + ':' + min  ;
//   return time;
// }

function timeConverter(UNIX_timestamp){
    var now = new Date(UNIX_timestamp * 1000);
    var mins = 5;//set to now.getMinutes()
    mins = mins < 10 ? "0"+mins : mins;

    var hours = now.getHours();
    var minutes = now.getMinutes();
    var ampm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    minutes = minutes < 10 ? '0'+minutes : minutes;

    var time = hours + ':' + minutes + ' ' + ampm;
    
    var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    // time = time, now.getSeconds();

    // date = [now.getDate(),
    //     months[now.getMonth()],
    //     now.getFullYear()].join(" ");
    var getdate = now.getDate();
    var getmonth = now.getDate();
    if (now.getDate() < 10) {
        getdate = "0" + now.getDate();
    }
    if ((now.getMonth()+1) < 10) {
        getmonth = "0" + (now.getMonth()+1);
    }
    
    date = [getdate,
        getmonth,
        now.getFullYear()].join("-");

    return [date, time].join(" ");
}
