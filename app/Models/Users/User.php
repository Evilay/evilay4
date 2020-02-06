<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use phpDocumentor\Reflection\Types\Integer;


/**
 * App\Models\Users\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $f_name
 * @property string $l_name
 * @property string $m_name
 * @property string $phone
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Users\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Users\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\User orWherePermissionIs($permission = '')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\User orWhereRoleIs($role = '', $team = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\User whereFName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\User whereLName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\User whereMName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\User wherePermissionIs($permission = '', $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\User whereRoleIs($role = '', $team = null, $boolean = 'and')
 * @property string|null $age
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\User whereAge($value)
 */
class User extends Authenticatable

{
    use LaratrustUserTrait;
    use Notifiable;

    protected $table = 'users';

    public $stat = 0;

    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'f_name',
        'l_name',
        'm_name',
        'phone',
        'avatar',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->f_name;
    }


    public function setFirstName(string $name = '')
    {
        $this->setName($name, 1);
    }

    public function setLastName(string $name = '')
    {
        $this->setName($name, 0);
    }

    public function setMiddleName(string $name = '')
    {
        $this->setName($name, 2);
    }


    /**
     * @return string
     */
    public function getName(): string
    {
        return trim($this->getLastName() . ' ' . $this->getFirstName() . ' ' . $this->getMiddleName());
    }

    /**
     * @param string $name
     * @param int $typeId
     */
    public function setName(string $name, int $typeId = 0): void
    {
        switch ($typeId) {
            case 1:
                {
                    $type = 'f_name';
                }
                break;
            case 2:
                {
                    $type = 'm_name';
                }
                break;
            default:
                {
                    $type = 'l_name';
                }
                break;
        }
        $this->{$type} = mb_convert_case($name, MB_CASE_TITLE, 'UTF-8');
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->l_name;
    }

    /**
     * @return string
     */
    public function getMiddleName(): string
    {
        return $this->m_name;
    }


    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getEmailVerifiedAt(): ?string
    {
        return $this->email_verified_at;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $phone = preg_replace('/\D/', '', $phone);
        $this->{'phone'} = $phone;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->{'phone'};
    }

    /**
     * @param string|null $email_verified_at
     */
    public function setEmailVerifiedAt(?string $email_verified_at): void
    {
        $this->email_verified_at = $email_verified_at;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return route('users.show', $this);
    }

    /**
     * @param Builder $query
     * @param array $frd
     * @return Builder
     */

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
                            return $query->orWhere('f_name', 'like', '%' . $value . '%')
                                ->orWhere('l_name', 'like', '%' . $value . '%')
                                ->orWhere('m_name', 'like', '%' . $value . '%')
                                //->orWhere('username','like','%'.$value.'%')
                                ->orWhere('email', 'like', '%' . $value . '%');
                        });
                    }
                    break;
            }
        }
        return $query;
    }

    /**
     * @return HasMany
     */
    public function logs(): HasMany
    {
        return $this->hasMany(UserLog::class);
    }

    /**
     * @param string $avatar
     */
    public function setAvatar(string $avatar): void
    {
        $this->{'avatar'} = $avatar;
    }

    /**
     * @return string
     */
    public function getAvatar(): ?string
    {
        $ava = $this->{'avatar'};
        if ($ava == NULL) {
            $ava = 'images/0SF3dcRIVhqgFMZKCSuVa59bHkbYdUclRPlUVeLM.jpeg';
        } else {
            $avatarurl = $this->{'avatar'};
        }

        return $ava;
    }

    public function getAvatarPublicPath(): ?string
    {

        return Storage::disk('public')->url($this->getAvatar());
    }


}
