<?php

namespace App\Models\API;

use ATehnix\VkClient\Client;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

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
     * @return array
     * @throws \ATehnix\VkClient\Exceptions\VkException
     */
    public function groupsGetMembers(int $groupId): array
    {
        return $this->get('groups.getMembers',  ['group_id' => $groupId]);
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
            $fieldsString  = 'first_name,is_closed,sex,bdate,deactivated,last_name,city,photo_200';
        }
        return $this->get('users.get', ['user_ids' => $usersIds, 'fields' =>$fieldsString]);
    }


}
