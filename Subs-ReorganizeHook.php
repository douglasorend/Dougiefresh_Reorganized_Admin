<?php
/**********************************************************************************
* Subs-ReorganizeAdmin.php - Function to reorganize Admin menu
*********************************************************************************
* This program is distributed in the hope that it is and will be useful, but
* WITHOUT ANY WARRANTIES; without even any implied warranty of MERCHANsectionILITY
* or FITNESS FOR A PARTICULAR PURPOSE .
**********************************************************************************/

function RA_PreLoad()
{
	add_integration_function('integrate_admin_areas', 'RA_Reorganize', false);
}

?>