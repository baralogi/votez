<?php

namespace App\DataTables;

use App\Models\User;
use App\Repositories\Eloquent\UserRepository;
use Illuminate\Support\Str;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
{
    protected $repository;

    public function __construct(
        UserRepository $repository
    ) {
        $this->repository = $repository;
    }

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'users.action')
            ->addColumn('roles', function (User $user) {
                return $user->roles->map(function ($role) {
                    return Str::title($role->name);
                })->implode(', ');
            })
            ->addColumn('action', function (User $user) {
                return view('pages.committee.user.actions', compact('user'));
            })
            ->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return $this->repository
            ->listDataTables(auth()->user()->organization_id);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('users-table')
            ->columns($this->getColumns())
            ->dom('Bfrtip')
            ->orderBy(0, 'asc')
            ->buttons(
                Button::make('create')->addClass('btn-success'),
                Button::make('reset')->addClass('btn-warning'),
                Button::make('reload')->addClass('btn-danger')
            );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('name')->title('Nama'),
            Column::make('email')->title('Email'),
            Column::make('roles')->title('Jabatan'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center')
                ->title('Aksi'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'users_data_' . date('YmdHis');
    }
}
