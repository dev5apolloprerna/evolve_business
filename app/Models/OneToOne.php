<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OneToOne extends Model
{
    use HasFactory;
    public $table = 'one_to_one_detail';
    protected $fillable = [
        'from',
        'to',
        'place',
        'comment',
        'photo',
        'from_id',
        'to_id',
        'receive_date',
        'isapproved_status',
        'approved_by',
        'approved_by_id',
        'approveddatetime',
        'iStatus',
        'reject_comment',
        'isDelete',
        'strIP',
        'date',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by',
        'name_of_the_brand',
        'question_1',
        'question_2',
        'question_3',
        'question_4',
        'question_5',
        'question_6',
        'question_7',
        'question_8',
        'question_9',
        'business_worth',
        'business_till',
        'to_question_1',
        'to_question_2',
        'to_question_3',
        'to_question_4',
        'to_question_5',
        'to_question_6',
        'to_question_7',
        'to_question_8',
        'to_question_9',
        'to_business_worth',
        'to_business_till'
    ];
}
