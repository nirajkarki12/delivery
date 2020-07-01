<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Common\BaseApiController;
use App\Models\Province;
use App\Models\District;

/**
 * @group Address
 */
class AddressController extends BaseApiController
{
	/**
	 * Get All Provinces
	 * @response {
	 *  "status": true,
	 *  "data": [
	 *		{
	 *		"id": 1,
	 *		"name": "Province 1"
	 *		},
	 *		{
	 *		"id": 2,
	 *		"name": "Province 2"
	 *		},
	 *		{
	 *		"id": 3,
	 *		"name": "Province 3"
	 *		},
	 *		{
	 *		"id": 4,
	 *		"name": "Gandaki"
	 *		},
	 *		{
	 *		"id": 5,
	 *		"name": "Province 5"
	 *		},
	 *		{
	 *		"id": 6,
	 *		"name": "Karnali"
	 *		},
	 *		{
	 *		"id": 7,
	 *		"name": "Sudurpaschim"
	 *		}
	 *  ],
	 * "message": "data fetched successfully",
	 * "code": 200
	 * }
	 * @response 200 {
	 *  "status": false,
	 *  "message": "No records found",
	 *  "code": 200
	 * }
	 * @response 200 {
	 *  "status": false,
	 *  "message": "Invalid Request",
	 *  "code": 200
	 * }
	 */
	public function getProvinces()
	{
		try {
			$provinces = Province::get();
			if(!$provinces) throw new \Exception('No Records found');

			return $this->successResponse($provinces, 'data fetched successfully');
		} catch (\Exception $e) {
			return $this->errorResponse($e->getMessage());
		}
	}

	/**
	* Get Districts by Province
	* @queryParam ID required province ID.
	* @response {
	*  "status": true,
	*  "data": [
	*			{
	*			"id": 1,
	*			"name": "Bhojpur"
	*			},
	*			{
	*			"id": 2,
	*			"name": "Dhankuta"
	*			}
	*	],
	* "message": "data fetched successfully",
	* "code": 200
	* }
	* @response 200 {
	*  "status": false,
	*  "message": "No records found",
	*  "code": 200
	* }
	* @response 200 {
	*  "status": false,
	*  "message": "Invalid Request",
	*  "code": 200
	* }
	*/
	public function getDistrictsByProvince(Province $province)
	{
		try {
			$districts = District::where('province_id', $province->id)->get();
			if(count($districts) === 0) throw new \Exception('No Records found');

			return $this->successResponse($districts, 'data fetched successfully');
		} catch (\Exception $e) {
			return $this->errorResponse($e->getMessage());
		}
	}
}
