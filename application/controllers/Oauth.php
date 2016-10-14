<?php

class Oauth extends CI_Controller {

	public function index()
	{
		echo $this->facebook->is_authenticated();
		echo '<br>'.$this->facebook->login_url();
		echo '<br> <a href="'.base_url().'/index.php/facebookauth/logout">Logout</a>';
		echo '<br>';
		echo '<br>'.$this->facebook->logout_url();
		$this->session->set_userdata('referred_from', current_url());


		// $user = $this->facebook->request('get', '/me?fields=id,name,email');
		// if (!isset($user['error'])){
		// 	$data['user'] = $user;
		// }

		
		echo "<br>";
		echo "<br>";

		$this->facebook->add_to_batch_pool('user-profile', 'get', '/me?fields=id,name,email');

		$responses = $this->facebook->send_batch_pool();
		if (!isset($responses['error'])){
			foreach ($responses as $key => $data){
			    print_r($data);
			}
		}else{
			echo "Not log in <br>";
		}
		//echo '<iframe src="https://www.facebook.com/plugins/follow.php?href=https%3A%2F%2Fwww.facebook.com%2Fzuck&width=450&height=80&layout=standard&size=small&show_faces=true&appId=1795815103996685" width="500" height="80" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>';
		// echo '<br>' .$this->facebook->post_link_on_profile('Hello','http://i4asiacorp.com/');
	
	}
}
?>
