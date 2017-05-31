<?php 

class Analytics_model extends CI_Model
{
	private $analytics;
	private $profile_id;

	function __construct()
	{
		parent::__construct();

		//Google analytics
		require_once(APPPATH . 'third_party/autoload.php');
	}


	public function init ()
	{
		$key_file_location = APPPATH . "third_party/auth/488c9d8ea501.json"; 

		$client = new Google_Client();
		$client->setApplicationName("Albert's Website");
		$client->setAuthConfig($key_file_location);
  		$client->setScopes(['https://www.googleapis.com/auth/analytics.readonly']);
		
		$this->analytics = new Google_Service_Analytics($client);
	}

	public function getFirstProfileId() {
	  // Get the user's first view (profile) ID.

	  // Get the list of accounts for the authorized user.
	  $accounts = $this->analytics->management_accounts->listManagementAccounts();

	  if (count($accounts->getItems()) > 0) {
	    $items = $accounts->getItems();
	    $firstAccountId = $items[0]->getId();

	    // Get the list of properties for the authorized user.
	    $properties = $this->analytics->management_webproperties
	        ->listManagementWebproperties($firstAccountId);

	    if (count($properties->getItems()) > 0) {
	      $items = $properties->getItems();
	      $firstPropertyId = $items[0]->getId();

	      // Get the list of views (profiles) for the authorized user.
	      $profiles = $this->analytics->management_profiles
	          ->listManagementProfiles($firstAccountId, $firstPropertyId);

	      if (count($profiles->getItems()) > 0) {
	        $items = $profiles->getItems();

	        // Return the first view (profile) ID.
	        $this->profile_id = $items[0]->getId();

	      } else {
	        throw new Exception('No views (profiles) found for this user.');
	      }
	    } else {
	      throw new Exception('No properties found for this user.');
	    }
	  } else {
	    throw new Exception('No accounts found for this user.');
	  }
	}

	function getResults() {
	   return $this->analytics->data_ga->get(
	       'ga:' . $this->profile_id,
	       '7daysAgo',
	       'today',
	       'ga:sessions')->totalsForAllResults['ga:sessions'];
		
	}

	function getChart()
	{
		$startDate = ['7daysAgo', '14daysAgo', '21daysAgo', '28daysAgo', '35daysAgo'];
   	 	$endDate = ['today', '7daysAgo', '14daysAgo', '21daysAgo', '28daysAgo'];

   	 	$result = array();

   	 	for($i = 0; $i<5; $i++)
   	 	{
   	 		$return[$i] = $this->analytics->data_ga->get(
   	 			'ga:' . $this->profile_id,
   	 			$startDate[$i],
   	 			$endDate[$i],
   	 			'ga:sessions'
   	 			)->totalsForAllResults['ga:sessions'];
   	 	}

		return implode(',', $return);
	}

	function getCountries()
	{
		$query = $this->analytics->data_ga->get(
			'ga:' . $this->profile_id,
			'30daysAgo',
			'today',
			'ga:sessions',
			array('dimensions' => 'ga:country')
			)->rows;

		$countryName = array();
		$countryCount = array();

		foreach($query as $country)
		{
			array_push($countryName, "'" . $country[0] . "'");
			array_push($countryCount, $country[1]);
		}

		return array($countryName, $countryCount);
	}

	function getReturningVisitor ()
	{
		return $this->analytics->data_ga->get(
	       'ga:' . $this->profile_id,
	       '7daysAgo',
	       'today',
	       'ga:visits')->rows;
	}

	function getUniqueVisitor()
	{
		return $this->analytics->data_ga->get(
	       'ga:' . $this->profile_id,
	       '7daysAgo',
	       'today',
	       'ga:visitors')->rows;
	}

	function getRealtimeVisitor ()
	{
		$optParams = array(
    				'dimensions' => 'rt:medium'
    				);

		return $this->analytics->data_realtime->get(
		      'ga:'. $this->profile_id,
		      'rt:activeUsers',
		      $optParams)->totalsForAllResults['rt:activeUsers'];	   
	}

}