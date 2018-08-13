<?php

namespace App\Http\Controllers;

use App\Traits\Tool;
use Illuminate\Cache;

class TestController extends Controller
{
    public function test_i18n()
    {
        return Tool::sysMsg('SYS_MSG_TEST'); // 测试一下系统消息i18n
//        return Tool::sysMsg('SYS_MSG_TEST', 'en');  // test sys msg i18n
    }
}