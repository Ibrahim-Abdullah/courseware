<?php
/**
 * @author Ibrahim Abdullah
 * @version 1.0
 */

require_once('../database/dbconnectclass.php');
class CourseManagement Extends dbconnection
{
    public $regcourses = null;
	//param userid -user id
	//majorid
	//Student registration
	//unregistered courses under major
	//registered courses id
	//course registratioon
	//check number of rows
	//delete user course registration
    //major 2 MIS
    //MAJOR 1 BA
    //MAJOR 3 CS

	public function registeredcoursesids($userid)
	{
		$userids = array();

		//sql
        $sql = "SELECT c.courseid FROM allcourses as c INNER JOIN majorcourse as mj ON c.courseid = mj.majorcourseid
        INNER JOIN usercourses as ucs ON mj.courseid = ucs.majorcourse_id WHERE ucs.iser_id = $userid";

        $result = $this->query($sql);

        if($result)
        {
            while($row = $this->fetch())
            {
                $userids[] = $row['courseid'];
            }
            $this->regcourses = $userids;
        }
        return $this->regcourses;
	}

	function unregisteredcourses($majorid)
	{
	    //What to do list user unregistered courses
		//Get user major
        //Get courses under the major
        //Get user registered courses
        //List unregistered courses

        $sql = "SELECT ac.coursecode, ac.coursename, ac.courseid, ac.courseyear FROM allcourses as ac 
        inner join majorcourses as mc on ac.courseid = mc.course_id WHERE mc.major_id = '$majorid' ";


        if($this->regcourses === null)
        {
            return $this->query($sql);
        }
        else
        {
            //get user course ids
            $cids = implode(",",$this->regcourses);

            //append to the sql
            $sql = $sql." AND mj.courseides NOT IN ($cids)";

            return $this->query($sql);
        }
	}
}

?>