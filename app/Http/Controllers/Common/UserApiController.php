<?php

namespace App\Http\Controllers\Common;

class UserApiController extends BaseApiController
{
    public function __construct() {
        $this->guardName = 'user';
    }

}
