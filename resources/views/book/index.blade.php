
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Danh sách sách</h5>
                    <div class="ibox-tools">
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <form action=" " method="GET">
                    <div class="ibox-content">
                        <div class="filter">
                            <div class="row">
                                <div class="col-lg-6 hr ">
                                    <div class="form-row hf">
                                        <div class="create">
                                            <a  href="{{route('book.create')}}" class="btn btn-primary mb-5 "> <i class="fa fa-plus" ></i> Thêm mới thể loại</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 hf ">
                                    <div class="form-row ">
                                        <input type="text" name="keyword" value="{{request('keyword') ?:old('keyword')}}" placeholder="Nhập từ khóa" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-2 hf">
                                    <div class=form-row">
                                        <button type="submit" name="search" value="search" class="btn btn-primary ">Tìm kiếm</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
                <form action="">
                    @foreach($books->chunk(5) as $book)
                        <div class="row">
                            <div class="col-lg-1"></div>
                            @foreach($book as $boo)
                                <div class="col-md-2">
                                    <div class="ibox">
                                        <div class="ibox-content product-box">
                                            <div class="tshirt_img">
                                                <img src="{{asset('storage/'.$boo->image)}}" alt="{{ $boo->name }}" class="img-fluid">
                                            </div>
                                            <div class="product-desc">
                                                <p class="text-muted">{{ implode(', ', $boo->author->pluck('name')->toArray()) }}</p>
                                                <a href="#" class="book-name" title="{{ $boo->name }}">{{ Str::limit($boo->name, 20, '...') }}</a>
                                                <p class="sku-book">HHH</p>
                                                <div class="m-t text-righ row">
                                                    <a href="{{ route('book.show', $boo->id) }}" class="btn btn-xs btn-outline btn-primary">Thông tin</a>
                                                    <a href="{{ route('borrow.add', $boo->id) }}" class="btn btn-xs btn-outline btn-primary">Mượn</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                @endforeach
                </form>
                {{$books->links('dashboard.layout.pagination')}}
            </div>
        </div>
    </div>
</div>



