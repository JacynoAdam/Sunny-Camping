<?php


namespace App\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use App\Repositories\ClientRepositoryInterface;
use DateTime;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ClientRepository extends EloquentRepository implements ClientRepositoryInterface
{
    protected array $prices = ['adult' => 18, 'child' => 14, 'electricity' => 10, 'smallPlaces' => 4, 'bigPlaces' => 6];
    protected array $discounts;

    protected array $notNullable = ['arrivalDate', 'departureDate', 'adults', 'children', 'electricity', 'smallPlaces',
        'bigPlaces', 'discount', 'paid', 'status'];
    protected array $defaultValues = [
        'adults' => 0,
        'children' => 0,
        'electricity' => 0,
        'smallPlaces' => 0,
        'bigPlaces' => 0,
        'discount' => 0,
        'paid' => 0,
        'status' => 'unsettled'
    ];

    public function __construct()
    {
        $this->model = new Client;
        $this->discounts = config('constants.discounts');
    }

    public function update(int $id, array $attributes): bool
    {
        $model = $this->find($id);
        $model->fill($attributes);
        if (!isset($model->paid) || $model->paid <= $this->getStayPrice($model)) $model->status = "unsettled";
        else $model->status = "settled";
        return $this->saveIfValid($model);
    }

    public function validateModel(Model $model): bool
    {
        if (empty($model->firstName) && empty($model->lastName)) return false;
        if (!strtotime($model->arrivalDate) || !strtotime($model->departureDate)) return false;
        if (strtotime($model->arrivalDate) >= strtotime($model->departureDate)) return false;
        if ($model->adults == 0 && $model->children == 0) return false;
        if (!in_array($model->discount, $this->discounts)) return false;
        if ($model->adults < 0 || $model->children < 0 || $model->electricity < 0 || $model->smallPlaces < 0
            || $model->bigPlaces < 0) return false;
        return true;
    }

    public function all(array $columns = ['*']): Collection
    {
        $clients = parent::all($columns);
        foreach ($clients as $client) {
            $client->price = $this->getStayPrice($client);
        }
        return $clients;
    }

    public function paginate(array $query = []): LengthAwarePaginator
    {
        $paginator = parent::paginate($query);
        foreach ($paginator->items() as $client) {
            $client->price = $this->getStayPrice($client);
        }
        return $paginator;
    }

    public function getStayPrice(Model $model): int
    {
        $arrival = new DateTime($model->arrivalDate);
        $departure = new DateTime($model->departureDate);
        $days = $departure->diff($arrival)->format("%a");
        $price = (1 - $client->discount / 100) * $days * ($this->prices['adult'] * $client->adults + $this->prices['child'] * $client->children
                + $this->prices['smallPlaces'] * $client->smallPlaces + $this->prices['bigPlaces'] * $client->bigPlaces
                + $this->prices['electricity'] * $client->electricity);
        return (int)$price;
    }

    public function settle(int $id, int $amount): bool {
        if ($amount <= 0) return false;
        $model = $this->find($id);
        if (!isset($model)) return false;
        $model->paid += $amount;
        if ($model->paid >= $this->getStayPrice($model)) $model->status = "settled";
        else $model->status = "unsettled";
        $model->save();
        return true;
    }
}
