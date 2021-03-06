<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */
namespace App\Http\Controllers\LA;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use DB;
use Validator;
use Datatables;
use Collective\Html\FormFacade as Form;
use Dwij\Laraadmin\Models\Module;
use Dwij\Laraadmin\Models\ModuleFields;
use App\Models\Franquiciatario;
use Dwij\Laraadmin\Models\LAConfigs;
use Dwij\Laraadmin\Helpers\LAHelper;
use App\User;
use App\Permission;
use App\Role;
use Mail;
use Log;
class FranquiciatariosController extends Controller
{	
	public $show_action = true;
	public $view_col = 'nombrecompletofran';
	public $listing_cols = ['id', 'imagenfran', 'nombrecompletofran', 'telefonocasa', 'celularfran', 'correofran', 'domiciliofran','rfc','domiciliofiscal','sucursal'];
	
	public function __construct() {
		// Field Access of Listing Columns
		if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
			$this->middleware(function ($request, $next) {
				$this->listing_cols = ModuleFields::listingColumnAccessScan('Franquiciatarios', $this->listing_cols);
				return $next($request);
			});
		} else {
			$this->listing_cols = ModuleFields::listingColumnAccessScan('Franquiciatarios', $this->listing_cols);
		}
	}
	
	/**
	 * Display a listing of the Franquiciatarios.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$module = Module::get('Franquiciatarios');
		
		if(Module::hasAccess($module->id)) {
			return View('la.franquiciatarios.index', [
				'show_actions' => $this->show_action,
				'listing_cols' => $this->listing_cols,
				'module' => $module
			]);
		} else {
            return redirect(config('laraadmin.adminRoute')."/");
        }
	}
	/**
	 * Show the form for creating a new franquiciatario.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}
	/**
	 * Store a newly created franquiciatario in database.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		if(Module::hasAccess("Franquiciatarios", "create")) {
		
			$rules = Module::validateRules("Franquiciatarios", $request);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();
			}
			
			// generate password
			$password = LAHelper::gen_password();
			$api_token = LAHelper::gen_password();
			// Create Client
			$insert_id = Module::insert("Franquiciatarios", $request);
			// Create User
			$user = User::create([
				'name' => $request->nombrecompletofran,
				'email' => $request->correofran,
				'password' => bcrypt($password),
				'context_id' => $insert_id,
				'api_token' => bcrypt($api_token),
				'type' => "FRANQUICIATARIO",
			]);
	
			// update user role
		
			$user->detachRoles();
			$role = Role::find($request->role);
			$user->attachRole($role);
			
			
		
			
			if(env('MAIL_USERNAME') != null && env('MAIL_USERNAME') != "null" && env('MAIL_USERNAME') != "") {
				// Send mail to User his Password
				Mail::send('emails.send_login_cred', ['user' => $user, 'password' => $password], function ($m) use ($user) {
					$m->from('hello@laraadmin.com', 'LaraAdmin');
					$m->to($user->email, $user->name)->subject('LaraAdmin - Your Login Credentials');
				});
			} else {
				Log::info("User created: username: ".$user->email." Password: ".$password);
			}
		
				
			
			return redirect()->route(config('laraadmin.adminRoute') . '.franquiciatarios.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}
	/**
	 * Display the specified franquiciatario.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		if(Module::hasAccess("Franquiciatarios", "view")) {
			
			$franquiciatario = Franquiciatario::find($id);
			if(isset($franquiciatario->id)) {
				$module = Module::get('Franquiciatarios');
				$module->row = $franquiciatario;
				
				return view('la.franquiciatarios.show', [
					'module' => $module,
					'view_col' => $this->view_col,
					'no_header' => true,
					'no_padding' => "no-padding"
				])->with('franquiciatario', $franquiciatario);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("franquiciatario"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}
	/**
	 * Show the form for editing the specified franquiciatario.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		if(Module::hasAccess("Franquiciatarios", "edit")) {			
			$franquiciatario = Franquiciatario::find($id);
			if(isset($franquiciatario->id)) {	
				$module = Module::get('Franquiciatarios');
				
				$module->row = $franquiciatario;
				
				return view('la.franquiciatarios.edit', [
					'module' => $module,
					'view_col' => $this->view_col,
				])->with('franquiciatario', $franquiciatario);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("franquiciatario"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}
	/**
	 * Update the specified franquiciatario in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		if(Module::hasAccess("Franquiciatarios", "edit")) {
			
			$rules = Module::validateRules("Franquiciatarios", $request, true);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();;
			}
			
			$insert_id = Module::updateRow("Franquiciatarios", $request, $id);
			// Update User
			$user = User::where('context_id', $insert_id)->where('type','FRANQUICIATARIO')->first();
			$user->name = $request->nombrecompletofran;
			$user->email = $request->correofran;
			$user->save();
			
			// update user role
			$user->detachRoles();
			$role = Role::find($request->role);
			$user->attachRole($role);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.franquiciatarios.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}
	/**
	 * Remove the specified franquiciatario from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		if(Module::hasAccess("Franquiciatarios", "delete")) {
			Franquiciatario::find($id)->delete();
			
			// Redirecting to index() method
			return redirect()->route(config('laraadmin.adminRoute') . '.franquiciatarios.index');
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}
	
	/**
	 * Datatable Ajax fetch
	 *
	 * @return
	 */
	public function dtajax()
	{
		$values = DB::table('franquiciatarios')->select($this->listing_cols)->whereNull('deleted_at');
		$out = Datatables::of($values)->make();
		$data = $out->getData();
		$fields_popup = ModuleFields::getModuleFields('Franquiciatarios');
		
		for($i=0; $i < count($data->data); $i++) {
			for ($j=0; $j < count($this->listing_cols); $j++) { 
				$col = $this->listing_cols[$j];
				if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
					$data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
				}
				if($col == $this->view_col) {
					$data->data[$i][$j] = '<a href="'.url(config('laraadmin.adminRoute') . '/franquiciatarios/'.$data->data[$i][0]).'">'.$data->data[$i][$j].'</a>';
				}
				// else if($col == "author") {
				//    $data->data[$i][$j];
				// }
			}
			
			if($this->show_action) {
				$output = '';
				if(Module::hasAccess("Franquiciatarios", "edit")) {
					$output .= '<a href="'.url(config('laraadmin.adminRoute') . '/franquiciatarios/'.$data->data[$i][0].'/edit').'" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
				}
				
				if(Module::hasAccess("Franquiciatarios", "delete")) {
					$output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.franquiciatarios.destroy', $data->data[$i][0]], 'method' => 'delete', 'style'=>'display:inline']);
					$output .= ' <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-times"></i></button>';
					$output .= Form::close();
				}
				$data->data[$i][] = (string)$output;
			}
		}
		$out->setData($data);
		return $out;
	}
	/**
     * Change Employee Password
     *
     * @return
     */
	public function change_password($id, Request $request) {
		
		$validator = Validator::make($request->all(), [
            'password' => 'required|min:6',
			'password_confirmation' => 'required|min:6|same:password'
        ]);
		
		if ($validator->fails()) {
			return \Redirect::to(config('laraadmin.adminRoute') . '/franquiciatarios/'.$id)->withErrors($validator);
		}
		
		$franquiciatario = Franquiciatario::find($id);
		$user = User::where("context_id", $franquiciatario->id)->where('type', 'FRANQUICIATARIO')->first();
		$user->password = bcrypt($request->password);
		$user->save();
		
		\Session::flash('success_message', 'Password is successfully changed');
		
		// Send mail to User his new Password
		if(env('MAIL_USERNAME') != null && env('MAIL_USERNAME') != "null" && env('MAIL_USERNAME') != "") {
			// Send mail to User his new Password
			Mail::send('emails.send_login_cred_change', ['user' => $user, 'password' => $request->password], function ($m) use ($user) {
				$m->from(LAConfigs::getByKey('default_email'), LAConfigs::getByKey('sitename'));
				$m->to($user->email, $user->name)->subject('LaraAdmin - Login Credentials chnaged');
			});
		} else {
			Log::info("User change_password: username: ".$user->email." Password: ".$request->password);
		}
		
		return redirect(config('laraadmin.adminRoute') . '/franquiciatarios/'.$id.'#tab-account-settings');
	}
}