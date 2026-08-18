@extends('admin.layouts.master-layouts')

@section('content')

<h2>Reset mật khẩu</h2>

<br>

<a href="{{ route('admin.users.index') }}" class="btn btn-default">
    <i class="entypo-left-open"></i> Quay lại
</a>

<br><br>

@if($errors->any())
    <div class="alert alert-danger">
        Vui lòng kiểm tra lại dữ liệu nhập.
    </div>
@endif

<div class="panel panel-primary" data-collapsed="0">

    <div class="panel-heading">
        <div class="panel-title">
            Reset mật khẩu cho: <strong>{{ $user->name }}</strong>
        </div>
    </div>

    <div class="panel-body">

        <form action="{{ route('admin.users.update-password', $user->id) }}"
              method="POST"
              class="form-horizontal form-groups-bordered">

            @csrf
            @method('PUT')

            {{-- PASSWORD --}}
            <div class="form-group">
                <label class="col-sm-3 control-label">
                    Mật khẩu mới <span class="text-danger">*</span>
                </label>

                <div class="col-sm-5">
                    <input type="password"
                           name="password"
                           class="form-control"
                           placeholder="Nhập mật khẩu mới">

                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            {{-- CONFIRM --}}
            <div class="form-group">
                <label class="col-sm-3 control-label">
                    Nhập lại mật khẩu <span class="text-danger">*</span>
                </label>

                <div class="col-sm-5">
                    <input type="password"
                           name="password_confirmation"
                           class="form-control"
                           placeholder="Nhập lại mật khẩu">
                </div>
            </div>

            {{-- BUTTON --}}
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-5">
                    <button type="submit" class="btn btn-danger">
                        <i class="entypo-key"></i>
                        Reset mật khẩu
                    </button>

                    <a href="{{ route('admin.users.index') }}" class="btn btn-default">
                        Hủy
                    </a>
                </div>
            </div>

        </form>

    </div>
</div>

@endsection