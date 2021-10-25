<?php

namespace App\DataTables;

use App\Models\Option;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class OptionDataTable extends DataTable
{
    private $voting_id;

    public function setVotingId($voting)
    {
        $this->voting_id = $voting;
    }

    public function getVotingId()
    {
        return $this->voting_id;
    }

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'options.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Option $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Option $model)
    {
        return $model->newQuery()
            ->where('voting_id', $this->voting_id);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom' => 'Bfrtip',
                'stateSave' => true,
                'order' => [[0, 'desc']],
                'buttons' => [
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('description')
                ->title('Descripción')
                ->orderable(true)
                ->searchable(false)
                ->exportable(true)
                ->printable(true)
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'options_datatable_' . time();
    }
}
