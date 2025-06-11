<?php

namespace App\Filament\Resources;

use App\Models\User;
use Filament\Resources\Resource;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Forms\Components\{TextInput, Select, Toggle, Card, Grid};
use Filament\Tables\Columns\{TextColumn, IconColumn, BadgeColumn};
use Filament\Tables\Filters\{Filter, SelectFilter};
use Filament\Notifications\Notification;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\Builder;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-users';
    
    protected static ?string $navigationLabel = 'Users Management';
    
    protected static ?string $label = 'User';
    
    protected static ?string $pluralLabel = 'Users';
    
    protected static ?int $navigationSort = 1;
    
    protected static ?string $navigationGroup = 'User Management';

    /**
     * Disable user creation capability
     */
    public static function canCreate(): bool
    {
        return false;
    }

    /**
     * Disable user editing capability
     */
    public static function canEdit($record): bool
    {
        return false;
    }

    /**
     * Define the form schema for viewing user details
     */
    public static function form(Form $form): Form
    {
        return $form->schema([
            Card::make()
                ->schema([
                    Grid::make(2)
                        ->schema([
                            TextInput::make('name')
                                ->label('Full Name')
                                ->disabled(),
                            
                            TextInput::make('email')
                                ->label('Email Address')
                                ->disabled(),
                            
                            TextInput::make('phone_number')
                                ->label('Phone Number')
                                ->disabled(),
                            
                            TextInput::make('role')
                                ->label('User Role')
                                ->disabled(),
                        ]),
                ])
                ->columnSpan(2),
            
            Card::make()
                ->schema([
                    Grid::make(2)
                        ->schema([
                            Toggle::make('is_blocked')
                                ->label('Account Blocked')
                                ->disabled()
                                ->helperText('Indicates if the user account is currently blocked'),
                            
                            Toggle::make('is_paid')
                                ->label('Payment Status')
                                ->disabled()
                                ->helperText('Indicates if the user has completed payment'),
                        ]),
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
                    ->label('Full Name')
                    ->searchable()
                    ->sortable()
                    ->weight('medium'),
                
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->copyMessage('Email copied to clipboard'),
                
                TextColumn::make('phone_number')
                    ->label('Phone')
                    ->searchable()
                    ->toggleable(),
                
                BadgeColumn::make('role')
                    ->label('Role')
                    ->colors([
                        'primary' => 'admin',
                        'secondary' => 'user',
                    ])
                    ->sortable(),
                
                IconColumn::make('is_blocked')
                    ->label('Blocked')
                    ->boolean()
                    ->trueIcon('heroicon-o-x-circle')
                    ->falseIcon('heroicon-o-check-circle')
                    ->trueColor('danger')
                    ->falseColor('success')
                    ->sortable(),
                
                IconColumn::make('is_paid')
                    ->label('Paid')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->sortable(),
                
                TextColumn::make('created_at')
                    ->label('Joined')
                    ->dateTime('M j, Y')
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                SelectFilter::make('role')
                    ->options([
                        'admin' => 'Admin',
                        'user' => 'User',
                    ]),
                
                Filter::make('is_blocked')
                    ->label('Blocked Users')
                    ->query(fn (Builder $query): Builder => $query->where('is_blocked', true)),
                
                Filter::make('is_paid')
                    ->label('Paid Users')
                    ->query(fn (Builder $query): Builder => $query->where('is_paid', true)),
                
                Filter::make('unpaid')
                    ->label('Unpaid Users')
                    ->query(fn (Builder $query): Builder => $query->where('is_paid', false)),
            ])
            ->actions([
                ViewAction::make()
                    ->label('View Details')
                    ->icon('heroicon-o-eye'),
                
                Action::make('toggleBlock')
                    ->label(fn (User $record) => $record->is_blocked ? 'Unblock User' : 'Block User')
                    ->icon(fn (User $record) => $record->is_blocked ? 'heroicon-o-lock-open' : 'heroicon-o-lock-closed')
                    ->color(fn (User $record) => $record->is_blocked ? 'success' : 'danger')
                    ->requiresConfirmation()
                    ->modalHeading(fn (User $record) => $record->is_blocked ? 'Unblock User' : 'Block User')
                    ->modalSubheading(fn (User $record) => $record->is_blocked 
                        ? 'Are you sure you want to unblock this user? They will regain access to their account.'
                        : 'Are you sure you want to block this user? They will lose access to their account.')
                    ->modalButton(fn (User $record) => $record->is_blocked ? 'Unblock' : 'Block')
                    ->action(function (User $record) {
                        $record->update(['is_blocked' => !$record->is_blocked]);
                        
                        $status = $record->is_blocked ? 'blocked' : 'unblocked';
                        
                        Notification::make()
                            ->title("User {$status} successfully")
                            ->success()
                            ->send();
                    }),
            ])
            ->bulkActions([
                DeleteBulkAction::make()
                    ->requiresConfirmation()
                    ->modalHeading('Delete Selected Users')
                    ->modalSubheading('Are you sure you want to delete these users? This action cannot be undone.')
                    ->modalButton('Delete Users'),
            ])
            ->defaultSort('created_at', 'desc');
    }

    /**
     * Get the relations available for the resource
     */
    public static function getRelations(): array
    {
        return [
            // Add relations here if needed
        ];
    }

    /**
     * Get the pages available for the resource
     */
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'view' => Pages\ViewUser::route('/{record}'),
        ];
    }

    /**
     * Get the global search result title
     */
    public static function getGlobalSearchResultTitle($record): string
    {
        return $record->name;
    }

    /**
     * Get the global search result details
     */
    public static function getGlobalSearchResultDetails($record): array
    {
        return [
            'Email' => $record->email,
            'Role' => ucfirst($record->role),
            'Status' => $record->is_blocked ? 'Blocked' : 'Active',
        ];
    }

    /**
     * Get the global search result actions
     */
    public static function getGlobalSearchResultActions($record): array
    {
        return [
            Action::make('view')
                ->url(static::getUrl('view', ['record' => $record])),
        ];
    }
}
