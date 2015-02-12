<?php


class Administrator extends User {

    protected $tabPermission = [];

    public function hasAccess($key)
    {

        if (!empty($this->role->overide_permission))
        {
            return true;
        }

        return \Distilleries\Expendable\Helpers\PermissionUtils::haveAccess($key);

    }

    public function getFirstRedirect($left)
    {
        foreach ($left as $item)
        {

            if (!empty($item['action']) and $this->hasAccess($item['action']))
            {
                return preg_replace('/\/index/i', '', action($item['action']));

            } else if (!empty($item['submenu']))
            {
                $redirect = $this->getFirstRedirect($item['submenu']);

                if (!empty($redirect))
                {
                    return $redirect;
                }

            }

        }

        return '';
    }
} 