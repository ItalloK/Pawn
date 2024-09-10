#include 	<a_samp>
#include 	<zcmd>
#include 	<sscanf2>

#define DIALOG_EVENTOCAR 5060

new idVeiculoEvento = -1;
new modeloVeiculoEvento = -1;
new temEvento = false;
new Float:posVehEventX, Float:posVehEventY, Float:posVehEventZ;

public OnFilterScriptInit()
{
   return 1;
}

public OnFilterScriptExit()
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
	if(vehicleid == idVeiculoEvento){
		new Nome[256], string[256];
		GetPlayerName(playerid, Nome, sizeof(Nome));
		format(string, sizeof(string), "| EVENTO | O(A) jogador(a) {FF0000}%s{FFFFFF} entrou no veiculo do EVENTO e ganhou a recompensa de R$ 50.000, Parabens.", Nome);
		SendClientMessageToAll(-1, string);
		GivePlayerMoney(playerid, 50000);
		DestroyVehicle(vehicleid);
		modeloVeiculoEvento = -1, idVeiculoEvento = -1;
		temEvento = false;
	}
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

public OnPlayerPickUpPickup(playerid, pickupid)
{
	return 1;
}

public OnPlayerKeyStateChange(playerid, newkeys, oldkeys)
{
	return 1;
}
public OnDialogResponse(playerid, dialogid, response, listitem, inputtext[])
{
    if(dialogid == DIALOG_EVENTOCAR)
    {
        if(!response) return 1;
        switch(listitem)
        {
            case 0:{
                SendClientMessage(playerid, -1, "Pos 0");
            }
			case 1:{
				SendClientMessage(playerid, -1, "Pos 1");
			}
			case 2:{
				SetPlayerPos(playerid, posVehEventX, posVehEventY, posVehEventZ);
				SendClientMessage(playerid, -1, "| INFO | Você foi ate o veiculo do evento.");
			}
        }
    }
    return 0;
}


CMD:vehevento(playerid, params[])
{
	if(!IsPlayerAdmin(playerid)) return SendClientMessage(playerid, 0xFF0000AA, "| ERRO | Comando Invalido.");
	if (temEvento) return SendClientMessage(playerid, 0xFF0000FF, "| ERRO | Ja tem um evento criado.");
	new carrocadm,
		Float:X, Float:Y, Float:Z, Float:Angle;
	if(sscanf(params, "d", modeloVeiculoEvento)) return SendClientMessage(playerid, 0xFF0000AA, "| ERRO | Use: /vehevento [MODELO]");
	GetPlayerPos(playerid, X, Y, Z);
	GetPlayerFacingAngle(playerid, Angle);
	carrocadm = AddStaticVehicleEx(modeloVeiculoEvento, X, Y, Z, Angle, 0, 0, -1), SetVehicleNumberPlate(-1, "{B83686}HS-ADMIN");
	PutPlayerInVehicle(playerid,carrocadm,0);
	LinkVehicleToInterior(carrocadm, GetPlayerInterior(playerid));
	SetVehicleVirtualWorld(carrocadm, GetPlayerVirtualWorld(playerid));
	idVeiculoEvento = GetPlayerVehicleID(playerid);
	posVehEventX = X, posVehEventY = Y, posVehEventZ = Z;
	new Nome[256], string[256];
	GetPlayerName(playerid, Nome, sizeof(Nome));
	format(string, sizeof(string), "| EVENTO | O Admin {FF0000}%s{FFFFFF} criou um veiculo pelo mapa, ache e ganhe R$ 50.000", Nome);
	SendClientMessageToAll(-1, string);
	temEvento = true;
	return 1;
}
CMD:editevento(playerid)
{
    new string[128];
    format(string, sizeof(string), 
	"ID do Veiculo\t{00A2FF}%d\nModelo do Veiculo:\t{00A2FF}%d\nLocalizacao do veiculo:\t%.2f %.2f %.2f", 
	idVeiculoEvento, modeloVeiculoEvento, posVehEventX, posVehEventY, posVehEventZ);
    ShowPlayerDialog(playerid, DIALOG_EVENTOCAR, DIALOG_STYLE_TABLIST, "Editar Evento", string, "Escolher", "Sair");
    return 1;
}