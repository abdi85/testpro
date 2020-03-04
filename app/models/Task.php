<?php

/**
* The Task class
*/
class Task
{
    // Attributes
    private $id;

	private $description;

	private $completed;

	private $deadline;

    // Getters and Setters
    public function getId()
	{
		return $this->id;
	}

    public function setId($value)
    {
        $this->id = $value;
    }

	public function getDescription()
	{
		return $this->description;
	}

    public function setDescription($value)
    {
        $this->description = $value;
    }

    public function getDeadline()
	{
		return $this->deadline;
	}

    public function setDeadline($value)
    {
        $this->deadline = $value;
    }

	public function isComplete()
	{
		return $this->completed;
	}

	public function setCompleted($value){
		$this->completed = $value;
	}


    // Method useful for the view
    public function asHTMLTableRow()
	{
	    $str = "";

        // initalize $checked as an empty string
		$checked = "";

		$str .= "<tr>\n";
        $str .= "<td>";
        $str .= "<a href=\"task?id=" . urlencode($this->id) . "\">" . htmlentities($this->id) . "</a>";
        $str .= "</td>";

		$str .= "<td>";
		if($this->completed == true)
		{
            $checked = "checked";

			$str .= "<strike>" . htmlentities($this->description) . "</strike>";
		}
		else
		{
			$str .= htmlentities($this->description);
		}
		$str .= "</td>";

		$str .= "<td>"
			. "<input type=\"checkbox\" disabled=\"disabled\" $checked>"
			. "</td>";

		$str .= "<td>";
		$date = strtotime($this->deadline);
		$str .= date("j F Y", $date);
		$str .= "</td>";
		$str .= "</tr>\n";

		return $str;
	}

    public static function fetchAll(){
        $dbh = App::get('dbh');
        $statement = $dbh->prepare("SELECT * FROM task ORDER BY deadline ASC");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS, 'Task');

    }

    public static function fetchId($id)
    {
        // ASSUMPTION
        //    - $id was validated by the caller

        $dbh = App::get('dbh');

        // prepared statement with named placeholders
        $statement = $dbh->prepare("SELECT * FROM task WHERE id = ?");
        $statement->setFetchMode(PDO::FETCH_CLASS, 'Task');
        $statement->execute([$id]);
        return $statement->fetch();
    }
}
