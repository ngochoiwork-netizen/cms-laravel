<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    protected $view;

    public function __construct()
    {
        set_time_limit(0);
        ini_set('memory_limit', '6144M');
    }

    public function users()
    {
        $users = User::latest()->get();
        $this->view['users'] = $users;
        return view('admin.user.user', $this->view);
    }

    public function create()
    {
         return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|max:255|unique:users,email',
            'phone'     => 'nullable|string|max:30',
            'password'  => 'required|string|min:6|confirmed',
            'role'      => 'required|string|in:admin,editor',
            'is_active' => 'nullable|boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active');

        User::create($data);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Tạo user thành công');
    }

    public function edit(User $user)
    {
        $this->view['user'] = $user;
        return view('admin.user.edit', $this->view);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'phone'     => 'nullable|string|max:30',
            'role'      => 'required|string|in:admin,editor',
            'is_active' => 'nullable|boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active');

        $user->update($data);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Cập nhật user thành công');
    }

    public function destroy(User $user)
    {
        if (auth()->id() === $user->id) {
            return redirect()
                ->route('admin.users.index')
                ->with('error', 'Bạn không thể xóa chính tài khoản đang đăng nhập');
        }

        $user->delete();

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Xóa user thành công');
    }

    public function toggleActive(User $user)
    {
        if (auth()->id() === $user->id) {
            return redirect()
                ->route('admin.users.index')
                ->with('error', 'Bạn không thể tự khóa chính tài khoản đang đăng nhập');
        }

        $user->update([
            'is_active' => ! $user->is_active,
        ]);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Cập nhật trạng thái user thành công');
    }

    public function showResetPassword(User $user)
    {
        $this->view['user'] = $user;
        return view('admin.user.reset-password', $this->view);
    }

    public function resetPassword(Request $request, User $user)
    {
        $data = $request->validate([
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user->update([
            'password' => $data['password'],
        ]);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Reset mật khẩu thành công');
    }
}