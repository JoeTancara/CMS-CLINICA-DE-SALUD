<?php

class Testimonial extends Model
{
    protected string $table = 'testimonials';
    protected array $fillable = ['name', 'role', 'image', 'quote', 'sort_order', 'status'];
}
