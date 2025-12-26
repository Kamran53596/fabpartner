<?php

namespace App\Concerns;

trait Search
{    
    public static function search(string $q, int $limit = 5, $order = false)
    {
        $modelInstance = new static();
        $fields = $modelInstance->searchable;
        $translatable = $modelInstance->translatable;
        $i = 0;
        
        foreach ($fields as $value) {
            if ($i > 0) {
                if (in_array($value, $translatable)) {
                    $query = $query->orWhere("{$value}->{$modelInstance->getLocale()}", 'LIKE', "%$q%");
                } else {
                    $query = $query->orWhere("{$value}", 'LIKE', "%$q%");
                }                
            } else {
                if (in_array($value, $translatable)) {
                    $query = static::where("{$value}->{$modelInstance->getLocale()}", 'LIKE', "%$q%");
                } else {
                    $query = static::where("{$value}", 'LIKE', "%$q%");
                }                
            }

            $i++;
        }

        if ($order) {
            $query = $query->orderByDesc('publish_date');
        }

        return $query->paginate($limit)->withQueryString();
    }

    public static function searchAutocomplete(string $q, $order = false)
    {
        $modelInstance = new static();
        $fields = $modelInstance->searchable;
        $i = 0;
        
        foreach ($fields as $value) {
            if ($i > 0) {
                $query = $query->orWhere("{$value}->{$modelInstance->getLocale()}", 'LIKE', "%$q%");
            } else {
                $query = static::where("{$value}->{$modelInstance->getLocale()}", 'LIKE', "%$q%");
            }

            $i++;
        }

        if ($order) {
            $query = $query->orderByDesc('publish_date');
        }
        
        return $query->get();
    }
}