<?php

namespace Lynk\LynkAdmin\Servers\AuthServer;

use Illuminate\Http\Request;
use Lynk\LynkAdmin\Models\Auth\AdminModel;
use Lynk\LynkAdmin\Servers\BaseServer;
use Lynk\LynkAdmin\Servers\JwtServer\JwtServer;

class LoginServer extends BaseServer
{
    protected $adminInfo;

    public function __construct(protected Request $request)
    {}

    /**
     * @return array
     * @throws \Exception
     * @develop yikun.lu
     * 2023/4/12
     */
    public function execute(): array
    {
        $name = $this->request->input('name', '');
        $password = $this->request->input('password', '');
        //校验密码
        $this->adminInfo = $adminInfo = AdminModel::where('name', $name)->first();
        if (!$adminInfo) {
            throw new \Exception("该账户不存在!");
        }
        if ($password !== $adminInfo->password) {
            throw new \Exception("账户密码错误!");
        }
        if (!$adminInfo->status) {
            throw new \Exception("账户已被管理员封禁!");
        }
        (new JwtServer())->getJwtToken();
        return [];
    }
}
