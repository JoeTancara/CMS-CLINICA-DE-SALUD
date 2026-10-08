<?php

class Slide extends Model
{
    protected string $table = 'slides';
    protected array $fillable = [
        'image', 'subtitle', 'title', 'description',
        'button_text', 'button_link', 'sort_order', 'status',
    ];
}
