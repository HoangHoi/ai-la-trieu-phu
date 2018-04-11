
let $countDownElement = $('#countdown');
let $countDownTemplateElement = $('#countdown-template');

const parser = /([0-9]{2})/gi;
const labels = ['minutes', 'seconds'];

// Parse countdown string to an object
const strfobj = (str) => {
    let parsed = str.match(parser),
        obj = {};
    labels.forEach(function(label, i) {
        obj[label] = parsed[i]
    });
    return obj;
}

// Return the time components that diffs
const diff = (obj1, obj2) => {
    let diff = [];
    labels.forEach(function(key) {
        if (obj1[key] !== obj2[key]) {
            diff.push(key);
        }
    });
    return diff;
}

const countDown = (calback) => {
    if (typeof timeOut == 'undefined') {
        return;
    }

    let finishTime = moment().add(timeOut, 's').format('YYYY/MM/DD HH:mm:ss'),
        template = _.template($countDownTemplateElement.html()),
        currDate = '00:00',
        nextDate = '00:00';

    // Build the layout
    let initData = strfobj(currDate);
    labels.forEach(function(label, i) {
        $countDownElement.append(template({
            curr: initData[label],
            next: initData[label],
            label: label
        }));
    });

    // Starts the countdown
    $countDownElement.countdown(finishTime, (event) => {
        let newDate = event.strftime('%M:%S'),
            data;
        if (newDate !== nextDate) {
            currDate = nextDate;
            nextDate = newDate;
            // Setup the data
            data = {
                'curr': strfobj(currDate),
                'next': strfobj(nextDate)
            };
            // Apply the new values to each node that changed
            diff(data.curr, data.next).forEach((label) => {
                let selector = '.%s'.replace(/%s/, label),
                    $node = $countDownElement.find(selector);
                // Update the node
                $node.removeClass('flip');
                $node.find('.curr').text(data.curr[label]);
                $node.find('.next').text(data.next[label]);
                // Wait for a repaint to then flip
                _.delay(($node) => {
                    $node.addClass('flip');
                }, 50, $node);
            });
        }
    }).on('finish.countdown', () => {
        if (typeof calback == 'function') {
            calback();
        }
        console.log('finish');
    });
};

const pauseCountDown = () => {
    $countDownElement.countdown('pause');
}

module.exports.countDown = countDown;
module.exports.pauseCountDown = pauseCountDown;
