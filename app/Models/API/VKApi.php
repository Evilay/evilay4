<?php

namespace App\Models\API;

use ATehnix\VkClient\Client;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

/**
 * App\Models\API\VKApi
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\API\VKApi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\API\VKApi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\API\VKApi query()
 * @mixin \Eloquent
 */
class VKApi extends Model
{
    /**
     * @var Client
     */
    public $client;

    /**
     * VKApi constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $client = new Client;
        $this->client = $client;
        parent::__construct($attributes);
    }

    /**
     * @param string $method
     * @param array $options
     * @return array|null
     * @throws \ATehnix\VkClient\Exceptions\VkException
     */
    public function get(string $method, array $options = []): ?array
    {

        $arraySerialized = Str::slug(json_encode($options));
        $cacheName = $method.'.'.$arraySerialized;



        $response = Cache::get($cacheName);
        if (null === $response) {
            $response = $this->client->request($method, $options, env('VKONTAKTE_TOKEN'))['response'] ?? array();
            Cache::put($cacheName, $response, Carbon::now()->addDay());
        }
        return $response;
    }

    /**
     * @param int $groupId
     * @param int $offset
     * @return array
     * @throws \ATehnix\VkClient\Exceptions\VkException
     */
    public function groupsGetMembers(int $groupId, int $offset): array
    {
        return $this->get('groups.getMembers',  ['group_id' => $groupId, 'offset'=>$offset]);
    }

    /**
     * @param array $usersIds
     * @param array|null $fieldsArray
     * @return array
     * @throws \ATehnix\VkClient\Exceptions\VkException
     */
    public function usersGet(array $usersIds, array $fieldsArray = null): array
    {
        if (null !== $fieldsArray){
            $fieldsString = implode(',',$fieldsArray);
        }else{
            $fieldsString  = 'first_name,is_closed,sex,deactivated,last_name,city,photo_400_orig,bdate';
        }
        return $this->get('users.get', ['user_ids' => $usersIds, 'fields' =>$fieldsString]);
    }

    /**
     * @param array $usersIds
     * @param $fieldsArray
     * @return array
     * @throws \ATehnix\VkClient\Exceptions\VkException
     */
    public function usersBDateGet(array $usersIds): array
    {
        $bdate = $this->get('users.get', ['user_ids' => $usersIds, 'fields' =>'bdate']);

//        switch ($fields) {
//            case 1:
//                ;
//                break; }


        return $bdate;
    }


}
