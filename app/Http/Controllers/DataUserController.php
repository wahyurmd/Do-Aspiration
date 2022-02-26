<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserView;

class DataUserController extends Controller {

    public function index() {
        $user = UserView::all();

        return view( 'data_user', compact( 'user' ) );
    }

}