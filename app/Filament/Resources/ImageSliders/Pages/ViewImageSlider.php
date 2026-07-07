<?php

namespace App\Filament\Resources\ImageSliders\Pages;

use App\Filament\Resources\ImageSliders\ImageSliderResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewImageSlider extends ViewRecord
{
    protected static string $resource = ImageSliderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
