<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;

/**
        $table->integer('customer_id');
        $table->integer('amount');
        $table->string('status');
        $table->dateTime('billed_date');
        $table->dateTime('paid_date')->nullable();
 */
class InvoiceFilter extends ApiFilter
{
    protected $safeParms = [
        'customerId' => ['eq'],
        'amount' => ['eq', 'gt', 'lt'],
        'status' => ['eq', 'ne'],
        'billedDate' => ['eq', 'gt', 'lt'],
        'paidDate' => ['eq', 'gt', 'lt'],
    ];

    protected $columnMap = [
        'customerId' => 'customer_id',
        'billedDate' => 'billed_date',
        'paidDate' => 'paid_date',
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'gt' => '>',
        'ne' => '!=',
    ];
}
