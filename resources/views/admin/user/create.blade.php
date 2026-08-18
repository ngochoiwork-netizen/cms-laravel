@extends('admin.layouts.master-layouts')

@section('content')

<h2>Thêm User</h2>

@if($errors->any())
    <div class="alert alert-danger">
        Vui lòng kiểm tra lại dữ liệu nhập.
    </div>
@endif

<form action="{{ route('admin.users.store') }}" method="POST" class="form-horizontal form-groups-bordered">
    @csrf

    <div class="panel panel-primary" data-collapsed="0">

        <div class="panel-heading">
            <div class="panel-title">
                Thông tin User
            </div>

            <div class="panel-options">
                <a href="#" data-rel="collapse">
                    <i class="entypo-down-open"></i>
                </a>
            </div>
        </div>

        <div class="panel-body">

            {{-- NAME --}}
            <div class="form-group">
                <label class="col-sm-3 control-label">Họ tên <span class="text-danger">*</span></label>
                <div class="col-sm-5">
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                </div>
            </div>

            {{-- EMAIL --}}
            <div class="form-group">
                <label class="col-sm-3 control-label">Email <span class="text-danger">*</span></label>
                <div class="col-sm-5">
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control">
                </div>
            </div>

            {{-- PHONE --}}
            <div class="form-group">
                <label class="col-sm-3 control-label">Số điện thoại</label>
                <div class="col-sm-5">
                    <input type="text" name="phone" value="{{ old('phone') }}" class="form-control">
                </div>
            </div>

            {{-- PASSWORD --}}
            <div class="form-group">
                <label class="col-sm-3 control-label">Mật khẩu <span class="text-danger">*</span></label>
                <div class="col-sm-5">
                    <input type="password" name="password" class="form-control">
                </div>
            </div>

            {{-- CONFIRM PASSWORD --}}
            <div class="form-group">
                <label class="col-sm-3 control-label">Nhập lại mật khẩu <span class="text-danger">*</span></label>
                <div class="col-sm-5">
                    <input type="password" name="password_confirmation" class="form-control">
                </div>
            </div>

            {{-- ROLE --}}
            <div class="form-group">
                <label class="col-sm-3 control-label">Vai trò</label>
                <div class="col-sm-5">
                    <select name="role" class="form-control">
                        <option value="admin" {{ old('role', 'admin') == 'admin' ? 'selected' : '' }}>
                            Admin
                        </option>
                        <option value="editor" {{ old('role') == 'editor' ? 'selected' : '' }}>
                            Editor
                        </option>
                    </select>
                </div>
            </div>

            {{-- STATUS --}}
            <div class="form-group">
                <label class="col-sm-3 control-label">Trạng thái</label>
                <div class="col-sm-5">
                    <div class="checkbox checkbox-replace">
                        <label>
                            <input type="checkbox" name="is_active" value="1" {{ old('is_active', 1) ? 'checked' : '' }}>
                            Cho phép đăng nhập
                        </label>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- BUTTON --}}
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-5">
            <button type="submit" class="btn btn-primary">
                <i class="entypo-check"></i>
                Lưu User
            </button>

            <a href="{{ route('admin.users.index') }}" class="btn btn-default">
                Quay lại
            </a>
        </div>
    </div>

</form>

@endsection