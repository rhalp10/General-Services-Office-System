
System Name: GeneralServicesOffice_System(GSO_System) Ver. 1 JUNE 14,2017
------------------------------------------------------------
Hello PICTO Eto Po Ung Ginawa Naming System Sa GSO, Gusto Po Sana Naming Ituloy Ninyo Ito At I Improve Dahil Matagal Na Daw Po Silang Nagrequest Diyan Na Magpagawa Ng System, Kami Po Ay BSIT Pero Papapunta Sa Office Nato Dahil Wala Ng Vacant Sa PICTO Then, Ung Head Dito Sa GSO Ay Naisipang Gumawa Nalang Kami Ng System Para Maging Related Sa COUSE Namin.Naisip po naming gamiting platform ang PHP kasi eto ung isa sa pinakamaganda gamitin sa pag mamanage ng data d ganun kahirap mag code at masmadaling gamitin dahil webbase, kahit walang internet pwede padin naman pong gamitin ung system basta i coconfigure lng na i allowed ung mga ibang PC na mareceive ung link na un sa browser nila..
------------------------------------------------------------
##PROBLEM OF OFFICE
Gusto nilang magkaroon ng system na duon mismo sila mag eencode ng mga data ng mga forms instead sa excel, at system na makaka gawa agad ng report per month,year,office etc.. 
1.Madaming Records matagal mag hanap, dahil may max limit lng pag rerecord ng data sa excel
2.Pag gusto nilang gumawa ng report, i reretype pa nila ulit at tatagalin ung mga may record kapag may laman na ang transferto or dateTurnOver,Remarks
3.Kung absent ung employee na may hawak ng record madalas hindi nila agad naaccess ung record, maski View man lng ,..
4.Security Access Cguro para d ma alter or mabago ng ibang employee ung record.

-------------------------------------------------------------------------------------------------------------------------
##PROBLEM SA PAG GAWA NG SYSTEM:
1.Accountability Card Profile Items 

	Example: 1 want to display 1 unit item kasama ang mga na issued na unit parts tulad ng ganto(nagawa ko nadin po ito gawin ung nested while pero, Once na i adopt ko na siya sa dataTables na sisira ung UI) dahil gusto din namin magawa ng mas mabilis ung system kaya gumamit kami ng plugin na datatables mahirap kasi kung gagawa pa kami ng sarili naming code ng search , pagnation using AJAX, JQUERY ubos 200hours namin agad
																					SEARCH:______________________________
-------------------------------------------------------------------------------------------------------------------------
|	TYPE	|PAR |	QTY/unit	| DESCRPTION |	SERIAL	| PROP# |	AMOUNT |	TRANSFER TO	| DATE TURNOVER | REMARKS	|
-------------------------------------------------------------------------------------------------------------------------
| SET1		|1x5 | 1 unit		| LAPTOP	 | 1xc565d	| sd45	| 90000	   | darren			| 12-1-2017		|	Transfer|
-------------------------------------------------------------------------------------------------------------------------
| PartSET1	|	 | 1 Pc 		| CPU	 	 | 1xc565d	| sd45	| 		   | mark 			| 12-4-2017		|	Transfer|
-------------------------------------------------------------------------------------------------------------------------
| PartSET1	|	 | 1 Pc 		| MONITOR	 | 1xc565d	| sd45	| 		   | kevin 			| 12-6-2017		|	Transfer|
-------------------------------------------------------------------------------------------------------------------------
| PartSET1	|	 | 1 Pc 		| KEYBOARD	 | 1xc565d	| sd45	| 		   | omar			| 12-8-2017		|	Transfer|
-------------------------------------------------------------------------------------------------------------------------
| SET2		|1x5 | 1 unit		| LAPTOP	 | 1xc565d	| sd45	| 90000	   | darren			| 12-1-2018		|	Transfer|
-------------------------------------------------------------------------------------------------------------------------
| PartSET2	|	 | 1 Pc 		| CPU	 	 | 1xc565d	| sd45	| 		   | mark 			| 12-4-2018		|	Transfer|
-------------------------------------------------------------------------------------------------------------------------
| PartSET2	|	 | 1 Pc 		| MONITOR	 | 1xc565d	| sd45	| 		   | kevin 			| 12-6-2018		|	Transfer|
-------------------------------------------------------------------------------------------------------------------------
| PartSET2s	|	 | 1 Pc 		| KEYBOARD	 | 1xc565d	| sd45	| 		   | omar			| 12-8-2018		|	Transfer|
-------------------------------------------------------------------------------------------------------------------------
																						PREV | 1 | 2 | 3 | 4 | 5 |NEXT
Gusto nila pag may laman na ung transfersTO at dateTurnOver Dapat daw ay kulay PULA ung FONT ng isang buong ROW.
2.Print with different forms and diffent query
	Example: sa accountability card meron different types of print like date[M or Year],designation,office or notes..dahil studyante palang kami at wala pang masyadong karanasaan kaya hindi lahat ng code ay alam namin at lubos na nauunawaan, madalas sa logic kami ng while at ifstatement na dadali, minsan sa query..
3. Bincard Parang Tulad Lang Din Ng Sa Accountability Card ung problema
4.Inventory Record Per 	Land,	Land Improvements, Aquaculture Structures,Other Land Improvements,	Buildings,School Buildings,	Hospital & Health Centers,Other Structures,	Office Equipment,	Furniture & Fixtures,Information & Communication Technology Equipment,	Books,	Machinery,Agricultural & Forestry Equipment,Communication Equipment,Construction & Heavy Equipment,Disaster Response & Rescue Equipment[Firefighting,Flood,Earthquake ,Volcanic ,Landslide ],Medical Equipment,	Military, Police & Security Equipment,	Sports Equipment,	Technical & Scientific Equipment,Other Machinery & Equipment, Motor Vehicles,Watercrafts,Other Property, Plant & Equipment eto ung mga hindi pa nmin nagagawang inventory modules ng system hahah sobrang lawak po kasi pag kami lng dalawa 


-------------------------------------------------------------------------------------------------------------------------
##FIRST DEVELOPERS
-	dahil kulang ang oras namin sa pag oojt hindi namin to magagawa ng 100% Fully functional at maging accurate, masyado po kasing malawak ang system na GSO kung buong buo kaya nag focus muna kami dto sa bincard,accountabilitycard,prs,ics,return slip

-------------------------------------------------------------------------------------------------------------------------
##Recommendation:
For File ng Records ng GSO
	-	Lahat ng Files na ifoforFile may softcopy or SCAN ng document at ma sasave sa SYSTEM para hindi mahirap mag hanap ng record kung hihingi sila ng XEROX copy ng DOCUMENT.
Cguro While Doing the improvement of this System mag assign nlng po kayo ng OJT din na tulad namin sa office at isang mag momonitor na marunong then para po mas malapit po kayo sa mga taong pwedeng mapag tanungan kung paano tlga sila gumagawa sa loob at para mas lalo po ninyong maunawaan ung manual system nila sa loob
