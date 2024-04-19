<?php

namespace App\Domain\Book\Models;

use App\Domain\User\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'ISBN', 'value'];

    public function user(): BelongsToMany
    {
        return $this->BelongsToMany(User::class);
    }
}
