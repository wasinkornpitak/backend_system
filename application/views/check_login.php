<?php
if ($this->session->userdata('login') !== true) {
   $page = base_url();
   header('location: '.$page);
   exit;
}
?>
