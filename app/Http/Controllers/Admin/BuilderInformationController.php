<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBuilderInformationRequest;
use App\Http\Requests\StoreBuilderInformationRequest;
use App\Http\Requests\UpdateBuilderInformationRequest;
use App\Models\BuilderInformation;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BuilderInformationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('builder_information_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $builderInformations = BuilderInformation::all();

        return view('admin.builderInformations.index', compact('builderInformations'));
    }

    public function create()
    {
        abort_if(Gate::denies('builder_information_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.builderInformations.create');
    }

    public function store(StoreBuilderInformationRequest $request)
    {
        $builderInformation = BuilderInformation::create($request->all());

        return redirect()->route('admin.builder-informations.index');
    }

    public function edit(BuilderInformation $builderInformation)
    {
        abort_if(Gate::denies('builder_information_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.builderInformations.edit', compact('builderInformation'));
    }

    public function update(UpdateBuilderInformationRequest $request, BuilderInformation $builderInformation)
    {
        $builderInformation->update($request->all());

        return redirect()->route('admin.builder-informations.index');
    }

    public function show(BuilderInformation $builderInformation)
    {
        abort_if(Gate::denies('builder_information_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.builderInformations.show', compact('builderInformation'));
    }

    public function destroy(BuilderInformation $builderInformation)
    {
        abort_if(Gate::denies('builder_information_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $builderInformation->delete();

        return back();
    }

    public function massDestroy(MassDestroyBuilderInformationRequest $request)
    {
        BuilderInformation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
