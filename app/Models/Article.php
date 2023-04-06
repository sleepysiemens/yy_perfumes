<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

/**
 * App\Models\Article
 *
 * @property int $id
 * @property string $title
 * @property string|null $short_description
 * @property string|null $image
 * @property int $people_id
 * @property string|null $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Article newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Article newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Article query()
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article wherePeopleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Article extends Model
{
    use HasFactory;

    protected $casts = [
        'title' => 'array',
        'short_description' => 'array',
        'description' => 'array',
        'content' => 'array',
    ];

    protected $guarded = [];

    public function getTitle(): string
    {
        return !empty($this->title[App::getLocale()])
            ? $this->title[App::getLocale()] // Если есть перевод на текущий язык, то выводим его
            : $this->title['en']; // Если нет, то выводим английское название
    }

    public function getShortDescription(): string
    {
        return !empty($this->short_description[App::getLocale()])
            ? $this->short_description[App::getLocale()] // Если есть перевод на текущий язык, то выводим его
            : $this->short_description['en']; // Если нет, то выводим английское название
    }

    public function getDescription(): string
    {
        return !empty($this->description[App::getLocale()])
            ? $this->description[App::getLocale()] // Если есть перевод на текущий язык, то выводим его
            : $this->description['en']; // Если нет, то выводим английское название
    }

    public function getContent(): string
    {
        return !empty($this->content[App::getLocale()])
            ? $this->content[App::getLocale()] // Если есть перевод на текущий язык, то выводим его
            : $this->content['en']; // Если нет, то выводим английское название
    }
}
