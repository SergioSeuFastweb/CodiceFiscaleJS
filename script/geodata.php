<?php

$f = file_get_contents('https://app.tuotempo.com/api/v3/tt_portale_santagostino_public/cities?dbName=tt_portale_santagostino_public&textToSearch=&country=ITALY');
$rows = json_decode($f);
$values = [];
foreach($rows->return->results as $i=>$r){
  $v = explode(' | ',$r->description);
  $values[$v[0]."--".$v[1]] = '["'.$r->tax_code.'", "'.$v[1].'","'.$v[0].'"]';  
}
ksort($values);
$values = array_values($values);

$file = fopen("../src/geo-data.js", "w");
fwrite($file, 'export const COMUNI = ['.implode(",\r\n",$values).']'."\r\n");
fwrite($file,"export const PROVINCE = {   AG: 'Agrigento',   AL: 'Alessandria',   AN: 'Ancona',   AO: 'Aosta',   AP: 'Ascoli Piceno',   AQ: 'L\'Aquila',   AR: 'Arezzo',   AT: 'Asti',   AV: 'Avellino',   BA: 'Bari',   BG: 'Bergamo',   BI: 'Biella',   BL: 'Belluno',   BN: 'Benevento',   BO: 'Bologna',   BR: 'Brindisi',   BS: 'Brescia',   BT: 'Barletta-Andria-Trani',   BZ: 'Bolzano',   CA: 'Cagliari',   CB: 'Campobasso',   CE: 'Caserta',   CH: 'Chieti',   CI: 'Carbonia-Iglesias',   CL: 'Caltanissetta',   CN: 'Cuneo',   CO: 'Como',   CR: 'Cremona',   CS: 'Cosenza',   CT: 'Catania',   CZ: 'Catanzaro',   EN: 'Enna',   FC: 'Forlì-Cesena',   FE: 'Ferrara',   FG: 'Foggia',   FI: 'Firenze',   FM: 'Fermo',   FR: 'Frosinone',   GE: 'Genova',   GO: 'Gorizia',   GR: 'Grosseto',   IM: 'Imperia',   IS: 'Isernia',   KR: 'Crotone',   LC: 'Lecco',   LE: 'Lecce',   LI: 'Livorno',   LO: 'Lodi',   LT: 'Latina',   LU: 'Lucca',   MB: 'Monza e della Brianza',   MC: 'Macerata',   ME: 'Messina',   MI: 'Milano',   MN: 'Mantova',   MO: 'Modena',   MS: 'Massa-Carrara',   MT: 'Matera',   NA: 'Napoli',   NO: 'Novara',   NU: 'Nuoro',   OG: 'Ogliastra',   OR: 'Oristano',   OT: 'Olbia-Tempio',   PA: 'Palermo',   PC: 'Piacenza',   PD: 'Padova',   PE: 'Pescara',   PG: 'Perugia',   PI: 'Pisa',   PN: 'Pordenone',   PO: 'Prato',   PR: 'Parma',   PT: 'Pistoia',   PU: 'Pesaro e Urbino',   PV: 'Pavia',   PZ: 'Potenza',   RA: 'Ravenna',   RC: 'Reggio Calabria',   RE: 'Reggio Emilia',   RG: 'Ragusa',   RI: 'Rieti',   RM: 'Roma',   RN: 'Rimini',   RO: 'Rovigo',   SA: 'Salerno',   SI: 'Siena',   SO: 'Sondrio',   SP: 'La Spezia',   SR: 'Siracusa',   SS: 'Sassari',   SV: 'Savona',   TA: 'Taranto',   TE: 'Teramo',   TN: 'Trento',   TO: 'Torino',   TP: 'Trapani',   TR: 'Terni',   TS: 'Trieste',   TV: 'Treviso',   UD: 'Udine',   VA: 'Varese',   VB: 'Verbano-Cusio-Ossola',   VC: 'Vercelli',   VE: 'Venezia',   VI: 'Vicenza',   VR: 'Verona',   VS: 'Medio Campidano',   VT: 'Viterbo',   VV: 'Vibo Valentia',   EE: 'Estero' }");
//print_r($values);