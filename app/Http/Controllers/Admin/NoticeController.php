<?php

namespace App\Http\Controllers\Admin;

use App\Notice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveNoticeRequest;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Notice $notice)
    {
        $notices = Notice::latest()->paginate(10);
        return view('administrators.notices.index',compact('notices', 'notice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Notice $notice)
    {
        return view('administrators.notices.create',compact('notice'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveNoticeRequest $request)
    {
        // dd($request);
        $notice = Notice::create($request->validated());

        return redirect()->route('notices.index',compact('notice'))
        ->with('status','El aviso se ha creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function show(Notice $notice)
    {
        return view('administrators.notices.show',compact('notice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function edit(Notice $notice)
    {
        return view('administrators.notices.edit',compact('notice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function update(SaveNoticeRequest $request, Notice $notice)
    {
        $notice->update($request->validated());

        return redirect()->route('notices.show',compact('notice'))
        ->with('status','Aviso editado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notice $notice)
    {
        $notice->delete();

        return redirect()->route('notices.index')
        ->with('status','Aviso eliminado exitosamente');
    }

    public function modalnotice()
    {
        dd($notice);
    }
}
