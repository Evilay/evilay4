<?php

namespace App\Models\Polls;

use Illuminate\Database\Eloquent\Model;
use App\Models\Users\User;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Vote
 *
 * @package App\Models\Polls
 * @property int $id
 * @property int $poll_id
 * @property int $user_id
 * @property int $poll_value_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Polls\Vote newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Polls\Vote newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Polls\Vote query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Polls\Vote whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Polls\Vote whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Polls\Vote wherePollId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Polls\Vote wherePollValueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Polls\Vote whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Polls\Vote whereUserId($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Users\User[] $users
 * @property-read int|null $users_count
 */
class Vote extends Model
{

    /**
     * @var string
     */
    protected $table = 'poll_votes';

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */
    protected $fillable = [
        'poll_id',
        'user_id',
        'poll_value_id',
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
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     */
    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return HasMany
     */
    public function users():HasMany{
        return $this->hasMany(User::class,'id');
    }


    /**
     * @return int
     */
    public function getPollValueId(): int
    {
        return $this->poll_value_id;
    }

    /**
     * @param int $poll_value_id
     */
    public function setPollValueId(int $poll_value_id): void
    {
        $this->poll_value_id = $poll_value_id;
    }



}
