<?php

namespace App\Models\Polls;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
;

use Laratrust\Traits\LaratrustUserTrait;

use Illuminate\Notifications\Notifiable;
use phpDocumentor\Reflection\Types\Integer;

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
 * @property string $description
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Polls\Poll filter($frd)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Polls\Poll whereDescription($value)
 * @property string $image
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Polls\Poll whereImage($value)
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
        'description',
        'image',
    ];

    /**
     * @return HasMany
     */
    public function values():HasMany{
        return $this->hasMany(PollValue::class,'poll_id','id');
    }


    /**
     * @return Collection
     */
    public function getValues():Collection{
        return $this->values;
    }

    /**
     * @return HasMany
     */
    public function result():HasMany{
        return $this->hasMany(Vote::class,'poll_id','id');
    }

    /**
     * @return Collection
     */
    public function getResult():Collection{
        return $this->result;
    }

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

    public function scopeFilter(Builder $query, array $frd): Builder
    {
        array_filter($frd);
        foreach ($frd as $key => $value) {
            if (null === $value) {
                continue;
            }
            switch ($key) {
                case 'search':
                    {
                        $query->where(function (Builder $query) use ($value): Builder {
                            return $query->orWhere('name', 'like', '%' . $value . '%');});
                    }
                    break;
            }
        }
        return $query;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }


    /**
     * @return string
     */
    public function getImage(): ?string
    {
        $ava = $this->{'image'};
        if ($ava == NULL) {
            $ava = 'http://strannic.org/wp-content/uploads/2016/07/l_216a7aab.png';
        } else {
            $ava = $this->{'image'};
        }

        return $ava;
    }

    public function getImageUrl(): string
    {
        return $this->image ?? 'http://strannic.org/wp-content/uploads/2016/07/l_216a7aab.png';
    }


    public function getAvatarPublicPath(): ?string
    {
        return Storage::disk('public')->url($this->getImageUrl());
    }

    public function setImageUrl(string $image_url): void
    {
        $this->image = $image_url;
    }

    //public function getFinal():

}
