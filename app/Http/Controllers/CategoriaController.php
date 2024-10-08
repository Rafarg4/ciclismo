<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use App\Repositories\CategoriaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Modalidad;
use App\Models\Categoria;
class CategoriaController extends AppBaseController
{
    /** @var CategoriaRepository $categoriaRepository*/
    private $categoriaRepository;

    public function __construct(CategoriaRepository $categoriaRepo)
    {
        $this->categoriaRepository = $categoriaRepo;
    }

    /**
     * Display a listing of the Categoria.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
         $categorias = Categoria::with('modalidad')->get();

        return view('categorias.index')
            ->with('categorias', $categorias);
    }

    /**
     * Show the form for creating a new Categoria.
     *
     * @return Response
     */
    public function create()
    {

        $modalidades =Modalidad::pluck('nombre','id');
        return view('categorias.create',compact('modalidades'));
    }

    /**
     * Store a newly created Categoria in storage.
     *
     * @param CreateCategoriaRequest $request
     *
     * @return Response
     */
    public function store(CreateCategoriaRequest $request)
    {
        $input = $request->all();

        $categoria = $this->categoriaRepository->create($input);

        Flash::success('Categoria creada.');

        return redirect(route('categorias.index'));
    }

    /**
     * Display the specified Categoria.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $categoria = $this->categoriaRepository->find($id);

        if (empty($categoria)) {
            Flash::error('Categoria no enctrada');

            return redirect(route('categorias.index'));
        }

        return view('categorias.show')->with('categoria', $categoria);
    }

    /**
     * Show the form for editing the specified Categoria.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $modalidades =Modalidad::pluck('nombre','id');
        $categoria = $this->categoriaRepository->find($id);

        if (empty($categoria)) {
            Flash::error('Categoria no encontrada');

            return redirect(route('categorias.index'));
        }

        return view('categorias.edit')->with('categoria', $categoria)->with('modalidades', $modalidades);
    }

    /**
     * Update the specified Categoria in storage.
     *
     * @param int $id
     * @param UpdateCategoriaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCategoriaRequest $request)
    {
        $categoria = $this->categoriaRepository->find($id);

        if (empty($categoria)) {
            Flash::error('Categoria no encontrada');

            return redirect(route('categorias.index'));
        }

        $categoria = $this->categoriaRepository->update($request->all(), $id);

        Flash::success('Categoria actualizada.');

        return redirect(route('categorias.index'));
    }

    /**
     * Remove the specified Categoria from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
         //Renstrigir eliminacion
        // $categoriaRepository=DB::select("select categorias.*, (select count(*) from inscripcions where categorias.id = inscripcions.id_categoria and inscripcions.deleted_at is null) as inscripcion_count  from categorias where deleted_at is null and categorias.deleted_at is null ");
        $categoria = $this->categoriaRepository->find($id);

        if (empty($categoria)) {
            Flash::error('Categoria no encontrada');

            return redirect(route('categorias.index'));
        }

        $this->categoriaRepository->delete($id);

        Flash::success('Categoria eliminada.');

        return redirect(route('categorias.index'));
    }
}
