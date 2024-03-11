<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HouseResource\Pages;
use App\Filament\Resources\HouseResource\RelationManagers;
use App\Models\House;
use App\Models\HouseCategory;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Filament\Forms\Set;

class HouseResource extends Resource
{
    protected static ?string $model = House::class;

    protected static ?string $navigationIcon = 'heroicon-o-home-modern';
    protected static ?string $navigationGroup = 'Property';
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->columns(3)
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                        Forms\Components\TextInput::make('city')
                            ->required()
                            ->hint('Mutare, Harare, Bulawayo'),
                        Forms\Components\TextInput::make('location')
                            ->required()
                            ->hint('Highlands, Harare North'),
                    ]),
                Section::make()
                    ->columns(3)
                    ->schema([
                        Forms\Components\Select::make('agent_id')
                            ->required()
                            ->name('Agent')
                            ->options(User::all()->pluck('name', 'id')),

                        Forms\Components\Select::make('category_id')
                            ->required()
                            ->label('Category')
                            ->options(HouseCategory::all()->pluck('name', 'id')),
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->disabled()
                            ->dehydrated(),
                        Forms\Components\FileUpload::make('image')
                            ->image()
                            ->required()
                            ->columnSpanFull(),
                    ]),
                Section::make()
                    ->schema([
                        Forms\Components\Textarea::make('description')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\FileUpload::make('additional_image_link')
                            ->image()
                            ->reorderable()
                            ->columnSpanFull()
                            ->multiple(),
                    ]),
                Section::make()
                    ->schema([
                        Forms\Components\FileUpload::make('floor_plan')
                            ->openable()
                            ->downloadable(),
                        Forms\Components\TextInput::make('video')
                            ,
                    ]),
                Section::make()
                    ->columns(4)
                    ->schema([
                        Forms\Components\Toggle::make('borehole_available')
                            ->required(),
                        Forms\Components\Toggle::make('parking_available')
                            ->required(),
                        Forms\Components\Toggle::make('internet_connection')
                            ->required(),
                        Forms\Components\Toggle::make('solar_system')
                            ->required(),
                        Forms\Components\Toggle::make('swimming_pool')
                            ->required(),
                        Forms\Components\Toggle::make('availability_status')
                            ->required(),
                    ]),


                Section::make()
                    ->columns(4)
                    ->schema([

                        Forms\Components\TextInput::make('number_of_rooms')
                            ->required()
                            ->numeric(),
                        Forms\Components\TextInput::make('number_of_bedrooms')
                            ->required()
                            ->numeric(),
                        Forms\Components\TextInput::make('number_of_bathrooms')
                            ->required()
                            ->numeric(),
                        Forms\Components\TextInput::make('price_per_month')
                            ->required()
                            ->label('Price')
                            ->numeric(),

                        Forms\Components\TextInput::make('area'),
                    ]),





            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('category.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('city')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('number_of_rooms')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price_per_month')
                    ->searchable(),
                Tables\Columns\IconColumn::make('borehole_available')
                    ->boolean()
                     ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\IconColumn::make('parking_available')
                    ->boolean()
                     ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\IconColumn::make('internet_connection')
                    ->boolean()
                     ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\IconColumn::make('solar_system')
                    ->boolean()
                     ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\IconColumn::make('swimming_pool')
                    ->boolean()
                     ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\IconColumn::make('availability_status')
                    ->boolean()
                     ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHouses::route('/'),
            'create' => Pages\CreateHouse::route('/create'),
            'view' => Pages\ViewHouse::route('/{record}'),
            'edit' => Pages\EditHouse::route('/{record}/edit'),
        ];
    }
}
