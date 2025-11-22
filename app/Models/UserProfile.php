<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UserProfile extends Model
{
    protected $fillable = [
        'user_id',
        'region_id',
        'district_id',
        'neighborhood_id',
        'neighborhood',
        'company',
        'company_id',
        'phone',
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function neighborhood()
    {
        return $this->belongsTo(Neighborhood::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }


    public function neighborhoodRelation()
    {
        return $this->belongsTo(Neighborhood::class, 'neighborhood_id');
    }

    public function companyRelation()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
