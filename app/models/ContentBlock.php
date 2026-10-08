<?php

class ContentBlock extends Model
{
    protected string $table = 'content_blocks';
    protected array $fillable = ['block_key', 'title', 'subtitle', 'body', 'image'];

    public function getByKey(string $key): array
    {
        return $this->findBy('block_key', $key) ?? [
            'block_key' => $key,
            'title' => '',
            'subtitle' => '',
            'body' => '',
            'image' => '',
        ];
    }
}
