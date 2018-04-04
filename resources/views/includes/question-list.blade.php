<div class="d-flex flex-column-reverse question-list">
    @for($i = 1; $i < 4; $i++)
        @for($j = ($i - 1)*5 + 1; $j <= $i*5; $j++)
            <div class="d-flex align-items-center question-item {!! $j == 3 ? 'active' : null !!}" id="question_{!! $j !!}">
                <span><i class="fa fa-file-code-o" aria-hidden="true"></i> Câu {!! $j !!}</span>
            </div>
        @endfor
        <div class="d-flex align-items-center question-group" id="group_question_{!! $i !!}">
            <span><i class="fa fa-folder-open" aria-hidden="true"></i> Gói câu hỏi {!! $i !!}</span>
        </div>
    @endfor
</div>
