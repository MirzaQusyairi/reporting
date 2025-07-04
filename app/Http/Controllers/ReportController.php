<?php

namespace App\Http\Controllers;

use App\Models\FileUpload;
use App\Models\Report;
use App\Models\TypeExpense;
use App\Models\User;
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
        // if (auth()->user()->role == 'administrator') {
        //     $data = Report::orderby('created_at', 'DESC')->get();
        // } else {
        //     $data = Report::where('user_id', auth()->user()->id)->orderby('created_at', 'DESC')->get();
        // }

        // $users = User::all()->where('role', '!=', 'administrator');
        // $data = [];

        // foreach ($users as $user) {
        //     $totalReport = Report::where('user_id', $user->id)->count();
        //     $processReport = Report::where('user_id', $user->id)->where('status', 'process')->count();
        //     $returnReport = Report::where('user_id', $user->id)->where('status', 'return')->count();
        //     $acceptReport = Report::where('user_id', $user->id)->where('status', 'accept')->count();

        //     $data[] = [
        //         'user' => $user,
        //         'processReport' => $processReport,
        //         'returnReport' => $returnReport,
        //         'acceptReport' => $acceptReport,
        //         'totalReport' => $totalReport,
        //     ];
        // }

        if (auth()->user()->role == 'administrator') {
            $data = User::where('role', '!=', 'administrator')
                ->withCount('reports as totalReport')
                ->withCount(['reports as processReport' => function ($query) {
                    $query->where('status', 'process');
                }])
                ->withCount(['reports as returnReport' => function ($query) {
                    $query->where('status', 'return');
                }])
                ->withCount(['reports as acceptReport' => function ($query) {
                    $query->where('status', 'accept');
                }])
                ->get();
        } else {
            $data = Report::where('user_id', auth()->user()->id)->orderby('created_at', 'DESC')->get();
        }

        return view('report.index', compact('data'));
    }

    public function report($status)
    {
        if (auth()->user()->role == 'administrator') {
            if ($status == 'all') {
                $data = Report::orderby('created_at', 'DESC')->get();
            } elseif ($status == 'process') {
                $data = Report::where('status', $status)->orderby('created_at', 'DESC')->get();
            } elseif ($status == 'return') {
                $data = Report::where('status', $status)->orderby('created_at', 'DESC')->get();
            } elseif ($status == 'accept') {
                $data = Report::where('status', $status)->orderby('created_at', 'DESC')->get();
            } else {
                $data = Report::where('user_id', $status)->orderby('created_at', 'DESC')->get();
            }
        } else {
            if ($status == 'all') {
                $data = Report::where('user_id', auth()->user()->id)->orderby('created_at', 'DESC')->get();
            } elseif ($status == 'process') {
                $data = Report::where('user_id', auth()->user()->id)->where('status', $status)->orderby('created_at', 'DESC')->get();
            } elseif ($status == 'return') {
                $data = Report::where('user_id', auth()->user()->id)->where('status', $status)->orderby('created_at', 'DESC')->get();
            } elseif ($status == 'accept') {
                $data = Report::where('user_id', auth()->user()->id)->where('status', $status)->orderby('created_at', 'DESC')->get();
            } else {
                $data = Report::where('user_id', auth()->user()->id)->where('user_id', $status)->orderby('created_at', 'DESC')->get();
            }
        }

        return view('report.report-filter', compact('data'));
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
                'evidence' => 'required|mimes:jpg,jpeg,png,pdf,docx,xlsx',
                // 'evidence.*' => 'mimes:jpg,jpeg,png,pdf,docx,xlsx'
            ],
            [
                'type_id.required' => 'Jenis pengeluaran harus diisi',
                'detail.required' => 'Detail pengeluaran harus diisi',
                'evidence.required' => 'Bukti pengeluaran harus diisi',
                'evidence.mimes' => 'Bukti pengeluaran harus berupa file jpg, jpeg, png, pdf, docx, xlsx'
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
                'detail.required' => 'Detail pengeluaran harus diisi',
            ]
        );
        $validatedData['status'] = 'process';

        Report::where('id', $report->id)->update($validatedData);

        if ($request->hasfile('evidence')) {
            $request->validate(
                [
                    'evidence' => 'mimes:jpg,jpeg,png,pdf,docx,xlsx',
                ],
                [
                    'evidence.mimes' => 'Bukti pengeluaran harus berupa file jpg, jpeg, png, pdf, docx, xlsx'
                ]
            );

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

            return redirect()->back()->with('success_message', 'Pelaporan dikembalikan!');
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
