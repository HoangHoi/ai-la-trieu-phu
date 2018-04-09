$('.question-answer').on('click', '.question-answer-item', (item) => {
    let answerId = $(item.currentTarget).data('id');
    $('#confirm-answer-key').html(answerId);
    $('#confirm-answer-modal').data('answer', answerId);
    $('#confirm-answer-modal').modal('show');
});

let drawQuestion = (question) => {
    $('#question-content').html(question.content);
    $('#question-answer-item-a').html(question.a);
    $('#question-answer-item-b').html(question.b);
    $('#question-answer-item-c').html(question.c);
    $('#question-answer-item-d').html(question.d);
};

let selectCurrentQuestion = (questionNumer) => {
    $('.question-item').removeClass('active');
    $('#question-' + questionNumer).addClass('active');
};

let nextQuestion = () => {
    axios.get(nextQuestionUrl)
        .then((response) => {
            drawQuestion(response.data);
            selectCurrentQuestion(response.data.number);
        })
        .catch((error) => {
            console.log(error);
        });
};

let stopTest = () => {
    $('#stop-modal').modal('show');
};

$('#stop-modal').on('hidden.bs.modal', (e) => {
    console.log('redirect');
});

$('#submit-answer').on('click', () => {
    $('#confirm-answer-modal').modal('hide');
    let answerId = $('#confirm-answer-modal').data('answer');
    let data = {
        answer: answerId
    };
    axios.post(answerUrl, data)
        .then((response) => {
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
