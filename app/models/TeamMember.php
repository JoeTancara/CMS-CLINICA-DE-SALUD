<?php

class TeamMember extends Model
{
    protected string $table = 'team_members';
    protected array $fillable = [
        'name', 'role', 'description', 'image',
        'facebook', 'twitter', 'instagram', 'linkedin',
        'sort_order', 'status',
    ];
}
