<div class="container-fluid question-create">
    <form method="POST" action="{!! route('admin.questions.store') !!}">
        @csrf
        <div class="form-group">
            <label for="content">Nội dung câu hỏi</label>
            <textarea class="form-control" name="content" id="content"></textarea>
        </div>
        <div class="form-group">
            <label for="a">Đáp án A</label>
            <input type="text" class="form-control" name="a" id="a">
        </div>
        <div class="form-group">
            <label for="b">Đáp án B</label>
            <input type="text" class="form-control" name="b" id="b">
        </div>
        <div class="form-group">
            <label for="c">Đáp án C</label>
            <input type="text" class="form-control" name="c" id="c">
        </div>
        <div class="form-group">
            <label for="d">Đáp án D</label>
            <input type="text" class="form-control" name="d" id="d">
        </div>
        <div class="form-group">
            <label for="correct_answer">Đáp án đúng</label>
            <select class="form-control" name="correct_answer" id="correct_answer">
                <option value="a">Đáp án A</option>
                <option value="b">Đáp án B</option>
                <option value="c">Đáp án C</option>
                <option value="d">Đáp án D</option>
            </select>
        </div>
        <div class="form-group">
            <label for="level">Cấp độ</label>
            <select class="form-control" name="level" id="level">
                <option value="1">Dễ</option>
                <option value="2">Trung bình</option>
                <option value="3">Khó</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
</div>
