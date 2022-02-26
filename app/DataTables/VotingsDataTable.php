<?php

namespace App\DataTables;

use App\Models\Voting;
use App\Services\VotingService;
use Illuminate\Support\Str;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class VotingsDataTable extends DataTable
{
    protected $votingService;

    public function __construct(VotingService $votingService)
    {
        $this->votingService = $votingService;
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
            ->editColumn('description', function (Voting $voting) {
                return Str::limit($voting->description, 75);
            })
            ->editColumn('logo', function (Voting $voting) {
                $logoImage = ($voting->logo) ? $voting->logo_link : $voting->default_logo_link;
                return '<img src="' . $logoImage . '" alt="voting_logo" border="0" width="40" height="40" align="center" class="rounded-circle">';
            })
            ->editColumn('status', function (Voting $voting) {
                if ($voting->voting_status == 'Aktif') {
                    return '<span class="badge badge-pill badge-success">Aktif</span>';
                } else {
                    return '<span class="badge badge-pill badge-danger">Tidak Aktif</span>';
                }
            })
            ->addColumn('action', function (Voting $voting) {
                return view('pages.committee.voting.actions', compact('voting'));
            })
            ->rawColumns(['action', 'logo', 'status']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Voting $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return $this->votingService->getByOrganizationId(auth()->user()->organization_id)->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('votings-table')
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
            Column::computed('logo'),
            Column::make('name')->title('Nama'),
            Column::make('description')->title('Keterangan'),
            Column::make('status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Votings_' . date('YmdHis');
    }
}
