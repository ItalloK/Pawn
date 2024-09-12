#include 	<a_samp>
#include 	<zcmd>
#include 	<sscanf2>

#define DIALOG_EVENTOCAR 5060
#define DIALOG_VALOREVENTO 5061
#define DIALOG_DICASEVENTO 5062
#define DIALOG_MODELOVEICULO 5063

new idVeiculoEvento = -1;
new modeloVeiculoEvento = -1;
new valorPremioEvento = -1;
new bool:temEvento = false;
new bool:adicionouLocalVeiculo = false;
new Float:posVehEventX, Float:posVehEventY, Float:posVehEventZ;
new Dicas[5][256] = {
	"Dica 1",
	"Dica 2",
	"Dica 3",
	"Dica 4",
	"Dica 5"
};

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
		if(temEvento){
			new Nome[256], string[1000];
			GetPlayerName(playerid, Nome, sizeof(Nome));
			format(string, sizeof(string), "| EVENTO | O(A) jogador(a) {FF0000}%s{FFFFFF} entrou no veiculo do {FFEE00}evento{FFFFFF} e ganhou a recompensa de {00FF00}R$ %s", Nome, FormatMoney(valorPremioEvento));
			SendClientMessageToAll(-1, string);
			GivePlayerMoney(playerid, valorPremioEvento);
			DestroyVehicle(vehicleid);
			modeloVeiculoEvento = -1, idVeiculoEvento = -1;
			temEvento = false;
			posVehEventX = -1, posVehEventY = -1, posVehEventZ = -1;
			valorPremioEvento = -1;
			adicionouLocalVeiculo = false;
		}
		
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
				new string[256];
				format(string, sizeof(string),"| INFO | O ID do veiculo do evento é: {FFE600}%d", idVeiculoEvento);
                SendClientMessage(playerid, -1, string);
            }
			case 1:{
				if(temEvento == true) return SendClientMessage(playerid, 0xFF0000AA, "| ERRO | Já tem um evento em andamento.");
				ShowPlayerDialog(playerid, DIALOG_MODELOVEICULO, DIALOG_STYLE_INPUT, "Modelo do Veiculo", "Digite o modelo do veiculo:", "Confirmar", "Cancelar");
			}
			case 2:{
				if(temEvento == false){
					if(modeloVeiculoEvento < 400) return SendClientMessage(playerid, 0xFF0000AA, "| ERRO | Defina o modelo do veiculo antes.");
					new carrocadm,
						Float:Angle;
					GetPlayerPos(playerid, posVehEventX, posVehEventY, posVehEventZ);
					GetPlayerFacingAngle(playerid, Angle);
					carrocadm = AddStaticVehicleEx(modeloVeiculoEvento, posVehEventX, posVehEventY, posVehEventZ, Angle, 0, 0, -1), SetVehicleNumberPlate(-1, "{B83686}HS-ADMIN");
					PutPlayerInVehicle(playerid,carrocadm,0);
					LinkVehicleToInterior(carrocadm, GetPlayerInterior(playerid));
					SetVehicleVirtualWorld(carrocadm, GetPlayerVirtualWorld(playerid));
					idVeiculoEvento = GetPlayerVehicleID(playerid);
					new string[256];
					format(string, sizeof(string), "| INFO | Você escolheu as posicoes {FF0000}%.2f %.2f %.2f{FFFFFF} para o veiculo.", posVehEventX, posVehEventY, posVehEventZ);
					SendClientMessage(playerid, -1, string);
					adicionouLocalVeiculo = true;
				}else{
					SetPlayerPos(playerid, posVehEventX, posVehEventY, posVehEventZ);
					SendClientMessage(playerid, -1, "| INFO | Você foi ate o veiculo do evento.");
				}	
			}
			case 3:{
				if(temEvento == true) return SendClientMessage(playerid, 0xFF0000AA, "| ERRO | Já tem um evento em andamento.");
				ShowPlayerDialog(playerid, DIALOG_VALOREVENTO, DIALOG_STYLE_INPUT, "Valor do Premio", "Digite o valor para o prêmio:", "Confirmar", "Cancelar");
			}
			case 4:{
				if(temEvento == true) return SendClientMessage(playerid, 0xFF0000AA, "| ERRO | Já tem um evento em andamento.");
				valorPremioEvento = random(200000);
				new string[256];
				format(string, sizeof(string), "| RANDOM | O valor aleatorio para o premio é: {1EFF00}R$%s{FFFFFF}.", FormatMoney(valorPremioEvento));
				SendClientMessage(playerid, -1, string);
			}
			case 5:{
				if(temEvento == true) return SendClientMessage(playerid, 0xFF0000AA, "| ERRO | Já tem um evento em andamento.");
			
				new string[1000];
				format(string, sizeof(string),"{00A2FF}%s\n{00A2FF}%s\n{00A2FF}%s\n{00A2FF}%s\n{00A2FF}%s", 
				Dicas[0], Dicas[1], Dicas[2], Dicas[3], Dicas[4]);
				ShowPlayerDialog(playerid, DIALOG_DICASEVENTO, DIALOG_STYLE_LIST, "Dicas Evento", string, "Editar", "Sair");			
			}
			case 6:{
				if(temEvento == true) return SendClientMessage(playerid, 0xFF0000AA, "| ERRO | Já tem um evento em andamento.");
				IniciarEvento(playerid);
			}
        }
    }
	if(dialogid == DIALOG_VALOREVENTO){
		if(!response) return SendClientMessage(playerid, 0xFF0000AA, "| ERRO | Você escolheu cancelar.");
		if(strval(inputtext) < 0){
			SendClientMessage(playerid, 0xFF0000AA, "| ERRO | Você não pode escolher valores negativos.");
			return ShowPlayerDialog(playerid, DIALOG_VALOREVENTO, DIALOG_STYLE_INPUT, "Valor do Premio", "Digite o valor para o prêmio:", "Confirmar", "Cancelar");
		}
		valorPremioEvento = strval(inputtext);
		new string[256];
		format(string, sizeof(string), "| INFO | Você alterou a premiação para R$ {00FF00}%s{FFFFFF}.", FormatMoney(valorPremioEvento));
		SendClientMessage(playerid, 0xFFFFFFAA, string);
	}
	if(dialogid == DIALOG_MODELOVEICULO){
		if(!response) return SendClientMessage(playerid, 0xFF0000AA, "| ERRO | Você escolheu cancelar.");
		if(strval(inputtext) < 400 || strval(inputtext) > 611){
			SendClientMessage(playerid, 0xFF0000AA, "| ERRO | Veiculos apenas do id 400 a 611.");
			return ShowPlayerDialog(playerid, DIALOG_MODELOVEICULO, DIALOG_STYLE_INPUT, "Modelo do Veiculo", "Digite o modelo do veiculo:", "Confirmar", "Cancelar");
		}
		modeloVeiculoEvento = strval(inputtext);
		new string[256];
		format(string, sizeof(string), "| INFO | Você selecionou o modelo {FFEE00}%d{FFFFFF} para o evento.", modeloVeiculoEvento);
		SendClientMessage(playerid, -1, string);
	}
    return 0;
}

CMD:vehevento(playerid, params[])
{
	//if(!IsPlayerAdmin(playerid)) return SendClientMessage(playerid, 0xFF0000AA, "| ERRO | Comando Invalido.");
	if (temEvento == true) return SendClientMessage(playerid, 0xFF0000FF, "| ERRO | Ja tem um evento criado.");
	if(valorPremioEvento <= -1) return SendClientMessage(playerid, 0xFF0000AA, "| ERRO | Você deve alterar o valor do premio antes.");
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
	format(string, sizeof(string), "| EVENTO | O Admin {FF0000}%s{FFFFFF} criou um veiculo pelo mapa, ache e ganhe {00FF00}R$ %s", Nome, FormatMoney(valorPremioEvento));
	SendClientMessageToAll(-1, string);
	temEvento = true;
	return 1;
}


CMD:editevento(playerid)
{
	//if(!IsPlayerAdmin(playerid)) return SendClientMessage(playerid, 0xFF0000AA, "| ERRO | Comando Invalido.");
    new string[1000];
    format(string, sizeof(string), 
	"ID do Veiculo\t{00A2FF}%d\nModelo do Veiculo:\t{00A2FF}%d\nLocalizacao do veiculo:\t%.2f %.2f %.2f\nValor do Evento:\t {00FF00}R$%s\nValor Aleatorio\t\nDicas\t\nIniciar Evento\t\n", 
	idVeiculoEvento, modeloVeiculoEvento, posVehEventX, posVehEventY, posVehEventZ, FormatMoney(valorPremioEvento));
    ShowPlayerDialog(playerid, DIALOG_EVENTOCAR, DIALOG_STYLE_TABLIST, "Editar Evento", string, "Escolher", "Sair");
    return 1;
}



stock IniciarEvento(playerid){
	if(valorPremioEvento <= -1) return SendClientMessage(playerid, 0xFF0000AA, "| ERRO | Você deve alterar o valor do premio antes.");
	if(adicionouLocalVeiculo == false) return SendClientMessage(playerid, 0xFF0000AA, "| ERRO | Você deve escolher um local para o veiculo.");
	new Nome[256], string[256];
	GetPlayerName(playerid, Nome, sizeof(Nome));
	format(string, sizeof(string), "| EVENTO | O Admin {FF0000}%s{FFFFFF} criou um veiculo pelo mapa, ache e ganhe {00FF00}R$ %s", Nome, FormatMoney(valorPremioEvento));
	SendClientMessageToAll(-1, string);
	temEvento = true;
	return 1;
}




stock FormatMoney(valor)
{
    new formated[64];
    format(formated, sizeof(formated), "%d", valor);
    new result[64];
    new len = strlen(formated);
    new j = 0;
    for (new i = len - 1; i >= 0; i--)
    {
        result[j++] = formated[i];
        if ((len - i) % 3 == 0 && i != 0)
            result[j++] = '.';
    }
    result[j] = '\0';
    new temp;
    for (new i = 0; i < j / 2; i++)
    {
        temp = result[i];
        result[i] = result[j - i - 1];
        result[j - i - 1] = temp;
    }
    return result;
}