<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MediaController extends Controller
{
    protected $view;
    public function __construct() {
        set_time_limit(0);
        ini_set('memory_limit', '6144M');
    }
    /**
     * Danh sách media
     */
    public function media(Request $request)
    {
        $media = Media::latest()->get();
        $selectMode = $request->boolean('select');
        $input = $request->get('input');


        $this->view['media'] = $media;
        $this->view['selectMode'] = $selectMode;
        $this->view['input'] = $input;
        return view('admin.media.media', $this->view);
    }

    /**
     * Upload ảnh
     */
    public function upload(Request $request)
    {
        $request->validate([
            'images' => ['required'],
            'images.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);

        foreach ($request->file('images') as $image) {

            // Tên gốc không gồm đuôi file
            $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);

            // Đuôi file
            $extension = strtolower($image->getClientOriginalExtension());

            // Chuyển tên file sang slug SEO
            $safeName = Str::slug($originalName);

            // Nếu tên file rỗng thì dùng media
            if (!$safeName) {
                $safeName = 'media';
            }

            // Tên file mới: ten-file-20260425-uniqid.jpg
            $fileName = $safeName . '-' . now()->format('YmdHis') . '-' . uniqid() . '.' . $extension;

            // Lưu file vào storage/app/public/uploads/media
            $path = $image->storeAs('uploads/media', $fileName, 'public');

            // Lấy kích thước ảnh
            [$width, $height] = getimagesize($image->getRealPath());

            // Lưu DB
            Media::create([
                'file_name'   => $image->getClientOriginalName(), // tên gốc
                'file_path'   => $path,                           // đường dẫn file đã đổi tên
                'mime_type'   => $image->getMimeType(),
                'file_size'   => $image->getSize(),
                'width'       => $width,
                'height'      => $height,

                // SEO cơ bản
                'title'       => str_replace('-', ' ', $safeName),
                'alt_text'    => str_replace('-', ' ', $safeName),

                'uploaded_by' => auth()->id(),
            ]);
        }

        return redirect()
            ->route('admin.media.index')
            ->with('success', 'Upload hình ảnh thành công.');
    }

    /**
     * Xóa ảnh
     */
    public function destroy(Media $media)
    {
        // Xóa file
        Storage::disk('public')->delete($media->file_path);

        // Xóa DB
        $media->delete();

        return back()->with('success', 'Đã xóa ảnh!');
    }
    public function popup(Request $request)
    {
        $media = Media::latest()->paginate(30);

        return view('admin.media.popup', [
            'media' => $media,
            'input' => $request->input('input'),
        ]);
    }


    public function ajaxUpload(Request $request)
    {
        $request->validate([
            'images'   => 'required',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp,gif|max:5120',
        ]);

        $uploaded = [];

        foreach ($request->file('images') as $file) {
            $path = $file->store('media', 'public');

            $media = Media::create([
                'file_name' => $file->getClientOriginalName(),
                'file_path' => $path,
                'file_type' => $file->getClientMimeType(),
                'file_size' => $file->getSize(),
            ]);

            $uploaded[] = [
                'id'        => $media->id,
                'file_name' => $media->file_name,
                'url'       => asset('storage/' . $media->file_path),
            ];
        }

        return response()->json([
            'success' => true,
            'message' => 'Upload thành công',
            'data'    => $uploaded,
        ]);
    }

}