@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('author.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-2">
            </div>
            <div class="col-lg-8">
                <div class="ibox">
                    <div class="ibox-title">
                        <h4>Thông tin tác giả </h4>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Tên tác giả <span class="text-danger">(*)</span></label>
                                    <input type="text" name="name"  class="form-control" value="{{ old('name')}}">
                                </div>
                            </div>
                        </div>
                        <div class="row mb10 mr10">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Giới tính<span class="text-danger">(*)</span></label>
                                </div>
                                <?php
                                $genders=[
                                    'Nam','Nữ'
                                ]
                                ?>
                                <select name="gender"  class="form-control" >
                                    <option value="">[Chọn giới tính]</option>
                                    @foreach($genders as $key=>$val)
                                        <option  value="{{$key}}">{{$val}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="row mb10 mr10">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Năm sinh<span class="text-danger">(*)</span></label>
                                    <input type="date" name="date_of_birth"  class="form-control" value="{{ old('date_of_birth')}}">
                                </div>
                            </div>
                        </div>
                        <div class="row mb10 mr10">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <div class="form-row">
                                    <label for="" class="control-label text-right"> Quốc tịch<span class="text-danger">(*)</span></label>
                                    <input type="text" name="nationality"  class="form-control" value="{{ old('nationality')}}">
                                </div>
                            </div>
                        </div>
                        <div class="row mb10 mr10">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <div class="form-row">
                                    <label for="" class="control-label text-right"> Tiểu sử <span class="text-danger">(*)</span></label>
                                    <textarea type="text" name="biography" class="form-control" > </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mb10 mr10">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Ảnh tác giả<span class="text-danger">(*)</span></label>
                                    <input type="file" name="profile_picture"  class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right ">
                        <button class="btn btn-primary" type="submit" >Lưu lại </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>





