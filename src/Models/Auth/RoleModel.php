<?php

namespace Lynk\LynkAdmin\Models\Auth;


use Lynk\LynkAdmin\Models\BaseModel;

class RoleModel extends BaseModel
{
    protected $table = 'lynk_role';

    protected $primaryKey = 'rid';
}
