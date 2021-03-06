let correctAnswerMessages = [
    'Câu trả lời hoàn toàn chính xác.',
    '<b>:choose:</b> là câu trả lời đúng',
    'Bạn thật xuất sắc! <b>:choose:</b> là đáp án đúng',
    'Chúc mừng bạn! Đáp án đúng là <b>:choose:</b>',
    'Câu trả lời chính xác',
    'Vâng! Đáp án đúng là <b>:choose:</b>. Xin chúc mừng!'
];

let inCorrectAnswerMessages = [
    'Rất tiếc! <b>:choose:</b> không phải là đáp án đúng',
    'Rất tiếc! Câu trả lời của bạn chưa chính xác.',
    'Câu trả lời của bạn chưa đúng.'
];

let thankMessages = [
    'Cảm ơn bạn đã tham gia chương trình!',
    // 'Cảm ơn bạn!',
];

let rightAnswerMessages = [
    'Bạn đã dừng lại ở câu hỏi số :number:',
    'Bạn đã trả lời được :number: câu hỏi'
];

let goodByeMessages = [
    'Chúc bạn luôn thành công trong cuộc sống.',
    'Hẹn gặp lại bạn vào lần sau.'
];

let correctQuestionMesage = 'Bạn đã dừng lại ở câu hỏi số  <b>:number:</b>.';

const randomIndex = (length) => {
    return Math.floor((Math.random() * length));
};

const getIncorrectMessage = (choose) => {
    let inCorrectAnswerMessage = inCorrectAnswerMessages[randomIndex(inCorrectAnswerMessages.length)].replace(/:choose:/g, choose);
    let rightAnswerMessage = rightAnswerMessages[randomIndex(rightAnswerMessages.length)].replace(/:number:/g, questionNumber - 1);
    let thankMessage = thankMessages[randomIndex(thankMessages.length)];
    let goodByeMessage = goodByeMessages[randomIndex(goodByeMessages.length)];
    return inCorrectAnswerMessage + '<br/>' + rightAnswerMessage + '<br/>' + thankMessage + '<br/>' + goodByeMessage;
};

const getCorrectMessage = (choose) => {
    let correctAnswerMessage = correctAnswerMessages[randomIndex(correctAnswerMessages.length)];
    return correctAnswerMessage.replace(/:choose:/g, choose);
};

const getFinishMessage = (choose) => {
    let message = 'Xin chúc mừng! <br/> Bạn đã vượt qua :number: câu hỏi của chúng tôi.'.replace(/:number:/g, questionNumber - 1);
    let thankMessage = thankMessages[randomIndex(thankMessages.length)];
    let goodByeMessage = goodByeMessages[randomIndex(goodByeMessages.length)];
    return message + '<br/>' + thankMessage + '<br/>' + goodByeMessage;
};

const getTimeOutMessage = () => {
    let message = 'Hết giờ!';
    let correct = 'Bạn đã vượt qua :number: câu hỏi của chúng tôi.'.replace(/:number:/g, questionNumber - 1);
    let thankMessage = thankMessages[randomIndex(thankMessages.length)];
    let goodByeMessage = goodByeMessages[randomIndex(goodByeMessages.length)];
    return message + '<br/>' + correct + '<br/>' + thankMessage + '<br/>' + goodByeMessage;
};

module.exports.getIncorrectMessage = getIncorrectMessage;
module.exports.getCorrectMessage = getCorrectMessage;
module.exports.getFinishMessage = getFinishMessage;
module.exports.getTimeOutMessage = getTimeOutMessage;
