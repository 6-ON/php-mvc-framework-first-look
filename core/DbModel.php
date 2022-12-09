<?php

namespace app\core;

abstract class DbModel extends Model
{
    private static function prepare($sql): \PDOStatement
    {
        return Application::$app->db->prepare($sql);
    }

    abstract public function tableName(): string;

    abstract public function attributes(): array;

    public function save()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($attr) => ":$attr", $attributes);
        $SQL = "INSERT INTO $tableName(" . implode(',', $attributes) . ")
            VALUES(" . implode(',', $params) . ")";

        $stmt = self::prepare($SQL);

        foreach ($attributes as $attr => $column){
            $stmt->bindValue(":$column",$this->{$attr});
        }
        $stmt->execute();
        return true;
    }
}