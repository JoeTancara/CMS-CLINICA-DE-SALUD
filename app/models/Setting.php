<?php

class Setting extends Model
{
    protected string $table = 'settings';
    protected array $fillable = ['meta_key', 'meta_value'];

    /** Devuelve todos los settings como array asociativo [clave => valor] */
    public static function allAsArray(): array
    {
        $db = Database::getInstance();
        $stmt = $db->query('SELECT meta_key, meta_value FROM settings');
        $result = [];
        foreach ($stmt->fetchAll() as $row) {
            $result[$row['meta_key']] = $row['meta_value'];
        }
        return $result;
    }

    public function get(string $key, string $default = ''): string
    {
        $row = $this->findBy('meta_key', $key);
        return $row['meta_value'] ?? $default;
    }

    /** Guarda (crea o actualiza) un valor de configuración */
    public function set(string $key, string $value): void
    {
        $existing = $this->findBy('meta_key', $key);
        if ($existing) {
            $this->update($existing['id'], ['meta_value' => $value]);
        } else {
            $this->create(['meta_key' => $key, 'meta_value' => $value]);
        }
    }

    /** Guarda varios valores a la vez desde un array [clave => valor] */
    public function setMany(array $data): void
    {
        foreach ($data as $key => $value) {
            $this->set($key, $value);
        }
    }
}
