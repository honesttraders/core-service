<?php

namespace HonestTraders\CoreService\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use HonestTraders\CoreService\Repositories\LicenseRepository;
use Toastr;

class LicenseController extends Controller{
    protected $repo, $request;

    public function __construct(LicenseRepository $repo, Request $request)
    {
         $this->middleware('auth');
        $this->repo = $repo;
        $this->request = $request;
    }


    public function revoke(){

        $ac = Storage::disk('local')->exists('.app_installed') ? Storage::disk('local')->get('.app_installed') : null;
        if(!$ac){
            return redirect()->route('service.install');
        }

        abort_if(auth()->user()->role_id != 1, 403);

        $this->repo->revoke();

        return redirect()->route('service.install');

    }

    public function revokeModule(Request $request){

        $ac = Storage::disk('local')->exists('.app_installed') ? Storage::disk('local')->get('.app_installed') : null;
        if(!$ac){
            return redirect()->route('service.install');
        }

        abort_if(auth()->user()->role_id != 1, 403);

        $this->repo->revokeModule($request->all());
        Toastr::success('Your module license revoke successfull');

        return redirect()->back();

    }

    public function revokeTheme(Request $request){

        $ac = Storage::disk('local')->exists('.app_installed') ? Storage::disk('local')->get('.app_installed') : null;
        if(!$ac){
            return redirect()->route('service.install');
        }

        abort_if(auth()->user()->role_id != 1, 403);

        $this->repo->revokeTheme($request->all());
        Toastr::success('Your theme license revoke successfull');

        return redirect()->back();

    }
}
