<?php

namespace App\Filament\Resources\HouseCategoryResource\Pages;

use App\Filament\Resources\HouseCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageHouseCategories extends ManageRecords
{
    protected static string $resource = HouseCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
