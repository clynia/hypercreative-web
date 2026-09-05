/* Versión española de hc-worlds.js: los nueve perfiles del método de
   Hypercreative, las 72 firmas que forman por parejas, el icono de cada perfil
   y el color de cada familia. Solo cambia el texto que lee una persona. Las
   claves internas (cartographer, explorer, Feed, Sharpen, Protect...) NO se
   traducen: las usa el motor del test y el mapa para casar datos y colores, y
   tocarlas rompe las dos páginas. Fuente única de la versión ES: el test y el
   mapa leen de aquí, así que no dupliques estos textos en ningún otro sitio. */
window.HCW=(function(){
  "use strict";
  var TYPES={
    cartographer:{name:"El Cartógrafo",family:"Feed",one:"Dominas tu terreno y lo conoces como nadie.",
      state:"Ahora mismo tu energía se concentra en dominar el terreno que ya pisas.",
      sig:"Cavas <strong>más hondo que nadie</strong> en el campo que es tuyo. Te dan un tema y llegas hasta el fondo.",
      shadow:"Este mes dedica horas de verdad a un campo que <strong>no</strong> sea el tuyo. La profundidad sin amplitud acaba repitiéndose a sí misma.",
      id:"Soy Cartógrafo. Conozco mi terreno como nadie y cavo más hondo que cualquiera."},
    explorer:{name:"El Explorador",family:"Feed",one:"Coleccionas mundos que no son el tuyo.",
      state:"Ahora mismo tu energía se concentra en traer material en bruto de campos que no son el tuyo.",
      sig:"Tienes una <strong>amplitud poco común</strong>. Conectas cosas porque has estado allí de verdad, no porque lo leyeras.",
      shadow:"Este mes vuelve a cavar hondo en tu <strong>propio</strong> oficio. La amplitud con la casa descuidada te convierte en un diletante de tu propio trabajo.",
      id:"Soy Explorador. Traigo material en bruto de mundos que no son el mío."},
    seedcollector:{name:"El Coleccionista",family:"Feed",one:"Guardas todo lo que merece guardarse; no se te escapa nada.",
      state:"Ahora mismo tu energía se concentra en capturarlo todo y no clasificar nada.",
      sig:"No se te escapa nada que merezca guardarse. Mientras los demás miran la <strong>página en blanco</strong>, tú empiezas con una llena.",
      shadow:"Este mes <strong>combina</strong> dos cosas que ya tenías guardadas en vez de guardar una tercera. Un archivo que no vuelves a abrir es un almacén.",
      id:"Soy Coleccionista. No se me escapa nada que merezca guardarse."},
    notary:{name:"El Notario",family:"Sharpen",one:"Cazas el detalle raro que todos los demás pasaron de largo.",
      state:"Ahora mismo tu energía se concentra en observar sin juzgar y en cazar lo que a los demás se les escapa.",
      sig:"<strong>Cazas el detalle raro</strong> antes de tener una opinión sobre él. Fijarte es tu estado de reposo.",
      shadow:"Este mes coge una de esas cosas que has visto y <strong>decide</strong> qué significa. Fijarte es tu fuerza; crecer es mojarte con una conclusión en lugar de seguir engordando la pila de lo observado.",
      id:"Soy Notario. Cazo el detalle raro antes de que nadie se haya parado a mirar."},
    reframer:{name:"El Reformulador",family:"Sharpen",one:"Encuentras la mejor pregunta debajo del problema.",
      state:"Ahora mismo tu energía se concentra en reescribir el problema hasta que aparece una respuesta mejor.",
      sig:"Sabes que la mejor idea vive en la <strong>mejor pregunta</strong>, y sigues cavando para encontrarla mientras los demás contestan la primera.",
      shadow:"Este mes <strong>saca</strong> algo en modo borrador. Reformular sin parar es una forma muy elegante de no lanzar nunca.",
      id:"Soy Reformulador. Reescribo la pregunta hasta que la respuesta se vuelve obvia."},
    collider:{name:"El Colisionador",family:"Sharpen",one:"Unes cosas que no tenían por qué encontrarse.",
      state:"Ahora mismo tu energía se concentra en hacer chocar ideas lejanas hasta que salga una sola.",
      sig:"Ves <strong>conexiones de largo alcance</strong> que a casi nadie se le ocurren, las que están a dos campos de distancia.",
      shadow:"Este mes <strong>alimenta tu material en bruto</strong>. Bajo presión tiras del enlace cómodo; solo un pozo más hondo te da uno más valiente.",
      id:"Soy Colisionador. Estrello ideas lejanas hasta que sobrevive algo nuevo."},
    sketcher:{name:"El Bocetista",family:"Sharpen",one:"Generas en bruto y juzgas en frío.",
      state:"Ahora mismo tu energía se concentra en producir sin juzgar y cribar después en frío.",
      sig:"Sabes <strong>separar crear de juzgar</strong>, así que produces mucho mientras otros pulen una sola cosa hasta matarla.",
      shadow:"Este mes lanza el <strong>borrador mínimo viable</strong>. Iterar en privado para siempre no es lanzar.",
      id:"Soy Bocetista. Primero lo hago en bruto y después lo juzgo en frío."},
    guardian:{name:"El Guardián",family:"Protect",one:"Nadie toca tus mandos sin que le invites.",
      state:"Ahora mismo tu energía se concentra en mantener los mandos de tu creatividad en tus propias manos.",
      sig:"No subcontratas tu criterio. <strong>El elogio que no pediste no te mueve</strong>, y la duda ajena tampoco.",
      shadow:"Este mes deja pasar por la puerta a una persona de confianza, en tus términos. Proteger tanto que también cortas la opinión <strong>que sí pediste</strong> es otra trampa.",
      id:"Soy Guardián. Mi criterio es mío y no cedo los mandos."},
    persona:{name:"El Personaje",family:"Protect",one:"Has decidido quién eres cuando creas.",
      state:"Ahora mismo tu energía se concentra en meterte en el personaje que has elegido para crear.",
      sig:"Puedes <strong>invocar tu estado creativo a voluntad</strong> en lugar de esperarlo. Tienes una puerta de entrada.",
      shadow:"Este mes <strong>protege la ventana</strong>. Te apoyas en el ritual y en que todo acompañe; defiende las condiciones antes de necesitarlas.",
      id:"Soy el Personaje. He decidido quién soy cuando creo, y entonces me convierto en él."}
  };
  var INFLECT={
    cartographer:{
      explorer:"Tu lado Explorador se sale una y otra vez del mapa que dominas, vuelve con tierra de otros campos y la trabaja dentro del suelo que ya es tuyo.",
      seedcollector:"Tu lado Coleccionista ha guardado cada piedra, cada raíz y cada lectura que sacaste de tu terreno, así que el campo que dominas ya viene surtido con todo lo que reuniste antes.",
      notary:"Tu lado Notario caza la única grieta en un suelo que los demás dan por firme, ese detalle fuera de sitio que solo ve quien conoce el campo así de bien.",
      reframer:"Tu lado Reformulador redibuja sin parar las fronteras del campo que creías tuyo, y pregunta si este es siquiera el terreno correcto antes de que le eches más años encima.",
      collider:"Tu lado Colisionador trae una pieza de un campo que está a dos valles y la suelta en el tuyo, y el enlace que salta entre los dos solo aguanta por lo hondo que has cavado aquí.",
      sketcher:"Tu lado Bocetista levanta el mapa de tu campo a base de pasadas rápidas y sucias, y luego vuelve sobre ellas en frío y se queda solo con las líneas que aguantaron.",
      guardian:"Tu lado Guardián guarda en tus manos la vara de medir tu propio campo, y ni un aplauso de fuera ni una ceja levantada mueven la línea donde decidiste que acaba el buen trabajo.",
      persona:"Tu lado Personaje se mete a propósito en el papel del topógrafo y se convierte en el dueño de este terreno en cuanto lo decides, sin esperar a sentirse el experto."
    },
    explorer:{
      cartographer:"Tu lado Cartógrafo se lleva todo ese material ajeno al único campo que conoces hasta la roca madre, donde notas exactamente dónde encaja la pieza extraña y dónde se rompe.",
      seedcollector:"Tu lado Coleccionista archiva cada retal que traes de esos campos ajenos, así que nada de lo que te llevaste del mundo de otro se tira ni se pierde.",
      notary:"Tu lado Notario recorre un campo que no es el tuyo y vuelve a casa con la pequeña rareza que sus propios vecinos dejaron de ver hace años.",
      reframer:"Tu lado Reformulador coge lo que traes de otra disciplina y lo dobla hasta convertirlo en una pregunta más afilada, que reescribe el problema que creías estar resolviendo.",
      collider:"Tu lado Colisionador rara vez trae un solo campo a casa: estrella lo que tomaste prestado contra algo de una disciplina lejana hasta que salta un enlace que nadie esperaba.",
      sketcher:"Tu lado Bocetista saca algo de un campo ajeno y lo pone a trabajar de inmediato, desbastando una docena de usos rápidos antes de que te sientes a cortar en frío casi todos.",
      guardian:"Tu lado Guardián entra en otros campos con los ojos abiertos de par en par, pero se reserva la última palabra sobre lo que vuelve a casa, sin dejarse llevar por las piezas que ese campo insiste en llamar importantes.",
      persona:"Tu lado Personaje se pone el traje de forastero cuando quieres, y se mete a propósito en el que sale a saquear un campo ajeno en vez de esperar a sentir curiosidad."
    },
    seedcollector:{
      cartographer:"Tu lado Cartógrafo apunta todo ese acopio al único campo que dominas, así que el archivo crece hondo en un solo sitio en lugar de repartirse fino por todas partes.",
      explorer:"Tu lado Explorador se lleva ese afán de guardar más allá de tus fronteras, así que los fragmentos que llenan tu página los recogiste en campos que nunca fueron tuyos.",
      notary:"Tu lado Notario guarda el retal por el que nadie más se agachó, así que tu montón se llena de lo que una sala entera pasó de largo.",
      reframer:"Tu lado Reformulador casi nunca archiva un fragmento tal como lo encontró: guarda cada uno convertido en una pregunta sobre lo que el problema estaba pidiendo de verdad.",
      collider:"Tu lado Colisionador acumula fragmentos como otros acumulan piezas de repuesto, así que dos cualesquiera que saques se pueden estrellar salvando un hueco de dos campos de ancho.",
      sketcher:"Tu lado Bocetista llena la página con tus propios descartes en bruto, hechos deprisa y guardados igual, para que luego puedas repasar el montón y cortarlo en frío.",
      guardian:"Tu lado Guardián guarda solo lo que tú decidiste que merecía guardarse, así que nada entra al archivo porque una voz de fuera te dijera que importaba.",
      persona:"Tu lado Personaje decide convertirse en el que guarda las cosas y se mete en ese papel a propósito, así que el acopio empieza porque tú lo invocas, no porque te pase."
    },
    notary:{
      cartographer:"Tu lado Cartógrafo apunta esa mirada al único campo que dominas, así que cazas lo que a otros se les escapa justo donde más importa.",
      explorer:"Tu lado Explorador lleva esa mirada a territorio ajeno, así que lo raro que ves suele ser también lo que un campo entero pasó de largo.",
      seedcollector:"Tu lado Coleccionista guarda cada fragmento que cazas, así que los detalles se apilan en un archivo privado que no tiene nadie más.",
      reframer:"Tu lado Reformulador casi nunca deja que un detalle se quede en detalle: lo convierte en una pregunta más afilada sobre lo que todos daban por hecho.",
      collider:"Tu lado Colisionador estrella dos de esos detalles uno contra otro y encuentra un enlace, a dos campos de distancia, que nadie vio venir.",
      sketcher:"Tu lado Bocetista convierte el fijarse en hacer, y rápido: hila los detalles en borradores en bruto que luego cribas en frío.",
      guardian:"Tu lado Guardián señala solo el detalle que tú decidiste que importa, nunca el que la sala te dijo que miraras.",
      persona:"Tu lado Personaje enciende esa mirada cuando quiere: se mete en el observador a propósito en lugar de esperar a que el detalle te encuentre."
    },
    reframer:{
      cartographer:"Tu lado Cartógrafo mantiene esa reescritura dentro del único campo que dominas, así que la pregunta más afilada que desentierras sale de un terreno que has cruzado mil veces.",
      explorer:"Tu lado Explorador trae la pregunta nueva de un campo muy lejos del problema, así que lo reescribes con un marco que a nadie de los que están cerca se le ocurriría probar.",
      seedcollector:"Tu lado Coleccionista nunca reescribe el problema desde una página en blanco: mete la mano en un montón de preguntas guardadas y saca la que por fin lo abre en canal.",
      notary:"Tu lado Notario caza el detalle pequeño que los demás leyeron por encima, y luego reescribe el problema entero alrededor de esa señal hasta que sale a flote una respuesta mejor.",
      collider:"Tu lado Colisionador construye la pregunta nueva estrellando dos ideas de campos que no se tocan nunca, y el problema se lee distinto en cuanto chocan.",
      sketcher:"Tu lado Bocetista suelta deprisa una docena de reescrituras en bruto del problema y luego las criba en frío para quedarse con la única pregunta que merece hacerse.",
      guardian:"Tu lado Guardián decide por su cuenta qué reescritura del problema se queda, así que ni un coro de elogios ni una ceja levantada tuercen la pregunta que elegiste hacer.",
      persona:"Tu lado Personaje se mete en un papel elegido antes de que toques el problema, y es ese personaje, invocado a propósito, quien hace la pregunta que lo reescribe."
    },
    collider:{
      cartographer:"Tu lado Cartógrafo mantiene un extremo de cada choque plantado en el campo que dominas, así que la idea lejana siempre se estrella contra un terreno que sabes leer con los ojos cerrados.",
      explorer:"Tu lado Explorador trae material de campos en los que no se te ha perdido nada, así que las dos mitades del choque vienen de lejos de casa.",
      seedcollector:"Tu lado Coleccionista tiene un estante lleno de fragmentos raros que nunca tiraste, así que cuando estrellas dos, esa pareja lejana llevaba años esperando ahí.",
      notary:"Tu lado Notario alimenta el choque con detalles pequeños que los demás pasaron de largo, así que las dos cosas que estrellas siguieron invisibles hasta que las emparejaste.",
      reframer:"Tu lado Reformulador apunta el choque a la pregunta misma: estrella una idea lejana contra el problema hasta que se abre y se lee distinto.",
      sketcher:"Tu lado Bocetista monta choques en pasadas rápidas y sucias, y luego cambia a juez en frío y se queda solo con las parejas lejanas que funcionan.",
      guardian:"Tu lado Guardián decide por su cuenta qué parejas raras merecen quedarse, así que una sala riéndose del choque nunca te hace soltarlo.",
      persona:"Tu lado Personaje se mete a propósito en el que cruza los cables, así que puedes invocar la atracción entre dos campos lejanos en lugar de esperar a que llegue."
    },
    sketcher:{
      cartographer:"Tu lado Cartógrafo clava ese borrador rápido en el único campo que es tuyo, así que cada versión en bruto cae sobre un terreno que ya conoces lo bastante bien como para juzgarla.",
      explorer:"Tu lado Explorador alimenta los borradores con retales traídos de campos que no son el tuyo, así que lo que bocetas deprisa nació en un sitio al que no perteneces.",
      seedcollector:"Tu lado Coleccionista te evita la página en blanco: los fragmentos que guardaste ya están ahí para que el borrador rápido los saquee antes de que lo juzgues en frío.",
      notary:"Tu lado Notario mete en el borrador la cosa pequeña que nadie más vio, y solo después, cribando en frío, decides si se ha ganado el sitio.",
      reframer:"Tu lado Reformulador reescribe el briefing entre borrador y borrador, así que cada pasada rápida contesta una pregunta más afilada que aquella con la que empezaste a bocetar.",
      collider:"Tu lado Colisionador mete dos cosas sin relación en el mismo boceto en bruto, y luego te apartas en frío a ver si el choque a dos campos de distancia aguanta de verdad.",
      guardian:"Tu lado Guardián pone la vara con la que cribas, así que cuando empieza el juicio en frío, ningún elogio suelto ni ninguna duda de la sala mueve un solo borrador.",
      persona:"Tu lado Personaje te deja meterte en el que crea para bocetar deprisa y luego en el juez en frío para cortar: dos papeles que te pones, no que esperas."
    },
    guardian:{
      cartographer:"Tu lado Cartógrafo cierra la valla alrededor del único campo que has cartografiado hasta los bordes, así que los mandos que te niegas a ceder están sobre un terreno que te sabes de memoria.",
      explorer:"Tu lado Explorador se mete en mundos que no son el tuyo y trae el material en bruto a casa, donde decides tú solo qué piezas se ganan un sitio en tu trabajo.",
      seedcollector:"Tu lado Coleccionista mantiene una cámara llena de todo lo que merece guardarse, y eres el único que tiene la llave de lo que entra y lo que se queda fuera.",
      notary:"Tu lado Notario caza el detalle suelto que los demás pisaron sin verlo, y si cuenta o no lo decides tú, con tu propia vara y no con la voz más alta de la mesa.",
      reframer:"Tu lado Reformulador rechaza la pregunta con la forma en que llegó y la reescribe en tus términos hasta que aparece otra mejor por debajo.",
      collider:"Tu lado Colisionador suelda dos cosas de campos muy lejanos, y la soldadura aguanta porque elegiste tú la pareja, no porque nadie la aprobara.",
      sketcher:"Tu lado Bocetista suelta borradores en bruto a toda velocidad y luego los juzga con tu ojo frío y con ninguno más, sordo a quién aplaudió la primera pasada y a quién le dolió.",
      persona:"Tu lado Personaje elige al creador en el que te metes antes de empezar: un papel que te repartes tú y del que respondes ante ti, no uno que te asignen desde fuera."
    },
    persona:{
      cartographer:"Tu lado Cartógrafo enraíza en un solo trozo de terreno al personaje en el que te conviertes, así que desde el primer movimiento dominas ese campo y lo cavas más hondo que cualquier otro que toques.",
      explorer:"Tu lado Explorador te hace ponerte un papel prestado de otra parte, así que entras al trabajo con el material en bruto de otro campo y sin ninguna de sus reglas de casa.",
      seedcollector:"Tu lado Coleccionista hace que llegues ya surtido, así que el creador en el que te conviertes echa mano de un estante de fragmentos guardados en vez de una página en blanco.",
      notary:"Tu lado Notario arma con un ojo afilado al personaje en el que te deslizas, así que en cuanto estás en el papel ya estás cazando el detalle raro que los demás pasaron de largo.",
      reframer:"Tu lado Reformulador te hace elegir un personaje que desconfía del briefing, así que en cuanto eres ese personaje reescribes el problema antes de aceptar resolver el que te dieron.",
      collider:"Tu lado Colisionador construye el personaje que habitas con dos personas que nunca se conocieron, así que entras y haces saltar enlaces entre campos que están muy lejos.",
      sketcher:"Tu lado Bocetista parte en dos el personaje que invocas: un creador que suelta borradores en bruto deprisa y un juez que se enfría antes de releerlos.",
      guardian:"Tu lado Guardián mantiene los mandos en tus manos mientras estás metido en el papel, así que el creador en el que entras responde solo ante tu vara y se salta el elogio o la duda de la gente."
    }
  };
  var TYPE_ICON={
    cartographer:'<path d="M3 8c3-2 6-2 9 0s6 2 9 0"/><path d="M3 13c3-2 6-2 9 0s6 2 9 0"/><path d="M3 18c3-2 6-2 9 0s6 2 9 0"/>',
    explorer:'<circle cx="12" cy="12" r="9"/><path d="M15.5 8.5l-2 5-5 2 2-5z"/>',
    seedcollector:'<path d="M12 3C7 7 5 10 5 14a7 7 0 0 0 14 0c0-4-2-7-7-11z"/><path d="M12 21v-9"/>',
    notary:'<path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7z"/><circle cx="12" cy="12" r="2.6"/>',
    reframer:'<path d="M4 9V6a2 2 0 0 1 2-2h3"/><path d="M20 9V6a2 2 0 0 0-2-2h-3"/><path d="M4 15v3a2 2 0 0 0 2 2h3"/><path d="M20 15v3a2 2 0 0 1-2 2h-3"/>',
    collider:'<path d="M3 12h6M6 9l3 3-3 3"/><path d="M21 12h-6M18 9l-3 3 3 3"/>',
    sketcher:'<path d="M4 20l3.5-1L18 8.5 15.5 6 5 16.5 4 20z"/><path d="M14 7.5l2.5 2.5"/>',
    guardian:'<path d="M12 3l7 3v5c0 4-3 7-7 9-4-2-7-5-7-9V6l7-3z"/>',
    persona:'<path d="M4 6c5-1.5 11-1.5 16 0 0 6-3 12-8 14C7 18 4 12 4 6z"/><circle cx="9.2" cy="9.5" r=".9"/><circle cx="14.8" cy="9.5" r=".9"/><path d="M9.5 13.5c1.5 1.3 3.5 1.3 5 0"/>'
  };
  var FAM_DESC={Feed:"llenas el depósito de material en bruto",Sharpen:"haces que el material en bruto corte",Protect:"mantienes vivo el trabajo bajo presión"};
  /* el color del aire alrededor de cada familia; los nueve perfiles y las 72
     firmas toman de aquí su color */
  var FAMILIES={Feed:{col:[232,166,74]},Sharpen:{col:[224,70,60]},Protect:{col:[79,186,172]}};
  var FAM_ORDER=["Feed","Sharpen","Protect"];
  return {TYPES:TYPES, INFLECT:INFLECT, TYPE_ICON:TYPE_ICON, FAM_DESC:FAM_DESC,
          FAMILIES:FAMILIES, FAM_ORDER:FAM_ORDER};
})();
