<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\{TextInput, Card};
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\{EditAction, DeleteAction, ViewAction};
use Filament\Tables\Filters\Filter;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';
    
    protected static ?string $navigationLabel = 'Categories';
    
    protected static ?string $label = 'Category';
    
    protected static ?string $pluralLabel = 'Categories';
    
    protected static ?int $navigationSort = 2;
    
    protected static ?string $navigationGroup = 'Content Management';

    /**
     * Define the form schema for creating and editing categories
     */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->label('Category Name')
                            ->maxLength(255)
                            ->helperText('Enter the category name'),
                    ])
                    ->columnSpan(2),
            ]);
    }

    /**
     * Define the table configuration
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Category Name')
                    ->sortable()
                    ->searchable()
                    ->weight('medium'),
                
                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime('M j, Y')
                    ->sortable()
                    ->toggleable(),
                
                TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime('M j, Y H:i')
                    ->sortable()
                    ->toggleable()
                    ->since(),
            ])
            ->filters([
                Filter::make('recent')
                    ->label('Recent Categories')
                    ->query(fn (Builder $query): Builder => $query->where('created_at', '>=', now()->subDays(7))),
            ])
            ->actions([
                ViewAction::make()
                    ->label('View')
                    ->icon('heroicon-o-eye'),
                
                EditAction::make()
                    ->label('Edit')
                    ->icon('heroicon-o-pencil')
                    ->successNotification(
                        Notification::make()
                            ->success()
                            ->title('Category updated successfully')
                    ),
                
                DeleteAction::make()
                    ->label('Delete')
                    ->icon('heroicon-o-trash')
                    ->requiresConfirmation()
                    ->modalHeading('Delete Category')
                    ->modalSubheading('Are you sure you want to delete this category?')
                    ->successNotification(
                        Notification::make()
                            ->success()
                            ->title('Category deleted successfully')
                    ),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()
                    ->requiresConfirmation()
                    ->modalHeading('Delete Selected Categories')
                    ->modalSubheading('Are you sure you want to delete these categories?')
                    ->successNotification(
                        Notification::make()
                            ->success()
                            ->title('Categories deleted successfully')
                    ),
            ])
            ->defaultSort('name', 'asc');
    }
    
    /**
     * Get the relations available for the resource
     */
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    /**
     * Get the pages available for the resource
     */
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'view' => Pages\ViewCategory::route('/{record}'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }

    /**
     * Get the global search result title
     */
    public static function getGlobalSearchResultTitle($record): string
    {
        return $record->name;
    }
}
