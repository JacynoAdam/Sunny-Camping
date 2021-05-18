<?php

namespace App\Models;

/**
 * App\Models\RoomPrice.
 *
 * @property int $id
 * @property int $room_id
 * @property string $name
 * @property float $price
 * @property string $start_date
 * @property string $end_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|RoomPrice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoomPrice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoomPrice query()
 * @method static \Illuminate\Database\Eloquent\Builder|RoomPrice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomPrice whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomPrice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomPrice whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomPrice wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomPrice whereRoomId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomPrice whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomPrice whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Room $room
 */
class RoomPrice extends BaseModel
{
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
