#include <a_samp>
#include <a_actor>
#include <ZCMD>
#include <streamer>
#include <YSI_Data\y_iterate>
#pragma dynamic 1000000

new PonteLSLV[11];
new Text3D:ActorText[4];
new bool:IniciouObras = false;

#if defined FILTERSCRIPT

public OnFilterScriptInit()
{/*
	Isso aq é pra caso ja deixe criado desde o inicio do FS

    PonteLSLV[0] =  CreateObject(4517, 1705.9000244141,392.60000610352,31.299999237061,0.0,0.0,161.99890136719);
    PonteLSLV[1] =  CreateObject(4517, 1696.6999511719,395.70001220703,31.299999237061,0.0, 0.0, 161.99890136719);
    PonteLSLV[2] =  CreateObject(4517, 1683.4000244141,400.0, 31.299999237061, 0.0, 0.0, 162.0);
    PonteLSLV[3] =  CreateObject(4517, 1809.6999511719,811.40002441406,11.800000190735, 0.0, 0.0, 0.9993896484375);
    PonteLSLV[4] =  CreateObject(4517, 1796.1999511719,811.20001220703,11.800000190735,0.0,0.0,0.9942626953125);
    PonteLSLV[5] =  CreateObject(4517, 1784.3000488281,810.90002441406,11.800000190735, 0.0, 0.0, 0.9942626953125);
	*/return 1;
}

public OnFilterScriptExit()
{
	return 1;
}

#else

main()
{
}

#endif

public OnGameModeInit()
{
    SetTimer("areadm", 1000, true);
	return 1;
}

public OnGameModeExit()
{
	return 1;
}

public OnPlayerRequestClass(playerid, classid)
{
	return 1;
}

public OnPlayerConnect(playerid)
{
	return 1;
}

public OnPlayerDisconnect(playerid, reason)
{
	return 1;
}

public OnPlayerSpawn(playerid)
{
	return 1;
}

public OnPlayerDeath(playerid, killerid, reason)
{
	return 1;
}

public OnVehicleSpawn(vehicleid)
{
	return 1;
}

public OnVehicleDeath(vehicleid, killerid)
{
	return 1;
}

public OnPlayerText(playerid, text[])
{
	return 1;
}

public OnPlayerCommandText(playerid, cmdtext[])
{
	return 0;
}

public OnPlayerEnterVehicle(playerid, vehicleid, ispassenger)
{
	return 1;
}

public OnPlayerExitVehicle(playerid, vehicleid)
{
	return 1;
}

public OnPlayerStateChange(playerid, newstate, oldstate)
{
	return 1;
}

public OnPlayerEnterCheckpoint(playerid)
{
	return 1;
}

public OnPlayerLeaveCheckpoint(playerid)
{
	return 1;
}

public OnPlayerEnterRaceCheckpoint(playerid)
{
	return 1;
}

public OnPlayerLeaveRaceCheckpoint(playerid)
{
	return 1;
}

public OnRconCommand(cmd[])
{
	return 1;
}

public OnPlayerRequestSpawn(playerid)
{
	return 1;
}

public OnObjectMoved(objectid)
{
	return 1;
}

public OnPlayerObjectMoved(playerid, objectid)
{
	return 1;
}

public OnPlayerPickUpPickup(playerid, pickupid)
{
	return 1;
}

public OnVehicleMod(playerid, vehicleid, componentid)
{
	return 1;
}

public OnVehiclePaintjob(playerid, vehicleid, paintjobid)
{
	return 1;
}

public OnVehicleRespray(playerid, vehicleid, color1, color2)
{
	return 1;
}

public OnPlayerSelectedMenuRow(playerid, row)
{
	return 1;
}

public OnPlayerExitedMenu(playerid)
{
	return 1;
}

public OnPlayerInteriorChange(playerid, newinteriorid, oldinteriorid)
{
	return 1;
}

public OnPlayerKeyStateChange(playerid, newkeys, oldkeys)
{
	return 1;
}

public OnRconLoginAttempt(ip[], password[], success)
{
	return 1;
}

public OnPlayerUpdate(playerid)
{
	return 1;
}

public OnPlayerStreamIn(playerid, forplayerid)
{
	return 1;
}

public OnPlayerStreamOut(playerid, forplayerid)
{
	return 1;
}

public OnVehicleStreamIn(vehicleid, forplayerid)
{
	return 1;
}

public OnVehicleStreamOut(vehicleid, forplayerid)
{
	return 1;
}

public OnDialogResponse(playerid, dialogid, response, listitem, inputtext[])
{
	return 1;
}

public OnPlayerClickPlayer(playerid, clickedplayerid, source)
{
	return 1;
}
CMD:iniciarobras(playerid)
{
	if(!IsPlayerAdmin(playerid)) return SendClientMessage(playerid, 0xFF0000AA, "| ERRO | Comando Inválido.");
	IniciarObras();
	IniciouObras = true;
	SendClientMessage(playerid, 0xFF0000AA, "| OBRAS | Obras iniciadas!!");
	return 1;
}


CMD:terminarobras(playerid)
{
    if(!IsPlayerAdmin(playerid)) return SendClientMessage(playerid, 0xFF0000AA, "| ERRO | Comando Inválido.");
	TerminarObras();
	IniciouObras = false;
	SendClientMessage(playerid, 0xFF0000AA, "| OBRAS | Obras Terminadas!!");
	return 1;
}

CMD:infoobras(playerid)
{
	if(IniciouObras == false) return SendClientMessage(playerid, 0xFF0000AA, "| OBRAS | Não há obras em Andamento!!");
    if(!IsPlayerInRangeOfPoint(playerid, 2.0, 1809.5896,822.3916,10.6904) && !IsPlayerInRangeOfPoint(playerid, 2.0, 1786.3190,822.0200,10.6953) && !IsPlayerInRangeOfPoint(playerid, 2.0, 1701.5922,381.8859,30.0385) && !IsPlayerInRangeOfPoint(playerid, 2.0, 1683.8262,388.5136,30.1807))return SendClientMessage(playerid, 0xFF0000AA, "| OBRAS | Você não está proximo a um operário.");
	new String[2000];
    format(String, sizeof(String), "{FFFFFF}Olá {00FF00}%s{FF00FF}\n\n{FFFFFF}Este local está fechado para a construção de um pedágio.\n\nA previsão para a conclusão das obras é dia {FF0000}20/02/2024{FFFFFF}.\n\n\n{FF0000}AVISO{FFFFFF}: NÃO ENTRE NA AREA DE CONSTRUÇÃO, É PERIGOSO!\n\n\n\n{FFFFFF}Obrigado pela compreensão, tenha um bom jogo!", PlayerName(playerid));
   	ShowPlayerDialog(playerid, 3500, DIALOG_STYLE_MSGBOX, "{FFFF00}Informações da Obra", String, "Ok", "");
	return 1;
}
	
stock IniciarObras()
{
    PonteLSLV[0] =  CreateObject(4517, 1705.9000244141,392.60000610352,31.299999237061,0.0,0.0,161.99890136719);
    PonteLSLV[1] =  CreateObject(4517, 1696.6999511719,395.70001220703,31.299999237061,0.0, 0.0, 161.99890136719);
    PonteLSLV[2] =  CreateObject(4517, 1683.4000244141,400.0, 31.299999237061, 0.0, 0.0, 162.0);
    PonteLSLV[3] =  CreateObject(4517, 1809.6999511719,811.40002441406,11.800000190735, 0.0, 0.0, 0.9993896484375);
    PonteLSLV[4] =  CreateObject(4517, 1796.1999511719,811.20001220703,11.800000190735,0.0,0.0,0.9942626953125);
    PonteLSLV[5] =  CreateObject(4517, 1784.3000488281,810.90002441406,11.800000190735, 0.0, 0.0, 0.9942626953125);
    PonteLSLV[6] = 	GangZoneCreate(1668.1946,429.8232, 1817.9741,821.4232);
    GangZoneFlashForAll(PonteLSLV[6],0xFF0000AA);
	PonteLSLV[7] = 	CreateActor(16,1809.5896,822.3916,10.6904,26.1083);
    ActorText[0] = Create3DTextLabel("Local em Obras\nUse: '{ff0000}/InfoObras{FFFFFF}' para ver informações",-1,1809.5896,822.3916,10.6904,20.0,0);
	PonteLSLV[8] = 	CreateActor(27,1786.3190,822.0200,10.6953,17.4908);
    ActorText[1] = Create3DTextLabel("Local em Obras\nUse: '{ff0000}/InfoObras{FFFFFF}' para ver informações",-1,1786.3190,822.0200,10.6953,20.0,0);
	PonteLSLV[9] = 	CreateActor(27,1701.5922,381.8859,30.0385,154.5317);
    ActorText[2] = Create3DTextLabel("Local em Obras\nUse: '{ff0000}/InfoObras{FFFFFF}' para ver informações",-1,1701.5922,381.8859,30.0385,20.0,0);
	PonteLSLV[10] = CreateActor(16,1683.8262,388.5136,30.1807,161.6927);
    ActorText[3] = Create3DTextLabel("Local em Obras\nUse: '{ff0000}/InfoObras{FFFFFF}' para ver informações",-1,1683.8262,388.5136,30.1807,20.0,0);

	
}
	
stock TerminarObras()
{
	DestroyObject(PonteLSLV[0]);
    DestroyObject(PonteLSLV[1]);
    DestroyObject(PonteLSLV[2]);
    DestroyObject(PonteLSLV[3]);
    DestroyObject(PonteLSLV[4]);
    DestroyObject(PonteLSLV[5]);
    DestroyActor(PonteLSLV[7]);
    DestroyActor(PonteLSLV[8]);
    DestroyActor(PonteLSLV[9]);
    DestroyActor(PonteLSLV[10]);
    GangZoneHideForAll(PonteLSLV[6]);
    GangZoneDestroy(PonteLSLV[6]);
    Delete3DTextLabel(ActorText[0]);
    Delete3DTextLabel(ActorText[1]);
    Delete3DTextLabel(ActorText[2]);
    Delete3DTextLabel(ActorText[3]);
}

forward areadm();
public areadm()
{
foreach(new i: Player)
{
if(IsPlayerInPlace(i,1668.1946,429.8232, 1817.9741,821.4232))
{
if(IniciouObras == true)
{
	SendClientMessage(i, 0xFF0000AA, "| INFO | Area em Obras, saia imediatamente!");
	new Float:VidaS;
	GetPlayerHealth(i, VidaS), SetPlayerHealth(i, VidaS - 7.0);
}
}
}
}


stock IsPlayerInPlace(playerid, Float:XMin, Float:YMin, Float:XMax, Float:YMax)
{
	new
		RetValue = 0,
		Float:aX,
		Float:aY,
		Float:aZ
	;
    GetPlayerPos(playerid, aX, aY, aZ);
    if(aX >= XMin && aY >= YMin && aX < XMax && aY < YMax)
    {
		RetValue = 1;
    }
	return RetValue;
}

stock PlayerName(playerid){
	new PlayerNameLevel[MAX_PLAYERS];
	GetPlayerName(playerid, PlayerNameLevel, MAX_PLAYERS);
	return PlayerNameLevel;
}
