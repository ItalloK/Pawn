/*
	FS feito por: Italo
	Repositorio: https://github.com/ItalloK/Pawn

	NÃO TIRE OS CREDITOS.
*/
#include 	<a_samp>
#include 	<zcmd>
#include 	<sscanf2>

#define DIALOG_EVENTOCAR 		5060
#define DIALOG_VALOREVENTO 		5061
#define DIALOG_DICASEVENTO 		5062
#define DIALOG_MODELOVEICULO 	5063
#define DIALOG_DICA1 			5064
#define DIALOG_DICA2 			5065
#define DIALOG_DICA3 			5066
#define DIALOG_DICA4 			5067
#define DIALOG_DICA5 			5068
#define DIALOG_TEMPODICAS		5069
#define DIALOG_VALORPORDICA		5070

new idVeiculoEvento = -1;
new modeloVeiculoEvento = -1;
new valorPremioEvento = -1;
new bool:temEvento = false;
new bool:adicionouLocalVeiculo = false;
new Float:posVehEventX, Float:posVehEventY, Float:posVehEventZ;
new contDicas = 0;
new bool:temDicas = false;
new timerDicas;
new tempoEntreDicas = 0;
new valorPorDica = -1;

new Dicas[5][256] = {
	"Dica 1",
	"Dica 2",
	"Dica 3",
	"Dica 4",
	"Dica 5"
};

public OnFilterScriptInit()
{
	print("FS EVENTCAR CRIADO POR ITALO, @_ItalloK");
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
		if(temEvento == true){
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
			contDicas = 0;
			temDicas = false;
			Dicas[0] = "Dica 1", Dicas[1] = "Dica 2", Dicas[2] = "Dica 3", Dicas[3] = "Dica 4", Dicas[4] = "Dica 5";
			tempoEntreDicas = 0;
			valorPorDica = -1;
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
				format(string, sizeof(string),"{FFFFFF}%s\n{FFFFFF}%s\n{FFFFFF}%s\n{FFFFFF}%s\n{FFFFFF}%s", 
				Dicas[0], Dicas[1], Dicas[2], Dicas[3], Dicas[4]);
				ShowPlayerDialog(playerid, DIALOG_DICASEVENTO, DIALOG_STYLE_LIST, "Dicas Evento", string, "Editar", "Sair");			
			}
			case 6:{
				if(temEvento == true) return SendClientMessage(playerid, 0xFF0000AA, "| ERRO | Já tem um evento em andamento.");
				if(strcmp(Dicas[0], "Dica 1", true) == 0 || strcmp(Dicas[1], "Dica 2", true) == 0 || strcmp(Dicas[2], "Dica 3", true) == 0 || strcmp(Dicas[3], "Dica 4", true) == 0 || strcmp(Dicas[4], "Dica 5", true) == 0){
					return SendClientMessage(playerid, 0xFF0000AA, "| ERRO | Você deve alterar as dicas primeiro.");
				}
				if(tempoEntreDicas < 1 || tempoEntreDicas > 5) return SendClientMessage(playerid, 0xFF0000AA, "| ERRO | O tempo entre as dicas deve ser entre 1 minuto e 5 minutos.");
				if(valorPorDica == -1) return SendClientMessage(playerid, 0xFF0000AA, "| ERRO | O valor por dica deve ser superior a -1.");
				if(temDicas == true){
					temDicas = false;
					SendClientMessage(playerid, -1, "| INFO | Você desativou as Dicas");
					return 1;
				}
				if(temDicas == false){
					temDicas = true;
					SendClientMessage(playerid, -1, "| INFO | Você ativou as Dicas");
					return 1;
				}
			}
			case 7:{
				if(temEvento == true) return SendClientMessage(playerid, 0xFF0000AA, "| ERRO | Já tem um evento em andamento.");
				ShowPlayerDialog(playerid, DIALOG_TEMPODICAS, DIALOG_STYLE_INPUT, "Tempo para Dicas", "Digite o tempo em minutos:", "Confirmar", "Cancelar");
			}
			case 8:{
				if(temEvento == true) return SendClientMessage(playerid, 0xFF0000AA, "| ERRO | Já tem um evento em andamento.");
				ShowPlayerDialog(playerid, DIALOG_VALORPORDICA, DIALOG_STYLE_INPUT, "Valor da Dica", "Digite um valor a ser diminuido a cada dica dada:", "Confirmar", "Cancelar");
			}
			case 9:{
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
	if(dialogid == DIALOG_DICASEVENTO){
		if(!response) return SendClientMessage(playerid, 0xFF0000AA, "| ERRO | Você escolheu cancelar.");
		switch(listitem){
			case 0:{
				ShowPlayerDialog(playerid, DIALOG_DICA1, DIALOG_STYLE_INPUT, "Dicas", "Digite a primeira dica:", "Confirmar", "Cancelar");
			}
			case 1:{
				ShowPlayerDialog(playerid, DIALOG_DICA2, DIALOG_STYLE_INPUT, "Dicas", "Digite a segunda dica:", "Confirmar", "Cancelar");
			}
			case 2:{
				ShowPlayerDialog(playerid, DIALOG_DICA3, DIALOG_STYLE_INPUT, "Dicas", "Digite a terceira dica:", "Confirmar", "Cancelar");
			}
			case 3:{
				ShowPlayerDialog(playerid, DIALOG_DICA4, DIALOG_STYLE_INPUT, "Dicas", "Digite a quarta dica:", "Confirmar", "Cancelar");
			}
			case 4:{
				ShowPlayerDialog(playerid, DIALOG_DICA5, DIALOG_STYLE_INPUT, "Dicas", "Digite a quinta dica:", "Confirmar", "Cancelar");
			}
		}
	}
	if(dialogid == DIALOG_DICA1){
		if(!response) return SendClientMessage(playerid, 0xFF0000AA, "| ERRO | Você escolheu cancelar.");
		if(strlen(inputtext) < 5 || strlen(inputtext) > 100) return SendClientMessage(playerid, 0xFF0000AA, "| ERRO | Você digitou uma dica pequena d+ ou grande d+.");
		format(Dicas[0], 128, "%s", inputtext);
		new string[512];
		format(string, sizeof(string), "| INFO | A nova dica {FFFB00}1 {FFFFFF}é: {FFFB00}%s", inputtext);
		SendClientMessage(playerid, -1, string);
	}
	if(dialogid == DIALOG_DICA2){
		if(!response) return SendClientMessage(playerid, 0xFF0000AA, "| ERRO | Você escolheu cancelar.");
		if(strlen(inputtext) < 5 || strlen(inputtext) > 100) return SendClientMessage(playerid, 0xFF0000AA, "| ERRO | Você digitou uma dica pequena d+ ou grande d+.");
		format(Dicas[1], 128, "%s", inputtext);
		new string[512];
		format(string, sizeof(string), "| INFO | A nova dica {FFFB00}2 {FFFFFF}é: {FFFB00}%s", inputtext);
		SendClientMessage(playerid, -1, string);
	}
	if(dialogid == DIALOG_DICA3){
		if(!response) return SendClientMessage(playerid, 0xFF0000AA, "| ERRO | Você escolheu cancelar.");
		if(strlen(inputtext) < 5 || strlen(inputtext) > 100) return SendClientMessage(playerid, 0xFF0000AA, "| ERRO | Você digitou uma dica pequena d+ ou grande d+.");
		format(Dicas[2], 128, "%s", inputtext);
		new string[512];
		format(string, sizeof(string), "| INFO | A nova dica {FFFB00}3 {FFFFFF}é: {FFFB00}%s", inputtext);
		SendClientMessage(playerid, -1, string);
	}
	if(dialogid == DIALOG_DICA4){
		if(!response) return SendClientMessage(playerid, 0xFF0000AA, "| ERRO | Você escolheu cancelar.");
		if(strlen(inputtext) < 5 || strlen(inputtext) > 100) return SendClientMessage(playerid, 0xFF0000AA, "| ERRO | Você digitou uma dica pequena d+ ou grande d+.");
		format(Dicas[3], 128, "%s", inputtext);
		new string[512];
		format(string, sizeof(string), "| INFO | A nova dica {FFFB00}4 {FFFFFF}é: {FFFB00}%s", inputtext);
		SendClientMessage(playerid, -1, string);
	}
	if(dialogid == DIALOG_DICA5){
		if(!response) return SendClientMessage(playerid, 0xFF0000AA, "| ERRO | Você escolheu cancelar.");
		if(strlen(inputtext) < 5 || strlen(inputtext) > 100) return SendClientMessage(playerid, 0xFF0000AA, "| ERRO | Você digitou uma dica pequena d+ ou grande d+.");
		format(Dicas[4], 128, "%s", inputtext);
		new string[512];
		format(string, sizeof(string), "| INFO | A nova dica {FFFB00}5 {FFFFFF}é: {FFFB00}%s", inputtext);
		SendClientMessage(playerid, -1, string);
	}
	if(dialogid == DIALOG_TEMPODICAS){
		if(!response) return SendClientMessage(playerid, 0xFF0000AA, "| ERRO | Você escolheu cancelar.");
		if(strval(inputtext) < 1 || strval(inputtext) > 5) return SendClientMessage(playerid, 0xFF0000AA, "| ERRO | O tempo entre as dicas deve ser entre 1 minuto e 5 minutos.");
		tempoEntreDicas = strval(inputtext);
		new string[512];
		format(string, sizeof(string), "| INFO | O tempo entre as dicas será de {EEFF00}%d {FFFFFF}minutos.", strval(inputtext));
		SendClientMessage(playerid, -1, string);
	}
	if(dialogid == DIALOG_VALORPORDICA){
		if(!response) return SendClientMessage(playerid, 0xFF0000AA, "| ERRO | Você escolheu cancelar.");
		if(strval(inputtext)*5 > valorPremioEvento) return SendClientMessage(playerid, 0xFF0000AA, "| ERRO | O valor por dica é alto d+.");
		if(strval(inputtext) < 0) return SendClientMessage(playerid, 0xFF0000AA, "| ERRO | O valor por dica não pode ser negativo.");
		valorPorDica = strval(inputtext);
		new string[512];
		format(string, sizeof(string), "| INFO | Você definiu o valor por dica de {00FF73}R$%s{FFFFFF}.", FormatMoney(valorPorDica));
		SendClientMessage(playerid, -1, string);
	}
    return 0;
}

CMD:editevento(playerid)
{
	//if(!IsPlayerAdmin(playerid)) return SendClientMessage(playerid, 0xFF0000AA, "| ERRO | Comando Invalido.");
    new string[1500];
    format(string, sizeof(string), 
	"ID do Veiculo\t{00A2FF}%d\nModelo do Veiculo:\t{00A2FF}%d\nLocalizacao do veiculo:\t%.2f %.2f %.2f\nValor do Evento:\t {00FF00}R$%s\nValor Aleatorio\t\nDicas\t\nStatus Dicas\t%s\nTempo para as dicas\t%d\nValor por dica:\t{00FF00}%s\nIniciar Evento\t\n", 
	idVeiculoEvento, modeloVeiculoEvento, posVehEventX, posVehEventY, posVehEventZ, FormatMoney(valorPremioEvento), temDicas ? "{00FF00}Ativado" : "{FF0000}Desativado", tempoEntreDicas, FormatMoney(valorPorDica));
    ShowPlayerDialog(playerid, DIALOG_EVENTOCAR, DIALOG_STYLE_TABLIST, "Editar Evento", string, "Escolher", "Sair");
    return 1;
}


/*stock EnviarDicas(){

}*/
forward IniciarEvento(playerid);
public IniciarEvento(playerid){
	if(valorPremioEvento <= -1) return SendClientMessage(playerid, 0xFF0000AA, "| ERRO | Você deve alterar o valor do premio antes.");
	if(adicionouLocalVeiculo == false) return SendClientMessage(playerid, 0xFF0000AA, "| ERRO | Você deve escolher um local para o veiculo.");
	new Nome[256], string[256];
	GetPlayerName(playerid, Nome, sizeof(Nome));
	format(string, sizeof(string), "| EVENTO | O Admin {FF0000}%s{FFFFFF} criou um veiculo pelo mapa, ache e ganhe {00FF00}R$ %s", Nome, FormatMoney(valorPremioEvento));
	SendClientMessageToAll(-1, string);
	temEvento = true;
	if(temDicas == true){
		timerDicas = SetTimer("DarDicas", (tempoEntreDicas*60000), true);
	}
	return 1;
}


forward DarDicas();
public DarDicas(){
	if(contDicas >= 5){
		KillTimer(timerDicas);
		return 1;
	}
	valorPremioEvento -= valorPorDica;
	new string[1500];
	format(string, sizeof(string), "| DICA [%d/5] | {EEFF00}%s{FFFFFF} valor atual do premio {00FF15}R$%s{FFFFFF}.", contDicas+1, Dicas[contDicas], FormatMoney(valorPremioEvento));
	SendClientMessageToAll(-1, string);
	contDicas++;
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