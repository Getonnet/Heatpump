<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property boolean $is_multiple
 * @property mixed $multiple_option
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property QuestionAnswer[] $questionAnswers
 */
class QuestionSet extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'is_multiple', 'multiple_option', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questionAnswers()
    {
        return $this->hasMany('App\QuestionAnswer', 'question_sets_id');
    }
}
