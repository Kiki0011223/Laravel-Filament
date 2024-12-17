<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MahasiswaResource\Pages;
use App\Filament\Resources\MahasiswaResource\RelationManagers;
use App\Models\Mahasiswa;
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
use Filament\Forms\Components\DatePicker;

class MahasiswaResource extends Resource
{
    protected static ?string $model = Mahasiswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('nim')
                ->required()
                ->maxLength(13),
            TextInput::make('nama')
                ->required()
                ->maxLength(128),
            Select::make('jenis_kelamin')
                ->options([
                    'L' => 'Laki-Laki',
                    'P' => 'Perempuan',
                ])
                ->required(),
            TextInput::make('alamat')
                ->required()
                ->maxLength(128),
            DatePicker::make('tanggal_lahir')
                ->required(),
            Select::make('jurusan')
                ->options([
                    'Teknik Informatika' => 'Teknik Informatika',
                    'Sistem Informasi' => 'Sistem Informasi',
                    'Pariwisata' => 'Pariwisata',
                ])
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('nim')->label('NIM')->sortable()->searchable(),
            TextColumn::make('nama')->label('Nama')->sortable()->searchable(),
            TextColumn::make('jenis_kelamin')->label('Jenis Kelamin'),
            TextColumn::make('alamat')->label('Alamat'),
            TextColumn::make('tanggal_lahir')->label('Tanggal Lahir')->date(),
            TextColumn::make('jurusan')->label('Jurusan'),
        ])
        ->filters([
            // Tambahkan filter jika diperlukan
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
            'index' => Pages\ListMahasiswas::route('/'),
            'create' => Pages\CreateMahasiswa::route('/create'),
            'edit' => Pages\EditMahasiswa::route('/{record}/edit'),
        ];
    }
}