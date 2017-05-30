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
		$client->setApplicationName("ApplicationName");
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