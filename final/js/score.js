    $("form").submit(function(event) {

        event.preventDefault();

        //Get answers
        var guess = $("input[name='guessedname']").val().trim();


        console.log(guess);

        $("#waiting").html("<img src='img/loading.gif' alt='submitting data' />");
        $("#input[type='submit']").css("display", "none");

        $.ajax({
            type : "POST",
            url  : "quiz_Stats_api.php",
            dataType : "json",
            data : {"score" : score },
            success : function(data){
                console.log(data);
                $("#correctTotal").html(data.times);
                $("#incorrectTotal").html(data.average);
                $("#feedback").css("display", "block");
                $("#wating").html("");
                $("input[type='submit']").css("display", "");
            },
            complete: function(data,status) { //optional, used for debugging purposes
               //alert(data);
               //alert(status);
               console.log(data);
            }
        
        });//AJAX

    }); //formSubmit

    //Styles a question as answered correctly
    function correctAnswer(questionFeedback){
        questionFeedback.html("Correct! ");
        questionFeedback.addClass("correct");
        questionFeedback.removeClass("incorrect");
        score++;
    }

    //Styles a question as answered incorrectly
    function incorrectAnswer(questionFeedback){
        questionFeedback.html("Incorrect! ");
        questionFeedback.addClass("incorrect");
        questionFeedback.removeClass("correct");
    }

}); //documentReady