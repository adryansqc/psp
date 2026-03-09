<?php

namespace App\Filament\Resources\Projects\RelationManagers;

use App\Models\GalleriesProject;
use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class GalleriesRelationManager extends RelationManager
{
    protected static string $relationship = 'galleries';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('gambar')
                    ->image()
                    ->imageEditor()
                    ->disk('public')
                    ->directory('galeri')
                    ->visibility('public')
                    ->columnSpanFull()
                    ->required(),
                TextInput::make('order')
                    ->label('Urutan')
                    ->numeric()
                    ->minValue(1)
                    ->default(function ($get) {
                        $projectId = $get('project_uuid');
                        return GalleriesProject::where('project_uuid', $projectId)
                            ->max('order') + 1;
                    })
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('gambar')
            ->reorderable('order')
            ->columns([
                ImageColumn::make('gambar')
                    ->imageHeight(40)
                    ->square()
                    ->disk('public')
                    ->visibility('public')
                    ->searchable(),
                TextColumn::make('order')
                    ->label('Urutan'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])->defaultSort('order', 'asc')
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make(),
                AssociateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DissociateAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DissociateBulkAction::make(),
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
