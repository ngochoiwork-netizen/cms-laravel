@extends('admin.layouts.master-layouts')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/js/datatables/datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/select2/select2-bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/select2/select2.css') }}">
@endsection

@section('content')

<h3>Quản lý User</h3>
<br>

<a href="{{ route('admin.users.create') }}" class="btn btn-primary">
    <i class="entypo-plus"></i> Thêm user
</a>

<br><br>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<table class="table table-bordered datatable" id="table-users">
    <thead>
        <tr class="replace-inputs">
            <th>ID</th>
            <th>Họ tên</th>
            <th>Email</th>
            <th>SĐT</th>
            <th>Role</th>
            <th>Trạng thái</th>
            <th>Ngày tạo</th>
            <th width="260">Thao tác</th>
        </tr>
    </thead>

    <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>

                <td>
                    <strong>{{ $user->name }}</strong>

                    @if(auth()->id() === $user->id)
                        <br>
                        <span class="label label-info">Bạn</span>
                    @endif
                </td>

                <td>{{ $user->email }}</td>

                <td>
                    {{ $user->phone ?: '-' }}
                </td>

                <td>
                    @if($user->role === 'admin')
                        <span class="label label-success">Admin</span>
                    @elseif($user->role === 'editor')
                        <span class="label label-primary">Editor</span>
                    @else
                        <span class="label label-default">{{ $user->role }}</span>
                    @endif
                </td>

                <td>
                    @if($user->is_active)
                        <span class="label label-success">Hoạt động</span>
                    @else
                        <span class="label label-danger">Đã khóa</span>
                    @endif
                </td>

                <td>{{ $user->created_at ? $user->created_at->format('d/m/Y') : '-' }}</td>

                <td>
                    <a href="{{ route('admin.users.edit', $user->id) }}"
                       class="btn btn-info btn-sm">
                        Sửa
                    </a>

                    <a href="{{ route('admin.users.reset-password', $user->id) }}"
                       class="btn btn-default btn-sm">
                        Reset
                    </a>

                    @if(auth()->id() !== $user->id)
                        <form action="{{ route('admin.users.toggle-active', $user->id) }}"
                              method="POST"
                              style="display:inline-block;"
                              onsubmit="return confirm('Bạn có chắc muốn thay đổi trạng thái user này?')">
                            @csrf
                            @method('PATCH')

                            <button type="submit" class="btn btn-warning btn-sm">
                                @if($user->is_active)
                                    Khóa
                                @else
                                    Mở
                                @endif
                            </button>
                        </form>

                        <form action="{{ route('admin.users.destroy', $user->id) }}"
                              method="POST"
                              style="display:inline-block;"
                              onsubmit="return confirm('Bạn có chắc muốn xóa user này?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm">
                                Xóa
                            </button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>

    <tfoot>
        <tr>
            <th>ID</th>
            <th>Họ tên</th>
            <th>Email</th>
            <th>SĐT</th>
            <th>Role</th>
            <th>Trạng thái</th>
            <th>Ngày tạo</th>
            <th>Thao tác</th>
        </tr>
    </tfoot>
</table>

@endsection

@section('js')
    <script src="{{ asset('assets/js/datatables/datatables.js') }}"></script>
    <script src="{{ asset('assets/js/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/neon-chat.js') }}"></script>

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            var $table = jQuery("#table-users");

            var table = $table.DataTable({
                "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "order": [[0, "desc"]],
                "columnDefs": [
                    { "orderable": false, "targets": [7] },
                    { "searchable": false, "targets": [7] }
                ]
            });

            $table.closest('.dataTables_wrapper').find('select').select2({
                minimumResultsForSearch: -1
            });

            $('#table-users tfoot th').each(function () {
                var title = $('#table-users thead th').eq($(this).index()).text();

                if (title !== 'Thao tác') {
                    $(this).html('<input type="text" class="form-control" placeholder="Search ' + title + '" />');
                } else {
                    $(this).html('');
                }
            });

            table.columns().every(function () {
                var that = this;

                $('input', this.footer()).on('keyup change', function () {
                    if (that.search() !== this.value) {
                        that.search(this.value).draw();
                    }
                });
            });
        });
    </script>
@endsection