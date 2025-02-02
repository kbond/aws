<?php

namespace AsyncAws\RdsDataService\ValueObject;

/**
 * Contains the metadata for a column.
 */
final class ColumnMetadata
{
    /**
     * The name of the column.
     */
    private $name;

    /**
     * The type of the column.
     */
    private $type;

    /**
     * The database-specific data type of the column.
     */
    private $typeName;

    /**
     * The label for the column.
     */
    private $label;

    /**
     * The name of the schema that owns the table that includes the column.
     */
    private $schemaName;

    /**
     * The name of the table that includes the column.
     */
    private $tableName;

    /**
     * A value that indicates whether the column increments automatically.
     */
    private $isAutoIncrement;

    /**
     * A value that indicates whether an integer column is signed.
     */
    private $isSigned;

    /**
     * A value that indicates whether the column contains currency values.
     */
    private $isCurrency;

    /**
     * A value that indicates whether the column is case-sensitive.
     */
    private $isCaseSensitive;

    /**
     * A value that indicates whether the column is nullable.
     */
    private $nullable;

    /**
     * The precision value of a decimal number column.
     */
    private $precision;

    /**
     * The scale value of a decimal number column.
     */
    private $scale;

    /**
     * The type of the column.
     */
    private $arrayBaseColumnType;

    /**
     * @param array{
     *   name?: null|string,
     *   type?: null|int,
     *   typeName?: null|string,
     *   label?: null|string,
     *   schemaName?: null|string,
     *   tableName?: null|string,
     *   isAutoIncrement?: null|bool,
     *   isSigned?: null|bool,
     *   isCurrency?: null|bool,
     *   isCaseSensitive?: null|bool,
     *   nullable?: null|int,
     *   precision?: null|int,
     *   scale?: null|int,
     *   arrayBaseColumnType?: null|int,
     * } $input
     */
    public function __construct(array $input)
    {
        $this->name = $input['name'] ?? null;
        $this->type = $input['type'] ?? null;
        $this->typeName = $input['typeName'] ?? null;
        $this->label = $input['label'] ?? null;
        $this->schemaName = $input['schemaName'] ?? null;
        $this->tableName = $input['tableName'] ?? null;
        $this->isAutoIncrement = $input['isAutoIncrement'] ?? null;
        $this->isSigned = $input['isSigned'] ?? null;
        $this->isCurrency = $input['isCurrency'] ?? null;
        $this->isCaseSensitive = $input['isCaseSensitive'] ?? null;
        $this->nullable = $input['nullable'] ?? null;
        $this->precision = $input['precision'] ?? null;
        $this->scale = $input['scale'] ?? null;
        $this->arrayBaseColumnType = $input['arrayBaseColumnType'] ?? null;
    }

    public static function create($input): self
    {
        return $input instanceof self ? $input : new self($input);
    }

    public function getArrayBaseColumnType(): ?int
    {
        return $this->arrayBaseColumnType;
    }

    public function getIsAutoIncrement(): ?bool
    {
        return $this->isAutoIncrement;
    }

    public function getIsCaseSensitive(): ?bool
    {
        return $this->isCaseSensitive;
    }

    public function getIsCurrency(): ?bool
    {
        return $this->isCurrency;
    }

    public function getIsSigned(): ?bool
    {
        return $this->isSigned;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getNullable(): ?int
    {
        return $this->nullable;
    }

    public function getPrecision(): ?int
    {
        return $this->precision;
    }

    public function getScale(): ?int
    {
        return $this->scale;
    }

    public function getSchemaName(): ?string
    {
        return $this->schemaName;
    }

    public function getTableName(): ?string
    {
        return $this->tableName;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function getTypeName(): ?string
    {
        return $this->typeName;
    }
}
