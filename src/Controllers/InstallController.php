<?php

namespace HonestTraders\CoreService\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use HonestTraders\CoreService\Repositories\InitRepository;
use HonestTraders\CoreService\Repositories\InstallRepository;
use HonestTraders\CoreService\Requests\DatabaseRequest;
use HonestTraders\CoreService\Requests\LicenseRequest;
use HonestTraders\CoreService\Requests\UserRequest;
use HonestTraders\CoreService\Requests\ModuleInstallRequest;
use HonestTraders\CoreService\Requests\ThemeInstallRequest;

class InstallController extends Controller{
    protected $repo, $request, $init;

    public function __construct(
        InstallRepository $repo,
        InitRepository $init,
        Request $request
    )
    {
        $this->repo = $repo;
        $this->init = $init;
        $this->request = $request;
    }


    public function preRequisite(){

        $ac = Storage::disk('local')->exists('.app_installed') ? Storage::disk('local')->get('.app_installed') : null;
        if($ac){
            abort(404);
        }
        $checks = $this->repo->getPreRequisite();
		$server_checks = $checks['server'];
		$folder_checks = $checks['folder'];
        $verifier = $checks['verifier'];
        $has_false = in_array(false, $checks);

		envu(['APP_ENV' => 'production']);
		$name = env('APP_NAME');
		return view('service::install.preRequisite', compact('server_checks', 'folder_checks', 'name', 'verifier', 'has_false'));
    }

    public function license(){

        $checks = $this->repo->getPreRequisite();
        if(in_array(false, $checks)){
            return redirect()->route('service.preRequisite')->with(['message' => __('service::install.requirement_failed'), 'status' => 'error']);
        }

        $ac = Storage::disk('local')->exists('.app_installed') ? Storage::disk('local')->get('.app_installed') : null;
        if($ac){
            abort(404);
        }

        $reinstall = $this->repo->checkReinstall();

		return view('service::install.license', compact('reinstall'));
    }

    public function post_license(LicenseRequest $request){
        // return $request;
        $response = $this->repo->validateLicense($request->all());
        if($response && gv($response, 'goto')){
            $message = __('We can not verify your credentials, Please wait');
            $goto = $response['goto'];
        } else{
            session()->flash('license', 'verified');
            $goto = route('service.database');
            $message = __('service::install.valid_license');
            if (request('re_install') && $this->repo->checkReinstall()){
                Storage::disk('local')->put('.app_installed', Storage::disk('local')->get('.temp_app_installed'));
                Storage::disk('local')->delete('.temp_app_installed');
                Storage::disk('local')->put('.install_count', Storage::disk('local')->get('.install_count') + 1);
                $goto = url('/');
                $message = __('service::install.re_installation_process_complete');
            }
        }

		return response()->json(['message' => $message, 'goto' => $goto]);
    }

    public function database(){

        $ac = Storage::disk('local')->exists('.temp_app_installed') ? Storage::disk('local')->get('.temp_app_installed') : null;
        if(!$ac){
            abort(404);
        }
        if ($this->repo->checkDatabaseConnection()) {
            return redirect()->route('service.user')->with(['message' => __('service::install.connection_established'), 'status' => 'success']);
        }
		return view('service::install.database');
    }

    public function post_database(DatabaseRequest $request){
        $this->repo->validateDatabase($request->all());
		return response()->json(['message' => __('service::install.connection_established'), 'goto' => route('service.user')]);
    }


    public function done(){

        $data['user'] = Storage::disk('local')->exists('.user_email') ? Storage::disk('local')->get('.user_email') : null;
        $data['pass'] = Storage::disk('local')->exists('.user_pass') ? Storage::disk('local')->get('.user_pass') : null;

        if($data['user'] and $data['pass']){
            Log::info('done');
            Storage::disk('local')->delete(['.user_email', '.user_pass']);
            Storage::disk('local')->put('.install_count', 1);
            return view('service::install.done', $data);
        } else{
            abort(404);
        }

    }

     public function ManageAddOnsValidation(ModuleInstallRequest $request){
        $response = $this->repo->installModule($request->all());
        if($response){
            if($request->wantsJson()){
                return response()->json(['message' => __('service::install.module_verify'), 'reload' => true]);
            }
            Toastr::success(__('service::install.module_verify'), 'Success');
        }
         return back();

    }

    public function uninstall(){
        $response = $this->repo->uninstall($this->request->all());
        $message = 'Uninstall by script author successfully';
        info($message);
        return response()->json(['message' => $message, 'response' => $response]);
    }

    public function installTheme(ThemeInstallRequest $request){
        $this->repo->installTheme($request->all());
        $message = __('service::install.theme_verify');
        if($request->ajax()){
            return response()->json(['message' => $message, 'reload' => true]);
        }

        Toastr::success($message);
        return redirect()->back();

    }




}
