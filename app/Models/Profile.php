<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{


    protected $fillable = ['name', 'description'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     *
     * GET PERMISSIONS
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    /**
     * GET PLANS
     */
    public function plans()
    {
        return $this->belongsToMany(Plan::class);
    }

    /**
     * Permission not liked with this profile
     */
    public function permissionsCreate($filter = null)
    {

        $permissions = Permission::whereNotIn('permissions.id', function ($query){
            $query->select('permission_id');
            $query->from('permission_profile');
            $query->whereRaw("permission_profile.profile_id={$this->id}");
        })
            ->where(function ($queryFilter) use($filter){
                if($filter)
                    $queryFilter->where('permissions.name', 'LIKE', "%{$filter}%");
            })
            ->paginate();

        return $permissions;
    }
}
