let {getIncorrectMessage, getCorrectMessage} = require('./message');
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
    // $('#result-modal').modal('show');
};

const showResult = (status, choose) => {
    let content = status == 'correct' ? getCorrectMessage(choose) : getIncorrectMessage(choose);
    $('#result-modal-content').html(content);
    $('#result-modal').modal('show');
};

$('#result-modal').on('hidden.bs.modal', (e) => {
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
            if (response.data.status == 'correct') {
                questionNumber++;
                return nextQuestion();
            }

            return stopTest();
        })
        .catch((error) => {
            console.log(error);
        });
});
