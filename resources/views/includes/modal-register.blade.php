<!-- Modal -->
<div class="modal fade" id="modal-register" tabindex="-1" role="dialog" aria-labelledby="modal-register-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-register-title">Thông tin của bạn</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{!! route('register') !!}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Họ và tên</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nhập họ và tên..." required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Nhập địa chỉ email..." required>
                    </div>
                    <div class="form-group">
                        <label for="school">Trường</label>
                        <input type="text" class="form-control" id="school" name="school" placeholder="Nhập tên trường đang học..." required>
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Số điện thoại</label>
                        <input type="number" class="form-control" id="phone_number" name="phone_number" placeholder="Nhập số điện thoại..." required>
                    </div>
                    <div class="form-group">
                        <label for="birth_year">Năm sinh</label>
                        <input type="number" class="form-control" id="birth_year" name="birth_year" placeholder="Nhập năm sinh..." required>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Đăng kí</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
