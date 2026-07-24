/* The nine worlds of the Hypercreative Method, the 72 signatures they make in
   pairs, the icon each world wears and the colour of each family. Single source
   of truth: the Creative World test and the map both read from here, so they
   can never drift apart. Do not copy this data anywhere else. */
window.HCW=(function(){
  "use strict";
  var TYPES={
    cartographer:{name:"The Cartographer",family:"Feed",one:"You own your terrain and know it cold.",
      state:"Right now your energy concentrates on mastering the ground you already stand on.",
      sig:"You go <strong>deeper than anyone</strong> on the field that's yours. Hand you a subject and you dig all the way to the bottom of it.",
      shadow:"Spend real hours this month in a field that <strong>isn't</strong> yours. Depth without breadth eventually starts repeating itself.",
      id:"I'm a Cartographer. I know my terrain cold and I go deeper than anyone."},
    explorer:{name:"The Explorer",family:"Feed",one:"You collect worlds that aren't yours.",
      state:"Right now your energy concentrates on bringing back raw material from fields that aren't yours.",
      sig:"You have <strong>rare breadth</strong>. You connect things because you have actually been there, not because you read about it.",
      shadow:"Go deep on your <strong>own</strong> craft again this month. Breadth on a stale home base turns into being a dilettante about your own work.",
      id:"I'm an Explorer. I bring back raw material from worlds that aren't mine."},
    seedcollector:{name:"The Collector",family:"Feed",one:"You save everything worth keeping; nothing slips past you.",
      state:"Right now your energy concentrates on capturing everything and sorting none of it.",
      sig:"Nothing worth keeping gets away from you. While everyone else stares at a <strong>blank page</strong>, you start from a full one.",
      shadow:"This month, <strong>combine</strong> two things you already saved instead of saving a third. An archive you never reopen is just a warehouse.",
      id:"I'm a Collector. Nothing worth keeping ever gets away from me."},
    notary:{name:"The Notary",family:"Sharpen",one:"You catch the odd detail everyone else walked past.",
      state:"Right now your energy concentrates on observing without judging and catching what others miss.",
      sig:"You <strong>spot the strange detail</strong> before you have an opinion about it. Noticing is your resting state.",
      shadow:"This month, take one thing you've spotted and <strong>decide</strong> what it means. Noticing is your strength; the growth is committing to a call instead of only adding to the pile of things you've observed.",
      id:"I'm a Notary. I catch the odd detail before anyone else even looks."},
    reframer:{name:"The Reframer",family:"Sharpen",one:"You find the better question under the problem.",
      state:"Right now your energy concentrates on rewriting the problem until a better answer shows up.",
      sig:"You know the best idea lives in the <strong>best question</strong>, and you keep digging for it while others answer the first one.",
      shadow:"<strong>Ship</strong> one thing in draft mode this month. Reframing forever is a very elegant way of never launching.",
      id:"I'm a Reframer. I rewrite the question until the answer gets obvious."},
    collider:{name:"The Collider",family:"Sharpen",one:"You combine things that don't belong together.",
      state:"Right now your energy concentrates on colliding far-apart ideas into one.",
      sig:"You make <strong>long-range connections</strong> most people never see, the ones two fields apart.",
      shadow:"<strong>Feed your raw material</strong> this month. Under pressure you reach for the comfortable link; only a deeper well hands you a braver one.",
      id:"I'm a Collider. I slam far-apart ideas together until something new survives."},
    sketcher:{name:"The Sketcher",family:"Sharpen",one:"You generate rough and judge it cold.",
      state:"Right now your energy concentrates on generating without judging, then sifting in cold blood.",
      sig:"You can <strong>separate making from judging</strong>, so you make a lot while others polish one thing to death.",
      shadow:"Launch the <strong>minimal viable draft</strong> this month. Iterating in private forever is not shipping.",
      id:"I'm a Sketcher. I make it rough first and judge it cold later."},
    guardian:{name:"The Guardian",family:"Protect",one:"Nobody touches your controls uninvited.",
      state:"Right now your energy concentrates on keeping the controls of your creativity in your own hands.",
      sig:"You don't outsource your criteria. <strong>Unsolicited approval doesn't move you</strong>, and unsolicited doubt doesn't either.",
      shadow:"Invite one person you trust through the door this month, on your terms. Guarding so hard you cut off <strong>invited</strong> feedback is its own trap.",
      id:"I'm a Guardian. My criteria are mine, and I don't hand over the controls."},
    persona:{name:"The Persona",family:"Protect",one:"You've decided who you are when you create.",
      state:"Right now your energy concentrates on stepping into the self you have chosen for creating.",
      sig:"You can <strong>summon your creative state on purpose</strong>, not wait for it. You have a way in.",
      shadow:"<strong>Protect the window</strong> this month. You lean on the ritual and good weather; defend the conditions before you need them.",
      id:"I'm a Persona. I decide who I am when I create, then I become it."}
  };
  var INFLECT={
    cartographer:{
      explorer:"Your Explorer side keeps wandering off the map you know cold, coming back with soil from other fields and working it into the ground you already own.",
      seedcollector:"Your Collector side has saved every rock, root, and reading you ever pulled from your terrain, so the field you master stands already stocked with everything you gathered before.",
      notary:"Your Notary side catches the one crack in ground everyone else calls solid, the small wrong detail only someone who knows this field this well would ever spot.",
      reframer:"Your Reframer side keeps redrawing the borders of the field you thought you owned, asking whether this is even the right ground before you sink more years into it.",
      collider:"Your Collider side hauls a piece from a field two valleys over and drops it into yours, striking a link between them that only your depth here could hold.",
      sketcher:"Your Sketcher side maps your one field in fast rough passes first, then walks back over them cold and keeps only the lines that held.",
      guardian:"Your Guardian side keeps the measure of your own field in your own hands, and no outside cheer or worried frown moves where you decided the good work stops.",
      persona:"Your Persona side steps into the surveyor on purpose, becoming the one who owns this ground the moment you choose to, instead of waiting to feel like the expert."
    },
    explorer:{
      cartographer:"Your Cartographer side hauls all that foreign material home to the one field you know down to the bedrock, where you can feel exactly where the strange piece fits or breaks.",
      seedcollector:"Your Collector side files every scrap you bring back from those foreign fields, so nothing you took from someone else's world is ever thrown away or lost.",
      notary:"Your Notary side walks a field that isn't yours and comes home holding the one small oddity its own locals stopped seeing years ago.",
      reframer:"Your Reframer side takes whatever you bring in from another discipline and bends it into a sharper question that rewrites the problem you thought you were solving.",
      collider:"Your Collider side rarely brings one field home alone, smashing the thing you borrowed against something from a distant discipline until a link nobody expected throws off sparks.",
      sketcher:"Your Sketcher side pulls something out of a foreign field and puts it straight to work, roughing out a dozen quick uses before you sit back and coldly cut most of them.",
      guardian:"Your Guardian side wanders wide open into other fields yet keeps the say over what comes home, unmoved by which pieces that field itself insists are the important ones.",
      persona:"Your Persona side slips on the outsider whenever you choose, stepping into the wandering self on purpose to go raid a field that isn't yours instead of waiting to feel curious."
    },
    seedcollector:{
      cartographer:"Your Cartographer side points all that gathering at the one field you know cold, so the archive grows deep in a single place instead of spreading thin across everything.",
      explorer:"Your Explorer side keeps dragging that collecting past your own borders, so the fragments filling your page were picked up in fields that were never yours to begin with.",
      notary:"Your Notary side saves the scrap nobody else bent down for, so your pile fills with the overlooked things a room walked straight past.",
      reframer:"Your Reframer side rarely files a fragment as it found it; you store each one as a question about what the problem was really asking.",
      collider:"Your Collider side hoards fragments the way others hoard spare parts, so any two you pull can be slammed together across a gap two fields wide.",
      sketcher:"Your Sketcher side fills the page with your own rough throwaways, made quick and kept, so later you can go back through the stack and cut it cold.",
      guardian:"Your Guardian side keeps only what you decided was worth keeping, so nothing gets saved just because a voice outside the work told you it mattered.",
      persona:"Your Persona side decides to become the keeper of things and steps into that self on purpose, so the collecting starts because you called it up, not because it happened to you."
    },
    notary:{
      cartographer:"Your Cartographer side aims that noticing at the one field you know cold, so you catch what others miss exactly where it matters most.",
      explorer:"Your Explorer side sends that noticing into territory that isn't yours, so the odd thing you spot is often what a whole other field walked past too.",
      seedcollector:"Your Collector side keeps every fragment you catch, so the details pile up into a private archive nobody else is holding.",
      reframer:"Your Reframer side rarely lets a detail stay a detail; you turn it into a sharper question about what everyone else assumed.",
      collider:"Your Collider side slams two of those noticed details together and finds a link two fields apart never saw coming.",
      sketcher:"Your Sketcher side turns noticing into making fast, spinning the details into rough drafts you then sift cold.",
      guardian:"Your Guardian side flags only the detail you decided matters, never the one the room told you to see.",
      persona:"Your Persona side can switch that noticing on by choice, stepping into the observer on purpose instead of waiting for the detail to find you."
    },
    reframer:{
      cartographer:"Your Cartographer side keeps that rewriting inside the one field you know cold, so the sharper question you dig up comes from ground you have crossed a thousand times.",
      explorer:"Your Explorer side hauls the new question back from a field far outside the problem, so you rewrite it with a frame nobody standing near it would think to try.",
      seedcollector:"Your Collector side never rewrites the problem from a blank page, since you reach into a hoard of saved questions and draw the one that finally cracks it open.",
      notary:"Your Notary side catches the small detail everyone else skimmed past, then rewrites the whole problem around that one flagged thing until a better answer surfaces.",
      collider:"Your Collider side builds the new question by smashing two ideas from fields that never touch, and the problem reads differently the moment they collide.",
      sketcher:"Your Sketcher side throws out a dozen rough rewrites of the problem fast, then sifts them cold to keep the one question worth asking.",
      guardian:"Your Guardian side decides for itself which rewrite of the problem stands, so a chorus of praise or a raised eyebrow never bends the question you chose to ask.",
      persona:"Your Persona side steps into a chosen self before you touch the problem, and it is that self, summoned on purpose, who asks the question that rewrites it."
    },
    collider:{
      cartographer:"Your Cartographer side keeps one end of every collision planted in the field you know cold, so the far idea always crashes into ground you can read blindfolded.",
      explorer:"Your Explorer side hauls back material from fields you have no business in, so both halves of the collision come from somewhere far from home.",
      seedcollector:"Your Collector side stocks a shelf of odd fragments you never threw out, so when you collide two of them the far-apart pair was waiting there for years.",
      notary:"Your Notary side feeds the collision small details everyone else walked past, so the two things you slam together stayed invisible until you paired them.",
      reframer:"Your Reframer side aims the collision at the question itself, smashing a far-off idea into the problem until it cracks open and reads differently.",
      sketcher:"Your Sketcher side spins up collisions in fast rough passes, then switches to cold judge and keeps only the distant pairings that land.",
      guardian:"Your Guardian side decides on your own which strange pairings are worth keeping, so a room laughing at the collision never makes you drop it.",
      persona:"Your Persona side steps into the wire-crosser on purpose, so you can summon the pull between two distant fields instead of waiting for it to arrive."
    },
    sketcher:{
      cartographer:"Your Cartographer side pins that fast drafting to the one field you own, so every rough version lands on ground you already know cold enough to judge.",
      explorer:"Your Explorer side feeds the rough drafts with scraps hauled in from fields that aren't yours, so what you sketch fast started life somewhere you don't belong.",
      seedcollector:"Your Collector side means you never sketch onto a blank page, since the fragments you saved are already there for the fast draft to plunder before you judge it cold.",
      notary:"Your Notary side drops the small thing nobody else noticed straight into the rough draft, and only later, sifting cold, do you decide whether it earns its place.",
      reframer:"Your Reframer side keeps rewriting the brief between drafts, so each fast pass answers a sharper question than the one you started sketching against.",
      collider:"Your Collider side jams two unrelated things into the same rough sketch, then you stand back cold to see whether the collision two fields apart actually holds.",
      guardian:"Your Guardian side sets the ruler you sift by, so when the cold judging starts, no stray praise or doubt from the room gets to move a single draft.",
      persona:"Your Persona side lets you step into the maker to draft fast and then into the cold judge to cut, two selves you put on rather than wait for."
    },
    guardian:{
      cartographer:"Your Cartographer side draws the fence tight around the single field you have mapped to its edges, so the controls you refuse to hand over sit on ground you know by heart.",
      explorer:"Your Explorer side wanders into worlds that aren't yours and hauls the raw material home, where you alone decide which pieces earn a place in your work.",
      seedcollector:"Your Collector side keeps a full vault of everything worth saving, and you are the only one who holds the key to what goes in and what stays out.",
      notary:"Your Notary side catches the stray detail everyone else stepped over, and whether it counts is yours to settle, decided by your own standard rather than by the loudest voice at the table.",
      reframer:"Your Reframer side rejects the question in the shape it arrived and rewrites it on your own terms until a better one surfaces underneath.",
      collider:"Your Collider side welds two things from fields far apart, and the weld holds only because you chose the pair, not because anyone approved it.",
      sketcher:"Your Sketcher side throws down rough drafts at speed, then judges them by your own cold eye alone, deaf to who liked the first pass and who winced.",
      persona:"Your Persona side picks the maker you step into before you begin, a self you cast on purpose and answer to yourself, not one assigned by onlookers."
    },
    persona:{
      cartographer:"Your Cartographer side roots the self you become in one patch of ground, so from the first move you know that single field cold and dig it deeper than any other ground you touch.",
      explorer:"Your Explorer side has you put on a self borrowed from elsewhere, so you enter the work carrying another field's raw material and none of its home rules.",
      seedcollector:"Your Collector side has you arrive already stocked, so the maker you turn into reaches for a shelf of saved fragments instead of a blank page.",
      notary:"Your Notary side arms the self you slip into with a sharp eye, so the moment you are in the role you are already catching the odd detail everyone else walked past.",
      reframer:"Your Reframer side has you choose a self that distrusts the brief, so once you are that self you rewrite the problem before agreeing to solve the one you were handed.",
      collider:"Your Collider side builds the self you inhabit out of two people who never met, so you walk in and strike links across fields that sit far apart.",
      sketcher:"Your Sketcher side splits the self you summon in two, a maker who throws down rough drafts fast and a judge who cools off before reading them back.",
      guardian:"Your Guardian side keeps the controls in your own hands while you are in character, so the maker you step into answers to your standards alone and ignores the crowd's praise or doubt."
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
  var FAM_DESC={Feed:"you fill the tank with raw material",Sharpen:"you make raw ideas cut",Protect:"you keep the work alive under pressure"};
  /* the colour of the air around each family; the nine worlds and the 72
     signatures all take their colour from here */
  var FAMILIES={Feed:{col:[232,166,74]},Sharpen:{col:[224,70,60]},Protect:{col:[79,186,172]}};
  var FAM_ORDER=["Feed","Sharpen","Protect"];
  return {TYPES:TYPES, INFLECT:INFLECT, TYPE_ICON:TYPE_ICON, FAM_DESC:FAM_DESC,
          FAMILIES:FAMILIES, FAM_ORDER:FAM_ORDER};
})();
