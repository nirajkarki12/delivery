<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Common\CustomerApiController;
use Hash;
use Validator;
use App\Http\Helpers\Helper;
use App\Models\Customer;
use App\Models\Company;

/**
* @group Customer
*/
class AuthController extends CustomerApiController
{
    /**
    * Login APIs
    * User Login
    * @bodyParam phone string required valid phone number & 10 digit in length.
    * @bodyParam password string required min 6 in length.
    * @response {
    *  "status": true,
    *  "data": {
    *   "name": "Name Example",
    *   "email": null,
    *   "phone": "98xxxxxxxx',
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
				'phone' => 'required|digits:10',
				'password' => 'required'
          ]);
          if($validator->fails()) throw new \Exception($validator->errors()->first());

          $user = Customer::where('phone', $request->phone)->first();

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
	  * @bodyParam companyName string company name.
	  * @bodyParam companyDistrict integer district ID required if companyName is given.
	  * @bodyParam companyStreetName string street name required if companyName is given.
	  * @bodyParam companyPhone string company phone 7-10 in length.
	  * @bodyParam companyOwnerName string owner name.
	  * @bodyParam companyLat string latitude.
	  * @bodyParam companyLon string longitude.
     * @response 200 {
     *  "status": true,
     *  "data": {
     *   "name": "Name Example",
     *   "email": null,
     *   "phone": '98xxxxxxxx',
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
     *  "message": "Login error",
     *  "code": 200
     * }
     */
    public function register(Request $request)
    {
        try {

            $data = $request->except('_token');

            $validator = Validator::make( $data, [
					'name' => 'required|min:4|max:100',
					'phone' => 'required|digits:10|unique:customers',
					'email' => 'email|unique:customers',
					'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:2058',
					'password' => 'required|min:6|max:100',
					'companyName' => 'nullable',
					'companyDistrict' => 'required_if:companyName|exists:districts,id',
					'companyStreetName' => 'required_if:companyName',
					'companyPhone' => 'nullable|digits_between:7,10',
					'companyOwnerName' => 'nullable',
					'companyLat' => 'nullable',
					'companyLon' => 'nullable',
            ],
                [],
                [
						'name' => 'Full Name',
						'image' => 'Image',
						'phone' => 'Mobile',
                ]
            );
            if($validator->fails()) throw new \Exception($validator->messages()->first());

            // Database transaction start
				\DB::beginTransaction();

				$customer = new Customer;
				$customer->name = $request->name;
				$customer->email = $request->email;
				$customer->phone = $request->phone;
				$customer->password = Hash::make($request->password);

				if($request->file('image')) {
					if(!$file = Helper::uploadImage($request->file('image'), 'user')) throw new \Exception("Cannot Save Image");
					$customer->image = $file;
				}

				if($request->companyName) {
					$company = Company::where('phone', $request->companyPhone)->first();
					if (!$company) {
						$company = new Company;
						$company->name = $request->companyName;
						$company->phone = $request->companyPhone;
						$company->owner_name = $request->companyOwnerName;
						$company->save();

						$company->location()->create([
							'district_id' => $request->companyDistrict,
							'street_name' => $request->companyStreetName,
							'lat' => $request->companyLat,
							'lon' => $request->companyLon,
						]);
					}
					$customer->company()->associate($company);
				}
				$customer->save();
            // Database commit
				\DB::commit();

				if (!$token = $this->authGuard()->attempt(['phone' => $customer->phone, 'password' => $request->password])) throw new \Exception('Login error');

            $response = [
                'name' => $customer->name,
                'email' => $customer->email,
                'phone' => $customer->phone,
                'image' => $customer->image,
                'created_at' => $customer->created_at,
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

            return $this->successResponse($user, 'User info fetched successfully');
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
                Helper::deleteImage($user->image, 'customer');
                if(!$file = Helper::uploadImage($request->file('image'), 'customer')) throw new \Exception("Cannot Save Image");
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
                    'email' => "email|unique:customers,$user->id",
                    'phone' => "required|digits:10|unique:customers,$user->id",
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
