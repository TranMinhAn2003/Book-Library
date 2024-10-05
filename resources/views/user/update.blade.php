@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('user.update',$user->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-2">
            </div>
            <div class="col-lg-8">
                <div class="ibox">
                    <div class="ibox-title">
                        <h4> Sửa thông tin người dùng</h4>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Tên người dùng  <span class="text-danger">(*)</span></label>
                                    <input type="text" name="name" class="form-control" value="{{$user->name}}" >
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
                                    <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" >
                                </div>
                            </div>
                        </div>
                        <div class="row mb10 mr10">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <div class="form-row">
                                    <label for="" class="control-label text-right"> Giới tính<span class="text-danger">(*)</span></label>
                                    <?php
                                    $genders=[
                                        '[Giới tính]','Nam','Nữ'
                                    ]
                                    ?>
                                    <select name="gender"  class="form-control" >
                                        @foreach($genders as $gender)
                                            <option value="{{ $gender }}" {{ $gender === $user->gender ? 'selected' : '' }}>
                                                {{ $gender }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb10 mr10">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Năm sinh<span class="text-danger">(*)</span></label>
                                    <input type="date" name="birthday" class="form-control" value="{{$user->birthday}}" >
                                </div>
                            </div>
                        </div>
                        <div class="row mb10 mr10">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Địa chỉ<span class="text-danger">(*)</span></label>
                                    <input type="text" name="address" class="form-control" value="{{$user->address}}" >
                                </div>
                            </div>
                        </div>
                        <div class="row text-right  ">
                            <button class="btn btn-primary">Lưu lại</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>



