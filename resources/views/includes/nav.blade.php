<div class="d-flex align-items-center header">
    <div class="d-flex align-items-center" style="width: 50%">
        <a href="/" class="header-title">Triệu phú IT</a>
    </div>
    <div class="d-flex flex-row-reverse align-items-center" style="width: 50%">
        @auth
            <a href="{!! route('logout') !!}">
                <i class="fa fa-power-off" aria-hidden="true"></i>
            </a>
            <span style="padding-right: 20px; user-select: none">{!! Auth::user()->name !!}</span>
        @endauth
    </div>
</div>
