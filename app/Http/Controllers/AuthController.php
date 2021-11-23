<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }
    public function index() {
        return User::all();
    }
    public function update(Request $request, $id) {
        $user =  User::find($id);
        if ($user === null) {
            return response()->json(["message" => "Không tìm thấy người dùng này"], 404);
        }
        $user->name =$request->hoTen;
        $user->maNhom = $request->maNhom;
        $user->save();
        return $user;
    }
    public function updateProfile(Request $request, $id) {
        $user =  User::find($id);
        if ($user === null) {
            return response()->json(["message" => "Không tìm thấy người dùng này"], 404);
        }
        $user->name =$request->hoTen;
        $user->save();
        return $user;
    }
    public function updatePassword(Request $request, $id) {
        $user =  User::find($id);
         if ($user === null) {
            return response()->json(["message" => "Không tìm thấy người dùng này"], 404);
        }
        if (!Hash::check($request->matKhauCu, $user->password)) {
             return response()->json(["message" => "Mật khẩu cũ không chính xác"], 422);
        };

        $user->password = Hash::make($request->matKhauMoi);
        $user->save();
        return $user;
    }
    public function register(Request $request)
    {
        $user = new User();
        $user->name = $request->hoTen;
        $user->email = $request->email;
        $user->maNhom = $request->maNhom;
        $user->password = Hash::make($request->password);
        $user->save();

        return $user;
    }
    public function reset( $id)
    {
        $user =  User::find($id);
        if ($user === null) {
            return response()->json(["message" => "Không tìm thấy người dùng này"], 404);
        }
        $user->password = Hash::make("123456");
        $user->save();
         return response()->json(["message" => "Khôi phục mật khẩu người dùng thành công"], 200);
    }
    public function delUsers(Request $request)
    {

        foreach (json_decode($request->id, true)  as $id)
        {
            $delUser = User::find($id);
            $delUser->delete();

        }
        return response()->json(['message' => 'Xóa người dùng thành công'], 200);
    }
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);
        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['message' => 'Thông tin đăng nhập không chính xác'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
            auth()->logout();
            return response()->json(['message' => 'Đăng xuất thành công']);

    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
