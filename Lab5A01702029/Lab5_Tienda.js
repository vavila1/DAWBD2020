function Lab5_2_1(f,g){
	let paps=[30,13];
	let gans = [20,20];
	let play =[13,150];
	let iva = .20;
	if(f=="Papas"){
		paps[0] = paps[0]-g;
		alert("Compraste: "+g+" Papa(s)\n"+"Nos quedan: "+paps[0]);
		let total = paps[1]*g;
		let totaliv = total+(total*iva);
		alert("Total de compra: "+total+" pesos\n"+"Total con iva: "+totaliv);
	}else if(f=="Gansito"){
		gans[0] = gans[0]-g;
		alert("Compraste: "+g+" Gansito(s)\n"+"Nos quedan: "+gans[0]);
		let total = gans[1]*g;
		let totaliv = total+(total*iva);
		alert("Total de compra: "+total+" pesos\n"+"Total con iva: "+totaliv);
	}else if(f=="Playera"){
		play[0] = play[0]-g;
		alert("Compraste: "+g+" Playera(s)\n"+"Nos quedan: "+play[0]);
		let total = play[1]*g;
		let totaliv = total+(total*iva);
		alert("Total de compra: "+total+" pesos\n"+"Total con iva: "+totaliv);
	}
}