<?php

namespace App\DataTables;

use App\Models\Participant;
use App\Repositories\Eloquent\ParticipantRepository;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ParticipantsDataTable extends DataTable
{
    protected $repository;

    public function __construct(
        ParticipantRepository $repository
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
            ->editColumn('action', function (Participant $participant) {
                $component = $participant->have_voted == false
                    ? view('pages.committee.participant.actions', compact('participant'))
                    : '-';

                return $component;
            })
            ->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Participant $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return $this->repository->dataTables(auth()->user()->organization_id);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('participants-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
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
            Column::make('identity_number'),
            Column::make('name'),
            Column::make('have_voted'),
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
        return 'Participants_' . date('YmdHis');
    }
}
