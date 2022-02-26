<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aspiration;

class AdminController extends Controller {

    public function index() {
        $aspiration = Aspiration::join( 'users', 'users.username', '=', 'aspirations.username' )->get( [ 'aspirations.*', 'users.name' ] );

        return view( 'admin', compact( 'aspiration' ) );
    }

}