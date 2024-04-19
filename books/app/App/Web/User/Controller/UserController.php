<?php

namespace App\Web\User\Controller;

use App\Core\Http\Controllers\Controller;
use App\Domain\User\Actions\CreateUserAction;
use App\Domain\User\Actions\EditUserAction;
use App\Domain\User\DataTransferObjects\UserData;
use App\Domain\User\Models\User;
use App\Web\User\Request\UserRequest;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function index(){
        $users = User::all();

        return view('createUser', compact('users'));
    }
    public function store(UserRequest $request, CreateUserAction $action){
        $data = UserData::FromRequest($request);
        $action($data);

        return back()->with(['sucess'=> 'User successfully registered']);
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

}
