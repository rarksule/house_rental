<?php

namespace App\DataTables;

use App\Models\House;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;


class HousesDataTable extends DataTable
{

    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<House> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'houses.action')

            ->rawColumns(['action',])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<House>
     */
    public function query(House $model): QueryBuilder
    {
        return $model->newQuery();
    }



    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('DT_RowIndex')
                ->searchable(false)
                // ->title(__('message.srno'))
                ->orderable(false)
                ->width(60),
            Column::make('name', ),
            Column::Make('owner_id'),
            Column::make('tenant_id', ),
            Column::make('price', ),
            Column::make('payment_date', ),
            Column::make('address', ),
            Column::make('area', ),
            Column::make('rented', ),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }


    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Houses_' . date('YmdHis');
    }
}
