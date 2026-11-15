# Ændringslog

Alle væsentlige ændringer i Kondens (tidligere Discussion Collector).

## [2.0] – 2026-11-15

### Ændret
- Projektet hedder nu **Kondens · Tankekondensatoren** (tidligere Discussion Collector), og repoet hedder `kenh-zealand/kondens`.
- Pluginets hovedfil hedder nu `kondens.php`; filerne hedder `inc/kondens.php` og `templates/page-kondens.php`.
- Siden ligger på `/kondens/` i stedet for `/opsamling/`, og den oprettes med titlen "Kondens" og undertitlen "Tankekondensatoren".
- Indstillingerne ligger under **Indstillinger → Kondens**, og REST-adressen er `kondens/v1`.
- De interne navne med præfikset `dcol_` (indstillinger og indholdstyper) er uændrede.

### Opgradering fra 1.x
- Deaktivér og slet den gamle udgave, upload den nye, og aktivér den. Indlæg og indstillinger bevares.
- Siden skal nu have adressen `kondens`. Ret adressen på den eksisterende side under Sider, eller lad pluginet oprette en ny.

## [1.8] – 2026-11-15

### Ændret
- Bedre visning på mobil: knapperne bryder til ny linje i stedet for at blive klemt eller stikke ud over kanten, får ikke længere blå systemfarve på iPhone, og "Eksportér PDF" under opsamlingen står lige.

## [1.7] – 2026-11-15

### Tilføjet
- Deltagere kan rette og slette deres egne indlæg. Ved oprettelsen får browseren en hemmelig nøgle til indlægget, så kun den kan ændre det – også når deltagerne er anonyme.
- Administrator kan rette og slette alle indlæg.
- Rettede indlæg markeres med "rettet". Slettede indlæg lægges i papirkurven og kan gendannes.

## [1.6] – 2026-11-15

### Tilføjet
- Fire færdige promptforslag i underviserboksen: Temaer, PESTLE, Enighed og uenighed samt Fra idé til handling. Et klik fylder prompten ud, som så kan rettes og gemmes.

## [1.5] – 2026-11-15

### Tilføjet
- Linket "Underviser? Log ind" ved indgangen og nederst på siden. Det fører til WordPress-login og tilbage til siden, så underviseren får adgang til prompt, nulstilling og opdatering.

## [1.4] – 2026-11-11

### Tilføjet
- Knappen "⤓ Eksportér PDF" ved alle indlæg: eksporterer det, man ser – listen med alle indlæg foldet helt ud eller ordskyen.

## [1.3] – 2026-11-10

### Tilføjet
- Modelnavnet gemmes ved hver opsamling og vises i "i"-boksen under prompten og i PDF-eksporten.

## [1.2] – 2026-11-10

### Ændret
- Alle interne navne bruger nu præfikset `dcol_` (Discussion Collector) i stedet for det oprindelige sitenavn: funktioner, indstillinger, indholdstyperne `dcol_indlaeg` og `dcol_opsamling`, REST-adressen `discussion-collector/v1` og indstillingssiden.
- Konstanterne til `wp-config.php` hedder nu `DCOL_KODE` og `DCOL_ANTHROPIC_KEY`.
- Sidens fanetitel viser hjemmesidens eget navn.

## [1.1] – 2026-11-10

### Ændret
- Pakket som et rigtigt WordPress-plugin: upload ZIP-filen under Plugins og aktivér. Det er ikke længere nødvendigt at kopiere filer ind i temaet.
- Sideskabelonen ligger nu i `templates/page-opsamling.php` og bruges uanset tema.

### Tilføjet
- Siden `/opsamling/` oprettes automatisk ved aktivering, hvis den ikke findes.
- Link til "Indstillinger" direkte i plugin-listen.
- Advarsel, hvis opsamlingen allerede er indlæst fra et tema, så koden ikke kører dobbelt.
- MIT-licens (LICENSE), så alle frit må bruge, ændre og dele pluginet.

## [1.0] – 2026-11-10

Første offentlige version.

### Tilføjet
- Kodebeskyttet opsamlingsside (`/opsamling/`), hvor deltagere skriver indlæg.
- Frivilligt navn ved indgangen og ved hvert indlæg; tomt navn vises som "Anonym".
- Liste over alle indlæg med automatisk opdatering; lange indlæg forkortes til 3 linjer med "Vis mere".
- Ordsky med dansk ordstamme, så bøjninger (fx interview/interviews/interviewene) tælles som ét ord.
- Knappen "Vis tal i ordsky", der viser det samlede antal for hvert ord.
- AI-opsamling via Anthropic API ("↻ Opdater") ud fra en redigerbar prompt.
- Valg af model og API-nøgle under Indstillinger → Opsamling.
- Deltagerkoden kan sættes under Indstillinger → Opsamling eller i `wp-config.php`.
- Eksport af opsamlingen til PDF.
- Versionsnummer nederst på siden.

### Sikkerhed
- Kun indloggede WordPress-administratorer kan opdatere opsamlingen, ændre prompten og nulstille.
- Mærket med nye indlæg siden sidste opsamling vises kun for administratorer.
- Deltagernavne sendes ikke med til Claude.
- Ingen API-nøgle eller adgangskode i koden.
