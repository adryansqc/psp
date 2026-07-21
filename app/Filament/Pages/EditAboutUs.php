<?php

namespace App\Filament\Pages;

use App\Models\AboutUs;
use BackedEnum;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class EditAboutUs extends Page implements HasForms
{
    use InteractsWithForms, HasPageShield;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedAdjustmentsVertical;

    protected static ?string $navigationLabel = 'About Us';

    protected static ?string $title = 'About Us';

    protected string $view = 'filament.pages.edit-about-us';

    public ?array $data = [];

    public function mount(): void
    {
        $aboutUs = AboutUs::first() ?? new AboutUs();

        $this->form->fill($aboutUs->toArray());
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Profil Perusahaan')
                    ->components([
                        RichEditor::make('deskripsi_psp')
                            ->label('Deskripsi PSP')
                            ->fileAttachmentsDisk('public')
                            ->fileAttachmentsDirectory('about-us')
                            ->fileAttachmentsVisibility('public')
                            ->columnSpanFull(),
                    ]),

                Section::make('Sejarah')
                    ->components([
                        RichEditor::make('history')
                            ->label('History')
                            ->fileAttachmentsDisk('public')
                            ->fileAttachmentsDirectory('about-us')
                            ->fileAttachmentsVisibility('public')
                            ->columnSpanFull(),
                    ]),

                Section::make('Visi & Nilai')
                    ->components([
                        RichEditor::make('visi')
                            ->label('Visi')
                            ->fileAttachmentsDisk('public')
                            ->fileAttachmentsDirectory('about-us')
                            ->fileAttachmentsVisibility('public')
                            ->columnSpanFull(),

                        RichEditor::make('nilai')
                            ->label('Nilai')
                            ->fileAttachmentsDisk('public')
                            ->fileAttachmentsDirectory('about-us')
                            ->fileAttachmentsVisibility('public')
                            ->columnSpanFull(),
                    ]),

                Section::make('Proyek Kami')
                    ->components([
                        RichEditor::make('our_project')
                            ->label('Our Project')
                            ->fileAttachmentsDisk('public')
                            ->fileAttachmentsDirectory('about-us')
                            ->fileAttachmentsVisibility('public')
                            ->columnSpanFull(),
                    ]),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        AboutUs::query()->first()
            ? AboutUs::query()->first()->update($data)
            : AboutUs::create($data);

        Notification::make()
            ->title('Tersimpan')
            ->success()
            ->send();
    }
}
