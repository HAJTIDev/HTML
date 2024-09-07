let but=document.querySelector("#search")

const Search= ()=>{
        let input = document.querySelector("#search").value;
        let upp = input.toUpperCase();
        let ul = document.querySelector("#drinks");
        let li = ul.querySelectorAll("li");
        li.forEach(el =>{
                if(el.toUpperCase().indexOf(upp) > -1)
                el.style.display = "block";
                else el.style.display = "none";


        })
        /*
        for (let i = 0; i < li.length; i++) {
           let a = li[i].querySelectorAll("a")[0];
            let txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(upp) > -1) li[i].style.display = "block";
            else li[i].style.display = "none";
            
    }
    */
}
but.addEventListener("keyup", Search)