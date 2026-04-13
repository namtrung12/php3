<?php

namespace App\Http\Controllers\Labs\Lab5;

use App\Http\Controllers\Controller;
use App\Models\LoaiTin;
use App\Models\Tin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TinController extends Controller
{
    public function index(): View
    {
        $listTin = Tin::with('loaitin')->orderByDesc('ngayDang')->get();

        $stats = [
            'tongTin' => Tin::count(),
            'tongLuotXem' => Tin::sum('xem'),
            'luotXemCaoNhat' => Tin::max('xem') ?? 0,
            'dangTrongThungRac' => Tin::onlyTrashed()->count(),
        ];

        return view('labs.lab5.danhsach', compact('listTin', 'stats'));
    }

    public function trash(): View
    {
        $listTin = Tin::onlyTrashed()->with('loaitin')->orderByDesc('deleted_at')->get();

        return view('labs.lab5.thungrac', compact('listTin'));
    }

    public function create(): View
    {
        $loaiTin = LoaiTin::orderBy('tenLoai')->get();

        return view('labs.lab5.form', [
            'tin' => new Tin(),
            'loaiTin' => $loaiTin,
            'action' => route('lab5.tin.store'),
            'method' => 'POST',
            'title' => 'Thêm tin',
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);

        Tin::create($data + [
            'noiDung' => $request->input('noiDung', ''),
            'ngayDang' => now(),
            'xem' => 0,
        ]);

        return redirect()->route('lab5.tin.index')->with('status', 'Đã thêm tin mới.');
    }

    public function edit(Tin $tin): View
    {
        $loaiTin = LoaiTin::orderBy('tenLoai')->get();

        return view('labs.lab5.form', [
            'tin' => $tin,
            'loaiTin' => $loaiTin,
            'action' => route('lab5.tin.update', $tin),
            'method' => 'PUT',
            'title' => 'Cập nhật tin',
        ]);
    }

    public function update(Request $request, Tin $tin): RedirectResponse
    {
        $tin->update($this->validated($request));

        return redirect()->route('lab5.tin.index')->with('status', 'Đã cập nhật tin.');
    }

    public function destroy(Tin $tin): RedirectResponse
    {
        $tin->delete();

        return redirect()->route('lab5.tin.index')->with('status', 'Đã chuyển tin vào thùng rác.');
    }

    public function restore(int $id): RedirectResponse
    {
        Tin::onlyTrashed()->findOrFail($id)->restore();

        return redirect()->route('lab5.tin.trash')->with('status', 'Đã khôi phục tin.');
    }

    public function forceDestroy(int $id): RedirectResponse
    {
        Tin::onlyTrashed()->findOrFail($id)->forceDelete();

        return redirect()->route('lab5.tin.trash')->with('status', 'Đã xóa vĩnh viễn tin.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validated(Request $request): array
    {
        return $request->validate([
            'tieuDe' => ['required', 'string', 'max:255'],
            'tomTat' => ['nullable', 'string'],
            'noiDung' => ['nullable', 'string'],
            'urlHinh' => ['nullable', 'string', 'max:255'],
            'idLT' => ['required', 'exists:loaitin,id'],
        ]);
    }
}
