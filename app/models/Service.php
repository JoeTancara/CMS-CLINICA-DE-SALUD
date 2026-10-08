<?php

class Service extends Model
{
    protected string $table = 'services';
    protected array $fillable = [
        'title', 'slug', 'short_description', 'image',
        'icon', 'content', 'sort_order', 'status',
    ];

    public function findBySlug(string $slug): ?array
    {
        return $this->findBy('slug', $slug);
    }

    /** Genera un slug único a partir del título, evitando choques con otros registros */
    public function uniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $base = slugify($title);
        $slug = $base;
        $i = 1;
        while (true) {
            $existing = $this->findBySlug($slug);
            if (!$existing || ($ignoreId && (int)$existing['id'] === (int)$ignoreId)) {
                return $slug;
            }
            $i++;
            $slug = $base . '-' . $i;
        }
    }
}
