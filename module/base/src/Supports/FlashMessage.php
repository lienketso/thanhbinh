<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 1/3/2018
 * Time: 11:39 AM
 */

namespace Base\Supports;

class FlashMessage
{
    /**
     * render flash_message at views
     * @param $mess
     *
     * @return string
     */
    public static function renderMessage($mess = 'create')
    {
        $m = convert_flash_message($mess);

        $html = '';
        if (\Session::has($mess)) {
            if($mess=='role') {
                $html = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
              <strong>Warning !</strong> ' . $m . '</div>';
            }else{
                $html = '<div class="alert alert-info alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
              <strong>Success!</strong> '.$m.'</div>';
            }
        }
        return $html;
    }

    /**
     * return flash_message to views
     * @param $mess
     *
     * @return array
     */
    public static function returnMessage($mess)
    {
        $m = convert_flash_message($mess);
        return [
            $mess => $m
        ];
    }

}
