<?php

namespace Vanguard\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CountryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => (int) $this->id,
            'name' => $this->name,
            'full_name' => $this->full_name,
            'capital' => $this->capital,
            'citizenship' => $this->citizenship,
            'country_code' => (int) $this->country_code,
            'currency' => $this->currency,
            'currency_code' => $this->currency_code,
            'currency_sub_unit' => $this->currency_sub_unit,
            'currency_symbol' => $this->currency_symbol,
            'iso_3166_2' => $this->iso_3166_2,
            'iso_3166_3' => $this->iso_3166_3,
            'region_code' => (int) $this->region_code,
            'sub_region_code' => (int) $this->sub_region_code,
            'eea' => (boolean) $this->eea,
            'calling_code' => (int) $this->calling_code,
            'flag' => $this->flag ? url("flags/{$this->flag}") : null
        ];
    }
}
