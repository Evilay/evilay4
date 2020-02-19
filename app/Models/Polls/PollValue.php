<?php

namespace App\Models\Polls;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PollValue
 *
 * @package App\Models\Polls
 * @property int $id
 * @property int $poll_id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Polls\PollValue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Polls\PollValue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Polls\PollValue query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Polls\PollValue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Polls\PollValue whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Polls\PollValue wherePollId($value)
 * @mixin \Eloquent
 */
class PollValue extends Model
{

    protected $table = 'poll_values';

    protected $primaryKey = 'id';

    protected $fillable = [
        'poll_id',
        'name',
    ];

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getPollId(): int
    {
        return $this->poll_id;
    }

    /**
     * @param int $poll_id
     */
    public function setPollId(int $poll_id): void
    {
        $this->poll_id = $poll_id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }



}
