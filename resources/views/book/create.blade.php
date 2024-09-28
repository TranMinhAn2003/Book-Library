@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('book.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-2">
            </div>
            <div class="col-lg-8">
                <div class="ibox">
                    <div class="ibox-title">
                        <h4>Thông tin sách</h4>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Tên sách  <span class="text-danger">(*)</span></label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row mb10 mr10">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <div class="form-row ">
                                    <label for="" class="control-label text-right">Mô tả nội dung <span class="text-danger">(*)</span></label>
                                    <textarea name="description" class="form-control ">{{ old('description') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mb10 mr10">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Số trang<span class="text-danger">(*)</span></label>
                                    <input type="text" name="page" class="form-control" value="{{ old('page') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row mb10 mr10">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <div class="form-row">
                                    <label for="" class="control-label text-right"> Năm sáng tác <span class="text-danger">(*)</span></label>
                                    <input type="date" name="year_written" class="form-control" value="{{ old('year_written') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row mb10 mr10">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <div class="form-row">
                                    <label for="" class="control-label text-right"> Năm xuất bản <span class="text-danger">(*)</span></label>
                                    <input type="date" name="year_published" class="form-control" value="{{ old('year_published') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row mb10 mr10">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Ảnh sách<span class="text-danger">(*)</span></label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row mb10 mr10">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-4">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Thể loại <span class="text-danger">(*)</span></label>
                                    <div class="genre-container">
                                        <select name="genre[]" class="form-control setupSelect2">
                                            <option value="">Thể loại</option>
                                            @foreach ($genre as $gen)
                                                <option value="{{ $gen->id }}">{{ $gen->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="button" class="addGenre btn btn-success mt-2">Thêm thể loại</button>
                                </div>
                            </div>
                            <div class="added-genre"></div>
                            <div class="col-lg-4">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Tác giả <span class="text-danger">(*)</span></label>
                                    <div class="author-container">
                                        <select name="author[]" class="form-control setupSelect2">
                                            <option value="">Chọn tác giả</option>
                                            @foreach ($authors as $author)
                                                <option value="{{ $author->id }}">{{ $author->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="button" class="addAuthor btn btn-success mt-2">Thêm tác giả</button>
                                </div>
                            </div>
                        </div>
                        <div class="added-authors"></div>

                    </div>
                    <div class="text-right">
                        <button class="btn btn-primary" type="submit">Lưu lại</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


<script>
    var authorCatalogue = @json($authors); // Dữ liệu danh sách tác giả từ server

    (function ($) {
        "use strict";
        var HT = {};

        HT.addAuthor = () => {
            $(document).on('click', '.addAuthor', function () {
                let html = HT.renderAuthor(authorCatalogue);
                $('.added-authors').append(html);
                $('.setupSelect2').select2();
            });
        }

        HT.renderAuthor = (authorCatalogue) => {
            let html = '<div class="row mb10 mr10">';
            html += '  <div class="col-lg-2"></div>';
            html += '  <div class="col-lg-4"></div>';
            html += '<div class="col-lg-4">';
            html += ' <div class="form-row">';
            html += ' <label for="" class="control-label text-right">Tác giả <span class="text-danger">(*)</span></label>';
            html += '<div class="author-container">';
            html += ' <select name="author[]" class="form-control setupSelect2">';
            for (let i = 0; i < authorCatalogue.length; i++) {
                html += '<option value="' + authorCatalogue[i].id + '">' + authorCatalogue[i].name + '</option>';
            }
            html += '</select>';
            html += '<button type="button" class="remove-author btn btn-danger ml-2"><i class="fa fa-trash"></i></button>'; // Cần phải chắc chắn rằng nút này được thêm vào đúng nơi
            html += '</div>';
            html += '</div>';
            html += '</div>'; // Đóng form-row
            html += '</div>'; // Đóng row
            return html;
        }


        HT.removeAuthor = () => {
            $(document).on('click', '.remove-author', function () {
                // Tìm phần tử cha (div.row) và xóa nó
                $(this).closest('.row').remove();
            });
        }


        $(document).ready(function() {
            HT.addAuthor();
            HT.removeAuthor();
        });

    })(jQuery);
</script>

<script>
    var genre = @json($genre); // Dữ liệu danh sách tác giả từ server

    (function ($) {
        "use strict";
        var HT = {};

        HT.addGenre = () => {
            $(document).on('click', '.addGenre', function () {
                let html = HT.renderGenre(genre);
                $('.added-genre').append(html);
            });
        }

        HT.renderGenre = (genre) => {
            let html = '<div class="row mb10 mr10">';
            html += '  <div class="col-lg-4"></div>';
            html += '<div class="col-lg-4">';
            html += ' <div class="form-row">';
            html += ' <label for="" class="control-label text-right">Thể loại<span class="text-danger">(*)</span></label>';
            html += '<div class="genre-container">';
            html += ' <select name="genre[]" class="form-control setupSelect2">';
            for (let i = 0; i < genre.length; i++) {
                html += '<option value="' + genre[i].id + '">' + genre[i].name + '</option>';
            }
            html += '</select>';
            html += '<button type="button" class="remove-genre btn btn-danger ml-2"><i class="fa fa-trash"></i></button>'; // Cần phải chắc chắn rằng nút này được thêm vào đúng nơi
            html += '</div>';
            html += '</div>';
            html += '</div>'; // Đóng form-row
            html += '</div>';
            html += '<div class="col-lg-4"></div>';
            // Đóng row
            return html;
        }


        HT.removeGenre = () => {
            $(document).on('click', '.remove-genre', function () {
                // Tìm phần tử cha (div.row) và xóa nó
                $(this).closest('.row').remove();
            });
        }


        $(document).ready(function() {
            HT.addGenre();
            HT.removeGenre();
        });

    })(jQuery);
</script>
