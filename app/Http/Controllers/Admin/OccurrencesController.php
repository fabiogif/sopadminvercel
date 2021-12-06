<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateOccurrences;
use App\Models\Occurrences;
use Illuminate\Http\Request;
use App\Models\TypeOccurrence;
use App\Models\Issuing;

class OccurrencesController extends Controller
{
    protected $repository;

    public function __construct(Occurrences $occurrences, TypeOccurrence $typeOccurrence, Issuing $issuing)
    {
        $this->repository = $occurrences;
        $this->typeOccurrence = $typeOccurrence;
        $this->issuing = $issuing;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $occurrences = $this->repository->paginate();
        return view('admin.pages.occurrences.index',  ['occurrences' => $occurrences]);
    }

    public function create()
    {
        $typeOccurrences = $this->typeOccurrence->orderBy('name')->get();
        $issuings = $this->issuing->orderBy('name')->get();

        return view('admin.pages.occurrences.create', ['typeOccurrences' => $typeOccurrences, 'issuings' => $issuings]);
    }

    public function store(StoreUpdateOccurrences $request)
    {
        $tenant = auth()->user()->tenant;

        $data = $request->all();
        $data['users_id'] = $tenant->id;
        $this->repository->create($data);


        return redirect()->route('occurrences.index');
    }

    public function show($id)
    {
        $occurrences = $this->repository->where('id', $id)->first();
        $issuings = $this->issuing->orderBy('name')->get();

        if (!$occurrences) {
            return redirect()->back();
        }

        return  view('admin.pages.occurrences.show', ['occurrences' => $occurrences, 'issuings' => $issuings]);
    }

    public function destroy($id)
    {
        $occurrences = $this->repository->where('id', $id)->first();

        if (!$occurrences) {
            return redirect()->back();
        }
        $occurrences->delete();

        return  redirect()->route('occurrences.index')->with('messageSuccess', 'Excluido com sucesso');
    }


    public function search(Request $request)
    {
        $filters = $request->all();

        $occurrences = $this->repository->Occurrence($request->filter);

        return view(
            'admin.pages.occurrences.index',
            [
                'occurrences' => $occurrences,
                'filters' => $filters
            ]
        );
    }

    public function edit($id)
    {
        $occurrences = $this->repository->where('id', $id)->first();
        $typeOccurrences = $this->typeOccurrence->orderBy('name')->get();
        $issuings = $this->issuing->orderBy('name')->get();

        if (!$occurrences) {
            return redirect()->back();
        }
        return view(
            'admin.pages.occurrences.edit',
            ['occurrences' => $occurrences, 'typeOccurrences' => $typeOccurrences, 'issuings' => $issuings]
        );
    }

    public function update(StoreUpdateOccurrences $request, $id)
    {
        $occurrences = $this->repository->where('id', $id)->first();

        if (!$occurrences) {
            return redirect()->back();
        }
        $occurrences->update($request->all());
        return  redirect()->route('occurrences.index');
    }
}
