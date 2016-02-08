<?php

class BaseController extends Controller {

	protected function _getDepartmentAndSectionCd($sectionname, $departmentName)
	{
		$department = DB::table('departmentmasters')
			->join('sectionmasters', 'departmentmasters.sectioncd', '=', 'sectionmasters.sectioncd')
			->where('sectionname', $sectionname)
			->where('departmentname', $departmentName)
			->first();
		return array($department->sectioncd,$department->departmentcd);
	}
	
	protected function _getDepartmentList()
	{
		if (Cache::has('departmentList')) 
		{
			return Cache::get('departmentList');
		} 
		else 
		{
			$list = DB::table('sectionmasters')
					 ->join('departmentmasters', 'departmentmasters.sectioncd', '=', 'sectionmasters.sectioncd')
					 ->select(
					 	'departmentmasters.departmentcd as departmentcd',
					 	'sectionmasters.sectionname as sectionname', 
					 	'departmentmasters.departmentname as departmentname')
					 ->get();
			$expiresAt = Carbon::now()->addMinutes(10);
			Cache::add('departmentList', $list, $expiresAt);
			return $list;
		}
	}
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
