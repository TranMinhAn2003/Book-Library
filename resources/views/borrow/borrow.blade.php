
    <div id="wrapper">



        <div id="page-wrapper" class="gray-bg">


            <div class="wrapper wrapper-content animated fadeInRight">



                <div class="row">
                    <div class="col-md-6">

                        <div class="ibox">
                            <div class="ibox-title">
                                <h5>Thông tin sách mượn</h5>
                            </div>
                            <div class="ibox-content">
                                <div class="table-responsive">
                                    <table class="table shoping-cart-table">

                                        <tbody>
                                        <tr>

                                            <td width="150">
                                                <div class="cart-product-imitation">
                                                    <img src="{{asset('storage/'.$book->image)}}" alt="{{ $book->name }}" class="img-fluid">                                            </div>
                                            </td>
                                            <td class="desc">
                                                <h3>
                                                    {{ $book->name }}
                                                </h3>
                                                <p class="small">

                                                    {{$book->description}}
                                                </p>
                                                <div class="m-t-sm">
                                                    <label for="">Tác giả: {{implode(', ', $book->author->pluck('name')->toArray()) }}</label>
                                                </div>

                                                <div class="m-t-sm">
                                                    <label for="">Thể loại: {{implode(', ', $book->genre->pluck('name')->toArray()) }}</label>
                                                </div>
                                            </td>


                                            <td width="20">

                                            </td>

                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <a  href="{{route('book.index')}}" class="btn btn-white" ><i class="fa fa-arrow-left"></i> Continue library</a>

                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">

                        <div class="ibox">
                            <div class="ibox-title">
                                <h5>Thông tin người mượn</h5>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-lg-2"></div>

                                </div>
                                <form action="{{route('borrow.store')}}" method="post">
                                    @csrf
                                <div class="row">
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-8">
                                        <input type="text" name="book_id" value="{{$book->id}}" hidden>
                                        <label for="">Họ tên</label>
                                        <input type="text" name="name" value="{{$user->name}}" placeholder="Họ tên" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-8">
                                        <label for="">Ngày mượn</label>
                                        <input type="text" name="borrowed_at" value="{{Carbon\Carbon::now()}}" placeholder="Ngày mượn" class="form-control" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-8">
                                        <label for="">Ngày trả</label>
                                        <input type="text" name="due_date" value="{{Carbon\Carbon::now()->addMinutes(30)}}" placeholder="Ngày trả" class="form-control" >
                                    </div>
                                </div>

                                <hr/>
                                <span class="text-muted small">
                            </span>
                                <div class="m-t-sm">
                                    <div class="btn-group">
                                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-shopping-cart"></i> Mượn</button>
                                        <a href="#" class="btn btn-white btn-sm"> Cancel</a>
                                    </div>
                                </div>
                                </form>

                            </div>
                        </div>



                    </div>
                </div>




            </div>



        </div>
    </div>











