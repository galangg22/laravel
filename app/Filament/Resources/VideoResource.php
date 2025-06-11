<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VideoResource\Pages;
use App\Models\Video;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\{TextInput, Textarea, Select, FileUpload, Card, Grid};
use Filament\Tables\Columns\{TextColumn, ImageColumn, BadgeColumn};
use Filament\Tables\Actions\{EditAction, DeleteAction, ViewAction};
use Filament\Tables\Filters\{Filter, SelectFilter};
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class VideoResource extends Resource
{
    protected static ?string $model = Video::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-video-camera';
    
    protected static ?string $navigationLabel = 'Videos';
    
    protected static ?string $label = 'Video';
    
    protected static ?string $pluralLabel = 'Videos';
    
    protected static ?int $navigationSort = 3;
    
    protected static ?string $navigationGroup = 'Content Management';

    /**
     * Define the form schema for creating and editing videos
     */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('title')
                                    ->required()
                                    ->label('Video Title')
                                    ->maxLength(255)
                                    ->helperText('Enter a descriptive title for the video')
                                    ->columnSpan(2),
                                
                                Textarea::make('description')
                                    ->label('Description')
                                    ->maxLength(500)
                                    ->rows(3)
                                    ->helperText('Optional description for the video')
                                    ->columnSpan(2),
                                
                                Select::make('category_id')
                                    ->relationship('category', 'name')
                                    ->required()
                                    ->label('Category')
                                    ->helperText('Select a category for this video')
                                    ->columnSpan(1),
                                
                                TextInput::make('video_url')
                                    ->label('Video URL')
                                    ->url()
                                    ->required()
                                    ->helperText('Enter the video URL (YouTube, Vimeo, etc.)')
                                    ->columnSpan(1),
                            ]),
                        
                        FileUpload::make('thumbnail_path')
                            ->disk('public')
                            ->directory('thumbnails')
                            ->label('Thumbnail Image')
                            ->required()
                            ->image()
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->maxSize(10240) // 10MB
                            ->visibility('public')
                            ->helperText('Upload a thumbnail image (max 10MB, JPEG/PNG/WebP)')
                            ->columnSpanFull(),
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
                ImageColumn::make('thumbnail_path')
                    ->label('Thumbnail')
                    ->disk('public')
                    ->height(60)
                    ->width(80),
                
                TextColumn::make('title')
                    ->label('Video Title')
                    ->sortable()
                    ->searchable()
                    ->weight('medium')
                    ->description(fn ($record) => $record->description ? Str::limit($record->description, 50) : null),
                
                BadgeColumn::make('category.name')
                    ->label('Category')
                    ->sortable()
                    ->searchable()
                    ->colors([
                        'primary' => fn ($state) => true,
                    ]),
                
                TextColumn::make('video_url')
                    ->label('Video URL')
                    ->limit(40)
                    ->copyable()
                    ->copyMessage('URL copied to clipboard')
                    ->toggleable(),
                
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
                SelectFilter::make('category')
                    ->relationship('category', 'name')
                    ->label('Filter by Category'),
                
                Filter::make('recent')
                    ->label('Recent Videos')
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
                            ->title('Video updated successfully')
                    ),
                
                Tables\Actions\Action::make('openVideo')
                    ->label('Open Video')
                    ->icon('heroicon-o-external-link')
                    ->color('secondary')
                    ->url(fn ($record) => $record->video_url)
                    ->openUrlInNewTab(),
                
                DeleteAction::make()
                    ->label('Delete')
                    ->icon('heroicon-o-trash')
                    ->requiresConfirmation()
                    ->modalHeading('Delete Video')
                    ->modalSubheading('Are you sure you want to delete this video? This action cannot be undone.')
                    ->successNotification(
                        Notification::make()
                            ->success()
                            ->title('Video deleted successfully')
                    ),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()
                    ->requiresConfirmation()
                    ->modalHeading('Delete Selected Videos')
                    ->modalSubheading('Are you sure you want to delete these videos? This action cannot be undone.')
                    ->successNotification(
                        Notification::make()
                            ->success()
                            ->title('Videos deleted successfully')
                    ),
            ])
            ->defaultSort('created_at', 'desc');
    }

    /**
     * Get the relations available for the resource
     */
    public static function getRelations(): array
    {
        return [
            // Add relation managers here if needed
        ];
    }

    /**
     * Get the pages available for the resource
     */
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVideos::route('/'),
            'create' => Pages\CreateVideo::route('/create'),
            'view' => Pages\ViewVideo::route('/{record}'),
            'edit' => Pages\EditVideo::route('/{record}/edit'),
        ];
    }

    /**
     * Get the global search result title
     */
    public static function getGlobalSearchResultTitle($record): string
    {
        return $record->title;
    }

    /**
     * Get the global search result details
     */
    public static function getGlobalSearchResultDetails($record): array
    {
        return [
            'Category' => $record->category->name ?? 'No category',
            'Description' => $record->description ? Str::limit($record->description, 50) : 'No description',
        ];
    }
}
