<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHelpDeskRequest;
use App\Http\Requests\StoreHelpDeskRequest;
use App\Http\Requests\UpdateHelpDeskRequest;
use App\Models\EnquiryCategory;
use App\Models\HelpDesk;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HelpDeskController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('help_desk_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $helpDesks = HelpDesk::with(['enquiry_types'])->get();

        $enquiry_categories = EnquiryCategory::get();

        return view('admin.helpDesks.index', compact('helpDesks', 'enquiry_categories'));
    }

    public function create()
    {
        abort_if(Gate::denies('help_desk_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $enquiry_types = EnquiryCategory::all()->pluck('name', 'id');

        return view('admin.helpDesks.create', compact('enquiry_types'));
    }

    public function store(StoreHelpDeskRequest $request)
    {
        $helpDesk = HelpDesk::create($request->all());
        $helpDesk->enquiry_types()->sync($request->input('enquiry_types', []));

        return redirect()->route('admin.help-desks.index');
    }

    public function edit(HelpDesk $helpDesk)
    {
        abort_if(Gate::denies('help_desk_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $enquiry_types = EnquiryCategory::all()->pluck('name', 'id');

        $helpDesk->load('enquiry_types');

        return view('admin.helpDesks.edit', compact('enquiry_types', 'helpDesk'));
    }

    public function update(UpdateHelpDeskRequest $request, HelpDesk $helpDesk)
    {
        $helpDesk->update($request->all());
        $helpDesk->enquiry_types()->sync($request->input('enquiry_types', []));

        return redirect()->route('admin.help-desks.index');
    }

    public function show(HelpDesk $helpDesk)
    {
        abort_if(Gate::denies('help_desk_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $helpDesk->load('enquiry_types');

        return view('admin.helpDesks.show', compact('helpDesk'));
    }

    public function destroy(HelpDesk $helpDesk)
    {
        abort_if(Gate::denies('help_desk_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $helpDesk->delete();

        return back();
    }

    public function massDestroy(MassDestroyHelpDeskRequest $request)
    {
        HelpDesk::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
