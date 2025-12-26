<?php

namespace App\Concerns;
use Outl1ne\NovaMediaHub\Models\Media;

trait HasImage
{
    public function media()
    {
        return $this->hasOne(Media::class, 'id', 'image');
    }

    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/media/'.$this->image.'/'.$this->media->file_name) : '';
    }

    public function getImagesAttribute() {
        $casting = new \Outl1ne\NovaMediaHub\Casts\MediaCast();
        if($this->gallery)
            return $casting->get(static::class, '', json_encode($this->gallery), []);
        else return [];
    }
}