<?php

namespace App\Http\Controllers\Common;

use Illuminate\Http\Response;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class BaseApiController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $guardName;

    /**
     * Get the authGuard
     *
     * @return \Illuminate\Http\Response
     */
    public function authGuard()
    {
        return Auth::guard($this->guardName);
    }

    /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function user()
    {
        return $this->authGuard($this->guardName)->user();
    }

    public function beginTransaction() {
        return \DB::beginTransaction();
    }

    public function commit() {
        return \DB::commit();
    }

    public function rollBack() {
        return \DB::rollBack();
    }

   public function successResponse($data = array(), string $message = 'Successful', int $code = Response::HTTP_OK) {
        $res = [
            'status' => true,
            'data' => $data,
        ];

        if($data instanceof \Illuminate\Pagination\LengthAwarePaginator) {
            $res['meta'] = [
                'currentPage' => $data->currentPage(),
                'lastPage' => $data->lastPage(),
                'path' => $data->path(),
                'perPage' => $data->perPage(),
                'total' => $data->total(),
            ];
            $res['data'] = $data->items();
        }
        $res['message'] = $message;
        $res['code'] = $code;

        return response()->json($res, $code);
   }

   public function errorResponse(string $message = 'error', int $code = Response::HTTP_OK) {
		\DB::rollBack();

		return response()->json([
			'status' => false,
			'message' => $message,
			'code' => $code,
		], $code);
   }



}
