<?php

namespace App\Filament\Resources\ImageSliders\Schemas;

use App\Models\ImageSlider;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ImageSliderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Judul')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                TextInput::make('second_title')
                    ->label('Sub Judul')
                    ->maxLength(255)
                    ->columnSpanFull(),

                FileUpload::make('gambar')
                    ->label('Gambar')
                    ->image()
                    ->imageEditor()
                    ->disk('public')
                    ->directory('sliders')
                    ->visibility('public')
                    ->columnSpanFull()
                    ->required(),

                TextInput::make('order')
                    ->label('Urutan')
                    ->numeric()
                    ->minValue(0)
                    ->default(fn() => ImageSlider::max('order') + 1)
                    ->required(),

                Toggle::make('aktif')
                    ->required()
                    ->label('Aktif')
                    ->default(true),
            ]);
    }
}
