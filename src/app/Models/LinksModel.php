<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 *  * App\Models\LinksModel
 *
 * @property integer $id
 * @property integer $allowed_number_of_uses
 * @property integer $number_of_uses
 * @property string $short
 * @property string $source_url
 * @property string $available_until
 * @property string $updated_at
 * @property string $created_at
 * @property string $deleted_at
 * @method static Builder|LinksModel newModelQuery()
 * @method static Builder|LinksModel newQuery()
 * @method static \Illuminate\Database\Query\Builder|LinksModel onlyTrashed()
 * @method static Builder|LinksModel query()
 * @method static \Illuminate\Database\Query\Builder|LinksModel withTrashed()
 * @method static \Illuminate\Database\Query\Builder|LinksModel withoutTrashed()
 * @method static Builder|LinksModel whereId($value)
 * @method static Builder|LinksModel whereShort($value)
 * @method static Builder|LinksModel whereAllowedNumberOfUses($value)
 * @method static Builder|LinksModel whereNumberOfUses($value)
 * @method static Builder|LinksModel whereAvailableUntil($value)
 * @method static Builder|LinksModel whereCreatedAt($value)
 * @method static Builder|LinksModel whereDeletedAt($value)
 * @method static Builder|LinksModel whereUpdatedAt($value)
 * @mixin Eloquent
 */
class LinksModel extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'links';
    protected $fillable = [
        'short',
        'source_url',
        'available_until',
        'allowed_number_of_uses',
        'number_of_uses',
    ];

    protected $casts = [
        'available_until' => 'datetime',
        'allowed_number_of_uses' => 'integer',
        'number_of_uses' => 'integer',
    ];

    public function getShortUrlAttribute(): string
    {
        return config('app.url') . '/' . $this->short;
    }
}
