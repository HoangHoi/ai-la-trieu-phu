<div class="question-container">
    <div class="question-content" id="question-content">
        {!! $question['data']['content'] !!}
    </div>
    <div class="d-flex flex-wrap question-answer">
        <div class="question-answer-item" data-id="a">
            <span style="font-weight: 900;">A. </span><span id="question-answer-item-a">{!! $question['data']['a'] !!}</span>
        </div>
        <div class="question-answer-item" data-id="b">
            <span style="font-weight: 900;">B. </span><span id="question-answer-item-b">{!! $question['data']['b'] !!}</span>
        </div>
        <div class="question-answer-item" data-id="c">
            <span style="font-weight: 900;">C. </span><span id="question-answer-item-c">{!! $question['data']['c'] !!}</span>
        </div>
        <div class="question-answer-item" data-id="d">
            <span style="font-weight: 900;">D. </span><span id="question-answer-item-d">{!! $question['data']['d'] !!}</span>
        </div>
    </div>
</div>

<!-- Confirm Modal -->
<div class="modal fade" id="confirm-answer-modal" tabindex="-1" role="dialog" aria-labelledby="confirm-answer-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body" style="font-size: 23px;">
                <span>Bạn có chắc chắn lựa chọn phương án <span id="confirm-answer-key" style="font-weight: 900; text-transform: uppercase;"></span></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Chưa chắc</button>
                <button type="button" class="btn btn-success" id="submit-answer">Chắc chắn</button>
            </div>
        </div>
    </div>
</div>

<!-- Stop Modal -->
<div class="modal fade" id="result-modal" tabindex="-1" role="dialog" aria-labelledby="result-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body" style="font-size: 23px;" id="result-modal-content">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Đồng ý</button>
            </div>
        </div>
    </div>
</div>
