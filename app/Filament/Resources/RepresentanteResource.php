<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RepresentanteResource\Pages;
use App\Filament\Resources\RepresentanteResource\RelationManagers;
use App\Models\Representante;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RepresentanteResource extends Resource
{
    protected static ?string $model = Representante::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
    
                Forms\Components\TextInput::make('cedula')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('apellidos')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nombres')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('parentesco')
                    ->label('Parentesco')
                    ->options([
                        'PAPÁ' => 'PAPÁ',
                        'MAMÁ' => 'MAMÁ',
                        'ABUELO' => 'ABUELO',
                        'ABUELA' => 'ABUELA',
                        'TIO' => 'TIO',
                        'TIA' => 'TIA',
                        'PRIMO' => 'PRIMO',
                        'PRIMA' => 'PRIMA',
                        'HERMANO' => 'HERMANO',
                        'HERMANA' => 'HERMANA',
                        'PAREJA' => 'PAREJA',
                        'OTRO' => 'OTRO',
                    ])
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function (callable $set, $state) {
                        if ($state === 'OTRO') {
                            $set('parentesco', null);
                        }
                    }),
                Forms\Components\TextInput::make('telefono')
                    ->required()
                    ->maxLength(255),
                    
       
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('cedula')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('apellidos')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('nombres')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('parentesco')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('telefono')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListRepresentantes::route('/'),
            'create' => Pages\CreateRepresentante::route('/create'),
            'edit' => Pages\EditRepresentante::route('/{record}/edit'),
        ];
    }
}
