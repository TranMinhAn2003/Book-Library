@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('user.edit',$user->id)}}" method="get" enctype="multipart/form-data">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-2">
            </div>
            <div class="col-lg-8">
                <div class="ibox">
                    <div class="ibox-title">
                        <h4>Thông tin người dùng</h4>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Tên người dùng  <span class="text-danger">(*)</span></label>
                                    <input type="text" name="name" class="form-control" value="{{$user->name}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row mb10 mr10">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <div class="form-row ">
                                    <label for="" class="control-label text-right">Email <span class="text-danger">(*)</span></label>
                                    <input type="text" name="email" class="form-control" value="{{$user->email}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row mb10 mr10">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Số điện thoại<span class="text-danger">(*)</span></label>
                                    <input type="text" name="page" class="form-control" value="{{ $user->phone }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row mb10 mr10">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <div class="form-row">
                                    <label for="" class="control-label text-right"> Giới tính<span class="text-danger">(*)</span></label>
                                    <input type="text" name="year_written" class="form-control" value="{{$user->gender}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row mb10 mr10">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Năm sinh<span class="text-danger">(*)</span></label>
                                    <input type="date" name="year_published" class="form-control" value="{{$user->birthday}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row mb10 mr10">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Địa chỉ<span class="text-danger">(*)</span></label>
                                    <input type="text" name="address" class="form-control" value="{{$user->address}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row text-right  ">
                            <button class="btn btn-primary">Sửa</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>



