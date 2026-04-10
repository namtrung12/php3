<?php

namespace App\Http\Controllers;

use App\Models\LoaiTin;
use App\Models\Tin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TinController extends Controller
{
    public function index(): View
    {
        $listTin = Tin::with('loaitin')
            ->orderByDesc('ngayDang')
            ->get();

        $stats = [
            'tongTin' => Tin::count(),
            'tongLuotXem' => Tin::sum('xem'),
            'luotXemCaoNhat' => Tin::max('xem') ?? 0,
            'dangTrongThungRac' => Tin::onlyTrashed()->count(),
        ];

        return view('tin.danhsach', compact('listTin', 'stats'));
    }

    public function trash(): View
    {
        $listTin = Tin::onlyTrashed()
            ->with('loaitin')
            ->orderByDesc('deleted_at')
            ->get();

        return view('tin.thungrac', compact('listTin'));
    }

    public function create(): View
    {
        $loaiTin = LoaiTin::orderBy('tenLoai')->get();

        return view('tin.them', compact('loaiTin'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'tieuDe' => 'required|string|max:255',
            'tomTat' => 'nullable|string',
            'urlHinh' => 'nullable|string|max:255',
            'idLT' => 'required|exists:loaitin,id',
        ]);

        Tin::create([
            'tieuDe' => $data['tieuDe'],
            'tomTat' => $data['tomTat'] ?? null,
            'urlHinh' => $data['urlHinh'] ?? null,
            'idLT' => $data['idLT'],
            'noiDung' => '',
            'ngayDang' => now(),
            'xem' => 0,
        ]);

        return redirect()
            ->route('tin.index')
            ->with('status', 'Đã thêm tin mới.');
    }

    public function edit(Tin $tin): View
    {
        $loaiTin = LoaiTin::orderBy('tenLoai')->get();

        return view('tin.capnhattin', compact('tin', 'loaiTin'));
    }

    public function update(Request $request, Tin $tin): RedirectResponse
    {
        $data = $request->validate([
            'tieuDe' => 'required|string|max:255',
            'tomTat' => 'nullable|string',
            'urlHinh' => 'nullable|string|max:255',
            'idLT' => 'required|exists:loaitin,id',
        ]);

        $tin->fill([
            'tieuDe' => $data['tieuDe'],
            'tomTat' => $data['tomTat'] ?? null,
            'urlHinh' => $data['urlHinh'] ?? null,
            'idLT' => $data['idLT'],
        ]);

        $tin->save();

        return redirect()
            ->route('tin.index')
            ->with('status', 'Đã cập nhật tin.');
    }

    public function destroy(Tin $tin): RedirectResponse
    {
        $tin->delete();

        return redirect()
            ->route('tin.index')
            ->with('status', 'Đã chuyển tin vào thùng rác.');
    }

    public function restore(int $id): RedirectResponse
    {
        $tin = Tin::onlyTrashed()->findOrFail($id);
        $tin->restore();

        return redirect()
            ->route('tin.trash')
            ->with('status', 'Đã khôi phục tin.');
    }

    public function forceDestroy(int $id): RedirectResponse
    {
        $tin = Tin::onlyTrashed()->findOrFail($id);
        $tin->forceDelete();

        return redirect()
            ->route('tin.trash')
            ->with('status', 'Đã xóa vĩnh viễn tin.');
    }
}
