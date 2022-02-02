<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OccurrenceResource;
use App\Services\OccurrenceService;
use Illuminate\Http\Request;

class OccurrenceApiController extends Controller
{
    protected $OccurrenceService;

    public function __construct(OccurrenceService $OccurrenceService)
    {
        $this->OccurrenceService = $OccurrenceService;
    }

    public function index(Request $request)
    {
        $pre_page = (int) $request->get('pre_page', 15);

        $Occurrence = $this->OccurrenceService->getAllOccurrences($pre_page);

        return OccurrenceResource::collection($Occurrence);
    }

    public function show($uuid)
    {
        $Occurrence = $this->OccurrenceService->getOccurrenceByUuid($uuid);

        if (!$Occurrence) {
            return response()->json(['message' => 'Not found'], 404);
        }
        return new OccurrenceResource($Occurrence);
    }
}
