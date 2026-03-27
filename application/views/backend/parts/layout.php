<?php
$this->load->view('backend/parts/header');
$this->load->view('backend/'.(isset($content) ? $content : 'blank'));
$this->load->view('backend/parts/footer');