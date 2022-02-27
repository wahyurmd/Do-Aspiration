<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aspiration;

class DashboardController extends Controller {

    public function index() {
        $aspiration = Aspiration::where( 'status', '1' )->paginate( '100' );

        return view( 'dashboard', compact( 'aspiration' ) );
    }

    public function addAspiration( Request $request ) {
        Aspiration::create( $request->all() );

        return back();
    }

}