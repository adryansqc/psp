<?php

namespace App\Filament\Resources\Projects\RelationManagers;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class FasilitasRelationManager extends RelationManager
{
    protected static string $relationship = 'fasilitas';

    protected static ?string $title = 'Fasilitas';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Judul')
                    ->required()
                    ->maxLength(255),

                FileUpload::make('gambar')
                    ->label('Gambar')
                    ->image()
                    ->disk('public')
                    ->directory('fasilitas')
                    ->imageEditor()
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                ImageColumn::make('gambar')
                    ->label('Gambar')
                    ->imageHeight(40)
                    ->disk('public')
                    ->visibility('public')
                    ->defaultImageUrl(asset('assets/images/image-thumbnail.jpg'))
                    ->square(),

                TextColumn::make('title')
                    ->label('Judul')
                    ->searchable(),

                TextColumn::make('order')
                    ->label('Urutan')
                    ->sortable(),
            ])
            ->defaultSort('order')
            ->reorderable('order')
            ->headerActions([
                CreateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}