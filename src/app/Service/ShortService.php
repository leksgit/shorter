<?php

namespace App\Service;

use App\DTO\ShortCreateDTO;
use App\Models\linksModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Str;

use function Symfony\Component\String\s;

class ShortService
{
    /**
     * Create short link from DTO with transformation input data
     * @param ShortCreateDTO $createDTO
     * @return LinksModel
     */
    public function createLink(ShortCreateDTO $createDTO): linksModel
    {
        return LinksModel::create([
            'short' => $this->getUniqRandomString(),
            'source_url' => $createDTO->source_url,
            'available_until' => $this->getAvailableDateTime(hours_available: $createDTO->hours_available),
            'allowed_number_of_uses' => $createDTO->allowed_number_of_uses,
        ]);
    }

    /**
     * Generate random, unique string, with check exist data in db
     * @return string
     */
    private function getUniqRandomString(): string
    {
        do {
            $short = Str::random(8);
        } while (linksModel::whereShort($short)->exists());

        return $short;
    }

    /**
     * Calculation of the time until which the link will be available
     * @param int $hours_available
     * @return Carbon
     */
    private function getAvailableDateTime(int $hours_available): Carbon
    {
        return Carbon::now()->addHours($hours_available);
    }

    public function getShort(string $short){
        $link = LinksModel::query()
            ->whereShort($short)
            ->whereDate('available_until','>=', Carbon::now())
            ->where(function (Builder $query){
                $query->whereAllowedNumberOfUses(0)
                    ->orWhere(function (Builder $subQuery){
                        $subQuery->whereRaw("number_of_uses <= allowed_number_of_uses");
                    });

            })
            ->first(['source_url','id','allowed_number_of_uses','number_of_uses']);
        if ($this->checkAllowedOfUse($link)){
            $link->increment('number_of_uses');
            return redirect()->to($link->source_url);
        }
        return view('short.404');
    }

    /**
     * @param linksModel $link
     * @return bool
     */
    private function checkAllowedOfUse(LinksModel $link): bool
    {
        return ($link->allowed_number_of_uses == 0)
            || ($link->allowed_number_of_uses > 0 && $link->number_of_uses < $link->allowed_number_of_uses);
    }
}
