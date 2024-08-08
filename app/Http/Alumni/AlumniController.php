<?php
namespace App\Http\Alumni;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AlumniController extends Controller
{
    public function index()
    {
        return view('users.index');
    }
} 

?>