<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDocumentoRequest;
use App\Http\Requests\UpdateDocumentoRequest;
use App\Repositories\DocumentoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Inscripcion;
class DocumentoController extends AppBaseController
{
    /** @var DocumentoRepository $documentoRepository*/
    private $documentoRepository;

    public function __construct(DocumentoRepository $documentoRepo)
    {
        $this->documentoRepository = $documentoRepo;
    }

    /**
     * Display a listing of the Documento.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $documentos = $this->documentoRepository->all();

        return view('documentos.index')
            ->with('documentos', $documentos);
    }

    /**
     * Show the form for creating a new Documento.
     *
     * @return Response
     */
    public function create()
    {
        $inscripcions = Inscripcion::pluck('primer_y_segundo_nombre','id');
        return view('documentos.create', compact('inscripcions'));
    }

    /**
     * Store a newly created Documento in storage.
     *
     * @param CreateDocumentoRequest $request
     *
     * @return Response
     */
    public function store(CreateDocumentoRequest $request)
    {
        $input = $request->all();
        if($request->hasFile('archivo_pago')){
            $input['archivo_pago']=$request->file('archivo_pago')->store('uploads','public');   
        }
        if($request->hasFile('archivo_inscripcion')){
            $input['archivo_inscripcion']=$request->file('archivo_inscripcion')->store('uploads','public');   
        }
        if($request->hasFile('archivo_seguro_medico')){
            $input['archivo_seguro_medico']=$request->file('archivo_seguro_medico')->store('uploads','public');   
        }

        $documento = $this->documentoRepository->create($input);

        Flash::success('Documento saved successfully.');

        return redirect(route('documentos.index'));
    }

    /**
     * Display the specified Documento.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $documento = $this->documentoRepository->find($id);

        if (empty($documento)) {
            Flash::error('Documento not found');

            return redirect(route('documentos.index'));
        }

        return view('documentos.show')->with('documento', $documento);
    }

    /**
     * Show the form for editing the specified Documento.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $inscripcions = Inscripcion::pluck('primer_y_segundo_nombre','id');
        $documento = $this->documentoRepository->find($id);

        if (empty($documento)) {
            Flash::error('Documento not found');

            return redirect(route('documentos.index'));
        }

        return view('documentos.edit',compact('inscripcions','documento'));
    }

    /**
     * Update the specified Documento in storage.
     *
     * @param int $id
     * @param UpdateDocumentoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDocumentoRequest $request)
    {
        $documento = $this->documentoRepository->find($id);

        if (empty($documento)) {
            Flash::error('Documento not found');

            return redirect(route('documentos.index'));
        }

        $documento = $this->documentoRepository->update($request->all(), $id);

        Flash::success('Documento updated successfully.');

        return redirect(route('documentos.index'));
    }

    /**
     * Remove the specified Documento from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $documento = $this->documentoRepository->find($id);

        if (empty($documento)) {
            Flash::error('Documento not found');

            return redirect(route('documentos.index'));
        }

        $this->documentoRepository->delete($id);

        Flash::success('Documento deleted successfully.');

        return redirect(route('documentos.index'));
    }
}
