<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreUpdateOccurrences;
use App\Http\Resources\OccurrenceResource;
use App\Services\OccurrenceService;
use Illuminate\Http\Request;

class OccurrenceApiController extends Controller
{
    protected $occurrenceService;

    public function __construct(OccurrenceService $occurrenceService)
    {

        $this->occurrenceService = $occurrenceService;
    }

    public function index(Request $request)
    {
        $pre_page = (int)$request->get('pre_page', 15);

        $occurrence = $this->occurrenceService->getAllOccurrences($pre_page);

        return OccurrenceResource::collection($occurrence);
    }

    public function show($uuid)
    {
        $occurrence = $this->occurrenceService->getOccurrenceByUuid($uuid);

        if (!$occurrence) {
            return response()->json(['message' => 'Not found'], 404);
        }
        return new OccurrenceResource($occurrence);
    }

    public function store(Request $request)
    {
        $request->all();

        $occurrence = $this->occurrenceService->createOccurrence($request->all());

        return new OccurrenceResource($occurrence);
    }

    public function createNewOccurrence(StoreUpdateOccurrences $request)
    {
        $occurrence = $this->occurrenceService->createNewOccurrence($request->all());
        if (!$occurrence) {
            return response()->json(['message', 'Ocorrência não cadastrada'], 404);
        }
        return new OccurrenceResource($occurrence);

    }

}
