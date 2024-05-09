<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UsersController extends Controller
{   

    public function Login (Request $request) {
        $credentials = $request->except('_token');
        
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); 
            return redirect()->intended();
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');                
    }

    public function SessionDestroy (Request $request) {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return to_route('login');        
    }

    public function gettable (){
        $a_data = User::select('id', 'name', 'email')->get();   
        foreach ($a_data as $data) {                        
            $data->boton = '<button id="btn_show_user" class="block px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300" type="button">Editar</button>';
        }        
        return response()->json(['data' => $a_data]);    
    }
    
    public function  getUsers (Request $request) {     
        $a_data =  User::find($request->id);
        return $a_data;
    }

    public function  CreateOrUpdate (Request $request) {
        $datos = $request->except(['_token']);    
        $id = $request->id;
        $es_admin =  $request->EsAdmin;
        if (strlen($es_admin)) {
            $datos['EsAdmin'] = 1;
        }                
        if (strlen($id)) {            
            $user = User::find($id);                                    
            if ($user) {
                $old_pass =  $user->password;
                $datos = $request->except(['_token','password_confirmation']);
                $pass =  $request->password;                
                $es_admin =  $request->EsAdmin;
                if (strlen($es_admin)) {
                    $datos['EsAdmin'] = 1;
                }  
                // Verifica si la contraseña ha cambiado antes de cifrarla nuevamente
                if ($old_pass != $pass) {            
                    $datos['password'] = bcrypt($pass);;                    
                }
                try {
                    User::where('id', $request->id)->update($datos);    
                    return response()->json(['result' => '1', 'msg' => 'Usuario actulizados correctamente']);
                } catch (\Throwable $th) {            
                    $holis =  User::where('id', $request->id)->update($datos);
                    return $holis;
                    return response()->json(['result' => '0', 'msg' => 'Error al actualizar el usuario']);
                }    
            } else {
                return response()->json(['result' => '0', 'msg' => 'Usuario no encontrado']);
            }

        } else {            
            $pass =  $request->password; 
            $datos['password'] = $pass = bcrypt($pass);
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'unique:users'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()]
            ]);
    
            try {
                // User::updateOrCreate($codiciones, $datos);            
                User::create($datos);
                return response()->json(['result' => '1', 'msg' => 'Usuario creado/actualizado con exito']);                     
            } catch (\Throwable $th) {
                // throw $th;                        
                return response()->json(['result' => '0', 'msg' => 'Error al crear/agreagar el usuario']);           
                
            }
        
        }
    }

    // public function delete () {
        
    // }
}
