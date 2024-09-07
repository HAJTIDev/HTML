var op;
var val1;
function append(x)
{
    document.getElementById("display").innerHTML+=x;
}
function clear()
{
    document.getElementById("display").innerHTML="";
}
function del()
{
    var a = document.getElementById("display").value;
    a.slice(0, -1);
    document.getElementById("display").innerHTML=a;
}
function operator(x)
{
    op=x;
    val1= Number(document.getElementById("display").innerHTML);
    clear();
}
function result()
{
    var x= Number(document.getElementById("display").innerHTML);
switch(op)
{
    case '+':
        document.getElementById("display").innerHTML=val1+x;
        break;
    case '-':
        document.getElementById("display").innerHTML=val1-x;
        break;
        case '*':
        document.getElementById("display").innerHTML=val1*x;
        break;
        case '/':
            if(x!=0)
            {
                document.getElementById("display").innerHTML=val1/x;
            }else alert("Nie można dzielic przez 0!")
        break;
        case '^':
        document.getElementById("display").innerHTML=Math.pow(val1,x);
        break;
        case 'p':
            if(val1>=0&&x!=0)
            {
                document.getElementById("display").innerHTML=pow(val1, 1/x);
            } else if(x==0)
            {
                document.getElementById("display").innerHTML=1;
            }
        break;
        case 'm':
            if(x!=0)
            {
                document.getElementById("display").innerHTML=val1%x;
            }else alert("Nie można dzielic przez 0!")
        break;
        case '|':
            if(x<0)
            {
                document.getElementById("display").innerHTML=x*(-1);
            }else{
                document.getElementById("display").innerHTML=x;
            }
        break;
        case '+':
        document.getElementById("display").innerHTML=val1+x;
        break;
}
}