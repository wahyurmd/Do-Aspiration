<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aspiration;

class AdminController extends Controller {

    public function index() {
        $aspiration = Aspiration::join( 'users', 'users.username', '=', 'aspirations.username' )->where( 'aspirations.status', '1' )->get( [ 'aspirations.*', 'users.name' ] );

        return view( 'admin', compact( 'aspiration' ) );
    }

    public function delAspiration( Request $request, $id ) {
        Aspiration::where( [ 'id' => $id ] )->update( [
            'status' => '0',
        ] );

        return back()->with( 'successDel', 'Succesfully removed the aspiration' );
    }

}