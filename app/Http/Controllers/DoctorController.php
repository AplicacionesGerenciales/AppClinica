<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Specialty;
use App\Models\User;
use Illuminate\Http\Request;
use App\Events\PatienEvent;
use App\Models\Patient;
use App\Notifications\NotificationX;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/**
 * Class DoctorController
 * @package App\Http\Controllers
 */
class DoctorController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-doctor', ['only' => ['index']]);
        $this->middleware('permission:crear-doctor', ['only' => ['create','store']]);
        $this->middleware('permission:editar-doctor', ['only' => ['edit','update']]);
        $this->middleware('permission:borrar-doctor', ['only' => ['destroy']]);
    }
    
    public function index()
    {
        $doctors = Doctor::paginate();
        $especialidad = Specialty::all();

        return view('doctor.index', compact('doctors','especialidad'))->with('i', (request()->input('page', 1) - 1) * $doctors->perPage());

    }

    public function store(Request $request)
{
    try{
        DB::transaction(function () use($request) {
            $user = User::create([
                'name' => $request['name'].$request['identity_card'],
                'email' => $request['identity_card'].'@correo.ni',
                'password' => Hash::make($request['identity_card']),

            ]);
            $request->request->add(['user_id' => $user->id]);
            $request->validate(Doctor::rules(null), Doctor::$messages);
            Doctor::create($request->all());
        });
    }
    catch(\Throwable $th){
        return redirect()->route('doctors.index')->with('mensaje', 'failCreate');
    }
     
    return redirect()->route('doctors.index')->with('mensaje', 'OkCreate');
}



public function update(Request $request, $id)
{
    $rules = Doctor::rules($id);
    request()->validate($rules, Doctor::$messages);
    $Doctor = request()->except('_token', '_method');
    Doctor::where('id', $id)->update($Doctor);
    return redirect()->route('doctors.index')->with('mensaje', 'OkUpdate');
}

    public function destroy($id)
    {
        Doctor::find($id)->delete();
        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully');
    }

    public function createNotification(Request $request){

        $data = $request->all();
        $data['userr_id'] = Auth::id();
        $post = Post::create($data);

        event(new PatienEvent($post));


        return redirect()->back()->with('mensaje', 'OkCreateNotification');
    } 

    public function viewNotification(){

        $postNotifications = auth()->user()->unreadNotifications;
        $user = \App\Models\User::find(1);
        
    // Pasa la instancia del modelo a la vista "create" para mostrar el formulario
    return view('doctor.notification', compact('postNotifications'));
    }
}
