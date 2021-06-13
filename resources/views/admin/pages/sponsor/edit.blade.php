@extends('admin.layouts.master')

@section('content_head')
    <section class="content-header" style="margin-bottom: 20px">
        <h1>
            SỬA NHÀ TÀI TRỢ
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Trang chủ</a
                ></li>
            <li><a href="{{route('sponsor.list')}}">Nhà tài trợ</a
                ></li>
            <li class="active">Sửa</li>
        </ol>
    </section>
@endsection
@section('content')
    <form style="padding: 8px 8px; border-radius: 4px" role="form" class="form" method="post"
          action="{{route('sponsor.update')}}" enctype="multipart/form-data" id="form-add-sponsor">
        @csrf
        <div class="row container-fluid">
            <div class="tabbable-custom"
                 style="background-color: white; border: 1px solid #ddd; border-radius: 4px; padding: 15px;">
                <input type="hidden" name="id" value="{{$sponsor->id}}">
                <div class="form-group">
                    <label for="name">Tên nhà tài trợ :</label>
                    <input class="form-control" id="fullname" type="text" name="name" value="{{$sponsor->name}}">
                    <span class="form-message"></span>
                    @error('name')
                    <span class="error">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại : </label>
                    <input class="form-control" id="phone" name="phone" value="{{$sponsor->phone}}">
                    <span class="form-message"></span>
                    @error('phone')
                    <span class="error">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input class="form-control" id="emaill" type="text" name="email" value="{{$sponsor->email}}"
                           readonly>
                    <span class="form-message"></span>
                    @error('email')
                    <span class="error">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ :</label>
                    <input class="form-control" id="address" type="text" name="address" value="{{$sponsor->address}}">
                    <span class="form-message"></span>
                    @error('address')
                    <span class="error">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Hình thức tài trợ</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="method">
                        <option value="direct" {{ $sponsor->method == 'direct' ? 'selected' : '' }}>Trực tiếp</option>
                        <option value="bank" {{ $sponsor->method == 'bank' ? 'selected' : '' }}>Qua Ngân Hàng</option>
                        <option value="card" {{ $sponsor->method == 'card' ? 'selected' : '' }}>Qua Card điện thoại
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="amount_financed">Số tiền tài trợ :</label>
                    <input class="form-control" id="amount_financed" type="text" name="amount_financed"
                           value="{{$sponsor->amount_financed}}">
                    <span class="form-message"></span>
                    @error('amount_financed')
                    <span class="error">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Ẩn danh</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="anonymous">
                        <option value="0" {{ $sponsor->anonymous == '0' ? 'selected' : '' }}>Không</option>
                        <option value="1" {{ $sponsor->anonymous == '1' ? 'selected' : '' }}>Có</option>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Lưu</button>
                </div>
            </div>

        </div>
    </form>
@endsection
@section('jsblock')
    <script>
        Validator({
            form: '#form-add-sponsor',
            formGroupSelector: '.form-group',
            errorSelector: '.form-message',
            rules: [
                Validator.isRequired('#fullname', 'Vui lòng nhập trường này'),
                Validator.isRequired('#emaill'),
                Validator.isEmail('#emaill'),
                Validator.isRequired('#address'),
                Validator.isRequired('#phone'),
                Validator.isPhone('#phone'),
                Validator.isRequired('#amount_financed'),
                Validator.isBudget('#amount_financed'),
            ]
        });
    </script>
@endsection
