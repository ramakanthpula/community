<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPurposeOfVisitRequest;
use App\Http\Requests\StorePurposeOfVisitRequest;
use App\Http\Requests\UpdatePurposeOfVisitRequest;
use App\Models\PurposeOfVisit;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PurposeOfVisitController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('purpose_of_visit_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purposeOfVisits = PurposeOfVisit::all();

        return view('admin.purposeOfVisits.index', compact('purposeOfVisits'));
    }

    public function create()
    {
        abort_if(Gate::denies('purpose_of_visit_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.purposeOfVisits.create');
    }

    public function store(StorePurposeOfVisitRequest $request)
    {
        $purposeOfVisit = PurposeOfVisit::create($request->all());

        return redirect()->route('admin.purpose-of-visits.index');
    }

    public function edit(PurposeOfVisit $purposeOfVisit)
    {
        abort_if(Gate::denies('purpose_of_visit_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.purposeOfVisits.edit', compact('purposeOfVisit'));
    }

    public function update(UpdatePurposeOfVisitRequest $request, PurposeOfVisit $purposeOfVisit)
    {
        $purposeOfVisit->update($request->all());

        return redirect()->route('admin.purpose-of-visits.index');
    }

    public function show(PurposeOfVisit $purposeOfVisit)
    {
        abort_if(Gate::denies('purpose_of_visit_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.purposeOfVisits.show', compact('purposeOfVisit'));
    }

    public function destroy(PurposeOfVisit $purposeOfVisit)
    {
        abort_if(Gate::denies('purpose_of_visit_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purposeOfVisit->delete();

        return back();
    }

    public function massDestroy(MassDestroyPurposeOfVisitRequest $request)
    {
        PurposeOfVisit::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
