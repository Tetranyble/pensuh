<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $guarded = [];
    /**
     * A role may be given various permissions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class)->withTimestamps();
    }

    /**
     * Grant the given permission to a role.
     *
     * @param  Permission $permission
     * @return mixed
     */
    public function givePermissionTo( $permission ){
        if(is_string($permission)){
            $permission = Permission::whereName($permission)->firstOrFail();
        }elseif (is_array($permission)){
            foreach ($permission as $key => $permit){
                $permit = Permission::whereName($permit)->firstOrFail();
                $this->permissions()->sync($permit, false);
            }
            return true;
        }
        return $this->permissions()->sync($permission, false);
    }
}

