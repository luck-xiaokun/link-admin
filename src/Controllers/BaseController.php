<?php

namespace Lynk\LynkAdmin\Controllers;

use Illuminate\Routing\Controller as frameController;
use Lynk\LynkAdmin\Trait\JsonResponse;

class BaseController extends frameController
{
    use JsonResponse;
}
