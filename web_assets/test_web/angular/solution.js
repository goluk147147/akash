function cl(p) {
    console.log(p);
}

var current_lang = 1;

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

loader({message: "Question is downloading", state: true});

app.controller('body_controller', function ($scope, $http, $timeout) {
    $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded; charset=UTF-8;";
    
    var url = base_url + "web/LiveTest/get_solution";
    var FormData = {
        user_id: user_id,
        test_id: test_id,
        course_id: course_id,
        first_attempt: first_attempt,
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
        res = response.data.data;
        $('.solution_element ').click();

        // $("input[name = 'csrf_name']").val(response.token);

        if(!res){
            loader({message: "Invalid Server Response", state: true});
            $('body').css("overflow","hidden");
            $('body').css("height","100%");
            return false;
        }
        
        $scope.test_series_name = res.test_series_name;
        $scope.user_rank = res.user_rank;
        /*
         user coins
         */
        if (res.reward_points > 0) {
            $('.coins_viewer').show();
        }
        $scope.reward_points = res.reward_points;
        $scope.result_date = timeConverter(res.result_date);
        $scope.total_attempt = res.total_user_attempt;
        $scope.score = res.marks;
        $scope.total_score = res.total_marks;
        $scope.cutoff = res.cutoff;
        $scope.cutoff_special_class = (res.cutoff != "0") ? "" : "hide";
        $scope.cutt_off_class = 'bg-success';
        $scope.cutt_off_h_class = ' text-success ';
        if ($scope.cutoff > $scope.score) {
            $scope.cutt_off_class = "bg-danger ";
            $scope.cutt_off_h_class = ' text-danger ';
        }
        if(res.lang_id) {
            let lang_available = (res.lang_id).split(",");
            
            if(lang_available.length == 1){
                lang = lang_available[0];
                $(".language_control").hide();
            }
            else
            {
                lang = lang_available[1];
            }
        }

        var change_lang = function (lang) {
            current_lang = lang;
        };


        $scope.question_viewer = res.questions.length != 0 ? res.questions : res.questions_hindi;
       
        if($scope.question_viewer.length == 0){
            loader({message: "Question Not Found..", state: true});
            return false;
        }
        
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
                else {
                    // $(this).hide();
                }
            });
            $scope.subject_correct_count = correct;
            $scope.subject_in_correct_count = in_correct;
            $scope.subject_un_attempt_count = un_attempt;
            $scope.subject_attempt_count = attempt;
            $scope.subject_booked_count = booked;
        };

        

        var init_test = function () {

            var html = "";
            var question_bank = (current_lang == 1) ? res.questions : res.questions_hindi;
            //console.log(res.questions_hindi);
            if(question_bank.length == 0){
                question_bank = res.questions_hindi;
            }
            
            angular.forEach(question_bank, function (question, index) {
                let indexCount = index + 1;
                let answers = question.answer.split(',');
                var question_length = "";
                var temp_question = question;
                switch (question.question_type) {
                    case "SC":
                    case "TF":
                    case "MC":
                        html += '<div class="qust-result"><h6>Q.'+indexCount+'<a href="javascript:void(0)" class="text-dark pdf_to" data-toggle="collapse" data-target="#demo_'+indexCount+'">'+paragraph(question)+'</a><br><div id="demo_'+indexCount+'" class="collapse show"><div class="q-opt ng-binding" ><div class="bg-white mt-2 p-2">';
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
                                }
        
                                html += '<div class="bg-white mt-2 p-2 attempt_answer ' + is_answered + '"><span class="q_no">' + i + '</span><p>' + removeTags(question["option_" + i]) + '</p></div>';
                            }
                        }
                        html += '</div>';
                        break;
                    case "MT":
                        let option = {};
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
                            html += `<div class="ui-draggable ui-draggable-handle">(` + parseInt(index) + ") " + value[0] + `</div>`;
                        });
                        html += `</div><div class="right_side_dragger">`;
                        $.each(option, function (index, value) {
                            html += `<div class="ui-droppable">(` + parseInt(answers[parseInt(index) - 1]) + ") " + value[1] + `</div>`;
                        });
                        html += `</div></div>`;
                        break;
                    case "FIB":
                        html += '<div class="qust-result"><h6>Q.'+indexCount+'<a href="javascript:void(0)" class="text-dark pdf_to" data-toggle="collapse" data-target="#demo_'+indexCount+'">'+paragraph(question)+'</a><br><div id="demo_'+indexCount+'" class="collapse show"><div class="q-opt ng-binding" ><div class="bg-white mt-2 p-2">';
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
                            html += '<div class="bg-white mt-2 p-2 attempt_answer ' + is_correct + '"><span class="q_no">' +  i + '</span><p>' + answered + '</p></div>';
                        }
                        html += '</div>';
                        break;
                    default:
                        "";
                        break;
                }
                if (question.description != "") {
                    html += '<div class="mt-2 mb-2 p-3"><h5>Solution</h5>' + question.description + '</p></div></div></div><hr></h6></div>';
                } else {
                    html += '</div></div><hr></h6></div>';
                }
                loader({message: "", state: false});
                $('.question-box-result').html(html);

                //reload math js
                MathJax.Hub.Queue(["Typeset", MathJax.Hub]);
            })
        }


        /*Language Setting*/
        $scope.lang_code = [
            {name: 'English', value: '1'},
            {name: 'Hindi', value: '2'},
        ];
        $scope.Lang = $scope.lang_code[lang - 1]; // red

        $scope.language_change_detected = function (lang_code) {
            if (lang_code == 1) {
                current_lang = 2;
            }
            else {
                current_lang = 1;
            }
            change_lang(current_lang);
            
            init_test();
        };

        init_test();

    });
    
});

function paragraph(question){
    
    let question_text = question.question;
    
    if (question.question_type == "FIB") {
        let input_exist_count = (question_text.match(new RegExp("FIB", "g")) || []).length;
        for (i = 1; i <= input_exist_count; i++) {
            question_text = question_text.replace("FIB", "..... ");
        }
    }
    return removeTags(question_text);
}

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
        var question_length = "";
        var temp_question = question;
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
                        }
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
                    html += `<div class="ui-draggable ui-draggable-handle">(` + parseInt(index) + ") " + value[0] + `</div>`;
                });
                html += `</div><div class="right_side_dragger">`;
                $.each(option, function (index, value) {
                    html += `<div class="ui-droppable">(` + parseInt(answers[parseInt(index) - 1]) + ") " + value[1] + `</div>`;
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
                    html += '<div class="bg-white mt-2 p-2 attempt_answer ' + is_correct + '"><span class="q_no">' +  i + '</span><p>' + answered + '</p></div>';
                }
                html += '</div>';
                break;
            default:
                "";
                break;
        }
        if (question.description != "") {
            html += '<div class="mt-2 mb-2 p-3"><h5>Solution</h5>' + question.description + '</p></div>';
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
                        text.push(64 + (index + 1));
                });
                break;
            case "MT":
                $.each(question.answers, function (index, value) {
                    if (parseInt(value) != 0)
                        text.push(parseInt(index) + 1 + ":" + parseInt(value) + "; ");
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

function timeConverter(UNIX_timestamp){
  var a = new Date(UNIX_timestamp * 1000);
  var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
  var year = a.getFullYear();
  var month = months[a.getMonth()];
  var date = a.getDate();
  var hour = a.getHours();
  var min = a.getMinutes();
  var sec = a.getSeconds();
  var time = date + ' ' + month + ' ' + year + ' ' + hour + ':' + min  ;
  return time;
}

$('#save_challenge').click(function(){
    let challenge_text = $("input[name='challenge_text']").val();
    let challenge_image = $("input[name='challenge_image']").val();
    let test_id = $("input[name='test_id']").val();
    let course_id = $("input[name='course_id']").val();
    let question_id = $("input[name='question_id']").val();
    if(!challenge_text){
//        alert('Please write your query.');
        show_toast('warning', 'Please write your query.', 'Fill required details');
        return false;
    }
    if (/^\s*$/.test(challenge_text)) {
    show_toast('warning', 'Please write your query.', 'Fill required details');
        return false;
}
     $.ajax({
      	data:{challenge_text:challenge_text,
            challenge_image:challenge_image,
            test_id:test_id,
            course_id:course_id,
            question_id:question_id,
            type:0,
            user_id:user_id
        },
         headers: {
            'Jwt': jwt
        },
      	type:'post',
      	url: base_url + "index.php/data_model/courses/test_series_v2/test_challenge",
//     	beforeSend: function () {
//            $('.bottom_loader').css({"display":"block"});
//        },
      	success:function(data){
            $('#challengeModal').modal('toggle');
            $('#'+question_id).hide();
//            window.location.reload();
//            console.log(data);return false;
      	},error:function(err){
        	alert('Something went wrong');
      	}
    });
});

		
	$("#image_file_global").on("change", function() {
//            jQuery.noConflict();	
	formdata = new FormData();
		var file = this.files[0];
		if (formdata) {
			formdata.append("image_file", file);
			$.ajax({
				url: base_url + "index.php/auth_panel/question_bank/question_bank/add_image",
				type: "POST",
				data: formdata,
                                dataType: 'json',
				processData: false,
				contentType: false,
				success:function(data){
                                    console.log(data.url);
                                    $("#challenge_image").val(data.url);
                                }
			});
		}						
	});	

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
