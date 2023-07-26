<?php

namespace App\Http\Controllers;

use App\Models\FileUpload;
use App\Models\Report;
use App\Models\TypeExpense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role == 'administrator') {
            $data = Report::orderby('created_at', 'DESC')->get();
        } else {
            $data = Report::where('user_id', auth()->user()->id)->orderby('created_at', 'DESC')->get();
        }


        return view('report.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type_expenses = TypeExpense::all();

        return view('report.create', compact('type_expenses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $validatedData = $request->validate(
            [
                'type_id' => 'required',
                'detail' => 'required',
                'evidence' => 'required',
                'evidence.*' => 'mimes:jpg,jpeg,png,pdf,docx'
            ],
            [
                'type_id.required' => 'Jenis pengeluaran harus diisi',
            ]
        );
        $validatedData['user_id'] = auth()->user()->id;

        $report = Report::create($validatedData);

        if ($request->hasfile('evidence')) {
            foreach ($request->file('evidence') as $key => $file) {
                $fileUpload = new FileUpload();
                $fileUpload->report_id = $report->id;
                $fileUpload->filename = $file->getClientOriginalName();
                $fileUpload->filepath = $file->store('public/fileuploads');
                $fileUpload->filetype = $file->getClientOriginalExtension();
                $fileUpload->save();
            }
        }

        return redirect('report')->with('success_message', 'Pelaporan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        $datatypeexpense = TypeExpense::all();

        return view('report.edit', compact('report', 'datatypeexpense'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        date_default_timezone_set('Asia/Jakarta');
        $validatedData = $request->validate(
            [
                'type_id' => 'required',
                'detail' => 'required',
            ],
            [
                'type_id.required' => 'Jenis pengeluaran harus diisi',
            ]
        );

        Report::where('id', $report->id)->update($validatedData);

        if ($request->hasfile('evidence')) {
            $request->validate([
                'evidence.*' => 'mimes:jpg,jpeg,png,pdf,docx',
            ]);

            $fileExist = FileUpload::where('report_id', $report->id)->get()->pluck('filepath');
            foreach ($fileExist as $file) {
                Storage::delete($file);
            }
            FileUpload::where('report_id', $report->id)->delete();

            foreach ($request->file('evidence') as $key => $file) {
                $fileUpload = new FileUpload();
                $fileUpload->report_id = $report->id;
                $fileUpload->filename = $file->getClientOriginalName();
                $fileUpload->filepath = $file->store('public/fileuploads');
                $fileUpload->filetype = $file->getClientOriginalExtension();
                $fileUpload->save();
            }
        }

        return redirect('/report')->with('success_message', 'Pelaporan berhasil diubah!');
    }

    public function review(Request $request, Report $report)
    {
        date_default_timezone_set('Asia/Jakarta');

        try {
            Report::where('id', $request->id)->update(array('info' => $request->info, 'status' => $request->status));

            return redirect('/report')->with('success_message', 'Pelaporan dikembalikan!');
        } catch (ValidationException $e) {
            $errors = $e->errors();
            return redirect()->back()->withErrors($errors)->withInput()->with('error_modal_user_edit', $request->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Report::where('id', $id)->where('status', 'accept')->exists()) {
            return redirect('/report')->with('error_message', 'Pelaporan tidak dapat dihapus karena sudah diterima!');
        } else {
            if (FileUpload::where('report_id', $id)->exists()) {
                FileUpload::where('report_id', $id)->delete();
            }
            Report::destroy($id);
        }

        return redirect('/report')->with('success_message', 'Pelaporan berhasil dihapus!');
    }
}
