<?php

class Database extends PDO
{

	public function __construct()
	{
		parent::__construct(DB_TYPE . ':host=' . DB_HOST . '; dbname=' . DB_NAME . '; charset=utf8', DB_USER, DB_PASS);
	}

	// SELECT
	public function sql($sql, $placeholders = array())
	{
		// Prepare, replace placeholders, execute and return query
		$query = $this->prepare($sql);
		foreach($placeholders as $key => $value)
			$query->bindValue($key, $value);
		$query->execute();
		return $query;
	}

	// INSERT
	public function insert($table, $data)
	{
		// Prepare keys and placeholders
		$keys = implode(', ', array_keys($data));
		$placeholders = ':' . implode(', :', array_keys($data));

		// Prepare, replace placeholders, execute and return query
		$query = $this->prepare("INSERT INTO $table ($keys) VALUES ($placeholders)");
		foreach($data as $key => $value)
			$query->bindValue(":$key", $value);
		$query->execute();
		return $query;
	}

	// UPDATE
	public function update($table, $data, $where)
	{
		// Prepare fields
		$fields = '';
		foreach($data as $key => $value)
			$fields[] .= "$key = :$key";
		$fields = implode(', ', $fields);

		// Prepare, replace placeholders, execute and return query
		$query = $this->prepare("UPDATE $table SET $fields WHERE $where");
		foreach($data as $key => $value)
			$query->bindValue(":$key", $value);
		$query->execute();
		return $query;
	}

}