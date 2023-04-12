<?php

namespace Lynk\LynkAdmin\Trait;
use \Illuminate\Http\JsonResponse as Response;

trait JsonResponse
{

    public function success($data = [],$message = __FUNCTION__): Response
    {
        return $this->jsonResponse(200,$message,$data);
    }

    public function fail($message = __FUNCTION__,$code = 500): Response
    {
        return $this->jsonResponse($code,$message);
    }

    private function jsonResponse($code,$message,$data = []): Response
    {
        return Response()->json([
            'code'=>$code, 'message'=>$message, 'data'=>$data,
        ]);
    }
}
