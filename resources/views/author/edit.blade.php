@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('author.update',$author->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-2">
            </div>
            <div class="col-lg-8">
                <div class="ibox">
                    <div class="ibox-title">
                        <h4>Chỉnh sửa thông tin tác giả </h4>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Tên tác giả <span class="text-danger">(*)</span></label>
                                    <input type="text" name="name"  class="form-control" value="{{$author->name}}">
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
                                    @foreach($genders as $key=>$val)
                                        <option value="{{ $key }}" {{ (isset($author->gender) && $author->gender == $val) ? 'selected' : '' }}>{{$val}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="row mb10 mr10">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Năm sinh<span class="text-danger">(*)</span></label>
                                    <input type="date" name="date_of_birth"  class="form-control" value="{{$author->date_of_birth}}">
                                </div>
                            </div>
                        </div>
                        <div class="row mb10 mr10">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <div class="form-row">
                                    <label for="" class="control-label text-right"> Quốc tịch<span class="text-danger">(*)</span></label>
                                    <input type="text" name="nationality"  class="form-control" value="{{ $author->nationality}}">
                                </div>
                            </div>
                        </div>
                        <div class="row mb10 mr10">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <div class="form-row">
                                    <label for="" class="control-label text-right"> Tiểu sử <span class="text-danger">(*)</span></label>
                                    <textarea type="text" name="biography" class="form-control" >{{ $author->biography}} </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mb10 mr10">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Ảnh tác giả<span class="text-danger">(*)</span></label>
                                    <input type="file" name="profile_picture"  class="form-control">
                                    <img src="{{ asset('storage/' . $author->profile_picture) }}" alt="Product Image" width="100px" height="100px">
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





