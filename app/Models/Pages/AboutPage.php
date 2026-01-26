<?php

namespace App\Models\Pages;

use Illuminate\Database\Eloquent\Model;
use App\Concerns\HasTranslations;
use Laravel\Nova\Actions\Actionable;
use App\Concerns\HasImage;

class AboutPage extends Model
{
    use HasTranslations;
    use HasImage;
    use Actionable;

    protected $table = 'about_page';

    protected $translatable = [
        'text',
        'text_1',
        'seo_keywords',
        'seo_description'
    ];
}
