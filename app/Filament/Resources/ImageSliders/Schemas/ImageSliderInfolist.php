<?php

namespace App\Filament\Resources\ImageSliders\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ImageSliderInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title')
                    ->label('Judul')
                    ->columnSpanFull(),

                TextEntry::make('second_title')
                    ->label('Sub Judul')
                    ->columnSpanFull(),

                ImageEntry::make('gambar')
                    ->label('Gambar')
                    ->disk('public')
                    ->columnSpanFull(),

                TextEntry::make('order')
                    ->label('Urutan'),

                IconEntry::make('aktif')
                    ->label('Aktif')
                    ->boolean(),

                TextEntry::make('created_at')
                    ->label('Dibuat')
                    ->dateTime(),

                TextEntry::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime(),
            ]);
    }
}
