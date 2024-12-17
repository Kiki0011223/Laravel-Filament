<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MatkulResource\Pages;
use App\Filament\Resources\MatkulResource\RelationManagers;
use App\Models\Matkul;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use App\Models\Dosen;

class MatkulResource extends Resource
{
    protected static ?string $model = Matkul::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('kode_mk')
                ->required()
                ->maxLength(10),
            TextInput::make('nama_mk')
                ->required()
                ->maxLength(128),
            TextInput::make('sks')
                ->required()
                ->numeric()
                ->minValue(1)
                ->maxValue(6),
            Select::make('semester')
                ->options([
                    'Ganjil' => 'Ganjil',
                    'Genap' => 'Genap'
                ])
                ->required(),
            Select::make('dosen_id')
                ->relationship('dosen', 'nama')
                ->searchable()
                ->preload()
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('kode_mk')->label('Kode MK')->sortable()->searchable(),
            TextColumn::make('nama_mk')->label('Nama Mata Kuliah')->sortable()->searchable(),
            TextColumn::make('sks')->label('SKS'),
            TextColumn::make('semester')->label('Semester'),
            TextColumn::make('dosen.nama')->label('Dosen Pengampu')->sortable(),
        ])
        ->filters([
            SelectFilter::make('semester')
                ->options([
                    'Ganjil' => 'Ganjil',
                    'Genap' => 'Genap'
                ]),
            SelectFilter::make('dosen')
                ->relationship('dosen', 'nama')
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListMatkuls::route('/'),
            'create' => Pages\CreateMatkul::route('/create'),
            'edit' => Pages\EditMatkul::route('/{record}/edit'),
        ];
    }
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }
}