<?php

namespace App\Http\Controllers;
use App\Models\Factura;
use App\Models\Notificacion;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\Gastos;
use App\Models\Producto;
use App\Models\Presupuesto;
use App\Models\Ganancia;
use Spatie\Permission\Models\Role;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show  the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            
        return view('admin.home.index') ;
        

       


   
    }




    /**
     *  get the sub month of the given integer
     */
    private function getPrevDate($num){
        return Carbon::now()->subMonths($num)->toDateTimeString();
    }

     /**
     *  get the sub month of the given integer
     */
    private function getPrevDay($num){
        return Carbon::now()->subDays($num)->toDateTimeString();
    }


 public function borrarNotificacion(Request $request, $notificacion_id){
        if($request->ajax()){            
            $notificacion = Notificacion::find($notificacion_id);
            $usuario = \Auth::user();
            if($notificacion != null && $usuario != null){
                $usuario->notificaciones()->detach($notificacion);
                $usuario->save();
                //Notificacion::cargarNotificaciones();

                if($notificacion->usuarios()->count() == 0){
                    $notificacion->delete();
                }               
            }
            $notificaciones_total = $usuario->notificaciones()->count();

            return Response()->json([
                'total' => $notificaciones_total,
                'mensaje' => 'Notiicación borrada'
            ]);
        }   
    }
}
