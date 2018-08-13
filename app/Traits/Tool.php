<?php

namespace App\Traits;

class Tool
{
    public static function sysMsg($key, $lang = 'zh')
    {
        $lang = $_REQUEST['lang'] ?? 'zh';

        if (isset($GLOBALS['__sys_msg'])
            && is_array($GLOBALS['__sys_msg'])
            && $GLOBALS['__sys_msg']
        ) {
            $msg = $GLOBALS['__sys_msg'];
        } else {
            $msg = [];
            $langPath = resource_path().'/sys_msg/';
            $path = $langPath.$lang;
            if (! file_exists($path)) {
                $path = $langPath.'zh';
            }

            if (file_exists($path)) {
                $fsi = new \FilesystemIterator($path);
                foreach ($fsi as $file) {
                    if ($file->isFile() && 'php' == $file->getExtension()) {
                        $_msg = include $file->getPathname();
                        if($_msg && is_array($_msg)) {
                            $msg = array_merge($_msg, $msg);
                        }
                    }
                }

                $GLOBALS['__sys_msg'] = $msg;
            }
        }

        return $msg[$key]
        ?? (
            ('zh' == $lang)
            ? '服务器繁忙, 请稍后再试'
            : 'Service is busy or temporarily unavailable.'
        );
    }
}