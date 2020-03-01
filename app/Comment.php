<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    const IS_ALLOWED = 1;
    const ID_DISALLOWED = 0;

    public function author() {
        $this->hasOne(User::class);
    }

    public function post() {
        $this->hasOne(Post::class);
    }

    public function allow() {
        $this->status = User::IS_ALLOWED;
        $this->save();
    }

    public function disallow() {
        $this->is_admin = User::IS_DISALLOWED;
        $this->save();
    }

    public function toggleStatus() {
        if ($this->status = 0) {
            return this->allow();
        }

        return $this->disallow();
    }

    public function remove() {
        $this->delete();
    }
}
