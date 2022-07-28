<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreUpdateOccurrences;
use App\Http\Resources\OccurrenceResource;
use App\Services\OccurrenceService;
use Illuminate\Http\Request;
use App\Models\OccurrencesImagens;
use App\Models\Occurrences;

class OccurrenceApiController extends Controller
{
    protected $occurrenceService, $occurrenceImage, $occurrences;

    public function __construct(OccurrenceService $occurrenceService, OccurrencesImagens $occurrencesImage, Occurrences $occurrences)
    {
        $this->occurrenceService = $occurrenceService;
        $this->occurrenceImage = $occurrencesImage;
        $this->occurrences = $occurrences;

    }

    public function index(Request $request)
    {

        $pre_page = (int)$request->get('pre_page', 15);

        $occurrence = $this->occurrenceService->getAllOccurrences($pre_page);


        return OccurrenceResource::collection($occurrence);
    }

    public function show($id)
    {
        $occurrence = $this->occurrenceService->getOccurrenceById($id);

        if (!$occurrence) {
            return response()->json(['message' => 'Not found'], 404);
        }
        return new OccurrenceResource($occurrence);
    }


    public function getOccurrenceByClientId($clientId)
    {
        $occurrence = $this->occurrenceService->getOccurrenceByClientId($clientId);

        if (!$occurrence) {
            return response()->json(['message' => 'Not found'], 404);
        }

        return OccurrenceResource::collection($occurrence);

    }

    public function store(Request $request)
    {

        $occurrence = $this->occurrenceService->createOccurrence($request->all());

        return new OccurrenceResource($occurrence);
    }

    public function createNewOccurrence(StoreUpdateOccurrences $request)
    {

        $data = $request->all();

        $occurrence = $this->occurrenceService->createNewOccurrence($data);

        if (!$occurrence) {
            return response()->json(['message', 'Ocorrência não cadastrada'], 404);
        }
        $imagem = array();
        foreach ($request->allFiles()['anexo'] as $i => $anexo) {
            $data['url'] = $anexo->store("occurrence/occurrences");
            $data['occurrence_id'] = $occurrence->id;
            $this->occurrences->imagens()->create($data);
            $imagem[] = $data['url'];
        }
        $occurrence->anexo = $imagem;



        return new OccurrenceResource($occurrence);

    }

}
