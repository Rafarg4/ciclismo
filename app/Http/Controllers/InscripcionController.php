<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInscripcionRequest;
use App\Http\Requests\UpdateInscripcionRequest;
use App\Repositories\InscripcionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Categoria;
use App\Models\Inscripcion;
use App\Models\Documento;
use App\Models\Seguro;
use App\Models\Pago;
use PDF;
use Auth;
use DB; 
use Illuminate\Support\Facades\Storage;
class InscripcionController extends AppBaseController
{
    /** @var InscripcionRepository $inscripcionRepository*/
    private $inscripcionRepository;

    public function __construct(InscripcionRepository $inscripcionRepo)
    {
        $this->inscripcionRepository = $inscripcionRepo;
    }

    /**
     * Display a listing of the Inscripcion.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function cambiar_estado(Request $request, $id)
    {
        $nuevoEstado = $request->input('estado');

        // Aquí debes realizar la lógica para actualizar el estado en tu modelo, por ejemplo:
        $inscripcion = Inscripcion::find($id);
        $inscripcion->estado = $nuevoEstado;
        $inscripcion->save();

        return response()->json(['message' => 'Estado actualizado correctamente']);
    }
    public function index(Request $request)
    {
      if(Auth::user()->hasRole('super_admin')) {
        $inscripcions = Inscripcion::all();
        return view('inscripcions.index',compact('inscripcions'));
     }else{
        $ci = $request->get('buscarpor');
        $inscripcions = Inscripcion::where('id_user', auth()->user()->id)
        ->paginate(3);
        return view('inscripcions.index')->with('inscripcions', $inscripcions)->with('user', Auth::user());
     } 

    }

    /**
     * Show the form for creating a new Inscripcion.
     *
     * @return Response
     */
    public function create()
    {
        $categoria = Categoria::where('tipo_categoria','Principal')->pluck('nombre','id');
        $categoria2 = Categoria::where('tipo_categoria','Master')->pluck('nombre','id');
        $categoria3 = Categoria::where('tipo_categoria','Ciclismo para todos')->pluck('nombre','id');
        return view('inscripcions.create', compact('categoria','categoria2','categoria3'));
    }

    /**
     * Store a newly created Inscripcion in storage.
     *
     * @param CreateInscripcionRequest $request
     *
     * @return Response
     */
    public function store(CreateInscripcionRequest $request)
    {
    if(Auth::user()->hasRole('super_admin')) {
        $rules = [
    
        'foto' => 'required',
      ];
       $mensaje = [
        'required'=>'El :attribute es requerido',
        'unique'=> 'Registro de inscripcion ya creado.',
      ];
      $this->validate($request,$rules,$mensaje);
        $input = $request->all();
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nombrefoto = $foto->getClientOriginalName(); // Obtiene el nombre original del archivo
            $foto->storeAs('public/uploads', $nombrefoto);
            $input['foto'] = $nombrefoto;
        }
        $inscripcion = $this->inscripcionRepository->create($input);

       Flash::success('Licencia creada. Descargue su licencia en el apartado de licencias.');

    return redirect(route('inscripcions.index'));
    }else{
        $rules = [
        'foto' => 'required',
      ];
       $mensaje = [
        'required'=>'El :attribute es requerido',
      ];
      $this->validate($request,$rules,$mensaje);
        $input = $request->all();
         if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nombrefoto = $foto->getClientOriginalName(); // Obtiene el nombre original del archivo
            $foto->storeAs('public/uploads', $nombrefoto);
            $input['foto'] = $nombrefoto;
        }
        $inscripcion = $this->inscripcionRepository->create($input);

        return redirect(route('inscripcions.index'));
    }

    }

    /**
     * Display the specified Inscripcion.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $inscripcion = $this->inscripcionRepository->find($id);
        $documento = Documento::where('id_inscripcion',$id)->get();
        $seguros = Seguro::where('id_inscripcion',$id)->get();
        $pagos = Pago::where('id_inscripcion',$id)->get();

        if (empty($inscripcion)) {
            Flash::error('Inscripcion no encontrado');

            return redirect(route('inscripcions.index'));
        }

        return view('inscripcions.show',compact('inscripcion','documento','seguros','pagos'));
    }

    /**
     * Show the form for editing the specified Inscripcion.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
    $categoria = Categoria::pluck('nombre','id');
     $categoria = Categoria::where('tipo_categoria','Principal')->pluck('nombre','id');
    $categoria2 = Categoria::where('tipo_categoria','Master')->pluck('nombre','id');
    $categoria3 = Categoria::where('tipo_categoria','Ciclismo para todos')->pluck('nombre','id');
    $inscripcion = $this->inscripcionRepository->find($id);

        if (empty($inscripcion)) {
            Flash::error('Inscripcion no encontrado');

            return redirect(route('inscripcions.index'));
        }

        return view('inscripcions.edit',compact('inscripcion','categoria','categoria2','categoria3'));
    }

    /**
     * Update the specified Inscripcion in storage.
     *
     * @param int $id
     * @param UpdateInscripcionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInscripcionRequest $request)
    {
        //Verifica si la foto existe para no volver a cargar
        $rules=[
        'primer_y_segundo_nombre',
        'primer_y_segundo_apellido',
        'fechanac',
        'email',
        'ci',
        'sexo',
        'grupo_sanguineo',
        'nacionalidad',
        'celular',
        'domiciolio',
        'ciudad',
        'id_categoria',
        'nombre_equipo',
        'contacto_emergencia',
        'nombre_apellido_contacto_emergencia',
        'departamento',
        'region',
        'estado',
        'monto',
        'federacion_id',
        'uciid',
        'id_user'
        ];
        $mensaje = [
        'required'=>'El :attribute es requerido',
      ];

        if($request->hasFile('foto')){
            $campo=['foto'=>'required|mines:jpeg,png,jpg'];
            $mensaje = [
        'required'=>'El :attribute es requerido',
      ];
  }
   $this->validate($request,$rules,$mensaje);
        $datos = request()->except(['_token', '_method']);
        $inscripcion = Inscripcion::findOrFail($id);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nombreOriginal = $foto->getClientOriginalName(); // Obtiene el nombre original del archivo

            // Elimina el archivo anterior
            $archivoAnterior = 'public/uploads/' . $inscripcion->foto;
            if (Storage::exists($archivoAnterior)) {
                Storage::delete($archivoAnterior);
            }

            // Almacena el nuevo archivo en la ubicación con el nombre original
            $foto->storeAs('public/uploads', $nombreOriginal);

            // Actualiza el nombre del archivo en los datos de entrada
            $datos['foto'] = $nombreOriginal;
        }

        Inscripcion::where('id', $id)->update($datos);

        $inscripcion = Inscripcion::findOrFail($id);

        Flash::success('Inscripción actualizada.');

        return redirect(route('inscripcions.index'));

    }
    /**
     * Remove the specified Inscripcion from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
{
    $inscripcion = $this->inscripcionRepository->find($id);

    if (empty($inscripcion)) {
        Flash::error('Inscripcion no encontrado');
        return redirect(route('inscripcions.index'));
    }

    // Obtén el nombre del archivo asociado a la inscripción
    $nombreArchivo = $inscripcion->foto;

    // Elimina el archivo desde el sistema de almacenamiento
    if (!empty($nombreArchivo)) {
        $archivoAEliminar = 'public/uploads/' . $nombreArchivo;
        if (Storage::exists($archivoAEliminar)) {
            Storage::delete($archivoAEliminar);
        }
    }

    // Elimina la inscripción de la base de datos
    $this->inscripcionRepository->delete($id);

    Flash::success('Inscripcion eliminada.');

    return redirect(route('inscripcions.index'));
}
    //Imprimir directo pdf de seguro
  public function seguro($id)
   {
   $seguros = Seguro::where('id_inscripcion',$id)->get();
    $inscripcion = $this->inscripcionRepository->find($id);
    $pdf = PDF::loadView('inscripcions.seguro', compact('inscripcion','seguros'));
   return $pdf->download('Seguro.pdf');
    }
  //  public function seguro($id)
   //{
    
    //$inscripcion = $this->inscripcionRepository->find($id); 
    //$seguros = Seguro::where('id_inscripcion',$id)
    //->get();
     // return view('inscripcions.seguro')->with('inscripcion', $inscripcion)->with('seguros', $seguros)->with('user', Auth::user());
    //}
     public function pago(Request $request, $id)
    {
    $federacion_id = $request->input('federacion_id');
    $uciid = $request->input('uciid');
    $estado = $request->input('estado');
    
    DB::table('inscripcions')
            ->where('id', $id)
            ->update([
                'federacion_id' => $federacion_id, 
                'uciid' => $uciid,
                'estado' => $estado
            ]);

        return redirect()->back()->with('success', 'Datos actualizados correctamente');
}
public function guardarDescarga($id)
{
    $inscripcion = Inscripcion::find($id);

    if ($inscripcion) {
        $inscripcion->update(['licencia' => 'S']);
        return response()->json(['success' => true, 'message' => 'Descarga actualizada correctamente.']);
    }

    return response()->json(['success' => false, 'message' => 'No se pudo encontrar la inscripción.']);
}
public function actualizarSeguro($id)
{
    $inscripcion = Inscripcion::find($id);

    if ($inscripcion) {
        $inscripcion->update(['seguro' => 'S']);
        return response()->json(['success' => true, 'message' => 'Descarga actualizada correctamente.']);
    }

    return response()->json(['success' => false, 'message' => 'No se pudo encontrar la inscripción.']);
}

}
