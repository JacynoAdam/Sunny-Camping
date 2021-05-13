<?php

namespace App\Models;

/**
 * App\Models\ReservationItem.
 *
 * @property int $id
 * @property int $reservation_id
 * @property string $name
 * @property float $price
 * @property string|null $start_date
 * @property string|null $end_date
 * @property int|null $quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationItem whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationItem whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationItem wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationItem whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationItem whereReservationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationItem whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationItem whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Reservation $reservation
 */
class ReservationItem extends BaseModel
{
    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
