<?php

require_once 'core/bootstrap.php';

Event::on('GameModeInit', function()
{
	Server::setGameModeText("Bare Script");
	Server::showPlayerMarkers(1);
	Server::showNameTags(1);
	Server::allowAdminTeleport(1);

	Server::addPlayerClass(265,1958.3783,1343.1572,15.3746,270.1425,0,0,0,0,-1,-1);

	echo "PHP Version running: ".phpversion();
	echo "SAMPGDK Version running: ".sampgdkversion();
	echo "SAMPHP Version running: ".samphpversion();
});

Event::on('PlayerConnect', function($player){
	Server::gameTextForPlayer(playerid,"~w~SA-MP: ~r~Bare Script",5000,5);
});

Event::on('PlayerSpawn', function($player){
	$player->setInterior(0);
	$player->toggleClock(0);
});

function SetupPlayerForClassSelection($player)
{
 	$player->setInterior(14);
	$player->setPos(258.4893,-41.4008,1002.0234);
	$player->setFacingAngle(270.0);
	$player->camera->setPos(-43.0475,1004.0234);
	$player->camera->setLookAt(258.4893,-41.4008,1002.0234);
}

Event::on('PlayerRequestClass', function($player, $classid){
	SetupPlayerForClassSelection($player);
});

Event::on('PlayerDeath', function($player, $killer, $reason){
	return 1;
});

Event::on('PlayerCommandText', function($player, $cmdtext){
	if(!strcmp($cmdtext,"/yadayada"))
	{
		$player->sendClientMessage(-1,"YADA YADA!!");
	}
	return 1;
});
