<?php

class Message extends Model
{
    protected string $table = 'messages';
    protected array $fillable = [
        'type', 'name', 'email', 'phone', 'gender',
        'birthdate', 'subject', 'message', 'service_id', 'is_read',
    ];

    public function unreadCount(): int
    {
        $stmt = $this->db->query("SELECT COUNT(*) FROM {$this->table} WHERE is_read = 0");
        return (int) $stmt->fetchColumn();
    }

    public function markRead(int $id): bool
    {
        return $this->update($id, ['is_read' => 1]);
    }

    public function recent(int $limit = 5): array
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} ORDER BY created_at DESC LIMIT ?");
        $stmt->bindValue(1, $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function allWithService(): array
    {
        $sql = "SELECT m.*, s.title AS service_title
                FROM {$this->table} m
                LEFT JOIN services s ON s.id = m.service_id
                ORDER BY m.created_at DESC";
        return $this->db->query($sql)->fetchAll();
    }
}
