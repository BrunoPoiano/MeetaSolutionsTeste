<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('userList', ['usuarios' => User::orderby('id', 'desc')->get()]);
    }
    public function storeUsuario()
    {
        return view('userCreate', ['message' => '']);
    }
    public function updateUsuario($id)
    {
        return view('userUpdate', ['usuario' => User::find($id), 'message' => '']);
    }
    public function updateUsuarioPassword($id)
    {
        return view('userUpdatePassword', ['usuario' => User::find($id), 'message' => '']);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        if ($request) {
            //Verificando se o email esta disponivel
            $emailTeste = User::get();
            for ($i = 0; $i < count($emailTeste); $i++) {
                if ($emailTeste[$i]->email == $request->email) {
                    return view('userCreate', ['message' => 'email em uso']);
                }
            }

            //Validando dados recebidos
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'username' => 'required',
                'email' => 'required',
                'password' => 'required',
            ]);
            if ($validator->fails()) {
                return view('userCreate', ['message' => 'Todos os Campos devem estar preenchidos']);
            }

            //criando usuario
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
                'password' => Hash::make($request['password']),
            ]);

            return redirect()->route('index');
        }
        return view('userCreate', ['message' => 'Erro ao receber dados']);

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {

        if ($request) {
            //Validando dados recebidos
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'username' => 'required',
                'email' => 'required',
            ]);
            if ($validator->fails()) {
                return view('userUpdate', ['usuario' => User::find($id), 'message' => 'Todos os Campos devem estar preenchidos']);
            }

            //atualizando dados recebidos
            if ($upUser = User::find($id)) {
                $upUser->name = $request->name;
                $upUser->username = $request->username;
                $upUser->email = $request->email;
                $upUser->update();
                return redirect()->route('index');
            }
            return view('userUpdate', ['usuario' => User::find($id), 'message' => 'Erro ao procurar usuario']);
        }
        return view('userUpdate', ['usuario' => User::find($id), 'message' => 'Erro ao receber dados']);

    }

    public function updateUserPassword(Request $request, $id)
    {
        if ($request) {

            //Validando dados recebidos
            $validator = Validator::make($request->all(), [
                'oldPassword' => 'required',
                'newPassword' => 'required',
                'confirmPassword' => 'required',
            ]);
            if ($validator->fails()) {
                return view('userUpdatePassword', ['usuario' => User::find($id), 'message' => 'Todos os campos devem estar preenchidos']);
            }

            //Verificando se a nova senha e a confirmação são iguais
            if ($request->confirmPassword != $request->newPassword) {
                return view('userUpdatePassword', ['usuario' => User::find($id), 'message' => 'Password not Confirmed']);
            } else {
                $upUserPass = User::find($id);
                //Verificando a senha antiga é igual a cadastrada
                if (Hash::check($request->oldPassword, $upUserPass->password)) {
                    $upUserPass->password = Hash::make($request['newPassword']);
                    $upUserPass->update();
                    return redirect()->route('index');
                } else {
                    return view('userUpdatePassword', ['usuario' => User::find($id), 'message' => 'Old Password Mismatch']);
                }
            }
        }
        return view('userUpdatePassword', ['usuario' => User::find($id), 'message' => 'Erro ao receber dados']);

    }

    public function destroy($id)
    {
        //excluindo usuario
        $delUser = User::find($id);
        $delUser->Delete();
        return redirect()->route('index');
    }
}
