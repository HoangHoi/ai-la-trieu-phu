<div class="d-flex flex-row-reverse align-items-center header">
    @auth
        <a href="{!! route('logout') !!}">
            <i class="fa fa-power-off" aria-hidden="true"></i>
        </a>
        <span style="padding-right: 20px; user-select: none">{!! Auth::user()->name !!}</span>
    @endauth
</div>
