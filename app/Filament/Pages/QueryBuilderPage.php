<?php

namespace App\Filament\Pages;

use BackedEnum;
use Filament\Pages\Page;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\QueryBuilder;
use Filament\Tables\Filters\QueryBuilder\Constraints\TextConstraint;
use Filament\Tables\Table;
use Illuminate\Support\Collection;

class QueryBuilderPage extends Page implements HasTable
{
    use InteractsWithTable;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-rectangle-stack';
    protected string $view = 'filament.pages.query-builder-page';

    public function table(Table $table): Table
    {
        return $table
            ->records(fn (): Collection => collect([
                1 => [
                    'title' => 'What is Filament?',
                    'slug' => 'what-is-filament',
                ],
                2 => [
                    'title' => 'Top 5 best features of Filament',
                    'slug' => 'top-5-features',
                ],
                3 => [
                    'title' => 'Tips for building a great Filament plugin',
                    'slug' => 'plugin-tips',
                ],
            ]))
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('slug'),
            ])
            ->filters([
                QueryBuilder::make()
                    ->constraints([
                        TextConstraint::make('title'),
                        TextConstraint::make('slug'),
                    ])
                    ->constraintPickerColumns(3),
            ], FiltersLayout::AboveContent);
    }
}
