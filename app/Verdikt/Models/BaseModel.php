<?php


namespace Verdikt\Models;


class BaseModel extends \Eloquent {

    /**
     * @return string
     */
    public function getFillable()
    {
        return $this->fillable;
    }

    public static function getChoice()
    {

        $data   = self::all();
        $result = [];
        foreach ($data as $item)
        {
            $result[$item['id']] = isset($item['libelle']) ? $item['libelle'] : $item['id'];
        }

        return $result;
    }

} 