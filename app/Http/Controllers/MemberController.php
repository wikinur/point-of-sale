<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberCreateRequest;
use App\Models\Member;
use Illuminate\Support\Facades\Session;

class MemberController extends Controller
{
    public function index()
    {
        return view('pos.member.index');
    }

    public function api()
    {
        $members = Member::all();
        $datatables = datatables()->of($members)
            ->addColumn('date', function ($member) {
                return convert_date($member->created_at);
            })
            ->addIndexColumn();
        return $datatables->make(true);
    }

    public function store(MemberCreateRequest $request)
    {
        $member = Member::create($request->all());
        if ($member) {
            Session::flash('status', 'success');
            Session::flash('message', 'Tambah Data Berhasil');
        } else {
            Session::flash('status', 'error');
            Session::flash('message', 'Tambah Data gagal');
        }
        return redirect('member');
    }

    public function update(MemberCreateRequest $request, Member $member)
    {
        $member->update($request->all());
        if ($member) {
            Session::flash('status', 'success');
            Session::flash('message', 'Ubah Data Berhasil');
        }
        return redirect('member');
    }

    public function destroy(Member $member)
    {
        $member->delete();
        if ($member) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil dihapus');
        }
        return redirect('member');
    }
}
