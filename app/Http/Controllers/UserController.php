<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        if(!Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
            abort(422,'المعلومات غير صحيحة');
//            return  response()->json('المعلومات غير صحيحة' . " ".response()->json( $request), 442);
        }
        /** @var \App\Models\User $user */

        $user = Auth::user();
        $user->token = $user->createToken('token')->plainTextToken; //->accessToken;
        $user = ['id' => $user->id,'name' => $user->name,'is_admin' => $user->is_admin,'token' => $user->token,];
        return new UserResource($user);

        return   $user ;

    }

    public function logout()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->tokens()->delete();
        if ($user) {
            return __('تم تسجيل خروج');
        }

        return response()->json([
            'status' => false,
        ], 500);

    }



    public function index()
    {
        $users = User::all();
        return UserResource::collection($users);
    }

    public function store(UserRequest $request)
    {
        return new UserResource(User::create($request->validated())) ;
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function update(UserRequest $request, User $user)
    {
        abort_if(!Auth::user()->is_admin, \Symfony\Component\HttpFoundation\Response::HTTP_FORBIDDEN, 'لا تملك صلاحية');
        $user->update($request->validated());
        return new UserResource($user->fresh());
    }

    public function destroy(int $id)
    {
        $user = user::findOrFail($id);
        $user->delete();
        return response()->json($user);
    }
}
