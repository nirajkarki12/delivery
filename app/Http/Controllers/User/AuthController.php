<?php

namespace App\Http\Controllers\User;

use App\Models\Vechile;
use Illuminate\Http\Request;
use App\Http\Controllers\Common\UserApiController;
use Hash;
use Validator;
use App\Http\Helpers\Helper;
use App\Models\User;

/**
* @group User
*/
class AuthController extends UserApiController
{
    /**
    * Login APIs
    * User Login
    * @bodyParam phone string required valid phone number & min 10-15 in length.
    * @bodyParam password string required min 6 in length.
    * @response {
    *  "status": true,
    *  "data": {
    *   "name": "Name Example",
    *   "email": "example@gmail.com",
    *   "phone": null,
    *   "image": null,
    *   "created_at": "2020-04-14 15:00",
    *   "token": "JWT Token"
    *  },
    * "message": "Logged in successfully",
    * "code": 200
    * }
    * @response 200 {
    *  "status": false,
    *  "message": "The phone field is required.",
    *  "code": 200
    * }
    * @response 200 {
    *  "status": false,
    *  "message": "Phone/Password Mismatched",
    *  "code": 200
    * }
    */
   public function login(Request $request)
   {
      try {
          $validator = Validator::make($request->all(), [
              'phone' => 'required|digits_between:10,15',
              'password' => 'required'
          ]);
          if($validator->fails()) throw new \Exception($validator->errors()->first());

          $user = User::where('phone', $request->phone)->first();

          if(!$user || !Hash::check($request->password, $user->password)) throw new \Exception('Phone/Password missmatch');

          $user->updated_at = new \DateTime();
          $user->save();

          $response = [
              'name' => $user->name,
              'email' => $user->email,
              'image' => $user->image,
              'phone' => $user->phone,
              'created_at' => $user->created_at,
              'token' => $this->authGuard()->login($user)
          ];

          return $this->successResponse($response, 'Logged in successfully');

     } catch (\Exception $e) {
         return $this->errorResponse($e->getMessage());
     }
   }
    /**
     * Register APIs
     * User Registration
	  * @bodyParam name string required full name 4-100 in length.
	  * @bodyParam phone integer required 10 digit & unique.
	  * @bodyParam password string required 6-100 in length.
	  * @bodyParam email string unique & valid email address.
	  * @bodyParam image file accepts: jpeg,png,gif, filesize upto 2MB.
	  * @bodyParam vechileType string required walker/bike/van/mini truck.
	  * @bodyParam vechileNumber string required full vechile number.
	  * @bodyParam documentType string required citizenship/license.
	  * @bodyParam documentFront file required accepts: jpeg,png,gif, filesize upto 2MB.
	  * @bodyParam documentBack file required accepts: jpeg,png,gif, filesize upto 2MB.
	  * @bodyParam districtId integer required district ID.
	  * @bodyParam phone2 string required Emergency Contact Number 1 7-10 in length.
	  * @bodyParam phone3 string Emergency Contact Number 2 7-10 in length.
	  * @response 200 {
     *  "status": true,
     *  "data": {
     *   "name": "Name Example",
     *   "email": null,
     *   "phone": "98xxxxxxxx",
     *   "image": null,
     *   "created_at": "2020-04-14 15:00",
     *   "token": "JWT Token"
     *  },
     * "message": "Registered successfully",
     * "code": 200
     * }
     * @response 200 {
     *  "status": false,
     *  "message": "The Full Name field is required.",
     *  "code": 200
     * }
     * @response 200 {
     *  "status": false,
     *  "message": "The email has already been taken.",
     *  "code": 200
     * }
     * @response 200 {
     *  "status": false,
     *  "message": "The password must be at least 6 characters.",
     *  "code": 200
     * }
     * @response 200 {
     *  "status": false,
     *  "message": "The Image failed to upload.",
     *  "code": 200
     * }
     * @response 200 {
     *  "status": false,
     *  "message": "Login error",
     *  "code": 200
     * }
     */
    public function register(Request $request)
    {
        try {
				$data = $request->except('_token');

				$vechileType = implode(',', Vechile::$vechileTypes);
				$documentType = implode(',', User::$documentTypes);

				$validator = Validator::make( $data, [
					'name' => 'required|min:4|max:100',
					'phone' => 'required|digits:10|unique:users',
					'email' => 'email|unique:users',
					'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:2058',
					'password' => 'required|min:6|max:100',
					'vechileType' => "required|in:$vechileType",
					'vechileNumber' => "required",
					'documentType' => "required|in:$documentType",
					'documentFront' => 'required|mimes:jpeg,png,jpg,gif|max:2058',
					'documentBack' => 'required|mimes:jpeg,png,jpg,gif|max:2058',
					'districtId' => 'required|exists:districts,id',
					'phone2' => 'required|digits_between:7,10',
					'phone3' => 'nullable|digits_between:7,10',
				],
                [],
                [
						'name' => 'Full Name',
						'image' => 'Image',
						'phone2' => 'Emergency Contact Number 1',
						'phone3' => 'Emergency Contact Number 2',
                ]
            );
            if($validator->fails()) throw new \Exception($validator->messages()->first());

			  // Database transaction start
			  \DB::beginTransaction();

				$user = new User;
				$user->name = $request->name;
				$user->email = $request->email;
				$user->phone = $request->phone;
				$user->password = Hash::make($request->password);
				$user->document_type = $request->documentType;
				$user->district_id = $request->districtId;
				$user->phone2 = $request->phone2;
				$user->phone3 = $request->phone3;

				if($request->file('image')) {
					if(!$file = Helper::uploadImage($request->file('image'), 'user')) throw new \Exception("Cannot Save Image");
					$user->image = $file;
				}

				if($request->file('documentFront')) {
					if(!$file = Helper::uploadImage($request->file('image'), 'user')) throw new \Exception("Cannot Save Document Front");
					$user->ducument_front = $file;
				}

				if($request->file('documentBack')) {
					if(!$file = Helper::uploadImage($request->file('image'), 'user')) throw new \Exception("Cannot Save Document Back");
					$user->ducument_back = $file;
				}

				$user->save();

				$vechile = new Vechile;
				$vechile->type = $request->vechileType;
				$vechile->vechile_number = $request->vechileNumber;
				$vechile->user()->associate($user);
				$vechile->save();

			  // Database commit
			  \DB::commit();

            if (!$token = $this->authGuard()->attempt(['phone' => $user->phone, 'password' => $request->password])) throw new \Exception('Login error');

            $response = [
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                'image' => $user->image,
                'created_at' => $user->created_at,
                'token' => $token
            ];
            return $this->successResponse($response, 'Registered successfully');

        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    /**
     * Get Info APIs
     * Authenticated User Info
     * Header: X-Authorization: Bearer {token}
     * @response {
     *  "status": true,
     *  "data": {
     *   "name": "Name Example",
     *   "email": null,
     *   "phone": "98xxxxxxxx",
     *   "image": null,
     *   "created_at": "2020-04-14 15:00"
     *  },
     * "message": "User info fetched successfully",
     * "code": 200
     * }
     * @response 200 {
     *  "status": false,
     *  "message": "User not found",
     *  "code": 200
     * }
     * @response 200 {
     *  "status": false,
     *  "message": "Invalid Request",
     *  "code": 200
     * }
     */
    public function getInfo()
    {
        try {
            if(!$user = $this->user()) throw new \Exception("User not found");

            $response = [
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                'image' => $user->image,
                'created_at' => $user->created_at,
            ];

            return $this->successResponse($response, 'User info fetched successfully');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    /**
     * Update Profile Picture APIs
     * Update Profile Picture
     * @bodyParam image file accepts: jpeg,png,gif, filesize upto 2MB.
     * @response 200 {
     *  "status": true,
     *  "data": {
     *   "name": "Name Example",
     *   "email": null,
     *   "phone": "98xxxxxxxx",
     *   "image": null,
     *   "created_at": "2020-04-14 15:00"
     *  },
     * "message": "Profile Updated successfully",
     * "code": 200
     * }
     * @response 200 {
     *  "status": false,
     *  "message": "The Image failed to upload.",
     *  "code": 200
     * }
     * @response 200 {
     *  "status": false,
     *  "message": "Invalid Request",
     *  "code": 200
     * }
     */
    public function updateProfilePicture(Request $request)
    {
        try {
            if(!$user = $this->user()) throw new \Exception("User not found");

            $validator = Validator::make( $request->all(), [
                    'image' => 'required|mimes:jpeg,png,jpg,gif|max:2058',
                ]
            );

            if($validator->fails()) throw new \Exception($validator->messages()->first());
            if($request->file('image')) {
                 Helper::deleteImage($user->image, 'user');
                if(!$file = Helper::uploadImage($request->file('image'), 'user')) throw new \Exception("Cannot Save Image");
                $user->image = $file;
            }

            $user->save();

            $response = [
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                'image' => $user->image,
                'created_at' => $user->created_at,
            ];

            return $this->successResponse($response, 'Profile Updated successful');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    /**
     * Update Profile APIs
     * Update Profile
	  * @bodyParam name string required full name 4-100 in length.
	  * @bodyParam phone integer required 10 digit & unique.
	  * @bodyParam email string unique & valid email address.
     * @response 200 {
     *  "status": true,
     *  "data": {
     *   "name": "Name Example",
     *   "email": null,
     *   "phone": "98xxxxxxxx",
     *   "image": null,
     *   "created_at": "2020-04-14 15:00"
     *  },
     * "message": "Profile Updated successfully",
     * "code": 200
     * }
     * @response 200 {
     *  "status": false,
     *  "message": "The Full Name field is required.",
     *  "code": 200
     * }
     * @response 200 {
     *  "status": false,
     *  "message": "The email has already been taken.",
     *  "code": 200
     * }
     * @response 200 {
     *  "status": false,
     *  "message": "Invalid Request",
     *  "code": 200
     * }
     */
    public function updateProfile(Request $request)
    {
        try {
            if(!$user = $this->user()) throw new \Exception("User not found");

            $validator = Validator::make( $request->all(), [
						'name' => 'required|min:4|max:100',

						'name' => 'required|max:100',
                    'email' => "email|unique:users,$user->id",
                    'phone' => "required|digits:10|unique:users,$user->id",
                ]
            );

            if($validator->fails()) throw new \Exception($validator->messages()->first());

            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->save();

            $response = [
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                'image' => $user->image,
                'created_at' => $user->created_at,
            ];

            return $this->successResponse($response, 'Profile Updated successful');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $this->authGuard()->logout();

        return $this->successResponse([], 'Successfully logged out');
    }
}
