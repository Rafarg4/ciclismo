<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateInscripcionRequest;
use App\Http\Requests\UpdateInscripcionRequest;
use App\Repositories\InscripcionRepository;
use App\Http\Controllers\AppBaseController;
use Flash;
use Response;
use PDF;
use App\Models\Inscripcion;
class LicenciaController extends Controller
{
	 /** @var InscripcionRepository $inscripcionRepository*/
    private $inscripcionRepository;

    public function __construct(InscripcionRepository $inscripcionRepo)
    {
        $this->inscripcionRepository = $inscripcionRepo;
    }
  
     public function show($id)
    {
        $inscripcions = $this->inscripcionRepository->find($id);
        $pdf = PDF::loadView('inscripcions.licencias', compact('inscripcions'))->setPaper('a4', 'landscape');
         return $pdf->download('Licencia.pdf');
    }
}
