<?php

namespace App\Filament\Resources\Projects\Schemas;

use App\Models\Project;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('cover')
                    ->image()
                    ->imageEditor()
                    ->disk('public')
                    ->directory('project')
                    ->visibility('public')
                    ->columnSpanFull()
                    ->required(),
                TextInput::make('nama_projek')
                    ->columnSpanFull()
                    ->required(),
                TextInput::make('developer')
                    ->label('Developer')
                    ->placeholder('Masukkan nama developer')
                    ->maxLength(255)
                    ->required()
                    ->columnSpanFull()
                    ->helperText('Nama pengembang properti (contoh: Putra Sentosa Prakarsa)'),
                Textarea::make('informasi')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('fasilitas')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('lokasi')
                    ->helperText('isilah lokasi dengan embed dari google maps dan width nya diubah menjadi 100%')
                    ->required()
                    ->columnSpanFull(),
                Toggle::make('pin')
                    ->label('Pin Project')
                    ->helperText('Aktifkan untuk menandai project ini sebagai pin (Maksimal 5)')
                    ->default(false)
                    ->rule(function (Get $get, $record) {
                        return function ($attribute, $value, $fail) use ($record) {
                            if ($value) {
                                $count = Project::where('pin', true)
                                    ->when($record, fn($query) => $query->where('uuid', '!=', $record->uuid))
                                    ->count();

                                if ($count >= 5) {
                                    $fail('Maksimal hanya 5 project yang bisa di-pin.');
                                }
                            }
                        };
                    })
                    ->columnSpanFull(),
            ]);
    }
}
