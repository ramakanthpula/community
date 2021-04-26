<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHelpDeskRequest;
use App\Http\Requests\UpdateHelpDeskRequest;
use App\Http\Resources\Admin\HelpDeskResource;
use App\Models\HelpDesk;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HelpDeskApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('help_desk_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HelpDeskResource(HelpDesk::with(['enquiry_types'])->get());
    }

    public function store(StoreHelpDeskRequest $request)
    {
        $helpDesk = HelpDesk::create($request->all());
        $helpDesk->enquiry_types()->sync($request->input('enquiry_types', []));

        return (new HelpDeskResource($helpDesk))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(HelpDesk $helpDesk)
    {
        abort_if(Gate::denies('help_desk_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HelpDeskResource($helpDesk->load(['enquiry_types']));
    }

    public function update(UpdateHelpDeskRequest $request, HelpDesk $helpDesk)
    {
        $helpDesk->update($request->all());
        $helpDesk->enquiry_types()->sync($request->input('enquiry_types', []));

        return (new HelpDeskResource($helpDesk))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(HelpDesk $helpDesk)
    {
        abort_if(Gate::denies('help_desk_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $helpDesk->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
