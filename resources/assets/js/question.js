let {getIncorrectMessage, getCorrectMessage, getFinishMessage} = require('./message');
let canContinue = true;

$('.question-answer').on('click', '.question-answer-item', (item) => {
    let answerId = $(item.currentTarget).data('id');
    $('#confirm-answer-key').html(answerId);
    $('#confirm-answer-modal').data('answer', answerId);
    $('#confirm-answer-modal').modal('show');
});

const drawQuestion = (question) => {
    $('#question-content').html(question.content);
    $('#question-answer-item-a').html(question.a);
    $('#question-answer-item-b').html(question.b);
    $('#question-answer-item-c').html(question.c);
    $('#question-answer-item-d').html(question.d);
};

const selectCurrentQuestion = (questionNumer) => {
    $('.question-item').removeClass('active');
    $('#question-' + questionNumer).addClass('active');
};

const nextQuestion = () => {
    axios.get(nextQuestionUrl)
        .then((response) => {
            drawQuestion(response.data);
            selectCurrentQuestion(response.data.number);
        })
        .catch((error) => {
            console.log(error);
        });
};

const stopTest = () => {
    canContinue = false;
};

const testComplete = () => {

};

const handleTimeOut = () => {

};

const correct = () => {
    $('.result').fadeIn(300, () => {
        $('#result-content').animateCss('zoomIn', () => {
            $('#result-content').fadeOut(300, () => {
                $('.result').fadeOut(200, () => {
                    $('#result-content').css('display', 'block');
                    questionNumber++;
                    return nextQuestion();
                });
            });
        });
    });
};

const showResult = (status, choose) => {
    console.log(questionNumber);
    let content;

    if (status == 'correct') {
        if (questionNumber < maxQuestion) {
            return correct();
        }

        content = getFinishMessage(choose);
    } else {
        content = getIncorrectMessage(choose);
    }

    stopTest();

    $('#result-modal-content').html(content);
    $('#result-modal').modal('show');
};

$('#result-modal').on('hidden.bs.modal', (e) => {
    console.log(canContinue, questionNumber, maxQuestion);
    if (!canContinue) {
        return window.location.replace(homeUrl);
    }
});

$('#submit-answer').on('click', () => {
    $('#confirm-answer-modal').modal('hide');
    let answerId = $('#confirm-answer-modal').data('answer');
    let data = {
        answer: answerId
    };
    axios.post(answerUrl, data)
        .then((response) => {
            showResult(response.data.status, response.data.choose);
        })
        .catch((error) => {
            console.log(error);
        });
});

module.exports.handleTimeOut = handleTimeOut;
