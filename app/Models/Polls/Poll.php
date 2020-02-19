<?php

namespace App\Models\Polls;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Poll
 *
 * @package App\Models\Polls
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Polls\Poll newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Polls\Poll newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Polls\Poll query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Polls\Poll whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Polls\Poll whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Polls\Poll whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Polls\Poll whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Poll extends Model
{

    /**
     * @var string
     */
    protected $table = 'polls';

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */
    protected $fillable = [
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
