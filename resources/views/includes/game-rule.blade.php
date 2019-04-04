<div class="info-container">
    <div class="info">
            <ul>
                <li>Bạn có 7 phút để trả lời 15 câu hỏi.</li>
                <li>Có 3 mốc quan trọng 5, 10, 15 tương ứng với 3 phần quà.</li>
                <li>Mức độ khó của câu hỏi tăng dần.</li>
                <li>Bạn trả lời càng được nhiều câu hỏi thì phần quà có giá trị càng lớn.</li>
            </ul>
    </div>
    @include('includes.viblo')
    <div class="d-flex justify-content-center">
        <div class="start-button">
            <a href="{!! route('questions.index') !!}"><span>Chơi luôn >></span></a>
        </div>
    </div>
</div>
