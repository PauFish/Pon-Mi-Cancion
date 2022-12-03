<?php
  
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
  
class HomeController extends Controller
{
    /*
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    /*
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('userParty');
    } 
  
    /*
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        return view('homeAdmin');
    }
  
    /*
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function managerHome()
    {
        return view('djHome');
    }
}