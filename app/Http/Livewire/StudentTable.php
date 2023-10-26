<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Student;
use Illuminate\Contracts\Database\Eloquent\Builder;

class StudentTable extends DataTableComponent
{
    protected $model = Student::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("FirstName", "first_name")
                ->sortable()->searchable(),
            Column::make("E-mail", "address_id")
                ->sortable()->searchable(),
        ];
    }

    public function query(): Builder
    {
        return Student::query();
    }
}
