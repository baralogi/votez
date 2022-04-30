<?php

namespace App\DataTables;

use App\Repositories\Eloquent\ParticipantRepository;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ParticipantsDataTable extends DataTable
{
    protected $participantRepository;

    public function __construct(
        ParticipantRepository $participantRepository
    ) {
        $this->participantRepository = $participantRepository;
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
            ->addColumn('action', 'participant.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Participant $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return $this->participantRepository->listByOrganizationId(auth()->user()->organization_id)->newQuery();
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
                Button::make('create'),
                Button::make('export'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
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
            Column::make('identification_number'),
            Column::make('name'),
            Column::make('have_voted'),
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
