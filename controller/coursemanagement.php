<?php 
	//call the class

	require_once("../classes/coursemanagement.php");

	//
	if (isset($_SESSION)) 
	{
		//get user details
		$userid = $_SESSION['userid'];
		$majorid = $_SESSION['mid'];
	}

    /**
     * List unregistered courses fro a particular student.
     */
	function listunregcourses()
	{
		//create new instance of the ccoursemanage class
        global $majorid;
		$unreglist = new CourseManagement;
		$myquery = $unreglist->unregisteredcourses($majorid);

		if($myquery)
		{
			while($row=$unreglist->fetch())
			{
			    //make the courseid as the value of the check boxes.
				echo "<input type = 'checkbox' name ='regcs'>{$row['coursename']}";
			}
		}
	}

?>