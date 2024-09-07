var textarray = [
    "",
    "Arts and Crafts",
    "Outdoor fun",
    "free time",
    "time to eat",
    "naptime"    // No comma after last entry
   ];
   
   
   function RndText() {
    for (let i=0; i<6;i++){
        var rannum= Math.floor(Math.random()*textarray.length);
        if(rannum=="") document.getElementById('show1').innerHTML+="<li>"+"<br>"+"</li>"; 
        else document.getElementById('show1').innerHTML+="<li>"+textarray[rannum]+"</li>";

        var rannum= Math.floor(Math.random()*textarray.length);
        if(rannum=="") document.getElementById('show2').innerHTML+="<li>"+"<br>"+"</li>"; 
        else document.getElementById('show2').innerHTML+="<li>"+textarray[rannum]+"</li>";

        var rannum= Math.floor(Math.random()*textarray.length);
        if(rannum=="") document.getElementById('show3').innerHTML+="<li>"+"<br>"+"</li>"; 
        else document.getElementById('show3').innerHTML+="<li>"+textarray[rannum]+"</li>";

        var rannum= Math.floor(Math.random()*textarray.length);
        if(rannum=="") document.getElementById('show4').innerHTML+="<li>"+"<br>"+"</li>"; 
        else document.getElementById('show4').innerHTML+="<li>"+textarray[rannum]+"</li>";

        var rannum= Math.floor(Math.random()*textarray.length);
        if(rannum=="") document.getElementById('show5').innerHTML+="<li>"+"<br>"+"</li>"; 
        else document.getElementById('show5').innerHTML+="<li>"+textarray[rannum]+"</li>";
    }
   }

   