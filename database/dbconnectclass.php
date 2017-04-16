<?php

	//include database credential
	require_once('dbcred.php');

	/**
	 * Database connection class
	 */
	class dbconnection
	{
		public $dbconnector;
		public $dbresult;

		/**
		 * Description
		 * Connect to the database and store the conenction in the $dbconnector variable
		 * @return boolean return true or false
		 */
		public function connect()
		{
			//Store database connection 
			$this->dbconnector= mysqli_connect(DBHOST,DBUSERNAME,DBPASSWORD,DBNAME);

			//Check if database connection was successful
			if(mysqli_connect_error())
			{
				return false;
			}else
			{
				return true;
			}
		}

		/**
		 * Close database connection
         *
		 */
		public function close_connection()
		{
			if($this->connect()){
				$this->dbconnector->close();
			}
		}

		/**
		 * Database query method
		 * @return true or false
		 * @param string $sql sql to be excuted
		 */
		public function query($sql)
		{
			if (!$this->connect()) 
			{	
				echo "Connection error";
				return false;
			}
			$this->dbresult = mysqli_query($this->dbconnector,$sql);
			return !($this->dbresult === false);
		}

		/**
		 * Fetch the result stored in the dbresult variable.
		 * @return boolean | result Return the result of the query
		 */
		public function fetch()
		{
			if($this->dbresult === false){
				return false;
			}else
			{
				return mysqli_fetch_assoc($this->dbresult);
			}
		}
		/**
		 * Return the number of result stored in the $dbresult variable
		 * @return boolean| integer 
		 */
		public function getrows()
		{
			if ($this->dbresult == false) 
			{
				return false;
			}
			return mysqli_num_rows($this-dbresult);
		}


		public function preparedstatementquery()
        {

        }

        public function sqlinjectioncheckquery()
        {

        }
	}

?>