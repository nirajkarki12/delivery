<?php

namespace App\Http\Controllers\Common;

class CustomerApiController extends BaseApiController
{
    public function __construct() {
        $this->guardName = 'customer';
    }

}
