<?php

namespace App\Models\VK;

use Illuminate\Database\Eloquent\Model;


/**
 * Class VKusers
 *
 * @package App\Models\VK
 * @property int $id
 * @property int $id_user
 * @property string $first_name
 * @property string $last_name
 * @property string $deactivated
 * @property int $is_closed
 * @property string $bdate
 * @property string $city
 * @property int $sex
 * @property string $photo_url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\VK\VKusers newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\VK\VKusers newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\VK\VKusers query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\VK\VKusers whereBdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\VK\VKusers whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\VK\VKusers whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\VK\VKusers whereDeactivated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\VK\VKusers whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\VK\VKusers whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\VK\VKusers whereIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\VK\VKusers whereIsClosed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\VK\VKusers whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\VK\VKusers wherePhotoUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\VK\VKusers whereSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\VK\VKusers whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class VKusers extends Model
{
    protected $table = 'vk_users';

    public $stat = 0;

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_user',
        'first_name',
        'last_name',
        'deactivated',
        'is_closed',
        'bdate',
        'city',
        'sex',
        'photo_url',
        'created_at',
        'updated_at',
    ];

    /**
     * @return array
     */
    public function getGuarded(): array
    {
        return $this->guarded;
    }

    /**
     * @param array $guarded
     */
    public function setGuarded(array $guarded): void
    {
        $this->guarded = $guarded;
    }

    public function init(){
//        $vk_users->setIdUser($frd['id_user']);
//        $vk_users->setFirstName($frd['first_name']);
//        $vk_users->setLastName($frd['last_name']);
//        $vk_users->setDeactivated($frd['deactivated']);
//        $vk_users->setIsClosed($frd['is_closed']);
//        $vk_users->setBdate($frd['bdate']);
//        $vk_users->setCity($frd['city']);
//        $vk_users->setSex($frd['sex']);
//        $vk_users->setPhotoUrl($frd['photo_url']);
    }

    /**
     * @return bool
     */
    public function isInited():bool {
        return $this->{'first_name'} !== null ? true : false;
    }
    /**
     * @return int
     */
    public function getIdUser(): int
    {
        return $this->id_user;
    }

    /**
     * @param int $id_user
     */
    public function setIdUser(int $id_user): void
    {
        $this->id_user = $id_user;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * @param string $first_name
     */
    public function setFirstName(string $first_name): void
    {
        $this->first_name = $first_name;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->last_name;
    }

    /**
     * @param string $last_name
     */
    public function setLastName(string $last_name): void
    {
        $this->last_name = $last_name;
    }

    /**
     * @return string
     */
    public function getDeactivated(): string
    {
        return $this->deactivated;
    }

    /**
     * @param string $deactivated
     */
    public function setDeactivated(string $deactivated): void
    {
        $this->deactivated = $deactivated;
    }

    /**
     * @return int
     */
    public function getIsClosed(): int
    {
        return $this->is_closed;
    }

    /**
     * @param int $is_closed
     */
    public function setIsClosed(int $is_closed): void
    {
        $this->is_closed = $is_closed;
    }

    /**
     * @return string
     */
    public function getBdate(): string
    {
        return $this->bdate;
    }

    /**
     * @param string $bdate
     */
    public function setBdate(string $bdate): void
    {
        $this->bdate = $bdate;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return int
     */
    public function getSex(): int
    {
        return $this->sex;
    }

    /**
     * @param int $sex
     */
    public function setSex(int $sex): void
    {
        $this->sex = $sex;
    }

    /**
     * @return string
     */
    public function getPhotoUrl(): string
    {
        return $this->photo_url;
    }

    /**
     * @param string $photo_url
     */
    public function setPhotoUrl(string $photo_url): void
    {
        $this->photo_url = $photo_url;
    }


}
