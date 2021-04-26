<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyExpectedVisitRequest;
use App\Http\Requests\StoreExpectedVisitRequest;
use App\Http\Requests\UpdateExpectedVisitRequest;
use App\Models\AllotUnit;
use App\Models\ExpectedVisit;
use App\Models\PurposeOfVisit;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExpectedVisitController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('expected_visit_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expectedVisits = ExpectedVisit::with(['unit_no', 'purposes'])->get();

        $allot_units = AllotUnit::get();

        $purpose_of_visits = PurposeOfVisit::get();

        return view('admin.expectedVisits.index', compact('expectedVisits', 'allot_units', 'purpose_of_visits'));
    }

    public function create()
    {
        abort_if(Gate::denies('expected_visit_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $unit_nos = AllotUnit::all()->pluck('unitnames', 'id')->prepend(trans('global.pleaseSelect'), '');

        $purposes = PurposeOfVisit::all()->pluck('name', 'id');

        return view('admin.expectedVisits.create', compact('unit_nos', 'purposes'));
    }

    public function store(StoreExpectedVisitRequest $request)
    {
        $expectedVisit = ExpectedVisit::create($request->all());
        $expectedVisit->purposes()->sync($request->input('purposes', []));

        return redirect()->route('admin.expected-visits.index');
    }

    public function edit(ExpectedVisit $expectedVisit)
    {
        abort_if(Gate::denies('expected_visit_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $unit_nos = AllotUnit::all()->pluck('unitnames', 'id')->prepend(trans('global.pleaseSelect'), '');

        $purposes = PurposeOfVisit::all()->pluck('name', 'id');

        $expectedVisit->load('unit_no', 'purposes');

        return view('admin.expectedVisits.edit', compact('unit_nos', 'purposes', 'expectedVisit'));
    }

    public function update(UpdateExpectedVisitRequest $request, ExpectedVisit $expectedVisit)
    {
        $expectedVisit->update($request->all());
        $expectedVisit->purposes()->sync($request->input('purposes', []));

        return redirect()->route('admin.expected-visits.index');
    }

    public function show(ExpectedVisit $expectedVisit)
    {
        abort_if(Gate::denies('expected_visit_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expectedVisit->load('unit_no', 'purposes');

        return view('admin.expectedVisits.show', compact('expectedVisit'));
    }

    public function destroy(ExpectedVisit $expectedVisit)
    {
        abort_if(Gate::denies('expected_visit_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expectedVisit->delete();

        return back();
    }

    public function massDestroy(MassDestroyExpectedVisitRequest $request)
    {
        ExpectedVisit::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
