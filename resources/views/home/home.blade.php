@if (session('flash_notification'))
    @foreach (session('flash_notification') as $message)
        <div class="alert alert-{{ $message->level }}">
            {{ $message->message }}
        </div>
    @endforeach
@endif


{{--<div class="row">--}}
{{--    <div class="col-md-3">--}}
{{--        <div class="ibox">--}}
{{--            <div class="ibox-content product-box">--}}

{{--                <div class="product-imitation">--}}
{{--                    [ INFO ]--}}
{{--                </div>--}}
{{--                <div class="product-desc">--}}
{{--                                <span class="product-price">--}}
{{--                                    $10--}}
{{--                                </span>--}}
{{--                    <small class="text-muted">Category</small>--}}
{{--                    <a href="#" class="product-name"> Product</a>--}}
{{--                    <div class="small m-t-xs">--}}
{{--                        Many desktop publishing packages and web page editors now.--}}
{{--                    </div>--}}
{{--                    <div class="m-t text-righ">--}}

{{--                        <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="col-md-3">--}}
{{--        <div class="ibox">--}}
{{--            <div class="ibox-content product-box">--}}

{{--                <div class="product-imitation">--}}
{{--                    [ INFO ]--}}
{{--                </div>--}}
{{--                <div class="product-desc">--}}
{{--                                <span class="product-price">--}}
{{--                                    $10--}}
{{--                                </span>--}}
{{--                    <small class="text-muted">Category</small>--}}
{{--                    <a href="#" class="product-name"> Product</a>--}}



{{--                    <div class="small m-t-xs">--}}
{{--                        Many desktop publishing packages and web page editors now.--}}
{{--                    </div>--}}
{{--                    <div class="m-t text-righ">--}}

{{--                        <a href="#" class="btn-setup btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="col-md-3">--}}
{{--        <div class="ibox">--}}
{{--            <div class="ibox-content product-box active">--}}

{{--                <div class="product-imitation">--}}
{{--                    [ INFO ]--}}
{{--                </div>--}}
{{--                <div class="product-desc">--}}
{{--                                <span class="product-price">--}}
{{--                                    $10--}}
{{--                                </span>--}}
{{--                    <small class="text-muted">Category</small>--}}
{{--                    <a href="#" class="product-name"> Product</a>--}}



{{--                    <div class="small m-t-xs">--}}
{{--                        Many desktop publishing packages and web page editors now.--}}
{{--                    </div>--}}
{{--                    <div class="m-t text-righ">--}}

{{--                        <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="col-md-3">--}}
{{--        <div class="ibox">--}}
{{--            <div class="ibox-content product-box">--}}

{{--                <div class="product-imitation">--}}
{{--                    [ INFO ]--}}
{{--                </div>--}}
{{--                <div class="product-desc">--}}
{{--                                <span class="product-price">--}}
{{--                                    $10--}}
{{--                                </span>--}}
{{--                    <small class="text-muted">Category</small>--}}
{{--                    <a href="#" class="product-name"> Product</a>--}}



{{--                    <div class="small m-t-xs">--}}
{{--                        Many desktop publishing packages and web page editors now.--}}
{{--                    </div>--}}
{{--                    <div class="m-t text-righ">--}}

{{--                        <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
