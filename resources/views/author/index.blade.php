{{--@include('dashboard.layout.breadcrumb' )--}}
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Danh sách tác giả </h5>
                    <div class="ibox-tools">
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <form action="{{route('author.index')}} " method="GET">
                    <div class="ibox-content">
                        <div class="filter">
                            <div class="row">
                                <div class="col-lg-6 hr ">
                                    <div class="form-row hf">
                                        <select name="user_agent" class="form-control">
                                            <?php
                                            $user_agent = [
                                                '[Chọn nhóm thành viên]',
                                                'Quản trị viên',
                                                'Cộng tác viên'
                                            ];
                                            ?>
                                            @foreach($user_agent as $key => $val)
                                                <option value="{{ $key }}" {{ $key == old('user_agent', request('user_agent')) ? 'selected' : '' }}>
                                                    {{ $val }}
                                                </option>
                                            @endforeach
                                        </select>
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
                        <div class="create">
                            <a  href="{{route('author.create')}}" class="btn btn-primary mb-5 "> <i class="fa fa-plus" ></i> Thêm mới thành viên </a>
                        </div>
                    </div>
                </form>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th class="text-center">STT</th>
                        <th class="text-center">Họ tên </th>
                        <th class="text-center">Ngày sinh</th>
                        <th class="text-center">Quốc tịch</th>
                        <th class="text-center">Giới tính</th>
                        <th class="text-center" colspan="2">Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($author as $index => $auth)
                        <tr>

                            <td class="text-center"> {{ $loop->iteration }}</td>
                            <td class="text-center">{{$auth->name}}</td>
                            <td class="text-center">{{$auth->date_of_birth}}</td>
                            <td class="text-center address_user">{{$auth->nationality}}</td>
                            <td class="text-center">{{$auth->gender}}</td>
                            <td class="text-center ">
                                <a href="{{route('author.edit',$auth->id)}}" class=" btn btn-success btnedit "><i class="fa fa-edit"></i></a>
                            </td>

                            <form action="{{route('author.destroy',$auth->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <td class="text-center ">
                                    <button type="submit" class=" btn btn-danger btnedit " onclick=" return confirm('Bạn có muốn xóa không ?')" ><i class="fa fa-trash"></i></button>
                                </td>
                            </form>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $author->links('dashboard.layout.pagination') }}
            </div>
        </div>
    </div>
</div>

