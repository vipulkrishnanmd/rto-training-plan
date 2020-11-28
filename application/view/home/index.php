<?php
	error_reporting(0);
	session_start(); //starts thre session
?>
	<style>
        div.process{
            border: solid 1px black;
            position: absolute;
            left: 50%;
            top: 80%;
            background-color: rgba(205, 201, 201, 0.7);
            z-index: 100;

            height: 200px;
            margin-top: -100px;

            width: 300px;
            margin-left: -150px;


        }
        label {width: 340px;}
		a.button {
			-webkit-appearance: button;
			-moz-appearance: button;
			appearance: button;
			
			background-color: #8c1aff;
			border: none;
			color: white;
			padding: 15px 32px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 4px 2px;
			cursor: pointer;
			width:25%;
		}
    </style>

<center>
<a href="<?php echo URL; ?>public/?controller=home&do=newTp" class="button">New Training Plan</a><br>
<a href="<?php echo URL; ?>public/?controller=tp&do=searchTp" class="button">View Training Plan</a>
</center>


	

