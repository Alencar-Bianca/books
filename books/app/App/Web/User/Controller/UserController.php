<?php

namespace App\Web\User\Controller;

use App\Core\Http\Controllers\Controller;
use App\Domain\User\Actions\CreateUserAction;
use App\Domain\User\Actions\EditUserAction;
use App\Domain\User\DataTransferObjects\UserData;
use App\Domain\User\Models\User;
use App\Web\User\Request\UserRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Auth;
class UserController extends Controller
{
    public function index(){
        $users = User::all();

        return view('createUser', compact('users'));
    }
    public function store(UserRequest $request, CreateUserAction $action){
        $data = UserData::FromRequest($request);
        $action($data);

        return redirect()->route('login');
    }

    public function show(){
        $users = User::all();

        return view('showUser', compact('users'));
    }
    public function delete($id){
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['success' => true]);
    }
    public function edit($id){
        try {
            $user = User::findOrFail($id);
            return view('editUser', compact('user'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('user.index');
        }
    }
    public function editReq(Request $request, $id) {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found']);
        }

        $user->update($request->all());
        return response()->json(['success' => true]);
    }

    public function signIn(Request $request) {
        $user = User::signInUser($request);

        if (!$user) {
            return redirect()->route('login')->with('error','Name and/or password incorrect.');
        }

        if($user) {
            $user = Auth::user();
            if ($user->name == null) {
                Auth::logout();
                return redirect()->route('login')->with('error','Antes de acessar a sua conta você precisa ativar o seu cadastro clicando no link que enviamos para o seu e-mail.');
            }
        }
        return redirect()->route('book.show');
    }

    public function login() {
        return view('login');
    }
    public function logout() {
        Auth::logout();
        return view('login');
    }
    public function addIdBook($id, $user_id) {
        User::where('id', $user_id)->update(['book_id' => $id]);

        return Redirect::back();
    }

}
