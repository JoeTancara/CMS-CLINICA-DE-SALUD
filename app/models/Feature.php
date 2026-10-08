<?php

class Feature extends Model
{
    protected string $table = 'features';
    protected array $fillable = ['icon', 'title', 'description', 'sort_order', 'status'];
}
