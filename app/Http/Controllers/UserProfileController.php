<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use DB;
use Validator;
use Datatables;
use Collective\Html\FormFacade as Form;
use Dwij\Laraadmin\Models\Module;
use Dwij\Laraadmin\Models\ModuleFields;
use Dwij\Laraadmin\Models\LAConfigs;
use Dwij\Laraadmin\Helpers\LAHelper;
use Illuminate\Support\Facades\Input;
use App\Models\Encuesta;
use App\Models\Cita;
use App\Models\Franquiciatario;
use App\Models\Cuenta;
use App\Models\Cliente;
use App\Models\Documento;
use App\Models\Employee;
use App\Models\FacturaXML;
use App\Models\Pedicurista;
use App\Models\Producto;
use App\Models\Evento;
use App\Models\Sucursal;
use App\Models\Servicio;
use App\Models\Horario;
use App\User;
use App\Models\Upload;
use Mail;
use Carbon\Carbon;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class UserProfileController extends Controller
{

     public $show_action = true;
    public $view_col = 'cliente_id';
    public $listing_cols = ['id', 'cliente_id', 'sucursal_id', 'servicio_id', 'pedicurista_id', 'fechaservicio','hora','estatus','cortesia'];
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         // Field Access of Listing Columns
        if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
            $this->middleware(function ($request, $next) {
                $this->listing_cols = ModuleFields::listingColumnAccessScan('Citas', $this->listing_cols);
                return $next($request);
            });
        } else {
            $this->listing_cols = ModuleFields::listingColumnAccessScan('Citas', $this->listing_cols);
        }
    }

    
    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {            

        $module = Module::get('Citas');
        $clientes= Cliente::all();
        $cliente='';
        $sucursales= Sucursal::all();
        $sucursal = '';
        $servicios= Servicio::all();
        $servicio = '';
        $horarios = Horario::all();
        $horario = '';
       
           
      

        $franquiciatarios = Franquiciatario::join('users','users.context_id','=','franquiciatarios.id')->where('franquiciatarios.id',Auth::user()->context_id)->where('users.type','FRANQUICIATARIO')->select(array('franquiciatarios.*'))->whereNull('franquiciatarios.deleted_at')->get();    
        $franquiciatariorfc = Franquiciatario::join('users','users.context_id','=','franquiciatarios.id')->where('franquiciatarios.id',Auth::user()->context_id)->where('users.type','FRANQUICIATARIO')->select(array('franquiciatarios.rfc'))->whereNull('franquiciatarios.deleted_at')->value('rfc');    
         
        $facturasxmls = FacturaXML::join('franquiciatarios','franquiciatarios.rfc','=','facturaxmls.rfc')->join('users','users.context_id','=','franquiciatarios.id')->where('franquiciatarios.rfc','=',$franquiciatariorfc)->select(array('facturaxmls.*'))->whereNull('facturaxmls.deleted_at')->groupBy('facturaxmls.id')->paginate(6);

         $xmlsfiles = FacturaXML::join('franquiciatarios','franquiciatarios.rfc','=','facturaxmls.rfc')->join('users','users.context_id','=','franquiciatarios.id')->where('franquiciatarios.rfc','=',$franquiciatariorfc)->select(array('facturaxmls.*'))->whereNull('facturaxmls.deleted_at')->value('xml');

          $pdfsfiles = FacturaXML::join('franquiciatarios','franquiciatarios.rfc','=','facturaxmls.rfc')->join('users','users.context_id','=','franquiciatarios.id')->where('franquiciatarios.rfc','=',$franquiciatariorfc)->select(array('facturaxmls.*'))->whereNull('facturaxmls.deleted_at')->value('pdf');

       
              $xmls= Upload::find($xmlsfiles); 


              $pdfs= Upload::find($pdfsfiles);
     
      

          //Docuemntos
      

        $adecuacionsucursalinteriors = Documento::where('conceptodocu','=','Adecuación de Sucursal: Interior')->select(array('documentos.*'))->orderBy('documentos.nombredocu','DESC')->whereNull('documentos.deleted_at')->get();

        $adecuacionsucursalexteriors = Documento::where('conceptodocu','=','Adecuación de Sucursal: Exterior')->select(array('documentos.*'))->orderBy('documentos.nombredocu','DESC')->whereNull('documentos.deleted_at')->get();

        $impresos = Documento::where('conceptodocu','=','Impresos')->select(array('documentos.*'))->orderBy('documentos.nombredocu','DESC')->whereNull('documentos.deleted_at')->get();

        $videopantallas = Documento::where('conceptodocu','=','Videos para Pantallas')->select(array('documentos.*'))->orderBy('documentos.nombredocu','DESC')->whereNull('documentos.deleted_at')->get();

       // $eventos = Evento::leftJoin('patrocinadores','patrocinadores.id','=','eventos.patrocinadores')->select(array('eventos.*','patrocinadores.nombrepatroc','patrocinadores.logopatroc'))->orderBy('eventos.fecha','DESC')->paginate(4);


    return View('user-profile', [
                'show_actions' => $this->show_action,
                'listing_cols' => $this->listing_cols,
                'module' => $module,
                'clientes' => $clientes,
                'cliente' => $cliente,
                'sucursales' => $sucursales,
                'sucursal' => $sucursal,
                'servicios' => $servicios,
                'servicio' => $servicio,
                'horarios' => $horarios,
                'horario' => $horario,
                'franquiciatarios'=> $franquiciatarios,
                'facturasxmls'=> $facturasxmls,
                'adecuacionsucursalinteriors'=> $adecuacionsucursalinteriors,
                'adecuacionsucursalexteriors'=> $adecuacionsucursalexteriors,
                'impresos'=> $impresos,
                'videopantallas'=> $videopantallas,
                'xmls'=> $xmls,
                'pdfs'=> $pdfs
            ]);
			
			
    }
    

}