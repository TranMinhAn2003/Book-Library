
    <div id="page-wrapper" class="gray-bg">
        <div class="wrapper wrapper-content animated fadeInRight ecommerce">
            <div class="ibox-content m-b-sm border-bottom">

                <h5 class="pull-left">Thống kê lượt mượn </h5>

            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-content">

                            <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                                <thead>
                                <tr>

                                    <th data-toggle="true">Mã sách</th>
                                    <th data-hide="phone">Tên sách</th>
                                    <th data-hide="all">Tên người mượn</th>
                                    <th data-hide="phone">Ngày mượn</th>
                                    <th data-hide="phone,tablet" >Ngày trả dự tính</th>
                                    <th data-hide="phone">Ngày trả thực tế</th>
                                    <th>Trạng thái</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($books as $book)
                                <tr>
                                    <td>
                                        {{$book->book->id}}
                                    </td>
                                    <td>
                                       {{$book->book->name}}
                                    </td>
                                    <td>
                                       {{$book->user->name}}
                                    </td>
                                    <td>
                                        {{$book->borrowed_at}}
                                    </td>
                                    <td>
                                        {{$book->due_date}}
                                    </td>
                                    <td>
                                        {{$book->returned_at}}
                                    </td>

                                    <td>
                                        <input type="text" value="{{ $book->status }}" hidden>
                                        @if($book->status == 0)
                                            <form action="{{ route('status.accept', $book->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-success">Đang mượn</button>
                                            </form>
                                        @elseif($book->status == 1)
                                            <form action="{{route('status.accept', $book->id)}}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-primary">Đang chờ xác nhận trả</button>
                                            </form>
                                        @elseif($book->status == 2)
                                            <form action="{{route('status.accept', $book->id)}}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-primary">Đã trả</button>
                                            </form>
                                        @endif
                                    </td>

                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="6">
                                        <ul class="pagination pull-right"></ul>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>

                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>

