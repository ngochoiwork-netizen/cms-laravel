@extends('admin.layouts.master-layouts')

@section('content')

<h2>Sửa User</h2>

@if($errors->any())
    <div class="alert alert-danger">
        Vui lòng kiểm tra lại dữ liệu nhập.
    </div>
@endif

<form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="form-horizontal form-groups-bordered">
    @csrf
    @method('PUT')

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

            <div class="form-group">
                <label class="col-sm-3 control-label">Họ tên <span class="text-danger">*</span></label>
                <div class="col-sm-5">
                    <input type="text"
                           name="name"
                           value="{{ old('name', $user->name) }}"
                           class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Email <span class="text-danger">*</span></label>
                <div class="col-sm-5">
                    <input type="email"
                           name="email"
                           value="{{ old('email', $user->email) }}"
                           class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Số điện thoại</label>
                <div class="col-sm-5">
                    <input type="text"
                           name="phone"
                           value="{{ old('phone', $user->phone) }}"
                           class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Vai trò</label>
                <div class="col-sm-5">
                    <select name="role" class="form-control">
                        <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>
                            Admin
                        </option>
                        <option value="editor" {{ old('role', $user->role) == 'editor' ? 'selected' : '' }}>
                            Editor
                        </option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Trạng thái</label>
                <div class="col-sm-5">
                    <div class="checkbox checkbox-replace">
                        <label>
                            <input type="checkbox"
                                   name="is_active"
                                   value="1"
                                   {{ old('is_active', $user->is_active) ? 'checked' : '' }}>
                            Cho phép đăng nhập
                        </label>
                    </div>

                    @if(auth()->id() === $user->id)
                        <p class="text-warning" style="margin-top: 8px;">
                            Bạn đang chỉnh sửa tài khoản hiện tại.
                        </p>
                    @endif
                </div>
            </div>

        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-5">
            <button type="submit" class="btn btn-primary">
                <i class="entypo-check"></i>
                Cập nhật User
            </button>

            <a href="{{ route('admin.users.index') }}" class="btn btn-default">
                Quay lại
            </a>
        </div>
    </div>

</form>

@endsection