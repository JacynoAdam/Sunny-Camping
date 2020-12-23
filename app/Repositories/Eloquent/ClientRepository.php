<?php


namespace App\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use App\Repositories\ClientRepositoryInterface;
use DateTime;
use Illuminate\Http\Request;

class ClientRepository extends BaseRepository implements ClientRepositoryInterface
{
    protected $prices = ['adult' => 18, 'child' => 14, 'electricity' => 10, 'small_place' => 4, 'big_place' => 6];
    // TODO: Get $prices from DB
    protected $discounts = [0, 5, 10];
    // TODO: Get $discounts from DB

    protected $notNullable = ['arrival_date', 'departure_date', 'adults', 'children', 'electricity', 'small_places',
        'big_places', 'discount'];
    protected $defaultValues = [
        'adults' => 0,
        'children' => 0,
        'electricity' => 0,
        'small_places' => 0,
        'big_places' => 0,
        'discount' => 0
    ];

    public function add(Request $request)
    {
        // TODO: Change validateRequest to validateModel / validate
        if ($request->method() != 'PUT') return false;
        $client = new Client($request->all());
        $client = $this->setNotNullableToDefault($client, $this->notNullable, $this->defaultValues);
        if (!$this->validateModel($client)) return false;
        $client->save();
    }

    public function validateModel(Model $model)
    {
        if (empty($model->first_name) && empty($model->second_name)) return false;
        if (!isset($model->arrival_date) || !isset($model->departure_date)) return false;
        if ($model->adults == 0 && $model->children == 0) return false;
        if (!in_array($model->discount, $this->discounts)) return false;
        return true;
    }

    public function all()
    {
        $clients = Client::all();
        foreach ($clients as $client) {
            $client->price = $this->getStayPrice($client);
        }
        return $clients;
    }

    public function getStayPrice(Client $client)
    {
        $arrival = new DateTime($client->arrival_date);
        $departure = new DateTime($client->departure_date);
        $days = $departure->diff($arrival)->format("%a");
        $price = $days * ($this->prices['adult'] * $client->adults + $this->prices['child'] * $client->children
                + $this->prices['small_place'] * $client->small_places + $this->prices['big_place'] * $client->big_places
                + $client->electricity) * (1 - $client->discount / 100);
        return (int)$price;
    }
}
