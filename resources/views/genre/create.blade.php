@if (session('flash_notification'))
    @foreach (session('flash_notification') as $message)
        <div class="alert alert-{{ $message->level }}">
            {{ $message->message }}
        </div>
    @endforeach
@endif


<form action="{{route('genre.store')}}" method="post">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-2">
            </div>
            <div class="col-lg-8">
                <div class="ibox">
                    <div class="ibox-title">
                        <h4>Thêm thể loại sách </h4>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Tên <span class="text-danger">(*)</span></label>
                                    <input type="text" name="name"  class="form-control" value="{{ old('name')}}">
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
    </div>

</form>





