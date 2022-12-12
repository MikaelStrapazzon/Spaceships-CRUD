<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Http\Requests\Pages\Spaceships\StoreSpaceshipRequest;
use App\Http\Requests\Pages\Spaceships\UpdateSpaceshipRequest;
use Throwable;

/**
 *  * @property string $arquivo
 * @mixin Builder
 */
class Spaceship extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'arquivo',
        'fuel',
        'motor_power',
        'quantity_weapon'
    ];

    /**
     * @param StoreSpaceshipRequest|UpdateSpaceshipRequest $request
     * @return bool
     */
    public function saveUploadedImages(StoreSpaceshipRequest|UpdateSpaceshipRequest $request): bool
    {
        try {
            $request->file('arquivo')->move(
                storage_path('app/public/images'),
                $this->arquivo
            );

            return true;
        }
        catch(Throwable) {
            return false;
        }
    }

    /**
     * @param string $key
     * @return string
     */
    public static function generateFileName(string $key): string
    {
        return md5($key) . '.png';
    }
}
