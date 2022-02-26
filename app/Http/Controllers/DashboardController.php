<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aspiration;

class DashboardController extends Controller {

    public function index() {
        $aspiration = Aspiration::all();

        return view( 'dashboard', compact( 'aspiration' ) );
    }

    public function addAspiration( Request $request ) {
        Aspiration::create( $request->all() );

        return back();
    }

}