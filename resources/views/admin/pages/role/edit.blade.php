@extends('admin.layouts.master')

@section('content_head')
    <section class="content-header">
        <h1>
            NHÓM QUYỀN
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="{{route('role.index')}}"> Quyền</a></li>
            <li class="active">Sửa</li>
        </ol>
    </section>
@endsection

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="{{route('role.update', $role->id)}}">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên</label>
                                <input name="name" type="text" class="form-control" placeholder=""
                                       value="{{$role->name}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hiển thị</label>
                                <input name="display_name" type="text" class="form-control" placeholder=""
                                       value="{{$role->display_name}}">
                            </div>
                            <label for="exampleInputEmail1">Chọn chức năng</label>
                            @foreach ($permissions as $permission)
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input
                                                {{$allPermiss->contains($permission->id) ? 'checked' : ''}} type="checkbox"
                                                name="permission[]" value="{{$permission->id}}">
                                            {{$permission->display_name}}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>

    </section>
@endsection
