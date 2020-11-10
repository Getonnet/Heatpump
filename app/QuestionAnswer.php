<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $question_sets_id
 * @property int $users_id
 * @property string $uniq_session
 * @property string $answer
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property QuestionSet $questionSet
 * @property User $user
 */
class QuestionAnswer extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['question_sets_id', 'users_id', 'uniq_session', 'answer', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function questionSet()
    {
        return $this->belongsTo('App\QuestionSet', 'question_sets_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'users_id');
    }
}
