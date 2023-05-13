<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CompanyController extends Controller
{
    public function index()
    {
        $company = Company::first();
        return view('company.index', compact('company'));
    }

    public function update(Request $request, Company $company)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $company->update($request->all());
        if ($company) {
            Session::flash('status', 'success');
            Session::flash('message', 'Ubah Data Berhasil');
        } else {
            Session::flash('gagal', 'error');
            Session::flash('message', 'Ubah Data gagal');
        }
        return redirect('company');
    }
}
