<?php


abstract class Model
{
    protected PDO $db;
    protected string $table;
    protected string $primaryKey = 'id';
    /** @var string[] */
    protected array $fillable = [];

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function all(string $orderBy = 'id ASC'): array
    {
        $stmt = $this->db->query("SELECT * FROM {$this->table} ORDER BY {$orderBy}");
        return $stmt->fetchAll();
    }

    public function allActive(string $orderBy = 'sort_order ASC, id ASC'): array
    {
        $stmt = $this->db->query("SELECT * FROM {$this->table} WHERE status = 1 ORDER BY {$orderBy}");
        return $stmt->fetchAll();
    }

    public function find(int $id): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE {$this->primaryKey} = ? LIMIT 1");
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        return $row ?: null;
    }

    public function findBy(string $column, $value): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE {$column} = ? LIMIT 1");
        $stmt->execute([$value]);
        $row = $stmt->fetch();
        return $row ?: null;
    }

    public function create(array $data): int
    {
        $data = $this->onlyFillable($data);
        $columns = array_keys($data);
        $placeholders = array_map(fn($c) => ":{$c}", $columns);

        $sql = "INSERT INTO {$this->table} (" . implode(', ', $columns) . ") VALUES (" . implode(', ', $placeholders) . ")";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);

        return (int) $this->db->lastInsertId();
    }

    public function update(int $id, array $data): bool
    {
        $data = $this->onlyFillable($data);
        $set = implode(', ', array_map(fn($c) => "{$c} = :{$c}", array_keys($data)));

        $sql = "UPDATE {$this->table} SET {$set} WHERE {$this->primaryKey} = :__id";
        $stmt = $this->db->prepare($sql);
        $data['__id'] = $id;

        return $stmt->execute($data);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE {$this->primaryKey} = ?");
        return $stmt->execute([$id]);
    }

    protected function onlyFillable(array $data): array
    {
        if (empty($this->fillable)) {
            return $data;
        }
        return array_intersect_key($data, array_flip($this->fillable));
    }
}
