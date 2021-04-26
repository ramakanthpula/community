<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyVisitorRequest;
use App\Http\Requests\StoreVisitorRequest;
use App\Http\Requests\UpdateVisitorRequest;
use App\Models\AllotUnit;
use App\Models\Visitor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VisitorController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('visitor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $visitors = Visitor::with(['unit_no'])->get();

        $allot_units = AllotUnit::get();

        return view('admin.visitors.index', compact('visitors', 'allot_units'));
    }

    public function create()
    {
        abort_if(Gate::denies('visitor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $unit_nos = AllotUnit::all()->pluck('unitnames', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.visitors.create', compact('unit_nos'));
    }

    public function store(StoreVisitorRequest $request)
    {
        $visitor = Visitor::create($request->all());

        return redirect()->route('admin.visitors.index');
    }

    public function edit(Visitor $visitor)
    {
        abort_if(Gate::denies('visitor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $unit_nos = AllotUnit::all()->pluck('unitnames', 'id')->prepend(trans('global.pleaseSelect'), '');

        $visitor->load('unit_no');

        return view('admin.visitors.edit', compact('unit_nos', 'visitor'));
    }

    public function update(UpdateVisitorRequest $request, Visitor $visitor)
    {
        $visitor->update($request->all());

        return redirect()->route('admin.visitors.index');
    }

    public function show(Visitor $visitor)
    {
        abort_if(Gate::denies('visitor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $visitor->load('unit_no');

        return view('admin.visitors.show', compact('visitor'));
    }

    public function destroy(Visitor $visitor)
    {
        abort_if(Gate::denies('visitor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $visitor->delete();

        return back();
    }

    public function massDestroy(MassDestroyVisitorRequest $request)
    {
        Visitor::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
