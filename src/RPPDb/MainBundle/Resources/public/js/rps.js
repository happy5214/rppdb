var ro="http://www.rieselprime.de/";
//var ro="file:///l:/_RieselPrime/";

//--------------------------------------------------------------------

//Bookmarks for k-values = not used anymore!!!

var bmurl="http://www.15k.org/SummaryK-values.htm#";
var bmtitle="(www.15k.org) k=";
var winopts="screenX=0,screenY=0,scrollbars=yes,resizable=yes,menubar=yes,toolbar=yes,location=yes,status=yes";

// insert bookmark
function bm(num){
    if (document.all) window.external.AddFavorite(bmurl+num,bmtitle+num)
}

// call page from primes.utm.edu (Top5000) with special index num of prime
function utm(num){
    w=window.open("http://primes.utm.edu/primes/page.php?id="+num,"",winopts);
    w.focus();
}

// call special post from www.mersenneforum.org with a=thread-number and b=post-number
function mf(a,b){
    w=window.open("http://www.mersenneforum.org/showpost.php?p="+a+"&postcount="+b,"",winopts);
    w.focus();
}

// call prover code from primes.utm.edu (Top5000)
function pc(cod){
    w=window.open("http://primes.utm.edu/bios/code.php?code="+cod,"",winopts);
    w.focus();
}

// call person code from primes.utm.edu (Top5000)
function bio(cod){
    w=window.open("http://primes.utm.edu/bios/page.php?id="+cod,"",winopts);
    w.focus();
}

// call page from PrimeSearch with special k=num   ###<a href=javascript:ps(397)>PrimeSearch</a>###
function ps(num){
    w=window.open("http://www.myjavaserver.com/~primesearch/ranges.jsp?view=k&k="+num,"",winopts);
    w.focus();
}

// call homepage for NPLB-project
function np(){
    w=window.open("http://www.rieselprime.org/nplb/NPLB_Home.htm","",winopts);
    w.focus();
}

// prints the 'Start'-date (as input) and 'Last edit'-date of the file
function last(started){
    L = document.lastModified; 
    Y = L.substring(6, 10); 
    M = L.substring(0, 2); 
    D = L.substring(3, 5);
    document.write("Started: "+started+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Last update: "+Y+"-"+M+"-"+D+"<br><br>");
}

function stats(){
    L = document.lastModified; 
    Y = L.substring(6, 10); 
    M = L.substring(0, 2); 
    D = L.substring(3, 5);
//  window.status="Last update: "+Y+"-"+M+"-"+D;
    self.status="Last update: "+Y+"-"+M+"-"+D;
    theTime = window.setTimeout("stats()", 1000);
}


// prints only the 'LastEdit'-date of a file
//function last1(file){
//  Datum = document.lastModified; 
//  Jahr = Datum.substring(6, 10); 
//  Monat = Datum.substring(0, 2); 
//  Tag = Datum.substring(3, 5);
//  document.write(Jahr+"/"+Monat+"/"+Tag); 
//}

// param b: id of obeject; b='low' -> low-weight k's invisible (only first one/id/class)
function set(b) {
    var a = document.getElementById(b);
    if (a.style.visibility != "hidden")
        a.style.visibility = "hidden";
    else
        a.style.visibility = "visible";
}

var DefStatusMsg="";
var StatusMsg=DefStatusMsg;
window.defaultStatus=DefStatusMsg;
function nmsg(msg){StatusMsg=msg;window.status=StatusMsg;return true;}
function newmsg(msg){return nmsg(msg);}
function defstatus(){return def();}
function def(){StatusMsg=DefStatusMsg;window.status=DefStatusMsg;return true;}
