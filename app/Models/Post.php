<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = "posts";

    protected $guarded = []; // All fields are mass assignable except 'id, title'

    // protected $fillable = [
    //     'title',   // Added 'title' here
    //     'content', // Keep any other fields you need for mass assignment
    // ];
}
